<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 */

register_nav_menus(
    array(
        'top-bar-r'          => esc_html__( 'Right Top Bar', 'ujet' ),
        /*'mobile-nav' => esc_html__( 'Mobile', 'ujet' ),*/
        'footer-menu'        => esc_html__( 'Footer', 'ujet' ),
        'bottom-footer-menu' => esc_html__( 'Bottom footer', 'ujet' )
    )
);

/**
 * Desktop navigation - right top bar
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'foundationpress_top_bar_r' ) ) {
    function foundationpress_top_bar_r() {
        wp_nav_menu(
            array(
                'container'      => false,
                'menu_class'     => 'dropdown menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s desktop-menu" data-dropdown-menu>%3$s</ul>',
                'theme_location' => 'top-bar-r',
                'depth'          => 3,
                'fallback_cb'    => false,
                'walker'         => new Foundationpress_Top_Bar_Walker(),
            )
        );
    }
}

/**
 * Footer navigation menu
 */
if ( ! function_exists( 'foundationpress_footer_menu' ) ) {
    function foundationpress_footer_menu() {
        wp_nav_menu(
            array(
                'container'      => false,
                'menu_class'     => 'dropdown menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s desktop-menu" data-dropdown-menu>%3$s</ul>',
                'theme_location' => 'footer-menu',
                'depth'          => 3,
                'fallback_cb'    => false,
                'walker'         => new Foundationpress_footer_menu(),
            )
        );
    }
}

/**
 * Bottom footer navigation menu
 */
if ( ! function_exists( 'foundationpress_bottom_footer_menu' ) ) {
    function foundationpress_bottom_footer_menu() {
        wp_nav_menu(
            array(
                'container'      => false,
                'menu_class'     => 'dropdown menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s desktop-menu" data-dropdown-menu>%3$s</ul>',
                'theme_location' => 'bottom-footer-menu',
                'depth'          => 3,
                'fallback_cb'    => false,
                'walker'         => new Foundationpress_footer_menu(),
            )
        );
    }
}

/**
 * Add support for buttons in the top-bar menu:
 * 1) In WordPress admin, go to Apperance -> Menus.
 * 2) Click 'Screen Options' from the top panel and enable 'CSS CLasses' and 'Link Relationship (XFN)'
 * 3) On your menu item, type 'has-form' in the CSS-classes field. Type 'button' in the XFN field
 * 4) Save Menu. Your menu item will now appear as a button in your top-menu
 */
if ( ! function_exists( 'foundationpress_add_menuclass' ) ) {
    function foundationpress_add_menuclass( $ulclass ) {
        $find    = array( '/<a rel="button"/', '/<a title=".*?" rel="button"/' );
        $replace = array( '<a rel="button" class="button"', '<a rel="button" class="button"' );

        return preg_replace( $find, $replace, $ulclass, 1 );
    }

    add_filter( 'wp_nav_menu', 'foundationpress_add_menuclass' );
}
