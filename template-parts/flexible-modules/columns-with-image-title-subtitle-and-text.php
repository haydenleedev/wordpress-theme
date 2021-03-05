<?php
$sectionId = get_sub_field('section_id');
$title     = get_sub_field('title');
?>

<?php if (have_rows('columns')) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="image-title-subtitle-text">
        <div class="grid-container">
            <h1 class="section-title"><?php echo $title; ?></h1>

            <div class="all-items">
                <?php while (have_rows('columns')) {
                    the_row();
                    $columnTitle    = get_sub_field('title');
                    $columnSubtitle = get_sub_field('subtitle');
                    $columnText     = get_sub_field('text');
                    $columnImage    = get_sub_field('image'); ?>
                    <div class="item">
                        <div class="round-image">
                            <img src="<?php echo $columnImage['url']; ?>">
                        </div>
                        <div class="description">
                            <h3 class="description__title"><?php echo $columnTitle; ?></h3>

                            <?php if ($columnSubtitle) { ?>
                                <div class="description__subtitle"><?php echo $columnSubtitle; ?></div>
                            <?php }
                            else { ?>
                                <div class="separator"></div>
                            <?php } ?>

                            <div class="description__text"><?php echo $columnText; ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <?php if (!empty($button)) { ?>
                <div class="btn-wrapper">
                    <a class="btn btn-bright-blue btn-radius" href="<?php echo $button['url']; ?>"
                       target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                </div>
            <?php } ?>

        </div>
    </section>
<?php } ?>