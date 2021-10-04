<?php
/**
 * The template for displaying the header
 *
 */
?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
<head class="">
	<script src="https://www.googleoptimize.com/optimize.js?id=OPT-WCZG2QZ"></script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-539SHWG');</script>
    <!-- End Google Tag Manager -->

    <?php
        $meta = get_field('meta_script');
        if ($meta) {
            echo $meta;
        }
    ?>

    <meta name="ga_user_id__c" content="" id="ga-user-id" />
    <meta name="ga_user_each_id__c" content="" id="ga-user-each-id" />
    <meta name="ga_cookie_id__c" content="" id="ga-cookie-id" />
    <meta name="ga_em_id__c" content="" id="ga-em-id" />
    <meta name="ga_page" content="" id="ga-page-url" />
    <meta name="ga_date__c" content="" id="ga-date" />
    <meta name="ga_cookie_date__c" content="" id="ga-cookie-date" />
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="google-site-verification" content="DKsVwarxHj4jiJRsihUx3ciAd5Ts7JPQtPFzbPXHirs">
	<meta name="google-site-verification" content="l9IinNTespJHrcfBRWuz65qhVjuU46Cy7PVw1lBxfIk" />
    <meta name="facebook-domain-verification"content="yr5v61vyrug68ew5f80csgqi2f92oh" />
    
    <?php wp_head(); ?>
	
	<script async="async" src=//consent.trustarc.com/notice?domain=ujet.co&c=teconsent&js=nj&noticeType=bb crossorigin=""></script>
	

</head>
<?php
global $post;
$page_class = '';
if ( $post->post_name ) {
    $page_class = $post->post_name;
}
?>
<body <?php body_class( $page_class ); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-539SHWG"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->


<?php
//if ( IS_BLOG === null || IS_BLOG === true ) { // IF IT IS BLOG
//    include( __DIR__ . '/blog/header.php' );
//} else { ?>
    <?php 
    $staticLogo = get_field( 'static_logo', 'option' ); 
    $rowOne = get_field( 'number_of_columns'); 
    $rowTwo = ($rowOne == 'two_cols') ? "grid-row-2" : $rowOne;
    $rowThree = ($rowOne == 'three_cols') ? "grid-row-3" : $rowTwo;
    $rowFour = ($rowOne == 'four_cols') ? "grid-row-4" : $rowThree;

    ?>

    <?php
//} ?>

