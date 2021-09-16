<?php
$sectionId = get_sub_field('section_id');
$text = get_sub_field('text');
$name = get_sub_field('name');
$jobTitle = get_sub_field('job_title');
$company = get_sub_field('company');
$image = get_sub_field('right_image');
$button = get_sub_field('button');
$layoutStyle = ( get_sub_field('layout_style') ) ? " small-quote" : "";
$colClass = ( get_sub_field('layout_style') ) ? "col-md-2 " : "col-md-6 ";
$colClassEight = ( get_sub_field('layout_style') ) ? "col-md-8 " : "col-md-6 details";
?>

<?php if ($name != '' || $image != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="quote-banner">
        <!--        <div class="grid-container">-->
        <div class="row<?php echo $layoutStyle; ?>">
            <div class="<?php echo $colClassEight; ?>">
                <div class="details-inner">
                    <div class="text"><?php echo $text; ?></div>
                    <div class="name"><?php echo $name; ?></div>
                    <div class="job-title"><?php echo $jobTitle; ?></div>
                    <div class="company"><?php echo $company; ?></div>
                    <a class="btn btn-blue btn-radius" href="<?php echo $button['url']; ?>"
                       target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                </div>
            </div>
            <div class="<?php echo $colClass; ?>image" style="background-image: url('<?php echo $image['url']; ?>')">
            </div>
        </div>
        <!--        </div>-->
    </section>
<?php } ?>
