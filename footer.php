<?php
$domain = current_domain();
if ( IS_BLOG === null || IS_BLOG === true ) { // IF IT IS BLOG
    if ( is_single() ) :
        get_template_part( 'template-parts/related', 'posts' );
    endif;
//    include(__DIR__ . '/blog/footer.php');
    include( __DIR__ . '/blog/foot.php' );
} ?>
<footer class="footer">

    <?php
    $acfFooter             = get_field( 'footer', 'option' );
    $outputSocialIcons     = '';
    $outputSocialCopyRight = '';

    if ( $acfFooter ) :
        if ( $acfFooter["social_icons"] ) {
            $outputSocialIcons = '<ul class="social-icons">';
            foreach ( $acfFooter["social_icons"] as $icon ) {
                $outputSocialIcons .= '<li class="ico-' . $icon["icon"]["value"] . '">';
                if ( ! empty( $icon['link'] ) ) {
                    $outputSocialIcons .= '<a href="' . $icon['link']['url'] . '" target="' . $icon['link']['target'] . '"><span class="hidden">' . $icon['link']['title'] . '</span></a>';
                }
                $outputSocialIcons .= '</li>';
            }
            $outputSocialIcons .= '</ul>';
        }

        if ( $acfFooter["copyright"] ) {
            $outputSocialCopyRight = $acfFooter["copyright"];
        }

        if ( $acfFooter["awards"] ) {
            $outputAwards = '<ul class="awards-icons">';
            foreach ( $acfFooter["awards"] as $icon ) {
                $outputAwards .= '<li class="icon">';
                $outputAwards .= '<a href="' . $icon['image_link']['url'] . '" target="' . $icon['image_link']['target'] . '">';
                $outputAwards .= '<img src="' . $icon['image']['url'] . '" width="90" height="117">';
                $outputAwards .= '</a>';
                $outputAwards .= '</li>';
            }
            $outputAwards .= '</ul>';
        }

        if ( $acfFooter["link"] ) {
            $footerLink .= '<a href="' . $acfFooter['link']['url'] . '" target="' . $acfFooter['link']['target'] . '" class="footer-link">' . $acfFooter["link"]['title'] . '</a>';
        }

        if ( $acfFooter["support_link"] ) {
            $footerLink .= '<a href="' . $acfFooter['support_link']['url'] . '" target="' . $acfFooter['support_link']['target'] . '" class="footer-link">' . $acfFooter["support_link"]['title'] . '</a>';
        }

        if ( $acfFooter["phone_number"] ) {
            $footerPhone .= '<a href=" tel:+' . $acfFooter["phone_number"] . '" class="phone-no">' . $acfFooter["phone_number"] . '</a>';
        }

        if ( $acfFooter["awards_title"] ) {
            $awardsTitle .= '<div class="awards-title">' .$acfFooter["awards_title"] . '</div>';
        }

        ?>

        <div class="radius_footer"></div>
        <div class="grid-container-big">
            <div class="logo-footer">
                <img alt="UJET logo" class="footer__logo"
                     src="<?php echo get_stylesheet_directory_uri() . '/dist/images/ujet-logo-footer.svg'; ?>" width="100" height="63">
                <?php
                echo $footerPhone;
                echo $footerLink;
                echo $outputSocialIcons;
                echo $awardsTitle;
                echo $outputAwards;
                ?>
            </div>
            <?php if ( has_nav_menu( 'footer' ) ) : ?>
                <nav class="footer-navigation grid-container"
                     aria-label="<?php esc_attr_e( 'Footer Menu', 'twentynineteen' ); ?>">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-menu',
                        )
                    );
                    ?>
                </nav><!-- .footer-navigation -->
            <?php endif; ?>

        </div>
        <div class="sub-footer" aria-label="<?php esc_attr_e( 'Footer', 'twentynineteen' ); ?>">
            <!--TRUSTE COOKIE POPUP-->
            <div id='teconsent'></div>
            <!--TRUSTE COOKIE POPUP-->
            <div class="trust"><a
                        href="//privacy.truste.com/privacy-seal/validation?rid=c2d82a58-c9ed-4d48-b827-653acbf4d418"
                        target="_ blank"><img style="border: none"
                                              src="//privacy-policy.truste.com/privacy-seal/seal?rid=c2d82a58-c9ed-4d48-b827-653acbf4d418"
                                              alt="TRUSTe"/></a></div>

            <div class="fr">
            <div class="copyright">
                <div class="copyright-text">
                    <?php echo $outputSocialCopyRight; ?>
                </div>
            </div>
            <?php if ( has_nav_menu( 'bottom-footer-menu' ) ) : ?>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'bottom-footer-menu',
                        'menu_class'     => 'footer-menu',
                    )
                );
                ?>
            <?php endif; ?>
            </div>

        </div><!-- .footer-navigation -->
    <?php endif; ?>
</footer>

<!--TRUSTE COOKIE POPUP-->
<div id="truste-consent-track" style="display:none"></div>
<div id="consent_blackbar"></div>
<!--TRUSTE COOKIE POPUP-->

<?php wp_footer();

$url = $_SERVER["REQUEST_URI"];
$isItBlog = strpos($url, '/blog/');

if ( $isItBlog!==false ) {
    get_template_part( 'template-parts/tracking-codes/google-www-code' );
    get_template_part( 'template-parts/tracking-codes/marketo-munchkin-code' );
} else if (('ujet.co' === $domain['host'] || 'www.ujet.co' === $domain['host']) && $isItBlog !== true) {
    get_template_part( 'template-parts/tracking-codes/google-www-code' );
    get_template_part( 'template-parts/tracking-codes/marketo-munchkin-code' );
    get_template_part( 'template-parts/website-chat' );
} else if ( 'ujet1.scriptics.ro' === $domain['host'] || 'ujet2.scriptics.ro' === $domain['host'] ) {
    get_template_part( 'template-parts/website-chat' );
} ?>

</body>
</html>
