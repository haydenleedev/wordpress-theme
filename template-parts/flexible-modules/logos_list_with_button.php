<?php
$sectionId   = get_sub_field('section_id');
$button       = get_sub_field('button');

?>

<?php if (have_rows('images')) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="logos-list">
        <div class="grid-container">
            <div class="all-items">
                <?php while (have_rows('images')) { the_row();
                    $image = get_sub_field('image');
                    $altText = get_sub_field('alt_text');
                    $imgWidth   = get_sub_field('image_width') ? get_sub_field('image_width') : "auto";
                    $imgHeight   = get_sub_field('image_height') ? get_sub_field('image_height') : "45";
                    ?>
                    <div class="item">
                        <img alt="<?php echo $altText; ?>" src="<?php echo $image['url']; ?>"  width="<?php echo $imgWidth; ?>" height="<?php echo $imgHeight; ?>">
                    </div>
                <?php } ?>
            </div>

            <?php if (!empty($button)) { ?>
                <div class="btn-container">
                    <a class="btn btn-bright-blue btn-radius" href="<?php echo $button['url']; ?>"
                       target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                </div>
            <?php } ?>

        </div>
    </section>
<?php } ?>