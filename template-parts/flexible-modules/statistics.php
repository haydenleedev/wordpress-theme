<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$separator = get_sub_field('separator');
$repeater_separator = get_sub_field('repeater_separator');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
?>

<?php if (have_rows('repeater')) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="support statistics">
        <div class="grid-container">
            <?php if (!empty($title)) { ?>
                <<?php echo $htag; ?> class="title"><?php echo $title; ?></<?php echo $htag; ?>>
            <?php } ?>


            <?php if (have_rows('repeater')) { ?>
                <div class="repeater<?php echo $repeater_separator ? ' column-separator' : ''; ?>">
                    <?php
                    $columnsCount = 0;

                    while (have_rows('repeater')) {
                        the_row();
                        $columnsCount++;
                    }

                    while (have_rows('repeater')) {
                        the_row();
                        $percentage = get_sub_field('percentage');
                        $columnTitle = get_sub_field('subtitle');
                        $columnText = get_sub_field('text'); ?>

                        <div class="col <?php echo ($columnsCount > 1) ? 'col-md-4' : 'col-md-12'; ?>">

                            <?php echo $percentage ? '<h2 class="repeater__percentage">' . $percentage . '</h2>' : ''; ?>
                            <?php echo $columnTitle ? '<div class="repeater__title">' . $columnTitle . '</div>' : ''; ?>
                            <?php echo $columnText ? '<div class="repeater__text">' . $columnText . '</div>' : ''; ?>

                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>