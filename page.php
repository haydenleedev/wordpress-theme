<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

    <?php get_template_part('template-parts/hero'); ?>

    <section id="primary" class="content-area">
        <main class="main no-overflow paragraph-wrapper container hh">

            <?php get_template_part('template-parts/flexible-content'); ?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();
