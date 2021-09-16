<?php
$cat      = get_category( get_query_var( 'cat' ) );
$category = $cat->slug ?? '';
$tag      = get_query_var( 'tag' );
$author   = is_author() ? get_the_author_meta( 'ID' ) : '';

$post_status = 'publish';

$paged     = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$paged     = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : $paged;
$post_type = 'blogposts';

$ujet_query = new WP_Query( array(
    'author'        => $author,
    'post_type'     => $post_type,
    'post_status'   => $post_status,
    'tag'           => $tag,
    'category_name' => $category,
    'orderby'       => 'date',
    'order'         => 'DESC',
    'paged'         => $paged
) );


if ( $ujet_query->have_posts() ) { ?>
<h1 class="off-screen"><?php echo $category; ?> | UJET Blog</h1>
    <div class="body-container-wrapper">
        <div class="body-container container-fluid">
            <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
                <div class="row-fluid ">
                    <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
                        <div class="row-fluid-wrapper row-depth-1 row-number-2 ">
                            <div class="row-fluid ">

                                <div class="span12 widget-span widget-type-blog_content" data-widget-type="blog_content" data-x="0" data-w="12">
                                    <?php
                                    $ct = 1;
                                    while ( $ujet_query->have_posts() ): $ujet_query->the_post();
                                        global $post;
                                        $image_src  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );  // get the featured image (array)
                                        $categories = get_the_category();
                                        $authorid   = get_post_field( 'post_author', $post->ID );
                                        $author     = trim( get_the_author_meta( 'first_name', $authorid ) . ' ' . get_the_author_meta( 'last_name', $authorid ) ); // use trim to eliminate the spaces before and after the string as sometimes the user name might have only the first or the last name

                                        if ( $ct === 1 ) {
                                            set_query_var( 'image_src', $image_src ); // pass this variable to the template
                                            set_query_var( 'categories', $categories ); // pass this variable to the template
                                            get_template_part( 'template-parts/header/blog', 'header' );
                                        } else {
                                            if ( $ct === 2 ) { ?>
                                                <div class="blog-list-section">
                                                <div class="blog-list-container">
                                                <div class="featured">
                                                    <div class="blog-item-featured">
                                                        <div class="blog-item">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <div class="blog-item-image-container"<?php
                                                                echo ( $image_src[0] ) ? ' style="background-image: url(\'' . $image_src[0] . '\');"' : ''; ?>></div>
                                                            </a>
                                                            <div class="blog-item-category"><?php ujet_get_categories( $categories ); ?></div>
                                                            <a href="<?php the_permalink(); ?>">
                                                                <div class="blog-item-title"><?php the_title(); ?></div>
                                                            </a>
                                                            <div class="blog-item-time-author">
                                                                <?php echo do_shortcode( '[rt_reading_time postfix="min read" postfix_singular="min read"]' ); ?>
                                                                &nbsp;|&nbsp;
                                                                <a href="<?php echo get_author_posts_url( $authorid ); ?>"><?php echo $author; ?></a>
                                                            </div>
                                                        </div>
                                                        <?php get_template_part( 'template-parts/subscribe', 'box' ); ?>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div<?php echo ( $ct === 7 ) ? ' class="sixth"' : ''; ?>>
                                                    <div class="blog-item">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <div class="blog-item-image-container"<?php
                                                            echo ( $image_src[0] ) ? ' style="background-image: url(\'' . $image_src[0] . '\');"' : ''; ?>></div>
                                                        </a>
                                                        <div class="blog-item-category"><?php ujet_get_categories( $categories ); ?></div>
                                                        <a href="<?php the_permalink(); ?>">
                                                            <div class="blog-item-title"><?php the_title(); ?></div>
                                                        </a>
                                                        <div class="blog-item-time-author">
                                                            <?php echo do_shortcode( '[rt_reading_time postfix="min read" postfix_singular="min read"]' ); ?>
                                                            &nbsp;|&nbsp;
                                                            <a href="<?php echo get_author_posts_url( $authorid ); ?>"><?php echo $author; ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                            if ( $ct === $ujet_query->post_count ) { ?>
                                                </div>
                                                <!--
                                                <div class="blog-load-more-container">
                                                    <div class="blog-header-read more">Load More</div>
                                                </div>
                                                -->
                                                </div>
                                                <?php
                                            }
                                        }

                                        $ct ++; // increase the counter
                                    endwhile; ?>

                                </div><!--end widget-type-blog_content-->

                            </div><!--end row-->
                        </div><!--end row-wrapper -->
                    </div><!--end widget-span -->
                </div><!--end row-->
            </div><!--end row-wrapper -->
        </div><!--end body -->
    </div><!--end body wrapper -->
    <!-- pagination START -->
    <div class="pagination__block">
        <?php if ( function_exists( "pagination" ) ) {
                pagination( $ujet_query->max_num_pages, get_option( 'posts_per_page' ), $paged );
        } ?>
    </div>
    <!-- pagination END -->
    <?php
} else {
    // echo 'Sorry, no posts matched your criteria.';
    get_template_part( 'template-parts/content', 'none' );
}
/* Restore original Post Data */
wp_reset_postdata(); ?>