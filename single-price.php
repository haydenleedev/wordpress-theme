<?php
/**
 * The template for displaying all single posts
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    WordPress
 * @subpackage Twenty_Nineteen
 * @since      1.0.0
 */

get_header();
?>
                    
 
        <main class="main no-overflow paragraph-wrapper container pricing">
        <section id="primary" class="content-area">
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content/content', 'price' );
            endwhile; // End of the loop.
            ?>
            </section>
        </main>
    
     

<?php
get_footer();
?>
