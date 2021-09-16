<?php
$sectionId  = get_sub_field('section_id');
$title      = get_sub_field('title');
$text       = get_sub_field('text');
$image      = get_sub_field('image');
$altText = get_sub_field('alt_text');
$button     = get_sub_field('button');
$background = get_sub_field('background_image');

?>

<?php if ($title != '' || $text != '') { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="colored-background-with-badges">
        <div class="with-background" <?php echo ($background) ? "style='background-image: url(" . $background['url'] . ")'" : ""; ?>>
            <div class="grid-container">
                <div class="row">
                    <div class="details">

                        <?php if (!empty($title)) { ?>
                            <h2 class="title"><?php echo $title; ?></h2>
                        <?php } ?>

                        <?php if($image) { ?>
                            <div class="image">
                                <img alt="<?php echo $altText; ?>" src="<?php echo $image['url']; ?>">
                            </div>
                        <?php } ?>

                        <div class="text"><?php echo $text; ?></div>
                        <?php if(!empty($button)) { ?>
                            <a class="btn btn-blue btn-radius" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                        <?php } ?>
                    </div>


                    <div class="all-items">
                        <?php while (have_rows('images')) { the_row();
                            $image = get_sub_field('image');
                            $altText = get_sub_field('alt_text');
                            $imgWidth   = get_sub_field('image_width') ? get_sub_field('image_width') : "auto";
                            $imgHeight   = get_sub_field('image_height') ? get_sub_field('image_height') : "auto";  
                            ?>
                            <div class="item">
                                <img alt="<?php echo $altText; ?>" src="<?php echo $image['url']; ?>" width="<?php echo $imgWidth; ?>" height="<?php echo $imgHeight; ?>">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
