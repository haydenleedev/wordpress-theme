<?php
$sectionId   = get_sub_field('section_id');
$sectionClass   = get_sub_field('section_class');
$title       = get_sub_field('title');
$description = get_sub_field('description');
$button       = get_sub_field('button');
$imgWidth   = get_sub_field('image_width') ? get_sub_field('image_width') : "auto";
$imgHeight   = get_sub_field('image_height') ? get_sub_field('image_height') : "auto";
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
?>

<?php if (have_rows('images')) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?>  class="images-list<?php echo ( $sectionClass != '' ) ? ' ' . $sectionClass : ''; ?>">
        <div class="grid-container">

        <?php if ($title != '' ) { ?>
            <<?php echo $htag; ?> class="section-title"><?php echo $title; ?></<?php echo $htag; ?>>
            <?php } ?>

            <?php if ($description != '' ) { ?>
            <div class="description"><?php echo $description; ?></div>
            <?php } ?>

            <div class="all-items">
                <?php while (have_rows('images')) { the_row();
                    $image = get_sub_field('image');
                    $altText = get_sub_field('alt_text');
                    $link      = get_sub_field('link');
                 ?>
                    <div class="item">

                    <?php if ( !empty($link) ) {  ?>
                    <a class="block" href="<?php echo $link['url']; ?>"
                       target="<?php echo $link['target']; ?>">
                        <img alt="<?php echo $altText; ?>" src="<?php echo $image['url']; ?>" width="<?php echo $imgWidth; ?>" height="<?php echo $imgHeight; ?>">
                    </a>
                    <?php } else { ?>
                        <img alt="<?php echo $altText; ?>" src="<?php echo $image['url']; ?>" width="<?php echo $imgWidth; ?>" height="<?php echo $imgHeight; ?>">
                    <?php } ?>


                    </div>
                <?php } ?>
            </div>

            <?php if (!empty($button)) { ?>
                <div class="btn-container">
                    <a class="btn btn-transparent btn-radius" href="<?php echo $button['url']; ?>"
                       target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>