<?php
$sectionId  = get_sub_field('section_id');
$work_title = get_sub_field('work_title');
$subtitle = get_sub_field('subtitle');
$image = get_sub_field('image');
$button = get_sub_field('button');
$altText = get_sub_field('alt_text');
?>

<?php if ($work_title != '' || $subtitle != '') { ?>
<section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="workBox">
        <div class="grid-container">
            <div class="image-container" style="background-image: url('<?php echo $image['url']; ?>')">
                <span class="background-alt" role="img" aria-label="<?php echo $altText; ?>"> </span>
            </div>
            <h2 class="title"><?php echo $work_title; ?></h2>
            <div class="subtitle"><?php echo $subtitle; ?></div>
            <?php if (!empty($button)) { ?>
                <div class="btn-container">
                    <a class="btn btn-bright-blue btn-radius" href="<?php echo $button['url']; ?>"
                       target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>