<?php
$sectionId      = get_sub_field( 'section_id' );
$leftSideTitle  = get_sub_field( 'left_side_title' );
$leftSideButton = get_sub_field( 'left_side_button' );
$rightSideTitle = get_sub_field( 'right_side_title' );
$rightSideLink  = get_sub_field( 'right_side_link' );
$rightSideImage = get_sub_field( 'right_side_image' );
?>

<?php if ( $leftSideTitle != '' || $rightSideTitle != '' ) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="post-contact-sales-and-file">
        <div class="blue-background">
            <div class="smaller-grid-container">
                <div class="row">
                    <div class="contact-sales-section left-side">
                        <h2 class="contact-sales-section__title"><?php echo $leftSideTitle; ?></h2>
                        <?php if(!empty($leftSideButton)) { ?>
                            <a class="btn contact-sales-section__button" href="<?php echo $leftSideButton['url']; ?>" target="<?php echo $leftSideButton['target']; ?>">
                                <?php echo $leftSideButton['title']; ?>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="file-section right-side">
                        <h2 class="file-section__title"><?php echo $rightSideTitle; ?></h2>
                        <?php if(!empty($rightSideImage)) { ?>
                            <?php if(!empty($rightSideLink)) { ?>
                                <a class="btn file-section__button" href="<?php echo $rightSideLink['url']; ?>" target="<?php echo $rightSideLink['target']; ?>">
                                    <img src="<?php echo $rightSideImage['url']; ?>" alt="Section image">
                                </a>
                            <?php } ?>
                        <?php }
                        else {
                            if(!empty($rightSideLink)) { ?>
                                <a class="btn file-section__button" href="<?php echo $rightSideLink['url']; ?>" target="<?php echo $rightSideLink['target']; ?>">
                                    <?php echo $rightSideLink['title']; ?>
                                </a>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>