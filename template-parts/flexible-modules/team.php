<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$subtitle= get_sub_field('subtitle');
$team = get_sub_field('team');
?>

<?php if (!empty($team)) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="team-section">
        <div class="grid-container">
            <h1 class="text-40px text-center text-600"><?php echo $title; ?></h1>

            <?php if (!empty($subtitle)) { ?>
            <p class="text-24px text-600 subtitle text-center"><?php echo $subtitle; ?></p>
            <?php } ?>

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
                        $memberDescription = get_field("description"); 
                        $memberLinkedin = get_field('linkedin');
                        $memberTwitter = get_field('twitter');
                        ?>

                        <div class="member" data-member-id="<?php echo $memberId; ?>">
                            <div class="member__thumbnail" style="position:relative;">
                                <span class="navy-hover">
                                    <span class="btn-white">Read Bio</span>
                                </span>
                                <?php echo $memberImage['url'] ? '<img width="263" height="263" class="circle" alt="' . $post->post_title . '" src="' . $memberImage['url'] . '"/>' : ''; ?>
                                
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
                                <div class="mfp-close">
                                <button class="close" tabindex="-1">×</button>
                                </div>
                                <div class="col col-left">
                                    <div class="member__thumbnail">
  
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

                                    <div class="member__sns">
                                    <?php if (!empty($memberLinkedin)) { ?>
                                        <a href="<?php echo $memberLinkedin; ?>" class="linkedin" target="_blank" rel="nofollow noindex noopener"></a>
                                    <?php } ?>
                                    <?php if (!empty($memberTwitter)) { ?>
                                        <a href="<?php echo $memberTwitter; ?>" class="twitter" target="_blank" rel="nofollow noindex noopener"></a>
                                    <?php } ?>
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
