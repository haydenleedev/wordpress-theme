<?php
/**
 * Template Name: 007 Template
 *
 */

get_header('007');
$class   = get_field('class');
?>

<link href="https://unpkg.com/cloudinary-video-player@1.5.3/dist/cld-video-player.light.min.css" rel="stylesheet">
<script src="https://unpkg.com/cloudinary-core@latest/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/cloudinary-video-player@1.5.3/dist/cld-video-player.light.min.js"
type="text/javascript"></script>

<section id="primary" class="content-area<?php echo ' ' . $class; ?>">
        <main class="main no-overflow paragraph-wrapper container">
        <section class="bg-full-img">
         
            <header class="header-simple">

                            <img class="header-logo-white" alt=""
                                src="<?php echo $staticLogo ?: '../wp-content/themes/ujet/dist/images/ujet-logo-white.svg'; ?>" width="130" height="41">

            </header>

            <a href="#form-go" class="cta-wrapper-link block" title="Request a Demo">
            <div class="cta-wrapper" >
                <div class="circle-cta text-center">
                    <div class="cta-inner">
                        <figure>
                        <img class="cta-logo aligncenter block" alt="ujet logo" src="../wp-content/uploads/2021/07/ujet-cx-logo-01.svg" width="168" height="52">
                        </figure>
                        <p class="text-28px text-600 pb-0">the secret's out</p>
                        <span class="btn small btn-navy inline-block text-center text-18px text-center">Curious?</span>
                    </div>
                </div>
            </div>
            </a>

            <!--<img class="barrel" alt=""
                                src="<?php // echo $staticLogo ?: './wp-content/themes/ujet/dist/images/barrel.svg'; ?>" width="100%" height="auto"> -->
                       
                <div class="barrel"></div>
               
        </section>

        <div class="grid-container">
            <?php get_template_part('template-parts/flexible-content'); ?>
            
        </div>

        <!-- form -->
        <?php get_template_part('template-parts/footer-form-module'); ?>
        <!-- form -->

        </main><!-- #main -->
    </section><!-- #primary -->


<?php
get_footer('simple');
