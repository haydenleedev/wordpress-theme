<?php
$sectionId  = get_sub_field('section_id');
$title      = get_sub_field('title');
$text       = get_sub_field('text');
$image      = get_sub_field('image');
$button     = get_sub_field('button');

?>

<?php if ($title != '' || $text != '') { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="image-text-button-vertically-section">
        <div class="grid-container">
            <div class="content-row">
                <div class="image">
                    <img src="<?php echo $image['url']; ?>" alt="Section image">
                </div>
                <div class="details">
                    <h2 class="title"><?php echo $title; ?></h2>
                    <div class="text"><?php echo $text; ?></div>
                    <a class="btn btn-bright-blue btn-radius" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
