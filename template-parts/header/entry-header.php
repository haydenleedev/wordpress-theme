<?php
/**
 * Displays the post header
 *
 * @package    WordPress
 * @subpackage Twenty_Nineteen
 * @since      1.0.0
 */
?>

<div class="single-blog-post-header"<?php if ( has_post_thumbnail() ) : ?>
    style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"<?php endif; ?>>
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.65);z-index:0;"></div>
    <div class="single-blog-header-title">
        <h1 id="hs_cos_wrapper_name" class="hs_cos_wrapper hs_cos_wrapper_meta_field hs_cos_wrapper_type_text"
              style="" data-hs-cos-general-type="meta_field" data-hs-cos-type="text"><?php the_title(); ?></h1>
    </div>
</div>

