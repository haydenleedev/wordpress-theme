<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 */

// Check to see if rev-manifest exists for CSS and JS static asset revisioning
//https://github.com/sindresorhus/gulp-rev/blob/master/integration.md
if ( ! function_exists( 'foundationpress_asset_path' ) ) :
    function foundationpress_asset_path( $filename, $default_manifest_path = '' ) {
        $filename_split = explode( '.', $filename );
        $dir            = end( $filename_split );
        $manifest_path  = dirname( dirname( __FILE__ ) ) . '/dist/' . $dir . '/rev-manifest.json';
        if ( $default_manifest_path ) {
            $manifest_path = dirname( dirname( __FILE__ ) ) . '/dist/' . $dir . '/' . $default_manifest_path;
        }

        if ( file_exists( $manifest_path ) ) {
            $manifest = json_decode( file_get_contents( $manifest_path ), true );
        } else {
            $manifest = array();
        }

        if ( array_key_exists( $filename, $manifest ) ) {
            return $manifest[ $filename ];
        }

        return $filename;
    }
endif;

if ( ! function_exists( 'foundationpress_scripts' ) ) :
    function foundationpress_scripts() {

        // Enqueue the main Stylesheet.
        wp_enqueue_style( 'twentynineteen-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'twentynineteen-style' ), null, 'all' );
        wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0', 'all' );
        wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1', 'all' );
        wp_enqueue_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/dist/css/' . foundationpress_asset_path( 'app.css' ), array(), null, 'all' );

        // Deregister the jquery version bundled with WordPress.
        wp_deregister_script( 'jquery' );

        // CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
        wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', false );
        wp_enqueue_script( 'masonry', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array(), '3.3.1', false );
        wp_enqueue_script( 'slick', 'https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js', array(), '1.5.01', true );
        wp_enqueue_script( 'marketo-forms2', 'https://app-sj30.marketo.com/js/forms2/js/forms2.min.js', array(), '', true );

        // Enqueue our scripts
        wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/dist/js/' . foundationpress_asset_path( 'app.js' ), array( 'jquery', 'masonry' ), null, true );

        $domain = current_domain();
        $data   = array(
            'host'              => $domain['host'],
            'domain'            => $domain['domain'],
            'home_url'          => home_url(),
            'ajaxurl'           => admin_url( 'admin-ajax.php' ),
            'page_title'        => get_the_title(),
            'posts_per_page'    => get_option( 'posts_per_page' ),
            'site_title'        => get_bloginfo( 'name' ),
            'subscribe_message' => get_field( 'subscribe_message', 'options' ),
            'IS_BLOG'           => (int) ( IS_BLOG === null || IS_BLOG === true )  // IF IT IS BLOG
        );
        wp_localize_script( 'main-js', 'ujet_object', $data );
    }

    add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );
endif;


if ( ! function_exists( "current_domain" ) ) {
    function current_domain() {
        $host   = $_SERVER['HTTP_HOST'];
        $darray = explode( '.', $host );
        $narray = array_reverse( $darray );
        $domain = $narray[1] . '.' . $narray[0];
        unset( $darray, $narray );

        return array(
            'host'   => $host,
            'domain' => $domain
        );
    }
}

