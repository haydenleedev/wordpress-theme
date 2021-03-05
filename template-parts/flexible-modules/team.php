<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$team = get_sub_field('team');
?>

<?php if (!empty($team)) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="team-section">
        <div class="grid-container">
            <h1 class="section-title"><?php echo $title; ?></h1>

            <div class="team all-items">
                <?php
                while (have_rows('team')) {
                    the_row();
                    $member = get_sub_field('member');

                    if ($member) {
                        $post = $member;
                        setup_postdata($post);
                        $memberId = $post->ID;
                        $memberImage = get_field("image");
                        $memberPosition = get_field("position");
                        $memberDescription = get_field("description"); ?>

                        <div class="member" data-member-id="<?php echo $memberId; ?>">
                            <div class="member__thumbnail" style="position:relative;">
                                <?php echo $memberImage['url'] ? '<img alt="' . $post->post_title . '" src="' . $memberImage['url'] . '"/>' : ''; ?>
                                <img alt="circle background" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/circle-transition-bg.svg"
                                     style="width: 263px;    position: absolute;    top: -16px;    left: 12px;    z-index: -1;">
                            </div>
                            <div class="member__title">
                                <a href="#" class="member__popup--trigger"
                                   data-member-id="<?php echo $memberId; ?>"><?php echo $post->post_title; ?></a>
                            </div>
                            <div class="member__position">
                                <?php echo $memberPosition; ?>
                            </div>

                        </div>
                        <div class="member__popup white-popup mfp-hide" data-member-id="<?php echo $memberId; ?>">
                            <div class="member__popup--content">
                                <div class="mfp-close"><img alt="close button"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/close-x.svg">
                                </div>
                                <div class="col col-left">
                                    <div class="member__thumbnail">
                                        <img alt="circle background" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/circle-transition-bg.svg"
                                             style="    width: 230px;
    position: absolute;
    top: -12px;
    left: 10px;">
                                        <?php echo $memberImage['url'] ? '<img alt="' . $post->post_title . '" src="' . $memberImage['url'] . '"/>' : ''; ?>
                                    </div>
                                </div>
                                <div class="col col-right">
                                    <div class="member__title">
                                        <?php echo $post->post_title; ?>
                                    </div>
                                    <div class="member__position">
                                        <?php echo $memberPosition; ?>
                                    </div>
                                    <div class="member__description">
                                        <?php echo $memberDescription; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        wp_reset_postdata();
                    }
                } ?>
            </div>
        </div>
    </section>
<?php } ?>
