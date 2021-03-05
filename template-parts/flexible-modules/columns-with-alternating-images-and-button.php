<?php
$displayButtonForSection = get_sub_field( 'display_button_for_section' );
$sectionId               = get_sub_field( 'section_id' );
$title                   = get_sub_field( 'title' );
$button                  = get_sub_field( 'button' );
$background              = get_sub_field( 'background_image' );
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h2";
?>

<?php if ( have_rows( 'columns' ) ) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="image-text-rows">
        <div class="with-background" <?php echo ( $background ) ? "style='background-image: url(" . $background['url'] . ")'" : ""; ?>>

            <?php if ( $title != '' ) { ?>
                <div class="grid-container">
                    <<?php echo $htag; ?> class="section-title"><?php echo $title; ?></<?php echo $htag; ?>>
                </div>
            <?php } ?>

            <div class="all-items">
                <?php while ( have_rows( 'columns' ) ) {
                    the_row();
                    $rowId           = get_sub_field( 'row_id' );
                    $columnTitle     = get_sub_field( 'title' );
                    $columnSide      = get_sub_field( 'image_side' );
                    $columnSeparator = get_sub_field( 'has_separator' );
                    $textOrRepeater  = get_sub_field( 'text_or_repeater' );
                    $columnText      = get_sub_field( 'text' );
                    $columnButton    = get_sub_field( 'row_button' );
                    $columnImage     = get_sub_field( 'image' );
                    $altText         = get_sub_field( 'alt_text' ); 
                    $htag2       = ( get_sub_field('htag2') ) ? get_sub_field('htag2') : "h3";
                    ?>
                    <div<?php echo ( $rowId != '' ) ? ' id="' . $rowId . '"' : ''; ?> class="row <?php echo ( $columnSide ) ? 'image-on-right' : 'image-on-left'; ?>">
                        <div class="wrapper">
                            <div class="round-image">
                                <img alt="<?php echo $altText ?>" src="<?php echo $columnImage['url']; ?>">
                            </div>
                            <div class="description">
                                <?php if ( ! empty( $columnTitle ) ) { ?>
                                    <<?php echo $htag2; ?> class="description__title"><?php echo $columnTitle ?></<?php echo $htag2; ?>>
                                <?php } ?>


                                <?php while ( have_rows( 'repeater' ) ) {
                                    the_row();
                                    $repeaterSubtitle = get_sub_field( 'subtitle' );
                                    $repeaterIcon     = get_sub_field( 'icon' );
                                    $repeaterText     = get_sub_field( 'text' );
                                    ?>

                                    <?php if ( $textOrRepeater ) { ?>
                                        <div class="repeater__row">
                                            <img src="<?php echo $repeaterIcon['url']; ?>" class="repeater__icon">

                                            <div class="title-text">
                                            <div class="subtitle"><?php echo $repeaterSubtitle; ?></div>
                                            <div class="text"><?php echo $repeaterText; ?></div>
                                            </div>
                                        </div>
                                    <?php }
                                }

                                if ( ! $textOrRepeater ) { ?>
                                    <div class="description__text"><?php echo $columnText; ?></div>
                                <?php } ?>

                                <?php
                                // display a different button for each row
                                if ( $displayButtonForSection ) { ?>
                                    <?php if ( ! empty( $columnButton ) ) { ?>
                                        <div class="description__button">
                                            <a class="btn btn-bright-blue btn-radius" href="<?php echo $columnButton['url']; ?>"
                                               target="<?php echo $columnButton['target']; ?>"><?php echo $columnButton['title']; ?></a>
                                        </div>
                                    <?php } ?>

                                <?php } ?>
                            </div>
                        </div>
                        <?php if ( $columnSeparator ) { ?>
                            <div class="separator"></div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

            <?php
            // display a button for the entire section
            if ( ! empty( $button ) ) { ?>
                <div class="btn-wrapper">
                    <a class="btn btn-bright-blue btn-radius" href="<?php echo $button['url']; ?>"
                       target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                </div>
            <?php } ?>

        </div>
    </section>
<?php } ?>