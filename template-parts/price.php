<?php
$sectionId = get_sub_field('section_id');
$sectionClass = get_sub_field('section_class');
$title = get_field('title');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
$titleDescription = get_field('title_description');
?>


    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="product-group bg-f6f6f6 <?php echo $sectionClass; ?>">
            <div class="grid-container">

            <div class="smaller-grid-container text-center">
                <?php if (!empty($title)) { ?>
                    <<?php echo $htag; ?> class="title text-darknavy text-60px text-600 pt-30px"><?php echo $title; ?></<?php echo $htag; ?>>
                <?php } ?>
                <?php if (!empty($titleDescription)) { ?>
                    <p class="text-darknavy text-20px"><?php echo $titleDescription; ?></p>
                <?php } ?>
            </div>



            <div class="products clearfix pt-30px pb-50px">
                <?php 

                $headingGroup = array(
                    array(
                        "title" => "Basic",
                        "subTitle" => "$",
                        "featureTitle" => "Includes",
                        "featureLists" => array(
                                "PSTN Voice" => "Support for inbound calls over the PSTN as well as outbound calling via the agent dialpad or click-to-call within the CRM.",
                                "Standard Reports & Dashboards" => "Includes access to (13) pre-configured reports, dashboards, and monitoring pages with standard visualization and filtering tools.",
                                "Single Sign-On" => "The SSO feature allows customers to login using their corporate credentials managed by their internal identity management system using SAML 2.0",
                                "CRM Adapters" => "Native integration support for Salesforce, Zendesk, Oracle Service Cloud, Kustomer CRM, and Microsoft Dynamics",
                                "Web SDK" => "Provides in-web capabilities including:
                                Instant web calls, 
                                Scheduled calls, 
                                Queue deflection, 
                                Web chat widget, 
                                Proactive triggers, 
                                Direct Access Points",
                                "Standard Support" => "Standard Support includes:
                                Online Ticketing Desk
                                Knowledgebase
                                24x7 response for severity 1
                                Business hours for severity 2 and 3
                                Trust Site
                                99.95% Uptime SLA"
                        ),
                        "addOns" => array(
                            "Chat" => "Provides the ability for customers and agents to communicate through a web or mobile-based messaging experience originating from a company website or mobile app using the UJET mobile SDK",
                            "SMS (Includes SMS blending, Smart Actions, & two-way SMS channel)" => "The SMS channel enables two-way text communication between a consumer and agent. The SMS channel also enables SMS blending.",
                            "Conversational IVR" => "Speech-enabled IVR using natural language processing and conversational AI",
                            "Virtual Agent" => "Available for both web chat and voice, the Virtual Agent leverages conversational AI to engage with consumers and facilitate a self-service model",
                            "Secure Payments by Stripe" => "Provides customers with a secure PCI-compliant payment IVR via PSTN for making credit card payments via the Stripe payment gateway"
                            ),
                        ),
                    array(
                        "title" => "Pro",
                        "subTitle" => "$$",
                        "featureTitle" => "Includes Basic plus",
                        "featureLists" => array(
                                "SMS Blending" => "Provides the ability for Administrators and Agents to initiate SMS messages to consumers while in the Voice IVR",
                                "Smart Actions" => "For customers on a Smartphone, Smart Actions are actions initiated by the Agent to the customer to:
                                Request photos, 
                                Request videos, 
                                Request screenshots, 
                                Request text input, 
                                Request identity verification* (requires mobile SDK), 
                                Request payment",
                                "Mobile SDK" => "With support for both iOS and Android, the mobile SDK provides the ability to embed the end-to-end customer journey into a company’s mobile application",
                                "Advanced Reports & Dashboards" => "Includes all standard reports and dashboards plus an additional (9) pre-configured reports. Advanced Reporting allows for ad-hoc analysis, report scheduling, and the ability to create custom visualizations.",
                                "Reporting APIs" => "Access to the Reporting APIs enables all realtime and historical data to be pulled into a 3rd party data warehouse and/or business intelligence tool.",
                                "Premium Support" => "Premium Support includes:
                                Online Ticketing Desk, 
                                Knowledgebase, 
                                Trust Site, 
                                Phone support for severity 1 and 2 issues, 
                                Slack channel communication, 
                                Named Customer Success Manager, 
                                24x7 support, 
                                Improved response SLAs"
                            ),
                        "addOns" => array(
                            "Chat" => "Provides the ability for customers and agents to communicate through a web or mobile-based messaging experience originating from a company website or mobile app using the UJET mobile SDK",
                            "SMS" => "The SMS channel enables two-way text communication between a consumer and agent. The SMS channel also enables SMS blending.",
                            "Conversational IVR" => "Speech-enabled IVR using natural language processing and conversational AI",
                            "Virtual Agent" => "Available for both web chat and voice, the Virtual Agent leverages conversational AI to engage with consumers and facilitate a self-service model",
                            "Secure Payments by Stripe" => "Provides customers with a secure PCI-compliant payment IVR via PSTN for making credit card payments via the Stripe payment gateway"
                            ),
                        ),
                    array(
                        "title" => "Enterprise",
                        "subTitle" => "$$$",
                        "featureTitle" => "Includes Pro plus",
                        "featureLists" => array(
                                "All Core Channels*" => "The All Core Channels feature provides entitlement to certain future channel offerings as they become available. *Additional channels may be subject to additional terms and/or fees (to be reviewed prior to activation).",
                                "Secure Payments by Stripe" => "popout of list two",
                                "Optimization Support" => "popout of list three"
                            ),
                        "addOns" => array(
                            "Conversational IVR" => "Speech-enabled IVR using natural language processing and conversational AI",
                            "Virtual Agent" => "Available for both web chat and voice, the Virtual Agent leverages conversational AI to engage with consumers and facilitate a self-service model"
                            ),
                        ),
                    array(
                        "title" => "Digital",
                        "subTitle" => "$",
                        "featureTitle" => "Includes",
                        "featureLists" => array(
                                "Web + Mobile SDKs" => "",
                                "Web + Mobile Chat" => "",
                                "SMS" => "The SMS channel enables two-way text communication between a consumer and agent. The SMS channel also enables SMS blending.",
                                "In-app Voice" => "",
                                "Smart Actions" => "For customers on a Smartphone, Smart Actions are actions initiated by the Agent to the customer to:
                                Request photos, 
                                Request videos, 
                                Request screenshots, 
                                Request text input, 
                                Request identity verification* (requires mobile SDK), 
                                Request payment",
                                "Advanced Reports & Dashboards" => "Includes all standard reports and dashboards plus an additional (9) pre-configured reports. Advanced Reporting allows for ad-hoc analysis, report scheduling, and the ability to create custom visualizations.",
                                "Reporting APIs" => "Access to the Reporting APIs enables all realtime and historical data to be pulled into a 3rd party data warehouse and/or business intelligence tool.",
                                "Premium Support" => "Premium Support includes:
                                Online Ticketing Desk, 
                                Knowledgebase, 
                                Trust Site, 
                                Phone support for severity 1 and 2 issues, 
                                Slack channel communication, 
                                Named Customer Success Manager, 
                                24x7 support, 
                                Improved response SLAs"
                            ),
                        "addOns" => array(
                            "PSTN Calling (Includes SMS blending)" => "",
                            "Virtual Agent" => "Available for both web chat and voice, the Virtual Agent leverages conversational AI to engage with consumers and facilitate a self-service model"
                            ),
                        ),
                );

               // $keys = array_keys($headingGroup);
               $last = count($headingGroup) - 1;

                    foreach ($headingGroup as $i => $row) {
                        $isFirst = ($i == 0);
                        $isLast = ($i == $last);
                        $stateIdLower = strtolower($row['title']);
                        $stateID = preg_replace('#[ -]+#', '-', $stateIdLower);
                        $buyNowUrl = "./buy-now-" . strtolower($row['title']) . "/";
                        $featureId = "feature-" . strtolower($row['title']);
                        $addonId = "addons-" . strtolower($row['title']);
                        ?>

                        
                        <div class="product-wrap">
                        <?php if (strtolower($row['title']) == "enterprise") { ?>
                        <span class="flag-popular">Most popular</span>
                        <?php } ?>
                        <div class="product-innerwrap p-20px">
                                <div class="heading text-center">
                                    <h2 class="product-title text-darknavy"><?php echo $row['title']; ?></h2>
                                    <p class="product-subtitle text-darknavy text-26px text-600 pb-20px"><?php echo $row['subTitle']; ?></p>
                                </div>
                                <div class="btn-darkblue text-center bg-white pb-25px">
                                    <a href="<?php echo $buyNowUrl; ?>" class="block">Buy Now</a>
                                </div>

                                <div class="accordion">

                                <input class="accordion-state" type="checkbox" id="accordion-state-<?php echo $stateID; ?>">
                                <div class="product">
                                <label class="product-label" for="accordion-state-<?php echo $stateID; ?>">
                                    <h2 class="feature-title">View features</h2>
                                </label>
                                <a href="#accordion-state-<?php echo $stateID; ?>" class="product-anchor product-anchor-open">
                                    <span class="product-anchor-label">Open Menu</span>
                                </a>
                                <a href="#" class="product-anchor product-anchor-close">
                                    <span class="product-anchor-label">Close Menu</span>
                                </a>

                                    <div class="feature-wrap accordion-body">
                                        <div class="feature pb-20px" id="<?php echo $featureId; ?>">
                                            <p class="feature-header text-darknavy"><?php echo $row['featureTitle']; ?></p>
                                            <ul class="feature-list pl-25px">
                                                <?php foreach ($row['featureLists'] as $key => $tooltip) {
                                                    ?>
                                                    <li>
                                                    <span class="check">&nbsp;</span><span><?php echo $key ;?></span>
                                                    <?php if (!empty($tooltip)) { ?>
                                                        <span class="tooltip-wrap">
                                                            <span class="tooltip">
                                                                    <?php echo $tooltip ;?>
                                                            </span>
                                                        </span>
                                                    <?php } ?>

                                                    </li>
                                                <?php } ?>
                                            </ul>

                                            <?php if ((strtolower($row['title']) == "enterprise")) { ?>
                                            <span class="text-italic text-gray text-12px block mt-10px mb-20px"><em>*”All Core Channels” includes Voice (PSTN and in-app), SMS, & Chat (web and in-app).  As a part of the ‘All Core Channels’ feature, Customer may be entitled to certain future channel offerings as they become available, however they may be subject to additional terms, usage, and / or license fees.</em></span>
                                            <?php } ?>


                                        </div>
                                        <div class="add-ons" id="<?php echo $addonId; ?>">
                                            <p class="feature-header text-darknavy">Add-Ons</p>
                                            <ul class="feature-list pl-25px">
                                                <?php foreach ($row['addOns'] as $key => $tooltip) {
                                                        ?>
                                                        <li>
                                                        <span class="check">&nbsp;</span><?php echo $key ;?>

                                                        <?php if (!empty($tooltip)) { ?>
                                                            <span class="tooltip-wrap">
                                                                <span class="tooltip">
                                                                    <?php echo $tooltip ;?>
                                                                </span>
                                                            </span>
                                                            <?php } ?>
                                                            
                                                        </li>
                                                <?php } ?>
                                            </ul>
                                        </div> <!-- .add-ons -->

                                    </div> <!-- .feature-wrap.accordion-body -->
                            </div> <!-- .accordion -->
                           </div> <!-- .product.p-20px -->
                          </div><!-- .product-innerwrap -->
                        </div> <!-- .product-wrap -->

                <?php 
                        } // foreach
                ?>
            </div>

            </div>
    </section>

    <script>
        $(document).ready(function() {
            function sameHeight() {
                var $includeHeight = Math.max($("#feature-basic").height(), $("#feature-pro").height(), $("#feature-enterprise").height(), $("#feature-digital").height());
                $(".feature").height($includeHeight);

                var $addOnHeight = Math.max($("#addons-basic").height(), $("#addons-pro").height(), $("#addons-enterprise").height(), $("#addons-digital").height());
                $(".add-ons").height($addOnHeight);
            }
            if ($(window).width() > 800) {
                sameHeight();
            }

            $(window).resize(function() {
                if ($(window).width() > 800) {
                    sameHeight();
                } else {
                    $(".feature").css("height", "auto");
                    $(".add-ons").css("height", "auto");
                }
            });
    });
    </script>
