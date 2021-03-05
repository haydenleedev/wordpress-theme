<?php
/**
 * Template part for displaying press items: news + press releases
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>

<section id="primary" class="content-area post post-category-press">
    <main class="main no-overflow paragraph-wrapper container">
        <div class="post__header">
            <?php get_template_part('template-parts/header/press', 'header'); ?>
        </div>

        <div class="post__content">
<!--            <div id="at-custom-sidebar" class="at-custom-sidebar atss-left addthis-animated slideInLeft"-->
<!--                 style="background-color: rgb(255, 255, 255);">-->
<!--                <div class="at-custom-sidebar-label at4-hide">AddThis Sharing</div>-->
<!--                <div class="at-custom-sidebar-btns"><a role="button" tabindex="0" title="Twitter"-->
<!--                                                       class="at-share-btn at-svc-twitter"><span class="at-icon-wrapper"-->
<!--                                                                                                 style="background-color: rgb(29, 161, 242); line-height: 50px; height: 50px; width: 50px; border-radius: 0%;"><svg-->
<!--                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
<!--                                    viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-twitter-1"-->
<!--                                    title="Twitter" alt="Twitter" class="at-icon at-icon-twitter"-->
<!--                                    style="fill: rgb(255, 255, 255); width: 32px; height: 32px;"><title-->
<!--                                        id="at-svg-twitter-1">Twitter</title><g><path-->
<!--                                            d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336"-->
<!--                                            fill-rule="evenodd"></path></g></svg><div-->
<!--                                    class="at4-share-count-container at4-hide"><span class="at4-share-count"><span-->
<!--                                            class="at4-visually-hidden">, Number of shares</span></span></div></span></a><a-->
<!--                            role="button" tabindex="0" title="LinkedIn" class="at-share-btn at-svc-linkedin"><span-->
<!--                                class="at-icon-wrapper"-->
<!--                                style="background-color: rgb(0, 119, 181); line-height: 50px; height: 50px; width: 50px; border-radius: 0%;"><svg-->
<!--                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
<!--                                    viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-linkedin-2"-->
<!--                                    title="LinkedIn" alt="LinkedIn" class="at-icon at-icon-linkedin"-->
<!--                                    style="fill: rgb(255, 255, 255); width: 32px; height: 32px;"><title-->
<!--                                        id="at-svg-linkedin-2">LinkedIn</title><g><path-->
<!--                                            d="M26 25.963h-4.185v-6.55c0-1.56-.027-3.57-2.175-3.57-2.18 0-2.51 1.7-2.51 3.46v6.66h-4.182V12.495h4.012v1.84h.058c.558-1.058 1.924-2.174 3.96-2.174 4.24 0 5.022 2.79 5.022 6.417v7.386zM8.23 10.655a2.426 2.426 0 0 1 0-4.855 2.427 2.427 0 0 1 0 4.855zm-2.098 1.84h4.19v13.468h-4.19V12.495z"-->
<!--                                            fill-rule="evenodd"></path></g></svg><div-->
<!--                                    class="at4-share-count-container at4-hide"><span class="at4-share-count"><span-->
<!--                                            class="at4-visually-hidden">, Number of shares</span></span></div></span></a><a-->
<!--                            role="button" tabindex="0" title="Facebook" class="at-share-btn at-svc-facebook"><span-->
<!--                                class="at-icon-wrapper"-->
<!--                                style="background-color: rgb(59, 89, 152); line-height: 50px; height: 50px; width: 50px; border-radius: 0%;"><svg-->
<!--                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
<!--                                    viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-facebook-3"-->
<!--                                    title="Facebook" alt="Facebook" class="at-icon at-icon-facebook"-->
<!--                                    style="fill: rgb(255, 255, 255); width: 32px; height: 32px;"><title-->
<!--                                        id="at-svg-facebook-3">Facebook</title><g><path-->
<!--                                            d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z"-->
<!--                                            fill-rule="evenodd"></path></g></svg><div-->
<!--                                    class="at4-share-count-container at4-hide"><span class="at4-share-count"><span-->
<!--                                            class="at4-visually-hidden">, Number of shares</span></span></div></span></a><a-->
<!--                            role="button" tabindex="0" title="Email" class="at-share-btn at-svc-email"><span-->
<!--                                class="at-icon-wrapper"-->
<!--                                style="background-color: rgb(132, 132, 132); line-height: 50px; height: 50px; width: 50px; border-radius: 0%;"><svg-->
<!--                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
<!--                                    viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-email-4"-->
<!--                                    title="Email" alt="Email" class="at-icon at-icon-email"-->
<!--                                    style="fill: rgb(255, 255, 255); width: 32px; height: 32px;"><title-->
<!--                                        id="at-svg-email-4">Email</title><g><g fill-rule="evenodd"></g><path-->
<!--                                            d="M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z"></path><path-->
<!--                                            d="M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z"></path></g></svg><div-->
<!--                                    class="at4-share-count-container at4-hide"><span class="at4-share-count"><span-->
<!--                                            class="at4-visually-hidden">, Number of shares</span></span></div></span></a>-->
<!--                </div>-->
<!--            </div>-->
            <div class="smaller-grid-container">
            <?php the_content(); ?>
            </div>
        </div>
    </main><!-- #main -->
</section><!-- #primary -->
