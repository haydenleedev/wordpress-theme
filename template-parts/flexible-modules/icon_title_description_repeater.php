<?php
$sectionId  = get_sub_field( 'section_id' );
$title      = get_sub_field( 'section_title' );
$background = get_sub_field( 'background_image' );
$image      = get_sub_field('image');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h2";
?>

<?php if ( $title != '' || have_rows( 'repeater' ) ) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?>
             <?php echo ( $background ) ? "class='icon-title-description' style='background-image: url(" . $background['url'] . ")'" : "class='icon-title-description no-bgimg'"; ?>>
        <div class="grid-container">
            <?php if ( ! empty( $title ) ) { ?>
                <<?php echo $htag; ?> class="title narrow-width"><?php echo $title; ?></<?php echo $htag; ?>>
            <?php } ?>

            <?php if ( ! empty( $image  ) ) { ?>
            <div class="image">
                    <img src="<?php echo $image['url']; ?>" alt="Section image">
            </div>
            <?php } ?>

            <?php if ( have_rows( 'repeater' ) ) { ?>
                <div class="repeater">
                    <?php
                    $columnsCount = 0;

                    while ( have_rows( 'repeater' ) ) {
                        the_row();
                        $columnsCount ++;
                    }

                    while ( have_rows( 'repeater' ) ) {
                        the_row();
                        $columnTitle = get_sub_field( 'title' );
                        $columnIcon  = get_sub_field( 'icon' );
                        $altText     = get_sub_field( 'alt_text' );
                        $columnText  = get_sub_field( 'text' ); 
                        $link      = get_sub_field('link');
                        ?>

                        <div class="col <?php echo ( $columnsCount > 1 ) ? 'col-md-6' : 'col-md-12'; ?>">
                            <div class="col__inner">
                                <?php

                                if ( isset( $columnIcon['url'] ) ) { ?>
                                    <img alt="<?php echo $altText; ?>" src="<?php echo $columnIcon['url']; ?>">

                                    <?php
                                }
                                ?>

                                <?php if ( !empty($link) ) {  ?>
                                <?php echo $columnTitle ? '<h2 class="repeater__title"><a href="' . $link['url'] . '" target="' . $link['target'] . '">' . $columnTitle . '</a></h2>' : ''; ?>
                                <?php } else { ?>
                                    <?php echo $columnTitle ? '<h2 class="repeater__title">' . $columnTitle . '</h2>' : ''; ?>
                                <?php } ?>

                                <?php if ( !empty($link) ) {  ?>
                                <?php echo $columnText ? '<div class="repeater__text"><a href="' . $link['url'] . '" target="' . $link['target'] . '">' . $columnText . '</a></div>' : ''; ?>
                                <?php } else { ?>
                                    <?php echo $columnText ? '<div class="repeater__text">' . $columnText . '</div>' : ''; ?>
                                 <?php } ?>


                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>