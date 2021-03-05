<?php
$sectionId      = get_sub_field('section_id');
$leftSideTitle  = get_sub_field('left_side_title');
$leftSideText   = get_sub_field('left_side_text');
$leftSideImage  = get_sub_field('left_side_image');
$leftSideButton = get_sub_field('left_side_link');
$rightSideImage = get_sub_field('right_side_image');
$rightSideText  = get_sub_field('right_side_text');

?>

<?php if ($leftSideTitle != '' || $leftSideText != '' || $rightSideText != '') { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="two-sides-section">
        <div class="grid-container">
            <div class="row">
                <div class="col-md-6 col-lg-7 left-side">
                    <div class="title"><?php echo $leftSideTitle; ?></div>
                    <div class="text"><?php echo $leftSideText; ?></div>

                    <?php if(!empty($leftSideImage)) { ?>
                        <a class="image-link" href="<?php echo $leftSideButton['url']; ?>" target="<?php echo $leftSideButton['target']; ?>">
                            <img src="<?php echo $leftSideImage['url']; ?>" alt="Section image">
                        </a>
                    <?php } else { ?>
                        <a class="link" href="<?php echo $leftSideButton['url']; ?>" target="<?php echo $leftSideButton['target']; ?>"><?php echo $leftSideButton['title']; ?></a>
                    <?php } ?>
                </div>
                <div class=" col-md-6 col-lg-5 right-side">
                    <div class="right-side-inner">
                    <img src="<?php echo $rightSideImage['url']; ?>" alt="Section image">
                    <div class="text"><?php echo $rightSideText; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
