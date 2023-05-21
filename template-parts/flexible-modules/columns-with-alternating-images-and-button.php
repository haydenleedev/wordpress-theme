<?php
$displayButtonForSection = get_sub_field( 'display_button_for_section' );
$sectionId               = get_sub_field( 'section_id' );
$title                   = get_sub_field( 'title' );
$button                  = get_sub_field( 'button' );
$background              = get_sub_field( 'background_image' );
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h2";
$cloudinaryVideo        = get_field( 'add_cloudinary_video' );
?>

<?php if($cloudinaryVideo) { ?>
    <link href="https://unpkg.com/cloudinary-video-player@1.5.3/dist/cld-video-player.light.min.css" rel="stylesheet">
<script src="https://unpkg.com/cloudinary-core@latest/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/cloudinary-video-player@1.5.3/dist/cld-video-player.light.min.js"
type="text/javascript"></script>
<?php } ?>

<?php if ( have_rows( 'columns' ) ) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="image-text-rows">
        <div class="with-background" <?php echo ( $background ) ? "style='background-image: url(" . $background['url'] . ")'" : ""; ?>>

            <?php if ( $title != '' ) { ?>
                <div class="grid-container">
                    <<?php echo $htag; ?> class="section-title hidden-anim"  data-inviewport="scale-in"><?php echo $title; ?></<?php echo $htag; ?>>
                </div>
            <?php } ?>

            <div class="all-items">
                <?php 
                   $count = 1;
                while ( have_rows( 'columns' ) ) {
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
                    $fontSize       = ( get_sub_field('font_size') ) ? ' ' . ( get_sub_field('font_size') ) : "";
                    $addingVideo         = get_sub_field( 'adding_video' ); 
                    $video         = get_sub_field( 'video' ); 
                    $imgWidth   = get_sub_field('image_width') ? get_sub_field('image_width') : $columnImage['width'];
                    $imgHeight   = get_sub_field('image_height') ? get_sub_field('image_height') : $columnImage['height'];
                    $videoWidth   = get_sub_field('video_width') ? get_sub_field('video_width') : '540';
                    $videoHeight   = get_sub_field('video_height') ? get_sub_field('video_height') : '478';
                    $topPadding   = get_sub_field('top_padding') ? ' ' . get_sub_field('top_padding') : ' pt-30px';
                    $addingQuote         = get_sub_field( 'adding_quote' ); 
                    $quoteText         = get_sub_field( 'quote_text' ); 
                    $quoteImage        = get_sub_field( 'quote_image' ); 
                    $quoteImageWidth        = get_sub_field( 'quote_image_width' ) ? get_sub_field( 'quote_image_width' ): $quoteImage['width']; 
                    $quoteImageHeight        = get_sub_field( 'quote_image_height' ) ? get_sub_field( 'quote_image_height' ) : $quoteImage['height']; 
                    $imgAlign = get_sub_field('image_align') ? ' ' .get_sub_field('image_align') : '';
                    ?>
                    
                    <div<?php echo ( $rowId != '' ) ? ' id="' . $rowId . '"' : ''; ?> class="row <?php echo ( $columnSide ) ? 'image-on-right' : 'image-on-left'; ?>">
                        <div class="wrapper">

                           
                        <?php if (!$addingVideo && !$addingQuote) { ?>
                            <div class="round-image mb-40px <?php echo $imgAlign; ?>"  data-inviewport="scale-in">
                            <img alt="<?php echo $altText ?>" src="<?php echo $columnImage['url']; ?>" width="<?php echo $imgWidth; ?>" height="<?php echo $imgHeight; ?>">
                            </div>
                            <?php } else if (!$addingVideo && $addingQuote) { ?>

                         <div class="round-image mb-40px icon <?php echo $imgAlign; ?>" data-inviewport="scale-in">
                             <div class="relative quote-text bg-shadow p-30px text-center" >
                                <div class="quote-icon bg-darkblue bounce"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47 47"><g stroke="#FFF" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><path d="M22 37c-1.656 0-3-1.344-3-3V19c0-1.656 1.344-3 3-3h21c1.656 0 3 1.344 3 3v15c0 1.656-1.344 3-3 3h-3v9l-9-9h-9z"></path><path d="M13 25l-6 6v-9H4c-1.656 0-3-1.344-3-3V4c0-1.656 1.344-3 3-3h21c1.656 0 3 1.344 3 3v6"></path></g></svg></div>
                                <div class="text-left text-italic text-20px text-400 pt-30px pb-0">
                                    <?php echo $quoteText; ?>
                            </div>
                               <?php if ($quoteImage['url']) { ?>
                                <img alt="" src="<?php echo $quoteImage['url']; ?>" width="<?php echo $quoteImageWidth; ?>" height="<?php echo $quoteImageHeight; ?>">
                                <?php } ?>

                            </div>
                        </div>

                        <?php } else { ?>
                            
                                <div class="round-image<?php echo $topPadding; ?><?php echo $imgAlign; ?>"  data-inviewport="scale-in">

                                   

        <video
            id="ujet-player-<?php echo $count; ?>"
            controls
            class="ujet-video-player" width="<?php echo $videoWidth; ?>" height="<?php echo $videoHeight; ?>">
        </video>

        <script>
        var player = [];

        var cld = cloudinary.Cloudinary.new({ cloud_name: "ujet-videos"});
        player['<?php echo $count; ?>'] = cld.videoPlayer('ujet-player-<?php echo $count; ?>', {
            "fluid": false,
            "controls": true,
            "muted": true,
            "colors": {
                "accent": "#ffffff"
            },
            "hideContextMenu": true,
            "autoplay": true,
            "showLogo": false,
            "loop": true,
            "transformation": {quality: "auto", width: 900, crop: "scale"}
        });

        var $videoSource = {
                publicId: '<?php echo $video; ?>'
            }

        player['<?php echo $count; ?>'].source($videoSource);
        </script>
                                   

                                    </div>
                                 <?php $count++; } ?>
                            

                            <div class="description" >
                                <?php if ( ! empty( $columnTitle ) ) { ?>
                                    <<?php echo $htag2; ?> class="description__title<?php echo $fontSize; ?>"><?php echo $columnTitle ?></<?php echo $htag2; ?>>
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


