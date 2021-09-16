<?php
$sectionId          = get_sub_field( 'section_id' );
$html        = get_sub_field( 'html_code' );
$class        = get_sub_field( 'class' );
?>

<?php if ( $html != '' ) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="hero-section<?php echo ' ' . $class; ?>">
        <?php echo $html; ?>
    </section>
<?php } ?>