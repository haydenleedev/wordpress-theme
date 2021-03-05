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
    <div class="body-container-wrapper">
        <div class="body-container container-fluid">
            <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
                <div class="row-fluid ">
                    <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0"
                         data-w="12">
                        <div class="row-fluid-wrapper row-depth-1 row-number-2 ">
                            <div class="row-fluid ">
                                <div class="span12 widget-span widget-type-blog_content " style=""
                                     data-widget-type="blog_content" data-x="0" data-w="12">

                                    <?php
                                    /* Start the Loop */
                                    while ( have_posts() ) :
                                        the_post();

                                        get_template_part( 'template-parts/content/content', 'customer_story' );
                                    endwhile; // End of the loop.
                                    ?>

                                </div>
                            </div>
                            <!--end row-->
                        </div>
                        <!--end row-wrapper -->
                    </div>
                    <!--end widget-span -->
                </div>
                <!--end row-->
            </div>
            <!--end row-wrapper -->
        </div>
        <!--end body -->
    </div>
    <!--end body wrapper -->

<?php
get_footer();
