<?php
$sectionId = get_sub_field('section_id');
$subtitle = get_sub_field('subtitle');
$title = get_sub_field('title');
$image = get_sub_field('right_image');

?>

<?php if ($title != '' || $image != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="lp_title_section">
        <!--        <div class="grid-container">-->
        <div class="row">
            <div class="col-md-6 details">
                <div class="details-inner">
                    <div class="subtitle"><?php echo $subtitle; ?></div>
                    <?php if ($subtitle != '') { ?>
                        <i></i>
                    <?php } ?>
                    <div class="title"><?php echo $title; ?></div>
                </div>
            </div>
            <div class="col-md-6 image" style="background-image: url('<?php echo $image['url']; ?>')">
            </div>
        </div>
        <!--        </div>-->
    </section>
<?php } ?>
