<?php
/**
 * Template part for displaying posts
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>

<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>

<div class="blog-post-container blog hs-blog-post">
    <div class="blog-post-copy section post-body">
        <span id="hs_cos_wrapper_post_body"
              class="hs_cos_wrapper hs_cos_wrapper_meta_field hs_cos_wrapper_type_rich_text"
              data-hs-cos-general-type="meta_field" data-hs-cos-type="rich_text">
            <?php
            the_content(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentynineteen' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                )
            );
            ?>
        </span>
    </div>
    <div class="blog-post-meta">
        <div class="blog-meta-container subscribe-box-wrapper" style="max-width: 360px;">
            <div class="blog-meta-item">
                <?php get_template_part( 'template-parts/subscribe', 'box' ); ?>
            </div>
        </div>
        <?php
        $categories = get_the_category();
        if ( $categories ): ?>
            <div class="blog-meta-container">
                <div class="blog-meta-title">Category</div>
                <div class="blog-meta-item"><?php
                    foreach ( $categories as $index => $category ) : ?><?php
                        echo ( $index !== 0 ) ? '<br style="line-height: 30px;">' : '';
                        ?><a href="<?php
                        echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php
                        echo esc_html( $category->name ); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="blog-meta-container">
            <div class="blog-meta-title">By</div>
            <div class="blog-meta-item"><?php ujet_posted_by(); ?></div>
        </div>
        <div class="blog-meta-container">
            <div class="blog-meta-title">Date</div>
            <div class="blog-meta-item"><?php ujet_posted_on(); ?></div>
        </div>
        <div class="blog-meta-container">
            <div class="blog-meta-title">Estimated time</div>
            <div class="blog-meta-item"><?php echo do_shortcode( '[rt_reading_time postfix="min read" postfix_singular="min read"]' ); ?></div>
        </div>
        <?php if ( is_user_logged_in() ) { ?>
            <div class="blog-meta-container">
                <div class="blog-meta-title">Edit this post</div>
                <div class="blog-meta-item"><?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers. */
                                __( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ),
                        '<span class="edit-link">' . twentynineteen_get_icon_svg( 'edit', 16 ),
                        '</span>'
                    ); ?>
                </div>
            </div>
        <?php } ?>

        <a class="btn btn-bright-blue btn-radius" href="/request-a-demo/" target="_blank">Request a Demo</a>
    </div>
</div>
