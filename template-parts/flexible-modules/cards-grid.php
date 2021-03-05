<?php
$sectionId = get_sub_field('section_id');
$sectionClass = get_sub_field('section_class');
$title = get_sub_field('title');
$background = get_sub_field('background_image');
?>

<?php if (have_rows('cards')) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="cards-grid <?php echo $sectionClass; ?>">
        <div class="with-background" <?php echo ($background) ? "style='background-image: url(" . $background['url'] . ")'" : ""; ?>>
            <div class="grid-container">
                <h1 class="title"><?php echo $title; ?></h1>

                <div class="all-items cards">
                    <?php while (have_rows('cards')) {
                        the_row();
                        $cardTitle = get_sub_field('title');
                        $cardText = get_sub_field('text');
                        $cardImage = get_sub_field('image');
                        $altText = get_sub_field('alt_text');
                        $cardButton = get_sub_field('button'); ?>

                        <div class="card">
                            <img alt="<?php echo $altText ?>" src="<?php echo $cardImage['url']; ?>">
                            <div class="card-body">
                                <h3 class="card__title"><?php echo $cardTitle ?></h3>
                                <div class="card__text"><?php echo $cardText; ?></div>
                                <?php if (!empty($cardButton)) { ?>
                                    <a class="btn" href="<?php echo $cardButton['url']; ?>"
                                       target="<?php echo $cardButton['target']; ?>"><?php echo $cardButton['title']; ?>
                                        <i></i>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>