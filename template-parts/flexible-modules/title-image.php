<?php
$sectionId  = get_sub_field('section_id');
$title      = get_sub_field('title');
$text       = get_sub_field('text');
$image      = get_sub_field('image');

?>

<?php if ($title != '' || $text != '') { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="image-text-button-vertically-section">
        <div class="grid-container">
        <div class="smaller-grid-container">
            <h2 class="title"><?php echo $title; ?></h2>
                <div class="image">
                    <img src="<?php echo $image['url']; ?>" alt="Section image">
                </div>
            </div>
        </div>
    </section>
<?php } ?>
