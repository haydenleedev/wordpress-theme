<?php
$sectionId = get_sub_field('section_id');
$class = ( get_sub_field('class') ) ? get_sub_field('class') : "";
$title = get_sub_field('title');
$titleStyle = get_sub_field('title_style') ? ' ' . get_sub_field('title_style'): ' text-50px text-600';
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h2";
$boxStyle = get_sub_field('box_style') ? ' ' . get_sub_field('box_style') : '';
$padding = get_sub_field('padding') ? ' ' . get_sub_field('padding') : ' mt-60px';
$boxNumbers = get_sub_field('cols') ? get_sub_field('cols') : '4';
?>

<?php if (have_rows('boxes')) { ?>

    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="boxes<?php echo $class; ?><?php echo $padding; ?>">

        <?php if (!empty($title)) { ?>
            <<?php echo $htag; ?> class="text-center aligncenter mb-30px w-800px<?php echo $titleStyle; ?>"><?php echo $title; ?></<?php echo $htag; ?>>
        <?php } ?>

        <div class="grid-container flex boxes align-row<?php echo $boxStyle; ?>">
            <?php while (have_rows('boxes')) {
                the_row();
                $boxTitle = get_sub_field('title');
                $boxText = get_sub_field('description');
                
            ?>
                <div class="col-<?php echo $boxNumbers; ?>-box bg-shadow" data-inviewport="scale-in">
                    <p class="text-30px text-600 pb-0"><?php echo $boxTitle; ?></p>
                    <p class="text-blue text-600"><?php echo $boxText; ?></p>
                </div>
            <?php } ?>
        </div>

    </section>

<?php } ?>