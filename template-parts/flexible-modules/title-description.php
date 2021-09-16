<?php
$sectionId          = get_sub_field( 'section_id' );
$title              = get_sub_field( 'title' );
$description        = get_sub_field( 'description' );
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
?>

<?php if ( $title != '' || $description != '' ) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="title-description">
        <div class="smaller-grid-container">
        <?php if ( $title != '' ) { ?>
            <<?php echo $htag; ?> class="title"><?php echo $title; ?></<?php echo $htag; ?>>
        <?php } ?>
            <div class="description"><?php echo $description; ?></div>
        </div>
    </section>
<?php } ?>