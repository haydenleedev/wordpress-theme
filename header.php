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
    <?php if ( get_field( 'check' ) ) { ?>
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,700&amp;subset=japanese" rel="stylesheet">
    <?php } ?>
    <?php if ( IS_BLOG === null || IS_BLOG === true ) { // IF IT IS BLOG
        include( __DIR__ . '/blog/head.php' );
    } ?>
    <?php wp_head(); ?>

	<!--
    <script async="async"
            src="//consent.truste.com/notice?domain=ujet.co&c=teconsent&js=bb&noticeType=bb&gtm=1"></script>
-->
	
	<script async="async" src=//consent.trustarc.com/notice?domain=ujet.co&c=teconsent&js=nj&noticeType=bb crossorigin=""></script>
	
	
    <script>
        //This is your domain, as in, how you who are calling the API wish to be identified.
        var MY_DOMAIN = "ujet";
        var REQUIRE_USER_EXPRESSED_PERMISSION = true;
        var _STATE = {};

        /**
         * Different pages add the Consent Manager in different locations, so all callers of the API must wait till
         * the API is loaded. The API is loaded in two stages:
         *      1) The first stage is where the "PrivacyManagerAPI" object exists on the page and where default and
         *         page/domain specific settings can be obtained. If your requirements demand user consent, you must wait
         *         for the second stage load, but it is always recommended to wait for the second stage no matter what.
         *         The "loading" parameter will be added to all API responses when the API is in this state.
         *      2) The second stage loads the user preferences and the domain specific information. If you made a
         *         postMessage API call during the first stage, then the API will automatically send you another, updated,
         *         response if the result has changed.
         */
        function runOnce() {
            //CHECK: for API exists on the page
            if (!_STATE.hasRunOnce && window.PrivacyManagerAPI) {
                // console.log("doing run once");

                //Register with the API for automatic updates of user preferences (for the settings you care about)
                //--OR-- if the API is loading, then this will send an update when the API is done and has loaded the user preferences.
                window.addEventListener("message", function (e) {
                    try {
                        var json = JSON.parse(e.data);
                        json.PrivacyManagerAPI && handleAPIResponse(json.PrivacyManagerAPI);
                    } catch (e) {
                        e.name != 'SyntaxError' && console.log(e);
                    }
                }, false);
                var apiObject = {
                    PrivacyManagerAPI: {
                        self: MY_DOMAIN,
                        action: "getConsent",
                        timestamp: new Date().getTime(),
                        type: "functional"
                    }
                };
                window.top.postMessage(JSON.stringify(apiObject), "*");
                apiObject = {
                    PrivacyManagerAPI: {
                        self: MY_DOMAIN,
                        action: "getConsent",
                        timestamp: new Date().getTime(),
                        type: "advertising"
                    }
                };
                window.top.postMessage(JSON.stringify(apiObject), "*");

                _STATE.hasRunOnce = true;
                _STATE.i && clearInterval(_STATE.i);
            }
        }

        /**
         * This function returns value of notice_behavior cookie to determine location and behavior manager based on domain.
         * When no notice_behavior cookie exists, this returns a blank string.
         */
        function getBehavior() {
            var result = "";
            var rx = new RegExp("\\s*notice_behavior\\s*=\\s*([^;]*)").exec(document.cookie);
            if (rx && rx.length > 1) {
                result = rx[1];
            }
            return result;
        }

        /**
         * This function is called whenever a user preference is initially set, is retrieved for the first time on this page, or is updated.
         * This is the gateway function which should be customized by each client (you) to determine when and how to handle the API response.
         *
         * The second half of the function determines settings from the CM API, and decides which elements on the page should be "activated" based upon those settings.
         * Elements can only be activated once. Elements can not be deactivated, once activated.
         */
        function handleAPIResponse(response) {
            //CHECK: make sure this response is to YOU. You will actually get the messages to all API callers on this page, not just to you.
            if (!response.source || response.self != MY_DOMAIN) return;
            // console.log("user decision",response););
            if (typeof response.type == 'undefined') {
                location.reload();
            }
            //Required trackers/cookies are always allowed, no need to ask permission.
            if (!_STATE.hasLoadedRequired) {
                activateElement(document.querySelectorAll(".trustecm[trackertype=required]"));
                _STATE.hasLoadedRequired = true;
            }

            // Check if behavior manager is EU
            var isEU = /.*(,|)eu/i.test(getBehavior());

            //Case where we don't want to do anything till the user has made a preference.
            if (isEU && REQUIRE_USER_EXPRESSED_PERMISSION && response.source != "asserted") return;

            //Step 1) Get Consent Manager settings (user prefs)
            //        These API calls are DIFFERENT than the original API call ("response" parameter) so they must be called separately.
            //Step 2) Apply the settings after checking if approved
            var setting = null;
            if (!_STATE.hasLoadedAdvertising) {
                setting = PrivacyManagerAPI.callApi("getConsent", MY_DOMAIN, null, null, "advertising");
                if (setting.consent == "approved") {
                    activateElement(document.querySelectorAll(".trustecm[trackertype=advertising]"));
                    _STATE.hasLoadedAdvertising = true;
                }
                // console.log(setting);
            }
            if (!_STATE.hasLoadedFunctional) {
                setting = PrivacyManagerAPI.callApi("getConsent", MY_DOMAIN, null, null, "functional");
                if (setting.consent == "approved") {
                    activateElement(document.querySelectorAll(".trustecm[trackertype=functional]"));
                    _STATE.hasLoadedFunctional = true;
                }
                // console.log(setting);
            }

            // No additional checking, this always fires, but only after a user has consented
            if (!_STATE.hasLoadedAnyConsent) {
                activateElement(document.querySelectorAll(".trustecm[trackertype=any]"));
                _STATE.hasLoadedAnyConsent = true;
            }

            //check of vendor domain and fires if that domain is approved, which is based on how that domain was categorized on the backend
            var vendors = document.querySelectorAll(".trustecm[trackertype=vendor]");
            for (var i = 0; i < vendors.length; i++) {
                var currentVendor = vendors[i];
                var vDomain = currentVendor.getAttribute("vsrc");
                if (vDomain && !_STATE['hasLoaded' + vDomain]) {
                    setting = PrivacyManagerAPI.callApi("getConsent", MY_DOMAIN, vDomain);
                    if (setting.consent == "approved") {
                        activateElement(document.querySelectorAll(".trustecm[trackertype=vendor][vsrc='" + vDomain + "']"));
                        _STATE['hasLoaded' + vDomain] = true;
                    }
                    // console.log(setting);
                }
            }
        }

        /**
         * Activates (runs, loads, or displays) an element based upon element node name.
         * @param {Array.<HTMLElement>} list
         */
        function activateElement(list) {
            if (!(list instanceof Array || list instanceof NodeList)) throw "Illegal argument - must be an array";
            // console.log("activating", list);
            for (var item, i = list.length; i-- > 0;) {
                item = list[i];
                item.class = "trustecm_done";
                switch (item.nodeName.toLowerCase()) {
                    case "script":
                        var z = item.getAttribute("thesrc");
                        if (z) {
                            var y = document.createElement("script");
                            y.src = z;
                            y.async = item.async;
                            item.parentNode.insertBefore(y, item);
                        } else eval(item.text || item.textContent || item.innerText);
                }
            }
        }

        _STATE.i = setInterval(runOnce, 10);
    </script>

    <!--   IF IT IS from news or press-release-->
    <?php if ( has_term( 'press-release', 'category', null ) == 1 || has_term( 'news', 'category', null ) == 1 ): ?>
        <script class="trustecm" trackertype="functional" type="text/plain"
                src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a3833fb7c75acea"></script>
        <!--      must be moved in separate file -->
        <script>var handleScroll = function () {
                const scrollTop = $(window).scrollTop();
                if ($(window).scrollTop() <= $('.press-header').height() && $(window).width() > 768) {

                    $(' .press-header').css({
                        transform: `scale(${scrollTop / 2e3 + 1}) translateY(${scrollTop / 3 * -1}px)`,
                        opacity: 1 - scrollTop / 400
                    });
                    $(' .press-header-title').css({
                        transform: `translateY(${scrollTop / 3 * -1}px)`,
                        opacity: 1 - scrollTop / 400,
                    })
                }
            }
            window.onscroll = function () {
                handleScroll()
            };
        </script>
    <?php endif; ?>

</head>
<?php
global $post;
$page_class = '';
if ( $post->post_name ) {
    $page_class = $post->post_name;
}
?>
<body <?php $blog_class = ( IS_BLOG === null || IS_BLOG === true ) ? 'ujet-blog' : $page_class;
body_class( $blog_class ); ?>>

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
    <header class="header" data-inviewport="color-in">
        <div class="header__container">
            <div class="site-branding">
                <a href="<?php echo bloginfo( 'url' ); ?>">
                    <img class="header__logo" alt="ujet logo"
                         src="<?php echo $staticLogo ?: get_stylesheet_directory_uri() . '/dist/images/ujet-logo.svg'; ?>" width="130" height="41">
                </a>
            </div>
            <span class="menu_hamburger"></span>
            <nav role="presentation" aria-label="Main Navigation" class="header__menu" id="primary-nav">
                <?php 
                wp_nav_menu( array(
                    'theme_location' => 'top-bar-r',
                    'menu_class'     => 'top-menu',
                    'container'      => '',
                    'before'         => '',
                    //'walker' => new My_Walker_Nav_Menu(),
                ) );

                /*
                class My_Walker_Nav_Menu extends Walker_Nav_Menu {
                    function start_lvl(&$output, $depth){ 
                    $indent = str_repeat("\t", $depth);
                    $rowOne = get_field( 'number_of_columns'); 
                    $rowTwo = ($rowOne == 'two_cols') ? "grid-row-2" : $rowOne;
                    $rowThree = ($rowOne == 'three_cols') ? "grid-row-3" : $rowTwo;
                    $rowFour = ($rowOne == 'four_cols') ? "grid-row-4" : $rowThree;
                    $output .= "\n$indent<ul class=\"sub-menu $rowFour \">\n";                    
                      }}
                      */
                ?>
                </nav>
            </div>
        </div>
    </header>

    <?php
//} ?>

