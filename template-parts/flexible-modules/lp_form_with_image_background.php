<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$description = get_sub_field('description');
$formTitle = get_sub_field('form_title');
$formShortcode = get_sub_field('form_shortcode');
$image = get_sub_field('background_image');
?>

<?php if ($formShortcode != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> style="background-image: url('<?php echo $image['url']; ?>')" class="form-with-image form-with-text lp_form_with_image_background">
        <div class="grid-container">
            <div class="row">
                <?php if ($title != '' || $description != '') { ?>
                    <div class="col-left form-description">
                        <div class="description-container">
                            <h2 class="title"><?php echo $title; ?></h2>
                            <div class="description"><?php echo $description; ?></div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-right form-shortcode ">
                    <h2 class="form-title"><?php echo $formTitle; ?></h2>
                    <div class="form-background">
                        <?php echo do_shortcode($formShortcode); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>