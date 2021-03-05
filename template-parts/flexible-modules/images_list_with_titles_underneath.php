<?php
$sectionId   = get_sub_field('section_id');
$title       = get_sub_field('title');
//$description = get_sub_field('description');
?>

<?php //if ($title != '' && have_rows('images')) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="images-list-with-titles">
        <div class="grid-container">
            <h1 class="section-title"><?php echo $title; ?></h1>
<!--            <div class="description">--><?php //echo $description; ?><!--</div>-->

            <div class="all-items">
                <?php while (have_rows('images')) { the_row();
                    $image = get_sub_field('image');
                    $imageTitle = get_sub_field('image_title');
                    $altText = get_sub_field('alt_text');
                    ?>
                    <div class="item">
                        <img alt="<?php echo $altText; ?>" src="<?php echo $image['url']; ?>">
                        <h3 class="image-title"><?php echo $imageTitle; ?></h3>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php //} ?>