<?php
$sectionId = get_sub_field('section_id');
?>

<?php if (have_rows('repeater')) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="paragraph-select">
        <?php if (have_rows('repeater')) { ?>
            <div class="repeater">
                <ul class="icons">
                    <?php
                    $count = 0;
                    while (have_rows('repeater')) {
                        the_row();
                        $image = get_sub_field('image');
                        $altText = get_sub_field('alt_text'); ?>

                        <li class="icon" id="<?php echo $count; ?>">
                            <img alt="<?php echo $altText; ?>" src="<?php echo $image['url']; ?>">
                        </li>
                        <?php $count++; ?>
                    <?php } ?>
                </ul>

                <div class="paragraph">
                    <?php
                    $count2 = 0;
                    while (have_rows('repeater')) {
                        the_row();
                        $title = get_sub_field('title');
                        $text = get_sub_field('text'); ?>

                        <div class="blocks " related="<?php echo $count2; ?>">
                            <div class="paragraph__block">
                                <h2 class="title"><?php echo $title; ?></h2>
                                <div class="text"><?php echo $text; ?></div>
                            </div>
                        </div>
                        <?php $count2++; ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </section>
<?php } ?>