<?php
$sectionId = get_sub_field('section_id');
$button = get_sub_field('button');
$title = get_sub_field('title');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h2";
?>

<section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="icon-and-text-rows">
    <div class="grid-container">
    <div class="grid-container mb-20px">
            <<?php echo $htag; ?> class="section-title"><?php echo $title; ?> </<?php echo $htag; ?>>
        </div>
        <div class="all_rows">
            <?php while (have_rows('row')) {
                the_row();
                $rowIcon = get_sub_field('icon');
                $rowTitle = get_sub_field('title');
                $rowText = get_sub_field('text');
                $altText = get_sub_field('alt_text'); ?>

                <div class="row">
                    <div class="side-icon">
                        <img alt="<?php echo $altText; ?>" src="<?php echo $rowIcon['url']; ?>">
                    </div>
                    <div class="description">
                        <h3 class="description__title"><?php echo $rowTitle ?></h3>
                        <div class="description__text"><?php echo $rowText; ?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="section__button">
            <a class="btn btn-bright-blue btn-radius" href="<?php echo $button['url']; ?>"
               target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
        </div>
    </div>
</section>