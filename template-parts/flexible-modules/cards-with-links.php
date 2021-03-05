<?php
$sectionId   = get_sub_field('section_id');
$title       = get_sub_field('title');
?>

<?php if ($title != '' && have_rows('columns')) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="cards-with-links">
        <div class="grid-container">
            <h1 class="section-title"><?php echo $title; ?></h1>
            <div class="all-items row">
                <?php while (have_rows('columns')) { the_row();
                    $columnTitle  = get_sub_field('title');
                    $columnText   = get_sub_field('text');
                    $columnImage  = get_sub_field('image');
                    $columnButton = get_sub_field('link'); ?>
                    <div class="grid-item">
                        <div class="item">
                            <img src="<?php echo $columnImage['url']; ?>">
                            <h3 class="item__title"><?php echo $columnTitle ?></h3>
                            <h3 class="item__text"><?php echo $columnText ?></h3>
                            <div class="item__link">
                                <a href="<?php echo $columnButton['url']; ?>" target="<?php echo $columnButton['target']; ?>"><?php echo $columnButton['title']; ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>