<?php
/**
 * Template Name: New Landing Page Template
 *
 */

get_header();
$class   = get_field('class');
?>

    <?php get_template_part('template-parts/hero-new'); ?>

    <section id="primary" class="content-area<?php echo ' ' . $class; ?>">
        <main class="main no-overflow paragraph-wrapper container">

            <?php get_template_part('template-parts/flexible-content'); ?>

            <?php get_template_part('template-parts/footer-form-module'); ?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();
