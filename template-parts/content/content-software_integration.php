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

    <div class="bg-medium-blue pt-30px plr-30px">
        <div class="header-logo">
        <div class="smaller-grid-container clearfix">
            <div class="logo-wrap alignleft">
                <?php get_template_part( 'template-parts/header/software-integration', 'header' ); ?>
            </div>
        
            <div class="logo-title alignleft">
                <h1 class="text-600 text-22px"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </div>
        </div>
    </div>

        <div class="post__wrap">
            <?php get_template_part('template-parts/flexible-content'); ?>
        </div>

    </main><!-- #main -->
</section><!-- #primary -->
