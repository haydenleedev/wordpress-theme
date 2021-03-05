<?php

// IS_BLOG detection
add_action( 'wp', 'isBlog' );
function isBlog() {
    $isBlog = ( is_post_type_archive( 'blogposts' ) || is_singular( 'blogposts' ) || is_category() || is_author() || is_tag() );

    if ( $isBlog ) {
        define( 'IS_BLOG', true );
    }

    return $isBlog;

}

add_action( 'pre_get_posts', 'custom_post_type_archive' );
function custom_post_type_archive( &$query ) {
    if ( isBlog() && ( $query->is_author || $query->is_category || $query->is_tag ) ) {
        $query->set( 'post_type', 'blogposts' );
    }
}

add_filter( 'pre_get_document_title', 'new_cpt_archive_title', 9999 );
function new_cpt_archive_title( $title ) {

    if ( is_post_type_archive( 'blogposts' ) ) {
        $title = 'UJET Blog';

        return $title;
    }

    return $title;
}

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Enqueue scripts */
require_once( 'library/add-options-pages.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Manually Disable Search Feature in WordPress */
require_once( 'library/manually-disable-search-feature-in-wordpress.php' );

/** WILL BE USED FOR GETTING THE header AND THE footer */
require_once( 'library/get-html-from-url.php' );

function create_team_member() {

    register_post_type( 'team_member',
        // CPT Options
        array(
            'labels'              => array(
                'name'          => __( 'Team members' ),
                'singular_name' => __( 'Team member' )
            ),
            'show_ui'             => true,  // you should be able to edit it in wp-admin
            'exclude_from_search' => true,  // you should exclude it from search results
            'public'              => false, // it's not public, it shouldn't have it's own permalink, and so on
            'show_in_nav_menus'   => false, // you shouldn't be able to add it to menus
            'publicly_queryable'  => false,
            'has_archive'         => false,  // it shouldn't have archive page
            'rewrite'             => false,  // it shouldn't have rewrite rules
            'supports'            => array( 'title' )
        )
    );
}

// Hooking up our function to theme setup
add_action( 'init', 'create_team_member' );


add_action( 'init', 'createBlogPosts' );
function createBlogPosts() {
    register_post_type( 'Blog Posts',

        // CPT Options
        array(
            'labels'      => array(
                'name'          => __( 'Blog Posts' ),
                'singular_name' => __( 'Blog Posts' )
            ),
            'author'      => true,
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array( 'slug' => 'blog' ),
            'supports'    => array(

                /* Post titles ($post->post_title). */
                'title',

                /* Post content ($post->post_content). */
                'editor',

                /* Post excerpt ($post->post_excerpt). */
                'excerpt',

                /* Post author ($post->post_author). */
                'author',

                /* Featured images (the user's theme must support 'post-thumbnails'). */
                'thumbnail',

                /* Displays the Custom Fields meta box. Post meta is supported regardless. */
                'custom-fields',

                /* Displays the Revisions meta box. If set, stores post revisions in the database. */
                'revisions',

                /* Displays the Attributes meta box with a parent selector and menu_order input box. */
                'page-attributes',

                /* Displays the Format meta box and allows post formats to be used with the posts. */
                'post-formats',
            ),
            'taxonomies'  => array( 'category', 'post_tag' )

        )
    );
}

function create_event() {

    register_post_type( 'event',
        // CPT Options
        array(
            'labels'              => array(
                'name'          => __( 'Events' ),
                'singular_name' => __( 'Event' )
            ),
            'show_ui'             => true,  // you should be able to edit it in wp-admin
            'exclude_from_search' => true,  // you should exclude it from search results
            'public'              => false, // it's not public, it shouldn't have it's own permalink, and so on
            'show_in_nav_menus'   => false, // you shouldn't be able to add it to menus
            'publicly_queryable'  => false,
            'has_archive'         => false,  // it shouldn't have archive page
            'rewrite'             => false,  // it shouldn't have rewrite rules
            'supports'            => array( 'title' )
        )
    );
}

// Hooking up our function to theme setup
add_action( 'init', 'create_event' );

function create_award() {

    register_post_type( 'award',
        // CPT Options
        array(
            'labels'              => array(
                'name'          => __( 'Awards' ),
                'singular_name' => __( 'Award' )
            ),
            'show_ui'             => true,  // you should be able to edit it in wp-admin
            'exclude_from_search' => true,  // you should exclude it from search results
            'public'              => false, // it's not public, it shouldn't have it's own permalink, and so on
            'show_in_nav_menus'   => false, // you shouldn't be able to add it to menus
            'publicly_queryable'  => false,
            'has_archive'         => false,  // it shouldn't have archive page
            'rewrite'             => false,  // it shouldn't have rewrite rules
            'supports'            => array( 'title' )
        )
    );
}

// Hooking up our function to theme setup
add_action( 'init', 'create_award' );

function create_customer_story() {

    register_post_type( 'customer_story',
        // CPT Options
        array(
            'labels'              => array(
                'name'          => __( 'Customer stories' ),
                'singular_name' => __( 'Customer story' )
            ),
            'show_ui'             => true,  // you should be able to edit it in wp-admin
            'exclude_from_search' => true,  // you should exclude it from search results
            'public'              => true,  // it's public, it should have it's own permalink
            'publicly_queryable'  => true,
            'show_in_nav_menus'   => false, // you shouldn't be able to add it to menus
            'has_archive'         => false, // it shouldn't have archive page
            'rewrite'             => array( 'slug' => 'customerstories', 'with_front' => false ),
            'supports'            => array( 'title', 'editor', 'thumbnail' )
        )
    );
}

// Hooking up our function to theme setup
add_action( 'init', 'create_customer_story' );


// START: Integrations - custom post type
function create_software_integration() {

    register_post_type( 'software_integration',
        // CPT Options
        array(
            'labels'              => array(
                'name'          => __( 'Software Integrations' ),
                'singular_name' => __( 'Software Integration' )
            ),
            'show_ui'             => true,  // you should be able to edit it in wp-admin
            'exclude_from_search' => true,  // you should exclude it from search results
            'public'              => true,  // it's public, it should have it's own permalink
            'publicly_queryable'  => true,
            'show_in_nav_menus'   => false, // you shouldn't be able to add it to menus
            'has_archive'         => false, // it shouldn't have archive page
            'rewrite'             => array( 'slug' => 'softwareintegrations', 'with_front' => false ),
            'supports'            => array( 'title', 'editor', 'thumbnail' )
        )
    );
}

// Hooking up our function to theme setup
add_action( 'init', 'create_software_integration' );

// END: Integrations - custom post type



if ( ! function_exists( 'ujet_posted_on' ) ) {
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function ujet_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        printf(
            '<span class="posted-on">%1$s</span>',
            $time_string
        );
    }
}

if ( ! function_exists( 'ujet_posted_by' ) ) {
    /**
     * Prints HTML with meta information about theme author.
     */
    function ujet_posted_by() {
        printf(
        /* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
            '<span class="byline"><span class="screen-reader-text">%1$s</span><span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></span>',
            __( 'Posted by', 'twentynineteen' ),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_html( get_the_author() )
        );
    }
}

if ( ! function_exists( 'array_key_first' ) ) {
    /**
     * Gets the first key of an array
     * Polyfill for array_key_first() function added in PHP 7.3.
     * http://php.net/manual/en/function.array-key-first.php
     *
     * @param array $array
     *
     * @return mixed
     */
    function array_key_first( array $array ) {
        if ( count( $array ) ) {
            reset( $array );

            return key( $array );
        }

        return null;
    }
}

// Exclude Drafts from ACF Post Object field
add_filter( 'acf/fields/post_object/query', 'relationship_options_filter', 10, 3 );
if ( ! function_exists( "relationship_options_filter" ) ) {
    function relationship_options_filter( $options, $field, $the_post ) {
        $options['post_status'] = array( 'publish' );

        return $options;
    }
}

/**
 * Pagination of a query
 *
 * @param string $pages
 * @param int    $range
 * Usage below:
 * <?php if (function_exists("pagination")) {
 * pagination($search->max_num_pages);
 * } ?>
 */
if ( ! function_exists( "pagination" ) ) {
    function pagination( $pages = '', $range = 4, $paged ) {

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if ( ! $pages ) {
                $pages = 1;
            }
        }

        if ( $paged == 1 ) {
            $range = ( $range * 2 );
        } else if ( $paged == 2 ) {
            $range = ( $range * 2 ) - 1;
        } else if ( $paged == 3 ) {
            $range = ( $range * 2 ) - 2;
        } else if ( $paged == 4 ) {
            $range = ( $range * 2 ) - 3;
        } else if ( $paged == $pages - 3 ) {
            $range = ( $range * 2 ) - 3;
        } else if ( $paged == $pages - 2 ) {
            $range = ( $range * 2 ) - 2;
        } else if ( $paged == $pages - 1 ) {
            $range = ( $range * 2 ) - 1;
        } else if ( $paged == $pages ) {
            $range = ( $range * 2 );
        }

        $showitems = $range + 1;

        if ( empty( $paged ) ) {
            $paged = 1;
        }

        if ( 1 != $pages ) {
            echo "<div class=\"pagination\">";
            //if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            if ( $paged >= 2 ) {
                echo "<a href='" . get_pagenum_link( 1 ) . "' class=\"first\">First</a>";
            }
            if ( $paged > 1 && $showitems < $pages ) {
                echo "<a href='" . get_pagenum_link( $paged - 1 ) . "' class='previous'><span class=\"arrows\"></span></a>";
            }

            for ( $i = 1; $i <= $pages; $i ++ ) {
                if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
                    //echo ($paged == $i) ? "<span class=\"current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
                    if ( $paged == $i ) {
                        $output = "<span class=\"current\">" . $i . "</span>";
                    } else {
                        $output = "<a href='" . get_pagenum_link( $i ) . "' class=\"inactive";
                        if ( ( $paged - 1 == $i ) || ( $paged + 1 == $i ) ) {
                            $output .= " prev-next ";
                        }
                        $output .= "\">" . $i . "</a>";
                    }
                    echo $output;
                }
            }

            if ( $paged < $pages && $showitems < $pages ) {
                echo "<a href=\"" . get_pagenum_link( $paged + 1 ) . "\" class='next'><span class=\"arrows\"></span></a>";
            }
            //if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            if ( $paged <= $pages - 1 ) {
                echo "<a href='" . get_pagenum_link( $pages ) . "' class=\"last\">Last</a>";
            }
            echo "</div>\n";
            global $wp_query;
            echo "<div class=\"pagination-text\">Showing " . $paged . " of " . $pages . "</div>\n";
        }
    }
}

if ( ! function_exists( "ujet_get_categories" ) ) {
    function ujet_get_categories( $categories ) {
        if ( $categories ):
            foreach ( $categories as $index => $category ) : ?><?php
                echo ( $index !== 0 ) ? '&nbsp;/&nbsp;' : '';
                ?><a href="<?php
                echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php
                echo esc_html( $category->name ); ?></a>
            <?php endforeach; ?>
        <?php endif;
    }
}

// Customer stories - show only published customer stories under featured_articles section
add_filter( 'acf/fields/post_object/query', 'my_acf_fields_post_object_query', 10, 3 );
function my_acf_fields_post_object_query( $args, $field, $post_id ) {

    // Filtering post object by status
    $args['post_status'] = array( 'publish' );

    return $args;
}
