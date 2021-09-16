<?php
$sectionId  = get_sub_field( 'section_id' );
$title      = get_sub_field( 'section_title' );
$background = get_sub_field( 'background_image' );
$image      = get_sub_field('image');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h2";
$imgWidth   = get_sub_field('image_width') ? get_sub_field('image_width') : $image['width'];
$imgHeight   = get_sub_field('image_height') ? get_sub_field('image_height') : $image['height'];
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
                    <img src="<?php echo $image['url']; ?>" alt="" width="<?php echo $imgWidth; ?>" height="<?php echo $imgHeight; ?>">
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
                        $colImgWidth   = get_sub_field('image_width') ? get_sub_field('image_width') : $columnIcon['width'];
                        $colImgHeight   = get_sub_field('image_height') ? get_sub_field('image_height') : $columnIcon['height'];
                        ?>

                        <div class="col <?php echo ( $columnsCount > 1 ) ? 'col-md-6' : 'col-md-12'; ?>">
                            <div class="col__inner">
                                <?php

                                if ( isset( $columnIcon['url'] ) ) { ?>
                                    <img alt="<?php echo $altText; ?>" src="<?php echo $columnIcon['url']; ?>" width="<?php echo $colImgWidth; ?>" height="<?php echo $colImgHeight; ?>">

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