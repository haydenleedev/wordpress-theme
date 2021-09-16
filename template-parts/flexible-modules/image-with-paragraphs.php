<?php
$sectionId = get_sub_field('section_id');
$image = get_sub_field('image');
$altText = get_sub_field('alt_text');
$title = get_sub_field('title');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
?>

<section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="image-with-paragraphs">
    <div class="grid-container">
        <?php if (!empty($title)) { ?>
            <<?php echo $htag; ?> class="title"><?php echo $title; ?></<?php echo $htag; ?>>
        <?php } ?>
        <div class="side-image">
            <img alt="<?php echo $altText; ?>" src="<?php echo $image['url']; ?>">
        </div>
        <div class="all_paragraphs">
            <?php while (have_rows('paragraphs')) {
                the_row();
                $columnTitle = get_sub_field('title');
                $columnText = get_sub_field('text'); 
                $htag2       = ( get_sub_field('htag2') ) ? get_sub_field('htag2') : "h3";
                ?>
                <div class="row">
                <?php if (!empty($columnTitle)) { ?>
                    <<?php echo $htag2; ?> class="description__title"><?php echo $columnTitle ?></<?php echo $htag2; ?>>
                    <?php } ?>
                    <div class="description__text"><?php echo $columnText; ?></div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>