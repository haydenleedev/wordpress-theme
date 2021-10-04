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
                $outputAwards .= '<img src="' . $icon['image']['url'] . '" width="90" height="117" alt="">';
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

        <div class="sub-footer no-border" aria-label="<?php esc_attr_e( 'Footer', 'twentynineteen' ); ?>">
        <div class="trust">
            <!--TRUSTE COOKIE POPUP-->
            <div id='teconsent'></div>
            <!--TRUSTE COOKIE POPUP-->

            <div class="block mt-10px">
                 <div class="inline-block h-39px"><a
                        href="//privacy.truste.com/privacy-seal/validation?rid=c2d82a58-c9ed-4d48-b827-653acbf4d418"
                        target="_ blank"><img style="border: none"
                                              src="//privacy-policy.truste.com/privacy-seal/seal?rid=c2d82a58-c9ed-4d48-b827-653acbf4d418"
                                              alt="TRUSTe" width="105" height="33"></a></div>

                    <!-- TrustArc CCPA seal -->
                <div class="inline-block h-36px"><a href='https://submit-irm.trustarc.com/services/validation/bac0a2d7-003d-4c6d-8171-d3fd1756d56d'  target='_blank'>
                    <img style='border: none' src='https://submit-irm.trustarc.com/services/validation/bac0a2d7-003d-4c6d-8171-d3fd1756d56d/image' alt='TrustArc' width="164" height="44"/>
                    </a></div>
                    <!-- END: CCPA seal -->     
            </div>                            
        </div>
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
} else if (('ujet.co' === $domain['host'] || 'www.ujet.co' === $domain['host'] || 'ujet.cx' === $domain['host'] || 'www.ujet.cx' === $domain['host']) && $isItBlog !== true) {
    get_template_part( 'template-parts/tracking-codes/google-www-code' );
    get_template_part( 'template-parts/tracking-codes/marketo-munchkin-code' );
   // get_template_part( 'template-parts/website-chat' );
}  
?>

</body>
</html>
