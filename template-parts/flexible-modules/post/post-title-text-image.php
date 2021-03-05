<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$text = get_sub_field('text');
$image = get_sub_field('image');
?>

<?php if ($title != '' || $text != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="post-title-text-image smaller-grid-container">
        <h3 class="title"><?php echo $title; ?></h3>
        <div class="text"><?php echo $text; ?></div>
        <div class="image">
            <?php echo $image['url'] ? '<img src="' . $image['url'] . '"/>' : ''; ?>
        </div>
    </section>
<?php } ?>