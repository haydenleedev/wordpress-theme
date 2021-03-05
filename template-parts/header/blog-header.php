<?php
global $post;
/**
 * Verify if the following variables aren't set so we can set them with some default values
 */
$image_src  = ( $image_src === null ) ? wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ) : $image_src;  // get the featured image (array)
$categories = ( $categories === null ) ? get_the_category() : $categories;
?>
    <div class="blog-header"<?php
    echo ( $image_src[0] ) ? ' style="background-image: url(\'' . $image_src[0] . '\'); transform: scale(1) translateY(0px); opacity: 1;"' : ''; ?>>
        <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.65);z-index:0;"></div>
        <div class="blog-header-container" style="transform: translateY(0px); opacity: 1;">
            <div class="blog-header-category"><?php ujet_get_categories( $categories ); ?></div>
            <div class="blog-header-title"><?php the_title(); ?></div>
            <a href="<?php the_permalink(); ?>" class="blog-header-read">Read</a>

            <span class="blog-read-time"><?php echo do_shortcode( '[rt_reading_time postfix="min read" postfix_singular="min read"]' ); ?></span>
        </div>
    </div>
<?php
