<?php
$sectionId = get_sub_field('section_id');
$image = get_sub_field('image');
$altText = get_sub_field('alt_text');
$title = get_sub_field('title');
$text = get_sub_field('text');
$formTitle = get_sub_field('form_title');
$formDescription = get_sub_field('form_description');
$formShortcode = get_sub_field('form_shortcode');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
$class = ( get_sub_field('class') ) ? get_sub_field('class') : " text-center";
?>

<?php if ($formShortcode != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="form-with-image form-with-text">
        <div class="grid-container">
            <div class="row">
                <?php if ($title != '' || $text != '') { ?>
                    <div class="col-left form-description">
                        <div class="description-container">

                        <?php if ($image['url'] != '') { ?>
                            <img class="left-logo-image" src="<?php echo $image['url']; ?>" alt="<?php echo $altText; ?>">
                            <?php } ?>

                            <?php if ($title != '') { ?>
                            <<?php echo $htag; ?> class="text-30px text-600<?php echo $class; ?>"><?php echo $title; ?></<?php echo $htag; ?>>
                            <?php } ?>

                            <div class="text"><?php echo $text; ?></div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-right form-shortcode ">
                    <div class="form-background">
                        <div class="info">
                        <?php if (!empty($formTitle)) { ?>
                            <h2 class="form-title"><?php echo $formTitle; ?></h2>
                         <?php } ?>
                            <div class="form-description"><?php echo $formDescription; ?></div>
                        </div>
                        <?php echo do_shortcode($formShortcode); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>