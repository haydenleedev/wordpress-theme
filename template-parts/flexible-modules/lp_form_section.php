<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$description = get_sub_field('description');
$formTitle = get_sub_field('form_title');
$formShortcode = get_sub_field('form_shortcode');
?>

<?php if ($formShortcode != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="form-with-image form-with-text lp_form_section">
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