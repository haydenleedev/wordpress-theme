<?php
$sectionId = get_sub_field('section_id');
$sectionClass = get_sub_field('section_class');
$title = get_sub_field('title');
$background = get_sub_field('background_image');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
?>

<?php if (have_rows('cards')) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="cards-grid <?php echo $sectionClass; ?>">
        <div class="with-background" <?php echo ($background) ? "style='background-image: url(" . $background['url'] . ")'" : ""; ?>>
            <div class="grid-container">

            <?php if (!empty($title)) { ?>
                <<?php echo $htag; ?> class="title"><?php echo $title; ?></<?php echo $htag; ?>>
            <?php } ?>

                <div class="all-items cards">
                    <?php while (have_rows('cards')) {
                        the_row();
                        $cardTitle = get_sub_field('title');
                        $cardText = get_sub_field('text');
                        $cardImage = get_sub_field('image');
                        $imageWidth = get_sub_field('width');
                        $imageHeight = get_sub_field('height');
                        $altText = get_sub_field('alt_text');
                        $cardButton = get_sub_field('button'); ?>

                        <div class="card">
                            <img alt="<?php echo $altText ?>" src="<?php echo $cardImage['url']; ?>" width="<?php echo $imageWidth; ?>" height="<?php echo $imageHeight; ?>" >
                            <div class="card-body">
                            <?php if (!empty($cardTitle)) { ?>
                                <h3 class="card__title"><?php echo $cardTitle ?></h3>
                            <?php } ?>
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