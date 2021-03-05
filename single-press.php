<?php
/*
 * Template Name: Press Template
 * Template Post Type: post
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

                                        get_template_part( 'template-parts/content/content', 'press' );
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
