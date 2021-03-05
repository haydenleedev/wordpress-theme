<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main">

            <div class="error-404 not-found">
                <!--                <header class="page-header">-->
                <!---->
                <!--                </header>-->
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/404.PNG" alt="hero-404">
                <div class="body-container-wrapper">
                    <div class="body-container container-fluid">

                        <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
                            <div class="row-fluid ">
                                <div class="span12 widget-span widget-type-cell page-center content-wrapper" style=""
                                     data-widget-type="cell" data-x="0" data-w="12">

                                    <div class="row-fluid-wrapper row-depth-1 row-number-2 ">
                                        <div class="row-fluid ">
                                            <div class="span12 widget-span widget-type-cell main-content" style=""
                                                 data-widget-type="cell" data-x="0" data-w="12">

                                                <div class="row-fluid-wrapper row-depth-1 row-number-3 ">
                                                    <div class="row-fluid ">
                                                        <div class="span12 widget-span widget-type-rich_text custom_error_message"
                                                             style="" data-widget-type="rich_text" data-x="0"
                                                             data-w="12">
                                                            <div class="cell-wrapper layout-widget-wrapper">
<span id="hs_cos_wrapper_main_copy" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style=""
      data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><h1>Page not found</h1>
<h2>Error 404</h2>
<p>Sorry, the page you were looking for at this URL was not found.</p></span>
                                                            </div><!--end layout-widget-wrapper -->
                                                        </div><!--end widget-span -->
                                                    </div><!--end row-->
                                                </div><!--end row-wrapper -->

                                                <div class="row-fluid-wrapper row-depth-1 row-number-4 ">
                                                    <div class="row-fluid ">
                                                        <div class="span12 widget-span widget-type-google_search "
                                                             style="" data-widget-type="google_search" data-x="0"
                                                             data-w="12">
                                                            <div class="cell-wrapper layout-widget-wrapper">
<span id="hs_cos_wrapper_google_search" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_google_search"
      style="" data-hs-cos-general-type="widget" data-hs-cos-type="google_search">        <div id="hs-search-module"
                                                                                               class="hs-search-module hs-search-module-7703">
            <form class="hs-form">
                <div class="field" role="search">
                    <label for="hs-search-7703">Search this site on Google</label>
                    <div class="input">
                        <input type="text" id="hs-search-7703" class="hs-input" value="">
                        <a class="hs-button primary">Search Google</a>
                    </div>
                </div>
            </form>
        </div>
        <script>
    function hsOnReadyGoogleSearch_7703() {
        var url = 'http://google.com/search?q=site:' + location.protocol + '//' + location.hostname + ' ';
        var $searchModule = document.querySelector('.hs-search-module-7703');
        var $input = $searchModule.querySelector('input');
        var $button = $searchModule.querySelector('.hs-button.primary');
        if (true) {
            $input.value = decodeURIComponent(location.pathname.split('/').join(' ').split('.').join(' ').split('-').join(' ').split('_').join(''));
        }

        $button.addEventListener('click', function () {
            var newUrl = url + $input.value;
            var win = window.open(newUrl, '_blank');
            if (win) {
                win.focus();
            } else {
                location.href = newUrl;
            }
        });
        $input.addEventListener('keypress', function (e) {
            if (e.keyCode !== 13) return;
            e.preventDefault();
            $button.click();
        });
    }

    if (document.readyState === "complete" ||
        (document.readyState !== "loading" && !document.documentElement.doScroll)
    ) {
        hsOnReadyGoogleSearch_7703();
    } else {
        document.addEventListener("DOMContentLoaded", hsOnReadyGoogleSearch_7703);
    }
</script>

</span></div><!--end layout-widget-wrapper -->
                                                        </div><!--end widget-span -->
                                                    </div><!--end row-->
                                                </div><!--end row-wrapper -->

                                            </div><!--end widget-span -->
                                        </div><!--end row-->
                                    </div><!--end row-wrapper -->

                                </div><!--end widget-span -->
                            </div><!--end row-->
                        </div><!--end row-wrapper -->

                    </div><!--end body -->
                </div>
            </div><!-- .error-404 -->

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();
