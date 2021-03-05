<?php
$sectionId            = get_sub_field( 'section_id' );
$title                = get_sub_field( 'title' );
$button               = get_sub_field( 'button' );
$formShortcode        = get_sub_field( 'form_shortcode' );
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
?>

<?php if ( $title != '' || $description != '' ) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="title-button-form">
        <div class="grid-container">
            <<?php echo $htag; ?> class="title"><?php echo $title; ?></<?php echo $htag; ?>>
            <div class="row">
            <a class="btn btn-bright-blue btn-radius" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
            </div>
            <?php if ( !empty($formShortcode) ) { ?>
                <div class="form-shortcode">
                    <?php echo do_shortcode($formShortcode); ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>