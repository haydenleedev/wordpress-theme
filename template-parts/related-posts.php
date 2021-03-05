<?php
global $post;
$show_pagination = ( $show_pagination === null ) ? false : $show_pagination;
$post_status     = ( $post_status === null ) ? 'publish' : $post_status;
$post_type       = ( $post_type === null ) ? 'post' : $post_type;
$number          = ( $number === null ) ? 3 : $number;

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : $paged;

$categories = get_the_category();
if ( $categories ):
    foreach ( $categories as $index => $category ) :
        $categories[] = $category->cat_ID;
        unset( $categories[ $index ] );
    endforeach;
    $categories = array_values( $categories );
endif;

$related_posts = new WP_Query( array(
    'post_type'      => $post_type,
    'post__not_in'   => array( $post->ID ),
    'post_status'    => $post_status,
    'posts_per_page' => $number,
    'category__in'   => $categories,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'paged'          => $paged
) );

if ( $related_posts->have_posts() ) { ?>
    <div class="blog-related-container" v-if="relatedPosts">
        <div class="blog-related-wrapper">
            <h2 class="blog-related-title">You might also like</h2>
            <div class="blog-related-posts">
                <?php while ( $related_posts->have_posts() ): $related_posts->the_post();
                    global $post;
                    $image_src  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );  // get the featured image (array)
                    $categories = get_the_category();
                    $authorid   = get_post_field( 'post_author', $post->ID );
                    $author     = trim( get_the_author_meta( 'first_name', $authorid ) . ' ' . get_the_author_meta( 'last_name', $authorid ) ); // use trim to eliminate the spaces before and after the string as sometimes the user name might have only the first or the last name ?>
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
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php
}
/* Restore original Post Data */
wp_reset_postdata(); ?>