<?php
$sectionId = get_sub_field('section_id');
$text = get_sub_field('text');
$link = get_sub_field('link');
?>

<section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="lp-learn-more">
    <div class="grid-container">
        <h2 class="title"><?php echo $text; ?></h2>
        <?php if (!empty($link)) { ?>
            <div class="btn-container">
                <a class="btn-link" href="<?php echo $link['url']; ?>"
                   target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
            </div>
        <?php } ?>
    </div>
</section>