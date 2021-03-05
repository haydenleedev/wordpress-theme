<?php
$sectionId          = get_sub_field( 'section_id' );
$title              = get_sub_field( 'title' );
$description        = get_sub_field( 'description' );
?>

<?php if ( $title != '' || $description != '' ) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="title-description">
        <div class="smaller-grid-container">
            <h1 class="title"><?php echo $title; ?></h1>
            <div class="description"><?php echo $description; ?></div>
        </div>
    </section>
<?php } ?>