<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
?>

<?php if ($title != '' && have_rows('columns')) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="two-column">
        <div class="grid-container">
            <<?php echo $htag; ?> class="section-title"><?php echo $title; ?></<?php echo $htag; ?>>
            <div class="all-items grid-masonry">
                <?php while (have_rows('columns')) {
                    the_row();
                    $columnTitle = get_sub_field('title');
                    $columnText = get_sub_field('text');
                    $columnImage = get_sub_field('image');
                    $altText = get_sub_field('alt_text');
                    ?>
                    <div class="grid-item">
                        <div class="item">
                            <img alt="<?php echo $altText; ?>" src="<?php echo $columnImage['url']; ?>">
                            <h3 class="item__title"><?php echo $columnTitle ?></h3>
                            <div class="item__text"><?php echo $columnText; ?></div>
                        </div>
                    </div>
                    <div class="gutter-sizer"></div>
                <?php } ?>
            </div>
        </div>
    </section>
    <script>
        if ($(".grid-item").length % 2 != 0) {
            var test=document.getElementsByClassName("grid-item");
            var  no_of_items=$(".grid-item").length;
            test.item(no_of_items-1).style.left="0";

        }
    </script>
<?php } ?>
