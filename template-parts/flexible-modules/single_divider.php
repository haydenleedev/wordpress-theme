<?php
$sectionClass = get_sub_field('section_class');
$top_or_bottom = get_sub_field('top_or_bottom');

// do not display divider style, if no divider is selected
if($top_or_bottom == true) {
    $dividerClass = 'top';
}else {
    $dividerClass = 'bottom';
}
?>


    <section class="single-divider <?php echo $dividerClass; ?> <?php echo $sectionClass; ?>" >

    </section>
