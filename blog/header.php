<?php
global $external_header_footer, $link, $get_header;
if ( $external_header_footer ) {
    $nodes = get_tags_contents( $link, $get_header );
    if ( $nodes ) {
        if ( $nodes['error'] ) {
            //echo $nodes['error']; // uncomment this line to see the error
        } else {
            foreach ( $nodes['nodes'] as $node ) {
                echo( $node );
            }
        }
    }
} else { ?>
    <div class="header-container-wrapper">
        <div class="header-container container-fluid">
            <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
                <div class="row-fluid ">
                    <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
                        <div class="row-fluid-wrapper row-depth-1 row-number-2 ">
                            <div class="row-fluid ">
                                <div class="span12 widget-span widget-type-custom_widget " style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                    <div id="hs_cos_wrapper_module_154843418462157" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget"
                                         data-hs-cos-type="module">
                                        <div class="navbar_section navbar_desktop" id="home-button">
                                            <div class="container" style="padding: 0;">
                                                <nav class="navbar">
                                                    <div class="navbar-header">
                                                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"><span
                                                                    class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                                                                    class="icon-bar"></span></button>
                                                        <a class="navbar-brand" href="https://ujet.co/"><img id="logoimg" src="<?php bloginfo( 'url' ); ?>/files/logo-white.png"></a>
                                                    </div>
                                                    <div class="collapse navbar-collapse js-navbar-collapse">
                                                        <ul class="nav navbar-nav navbar-right">
                                                            <li class="dropdown mega-dropdown"><a href="https://ujet.co/products/" class="dropdown-toggle" data-toggle="dropdown">PRODUCTS</a>
                                                                <ul class="dropdown-menu mega-dropdown-menu">
                                                                    <li class="col-sm-5">
                                                                        <ul style="display: none;">
                                                                            <li class="dropdown-header">Overview</li>
                                                                            <li><a href="#">Voice</a></li>
                                                                            <li><a href="#">Chat</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-sm-1" style="border-left: 1px solid; margin-left: -60px;">
                                                                        <ul>
                                                                            <li class="dropdown-header dropdown-header-12" style="margin-bottom: 8px;"><a href="https://ujet.co/products/overview/">Overview</a>
                                                                            </li>
                                                                            <li><a href="https://ujet.co/products/voice/">Voice</a></li>
                                                                            <li><a href="https://ujet.co/products/chat/">Chat</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-sm-1" style="border-left: 1px solid;">
                                                                        <ul>
                                                                            <li class="dropdown-header dropdown-header-12"
                                                                                style="font-size: 10px; color: #07cde8; letter-spacing: 0.07em; font-weight: 400;">INTEGRATIONS
                                                                            </li>
                                                                            <li><a href="https://ujet.co/integrations/">Overview</a></li>
                                                                            <li><a href="https://ujet.co/integrations/">Salesforce</a></li>
                                                                            <li><a href="https://ujet.co/integrations/">Kustomer</a></li>
                                                                            <li><a href="https://ujet.co/integrations/">Zendesk</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-sm-5">
                                                                        <ul style="display: none;">
                                                                            <li class="dropdown-header">Overview</li>
                                                                            <li><a href="#">Voice</a></li>
                                                                            <li><a href="#">Chat</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="dropdown mega-dropdown"><a href="https://ujet.co/customerstories/" class="dropdown-toggle" data-toggle="dropdown">RESOURCES</a>
                                                                <ul class="dropdown-menu mega-dropdown-menu">
                                                                    <li class="col-sm-5">
                                                                        <ul style="display: none;">
                                                                            <li class="dropdown-header">Overview</li>
                                                                            <li><a href="#">Voice</a></li>
                                                                            <li><a href="#">Chat</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-sm-1" style="margin-left:-75px;">
                                                                        <ul>
                                                                            <li class="dropdown-header"><a href="https://ujet.co/library/">Library</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-sm-1">
                                                                        <ul>
                                                                            <li class="dropdown-header"><a href="<?php bloginfo( 'url' ); ?>">Blog</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-sm-1">
                                                                        <ul>
                                                                            <li class="dropdown-header"><a href="https://ujet.co/events/">Events</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-sm-4">
                                                                        <ul style="display: none;">
                                                                            <li class="dropdown-header">Overview</li>
                                                                            <li><a href="#">Voice</a></li>
                                                                            <li><a href="#">Chat</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="dropdown mega-dropdown"><a href="https://ujet.co/about-us/" class="dropdown-toggle" data-toggle="dropdown">COMPANY</a>
                                                                <ul class="dropdown-menu mega-dropdown-menu">
                                                                    <li class="col-sm-5">
                                                                        <ul style="display: none;">
                                                                            <li class="dropdown-header">Overview</li>
                                                                            <li><a href="#">Voice</a></li>
                                                                            <li><a href="#">Chat</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-sm-1" style="margin-left:-75px;">
                                                                        <ul>
                                                                            <li class="dropdown-header"><a href="https://ujet.co/about-us/">Abouts Us</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-sm-1">
                                                                        <ul>
                                                                            <li class="dropdown-header"><a href="https://ujet.co/newsroom/">Newsroom</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-sm-1">
                                                                        <ul>
                                                                            <li class="dropdown-header"><a href="https://ujet.co/careers/">Careers</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="col-sm-4">
                                                                        <ul style="display: none;">
                                                                            <li class="dropdown-header">Overview</li>
                                                                            <li><a href="#">Voice</a></li>
                                                                            <li><a href="#">Chat</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="p_contact-sales"><a href="https://ujet.co/contact-sales" class="contact-sales">CONTACT SALES</a></li>
                                                            <li class="p_1-855-242-UJET"><a href="<?php bloginfo( 'url' ); ?>" class="c_1-855-242-UJET">1-855-242-UJET</a></li>
                                                        </ul>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                        <header style="display: none;">
                                            <nav id="cssmenu">
                                                <div class="logo">
                                                    <a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo( 'url' ); ?>/files/logo-blue.png"> </a>
                                                </div>
                                                <div id="head-mobile">
                                                    &nbsp;
                                                </div>
                                                <div class="button">
                                                    &nbsp;
                                                </div>
                                                <ul>
                                                    <li><a href="#">Products</a>
                                                        <ul>
                                                            <li><a href="https://ujet.co/products/overview/">Overview</a></li>
                                                            <li><a href="https://ujet.co/products/voice/">Voice</a></li>
                                                            <li><a href="https://ujet.co/products/chat/">Chat</a></li>
                                                            <li><a href="#" style="font-size: 10px; color: #07cde8; letter-spacing: 0.07em; font-weight: 700;">INTEGRATIONS</a></li>
                                                            <li><a href="https://ujet.co/integrations/">Overview</a></li>
                                                            <li><a href="https://ujet.co/integrations/">Salesforce</a></li>
                                                            <li><a href="https://ujet.co/integrations/">Kustomer</a></li>
                                                            <li><a href="https://ujet.co/integrations/">Zendesk</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="https://ujet.co/resources/">Resources</a>
                                                        <ul>
                                                            <li><a href="https://ujet.co/library/">Library</a></li>
                                                            <li><a href="<?php bloginfo( 'url' ); ?>">Blog</a></li>
                                                            <li><a href="https://ujet.co/events/">Events</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="https://ujet.co/about-us/">Company</a>
                                                        <ul>
                                                            <li><a href="https://ujet.co/about-us/">About Us</a></li>
                                                            <li><a href="https://ujet.co/newsroom/">Newsroom</a></li>
                                                            <li><a href="https://ujet.co/careers/">Career</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="https://ujet.co/contact-sales" style="color:#109FFF;">Contact Sales</a></li>
                                                    <li><a href="<?php bloginfo( 'url' ); ?>" style="line-height: 28px; color: #109FFF; padding: 22px 0;">Call Sales Now<span
                                                                    style="font-size: 16px !important;color: #7F7F7F !important; line-height:26px;"> 1-855-242-UJET</span></a></li>
                                                </ul>
                                            </nav>
                                        </header>
                                    </div>
                                </div>
                                <!--end widget-span -->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end row-wrapper -->
                    </div>
                    <!--end widget-span -->
                </div>
                <!--end row-->
            </div>
            <!--end row-wrapper -->
        </div>
        <!--end header -->
    </div>
    <!--end header wrapper -->
<?php } ?>