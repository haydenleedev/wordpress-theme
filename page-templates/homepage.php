<?php
/**
 * Template Name: Home Template
 *
 */

get_header(); ?>

<section id="homepage-hero" class="hero-image">
    <?php get_template_part('template-parts/hero'); ?>
</section>

<section id="primary" class="content-area">
    <main class="main no-overflow paragraph-wrapper container homePage">
        <section class="suport">
            <h1 class="title">Reimagining Customer Support for a Connected World</h1>
            <div class="description">UJET is a cloud-native, mobile-focused customer support platform taking
                digital endpoints and channels and infusing them with intelligent automation to provide high-quality
                customer support experiences.
            </div>
            <div class="repeater">
                <div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icon-voice.svg"/>
                    <h2 class="repeater_title">Voice</h2>
                    <p class="repeater_description">UJET voice and IVR provides a modern end-user experience through
                        intelligent
                        routing, call management, multiple language and location support, and more.</p>
                </div>
                <div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icon-messaging.svg"/>
                    <h2 class="repeater_title">Messaging</h2>
                    <p class="repeater_description">Chat with customers in-app, on the web, or through text. Provide
                        high-quality digital messaging options while on-hold or speaking directly with an agent.</p>

                </div>
                <div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icon-mobile.svg"/>
                    <h2 class="repeater_title">Mobile</h2>
                    <p class="repeater_description">Use mobile device features for personal authentication, share photos,
                        video,
                        screenshots, and more. Provide support convenience for digital natives.</p>
                </div>
            </div>
        </section>

    </main>
</section>
<?php get_footer(); ?>
