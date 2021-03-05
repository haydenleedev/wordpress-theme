<?php
$sectionId = get_sub_field('section_id');
$sectionClass = get_sub_field('section_class');
$title = get_sub_field('title');
$button = get_sub_field('button');
$background = get_sub_field('background_image');
?>

<?php if (have_rows('columns')) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="image-text-rows-full <?php echo $sectionClass; ?>">
        <div class="with-background" <?php echo ($background) ? "style='background-image: url(" . $background['url'] . ")'" : ""; ?>>

            <?php if ($title != '') { ?>
                    <div class="grid-container">
                        <h2 class="section-title"><?php echo $title; ?></h2>
                    </div>
            <?php } ?>

            <div class="all-items">
                <?php while (have_rows('columns')) {
                    the_row();
                    $rowId = get_sub_field('row_id');
                    $columnSubtitle = get_sub_field('subtitle');
                    $columnSecondSubtitle = get_sub_field('second_subtitle');
                    $columnSide = get_sub_field('image_side');
                    $columnSeparator = get_sub_field('has_separator');
                    $columnText = get_sub_field('text');
                    $columnSecondText = get_sub_field('second_text');
                    $columnImage = get_sub_field('image');
                    $altText = get_sub_field('alt_text'); ?>
                    <div<?php echo ($rowId != '') ? ' id="' . $rowId . '"' : ''; ?>  class="row <?php echo ($columnSide) ? 'image-on-right' : 'image-on-left'; ?>">
                        <?php if ($columnSeparator) { ?>
                            <div class="separator-up"></div>
                        <?php } ?>
                        <div class="wrapper">
                            <div class="round-image">
                                <img alt="<?php echo $altText ?>" src="<?php echo $columnImage['url']; ?>">
                            </div>
                            <div class="description">
                                <?php if (!empty($columnSubtitle)) { ?>
                                    <h3 class="description__title"><?php echo $columnSubtitle ?></h3>
                                <?php } ?>

                                <div class="description__text"><?php echo $columnText; ?></div>

                                <?php if (!empty($columnSecondSubtitle)) { ?>
                                    <h3 class="description__title"><?php echo $columnSecondSubtitle ?></h3>
                                <?php } ?>

                                <div class="description__text"><?php echo $columnSecondText; ?></div>
                            </div>
                        </div>
                        <?php if ($columnSeparator) { ?>
                            <div class="separator-down"></div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section>
<?php } ?>