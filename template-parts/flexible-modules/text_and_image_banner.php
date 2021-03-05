<?php
$sectionId = get_sub_field('section_id');
$leftBackground = get_sub_field('left_background_image');
$text = get_sub_field('text');
$title = get_sub_field('title');
$button = get_sub_field('button');
$image = get_sub_field('right_image');

?>

<?php if ($title != '' || $image != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="text-and-image-banner">
        <div class="grid-container">
            <div class="row">
                <div class="col-md-6 details" <?php echo ($leftBackground) ? "style='background-image: url(" . $leftBackground['url'] . ")'" : ""; ?>>
                    <div class="details-inner">
                        <div class="title"><?php echo $title; ?></div>
                        <div class="text"><?php echo $text; ?></div>

                        <a class="btn btn-blue btn-radius" href="<?php echo $button['url']; ?>"
                           target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                    </div>
                </div>
                <div class="col-md-6 image" style="background-image: url('<?php echo $image['url']; ?>')">
                </div>
            </div>
        </div>
    </section>
<?php } ?>
