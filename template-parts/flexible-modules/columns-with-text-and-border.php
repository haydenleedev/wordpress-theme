<?php
$sectionId = get_sub_field('section_id');
$title     = get_sub_field('title');
$button    = get_sub_field('button');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
?>

<?php if ($title != '' || !empty($button)) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="columns-with-border support">
        <div class="grid-container">
        <<?php echo $htag; ?> class="title mb-30px"><?php echo $title; ?></<?php echo $htag; ?>>
        <?php if (!empty($button)) { ?>
            <div class="btn-wrapper">
                <a class="btn btn-bright-blue btn-radius" href="<?php echo $button['url']; ?>"
                   target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
            </div>
        <?php } ?>

        <?php if (have_rows('columns')) { ?>
            <div class="all-items row">
                <?php while (have_rows('columns')) {
                    the_row();
                    $columnTitle = get_sub_field('title');
                    $columnText = get_sub_field('text'); ?>
                    <div class="column with-border col-12 col-md-6">
                        <div class="description">
                            <h3 class="description__title"><?php echo $columnTitle ?></h3>
                            <div class="description__text"><?php echo $columnText; ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        </div>
    </section>
<?php } ?>