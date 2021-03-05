<?php
/**
 * Template part for displaying customer stories
 * Template Name: Customer Story
 * Template Post Type: customer_story
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>


<section id="primary" class="content-area post">
    <main class="main no-overflow paragraph-wrapper container">
        <div class="post__header">
            <?php get_template_part( 'template-parts/header/customer_story', 'header' ); ?>
        </div>

        <div class="post__heading smaller-grid-container">
            <div class="">
                <h1 class="post__title"><?php echo the_title(); ?></h1>
                <div class="post__content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

        <div class="post__custom">
            <?php get_template_part('template-parts/flexible-content'); ?>
        </div>

    </main><!-- #main -->
</section><!-- #primary -->
