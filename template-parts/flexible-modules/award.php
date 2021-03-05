<?php
$sectionId = get_sub_field( 'section_id' );
$title     = get_sub_field( 'title' );
$awards    = get_sub_field( 'awards' );
?>

<?php if (!empty($awards)) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="awards-section">
        <div class="grid-container">
            <h1 class="section-title"><?php echo $title; ?></h1>

            <div class="awards all-items">
                <?php
                while (have_rows( 'awards' )) {
                    the_row();
                    $award = get_sub_field('award');

                    if ($award) {
                        $post = $award;
                        setup_postdata($post);
                        $awardId       = $post->ID;
                        $awardImage    = get_field("image");
                        $altText = get_field('alt_text');
                        $awardTitle    = get_field("award_title");
                        $awardDate     = get_field("award_date");
                        $awardLink     = get_field("award_link"); ?>

                        <div class="award">
                            <div class="col col-left">
                                <div class="award__thumbnail">
                                    <?php echo $awardImage['url'] ? '<img alt="' . $altText . '" src="' . $awardImage['url'] . '"/>' : ''; ?>
                                </div>
                            </div>
                            <div class="col col-right">
                                <div class="award__title">
                                    <?php echo $awardTitle; ?>
                                </div>
                                <div class="award__date">
                                    <?php echo $awardDate; ?>
                                </div>
                                <div class="award__link">
                                    <?php if ($awardLink['url'] != "") { ?>
                                        <a href="<?php echo $awardLink['url']; ?>" target="<?php echo $awardLink['target']; ?>"><?php echo $awardLink['title']; ?></a>
                                    <?php }?>
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
