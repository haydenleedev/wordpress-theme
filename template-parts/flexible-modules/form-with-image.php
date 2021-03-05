<?php
$sectionId = get_sub_field('section_id');
$image = get_sub_field('image');
$leftOrBackground = get_sub_field('left_or_background_image');
$formTitle = get_sub_field('form_title');
$formDescription = get_sub_field('form_description');
$formShortcode = get_sub_field('form_shortcode');
?>

<?php if ($formShortcode != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="form-with-image">
        <div <?php echo ($leftOrBackground && !empty($image)) ? "class='with-background' style='background-image: url(" . $image['url'] . ")'" : ""; ?>>
            <div class="grid-container">
                <div class="row">
                    <?php if (!$leftOrBackground && !empty($image)) { ?>
                        <div class="col-left image">
                            <img src="<?php echo $image['url']; ?>" alt="Form image">
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
        </div>
    </section>
<?php } ?>