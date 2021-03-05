<?php

if ( function_exists( 'acf_add_options_page' ) ) {

    acf_add_options_page( array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
    ) );


    acf_add_options_sub_page( array(
        'page_title'  => 'General Settings',
        'menu_title'  => 'General',
        'parent_slug' => 'theme-general-settings',
    ) );

    acf_add_options_sub_page( array(
        'page_title'  => 'Header Settings',
        'menu_title'  => 'Header',
        'parent_slug' => 'theme-general-settings',
    ) );

    acf_add_options_sub_page( array(
        'page_title'  => 'Footer Settings',
        'menu_title'  => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ) );

}
