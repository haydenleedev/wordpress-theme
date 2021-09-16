<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h2";
?>

<?php if (have_rows('team')) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="team-section">
        <div class="grid-container">
            <?php if (!empty($title)) { ?>
                <<?php echo $htag; ?>  class="text-40px text-center text-600"><?php echo $title; ?></<?php echo $htag; ?>>
            <?php } ?>

            <div class="team all-items">
                <?php
                while (have_rows('team')) {
                    the_row();
                        $memberImage = get_sub_field("image");
                        $memberName = get_sub_field("name");
                        $memberPosition = get_sub_field("position");
                        $alt = get_sub_field("alt_text");
                        ?>

                        <div class="member">
                            <div class="member__thumbnail">
                                <?php echo $memberImage['url'] ? '<img width="263" height="263" class="circle" alt="' . $alt . '" src="' . $memberImage['url'] . '"/>' : ''; ?>
                                
                            </div>
                            <div class="member__title text-600">
                                <?php echo $memberName; ?>
                            </div>
                            <div class="member__position">
                                <?php echo $memberPosition; ?>
                            </div>

                        </div>
                        <?php
                        wp_reset_postdata();
                   
                } ?>
            </div>
        </div>
    </section>
<?php } ?>
