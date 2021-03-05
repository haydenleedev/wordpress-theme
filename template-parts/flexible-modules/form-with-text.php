<?php
$sectionId = get_sub_field('section_id');
$image = get_sub_field('image');
$altText = get_sub_field('alt_text');
$title = get_sub_field('title');
$text = get_sub_field('text');
$formTitle = get_sub_field('form_title');
$formDescription = get_sub_field('form_description');
$formShortcode = get_sub_field('form_shortcode');
?>

<?php if ($formShortcode != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="form-with-image form-with-text">
        <div class="grid-container">
            <div class="row">
                <?php if ($title != '' || $text != '') { ?>
                    <div class="col-left form-description">
                        <div class="description-container">
                            <img class="left-logo-image" src="<?php echo $image['url']; ?>" alt="<?php echo $altText; ?>">
                            <h2 class="title"><?php echo $title; ?></h2>
                            <div class="text"><?php echo $text; ?></div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-right form-shortcode ">
                    <div class="form-background">
                        <div class="info">
                            <h3 class="form-title"><?php echo $formTitle; ?></h3>
                            <div class="form-description"><?php echo $formDescription; ?></div>
                        </div>
                        <?php echo do_shortcode($formShortcode); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>