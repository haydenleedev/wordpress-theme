<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$button = get_sub_field('button');
?>

<?php if ($title != '' && have_rows('columns')) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?>
            class="two-column-size-one-column-content">
        <div class="grid-container">
            <h1 class="section-title"><?php echo $title; ?></h1>
            <div class="all-items grid-masonry2">
                <?php while (have_rows('columns')) {
                    the_row();
                    $columnTitle = get_sub_field('title');
                    $columnText = get_sub_field('text');
                    $columnImage = get_sub_field('image');
                    $altText = get_sub_field('alt_text');?>
                    <div class="grid-item">
                        <div class="item">
                            <img alt="<?php echo $altText ?>" src="<?php echo $columnImage['url']; ?>">
                            <h3 class="item__title"><?php echo $columnTitle ?></h3>
                            <div class="item__text"><?php echo $columnText; ?></div>
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