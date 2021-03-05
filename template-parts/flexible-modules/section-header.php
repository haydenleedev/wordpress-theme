<?php
$sectionId  = get_sub_field('section_id');
$section_title = get_sub_field('section_title');
?>

<?php if ($section_title != '') { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="section-header">
        <div class="grid-container">
            <h2 class="title"><?php echo $section_title; ?></h2>
        </div>
    </section>
<?php } ?>