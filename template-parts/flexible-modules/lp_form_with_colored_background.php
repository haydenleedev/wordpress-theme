<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$description = get_sub_field('description');
$formTitle = get_sub_field('form_title');
$formShortcode = get_sub_field('form_shortcode');
$link = get_sub_field('learn_more_link');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
?>

<?php if ($formShortcode != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="form-with-image form-with-text lp_form_with_colored_background">
        <div class="grid-container">
            <div class="row">
                <?php if ($title != '' || $description != '') { ?>
                    <div class="col-left form-description">
                        <div class="description-container">
                            <<?php echo $htag; ?> class="title"><?php echo $title; ?></<?php echo $htag; ?>>
                            <div class="description"><?php echo $description; ?></div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-right form-shortcode ">
                    <h2 class="form-title"><?php echo $formTitle; ?></h2>
                    <div class="form-background">
                        <?php echo do_shortcode($formShortcode); ?>
                    </div>
                    <div class="learn-more"><?php echo $link; ?></div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>