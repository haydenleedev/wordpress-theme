<?php

if ( ! function_exists( "current_domain" ) ) {
    function current_domain() {
        $host   = $_SERVER['HTTP_HOST'];
        $darray = explode( '.', $host );
        $narray = array_reverse( $darray );
        $domain = $narray[1] . '.' . $narray[0];
        unset( $darray, $narray );

        return array(
            'host'   => $host,
            'domain' => $domain
        );
    }
}

$arrayWithDomainsToStopTheSearchFunctionality = array(
    // PROD environment
    'ujet.co',
    'www.ujet.co',
    'blog.ujet.co',
    // DEV environments
    'ujetstage.wpengine.com',
    'ujetdwv.wpengine.com',
    'ujet3.scriptics.ro',
    'ujet4.scriptics.ro'
);

$current_domain = current_domain();
if ( in_array( $current_domain['host'], $arrayWithDomainsToStopTheSearchFunctionality, false ) ) {
#region Manually Disable Search Feature in WordPress
    function wpb_filter_query( $query, $error = true ) {
        if ( ! is_admin() && is_search() ) {// do not apply the below code if this is the WordPress Administration Panel
            $query->is_search       = false;
            $query->query_vars[ s ] = false;
            $query->query[ s ]      = false;
            if ( $error == true ) {
                $query->is_404 = true;
            }
        }
    }

    add_action( 'parse_query', 'wpb_filter_query' );
    add_filter( 'get_search_form', create_function( '$a', "return null;" ) );
    add_action( 'widgets_init', 'remove_search_widget' );
    function remove_search_widget() {
        unregister_widget( 'WP_Widget_Search' );
    }

#endregion
}