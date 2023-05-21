<?php
$hero = get_field('hero');
$cloudinaryVideo        = get_field( 'add_cloudinary_video' );

if ($hero) {
    $sectionId = $hero['section_id'];
    $sectionClass = ' ' . $hero['section_class'];
    $title = $hero['title'];
    $titleSize = $hero['font_size'] ? $hero['font_size'] : "text-50px";
    $subTitle = $hero['sub_title'];
    $text = $hero['text'];
    $button = $hero['button'];
    $button2 = $hero['button_2'];
    $crop = $hero['crop'] ? 'crop--' . $hero['crop'] : '';
    $background = $hero['background'];
    $altText = $hero['alt_text'];
    $rightImage = $hero['right_image'];
    $rightImageLink = $hero['right_image_link'];
    $rightImageTitle = $hero['right_image_title'];
    $repeater_separator = $hero['repeater_separator'];
    $htag       = ( $hero['htag'] ) ? $hero['htag'] : "h2";
    $imgWidth   = $hero['image_width'] ? $hero['image_width'] : "auto";
    $imgHeight   = $hero['image_height'] ? $hero['image_height'] : "auto";
    
    $addingVideo         = $hero['adding_video']; 
    $video         = $hero['video']; 
    $layout = $hero['layout_style'];
    $addSvg = $hero['add_svg'];
    $svgCode = $hero['svg_code'];
    ?>

<?php if($cloudinaryVideo) { ?>
    <link href="https://unpkg.com/cloudinary-video-player@1.5.3/dist/cld-video-player.light.min.css" rel="stylesheet">
<script src="https://unpkg.com/cloudinary-core@latest/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/cloudinary-video-player@1.5.3/dist/cld-video-player.light.min.js"
type="text/javascript"></script>
<?php } ?>

<?php if($layout == 'image_right') { ?>

    <section class="hero-section-new grid relative<?php echo $sectionClass; ?> " data-inviewport="color-in">
        <div class="grid-container row align-items-center">

            <div class="col layout col-2 flex-start pt-40px pb-40px" >
                    <<?php echo $htag; ?> class="title mb-40px text-600 <?php echo $titleSize; ?><?php echo $titleSize; ?>"><?php echo $title; ?></<?php echo $htag; ?>>
                    <?php if ($subTitle != '') { ?>
                        <p class="text-22px pb-0"><?php echo $subTitle; ?></p>
                    <?php } ?>
                    <?php if ($text != '') { ?>
                        <?php echo $text; ?>
                    <?php } ?>
                    <div class="flex">
                    <?php if (!empty($button)) { ?>
                            <a class="btn btn-blue btn-radius" href="<?php echo $button['url']; ?>"
                            target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                    <?php } ?>
                    <?php if (!empty($button) & !empty($button2)) { ?>
                            <a class="btn btn-blue btn-radius ml-20px" href="<?php echo $button2['url']; ?>"
                            target="<?php echo $button2['target']; ?>"><?php echo $button2['title']; ?></a>
                    <?php } ?>
                    </div>
            </div>
            <div class="col layout col-2 flex-row flex-end" data-inviewport="translate-y">
                    <?php if (isset($rightImage['url']) && !$addSvg) { ?>
                        <img src="<?php echo $rightImage['url']; ?>" width="<?php echo $imgWidth; ?>" height="<?php echo $imgHeight; ?>" alt="" />

                    <?php } else if ($addSvg) { 
                        echo $svgCode;
                     } ?>
            </div>
        </div>
    </section>
    
    <?php } else if ($layout == 'title_left') { ?>  <!-- if($layout == 'image_right') { -->

        <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="hero-section mt-50px " >
            <div class="description-relative">
                <div class="descriptionTST clearfix">
                <<?php echo $htag; ?> class="title" ><?php echo $title; ?></<?php echo $htag; ?>>

                <?php if ($text != '') { ?>
                <div class="text">
                   <?php echo $text; ?>
                <?php } ?>

                <?php if (!empty($button)) { ?>
                    <a class="btn btn-blue btn-radius" href="<?php echo $button['url']; ?>"
                    target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                <?php } ?>
                
               <?php if ($text != '') { ?>
                </div>
              <?php } ?>

                </div>
            </div>
        </section>

        <?php } else { ?>

            <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="hero-section <?php echo ($sectionClass != '') ? $sectionClass : ''; ?>">
                <?php if (!$background) {
                    // image as background
                    $heroBackground = $hero['image']['url'];

                    if (($heroBackground != '') && !$addingVideo) { ?>
                        <div class="hero-image <?php echo $crop; ?>"
                            style='background-image: url("<?php echo $heroBackground; ?>")'>
                            <span class="background-alt" role="img" aria-label="<?php echo $altText; ?>"> </span>
                        </div>
                    <?php } else if (($heroBackground == '') && ($addingVideo)) { ?>

                    <div class="wrapper relative grid-container clearfix">
                        <div class="round-image pt-30px alignright">

                                <video
                                    id="ujet-player-<?php echo $count; ?>"
                                    controls
                                    class="ujet-video-player" width="540" height="478">
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
                        <?php $count++;  ?>
                    <?php } ?>

                    <?php if ($title != '' || $text != '') { ?>
                        <div class="description">
                            <div class="descriptionTST">

                            <?php if ($title != '') { ?>
                                <<?php echo $htag; ?> class="title"><?php echo $title; ?></<?php echo $htag; ?>>
                            <?php } ?>

                            <?php if ($text != '') { ?>
                                <div class="text"><?php echo $text; ?></div>
                                <?php } ?>

                                <?php
                                $repeater = $hero['repeater'];

                                if ($repeater) { ?>
                                <div class="repeater<?php echo $repeater_separator ? ' column-separator' : ''; ?>">
                                    <?php
                                    foreach ($repeater as $row) {
                                        if (!empty($row['icon']) || !empty($row['subtitle'])) { ?>
                                            <div class="row">
                                            <?php
                                            if (!empty($row['icon'])) { ?>
                                                <a class="icon" href="<?php echo $row['subtitle']['url']; ?>"
                                                target="<?php echo $row['subtitle']['target']; ?>">
                                                    <img alt="" src="<?php echo $row['icon']['url']; ?>">
                                                </a>

                                            <?php } ?>

                                            <?php if (!empty($row['subtitle'])) { ?>
                                                <a class="subtitle" href="<?php echo $row['subtitle']['url']; ?>"
                                                target="<?php echo $row['subtitle']['target']; ?>"><?php echo $row['subtitle']['title']; ?></a>
                                            <?php } ?>

                                            </div><?php
                                        }
                                    }
                                    }
                                    ?>
                                </div>

                                <?php if (!empty($button)) { ?>
                                    <a class="btn btn-blue btn-radius" href="<?php echo $button['url']; ?>"
                                    target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (isset($rightImage['url'])) { ?>
                        <div class="right-image">
                        <?php if (!empty($rightImageLink['url'])) { ?>
                            <a href="<?php echo $rightImageLink['url']; ?>" title="<?php echo $rightImageTitle; ?>">
                        <?php } ?>
                            <img alt="" src="<?php echo $rightImage['url']; ?>" width="<?php echo $imgWidth; ?>" height="<?php echo $imgHeight; ?>">
                        <?php if (!empty($rightImageLink['url'])) { ?>   
                            </a>
                        <?php } ?>
                        </div>
                    <?php } ?>

                <?php } else {

                    // video as background
                    $heroBackground = $hero['video'];
                    $heroVideoUpload = $hero['video_upload'];
                    $heroVideoOverlay = $hero['video_overlay']; ?>

                    <div class="hero-video-section">
                        <?php if (!empty($heroVideoOverlay)) { ?>
                            <div class="hero-video-overlay"
                            ><img src="<?php echo $heroVideoOverlay['url']; ?>"></div>
                        <?php } ?>

                        <div class="hero-video">
                            <?php echo $heroBackground; ?>
                        </div>

                        <?php if (!empty($heroVideoUpload)) { ?>
                            <div class="hero-video-upload hide">
                                <video id="homepage_video_play" width="100%" loop webkit-playsinline playsinline muted>
                                    <source src="<?php echo $heroVideoUpload['url']; ?>" type="video/mp4">
                                </video>
                            </div>
                        <?php } ?>
                    </div><!-- .hero-video-section -->

                    <?php if (($heroBackground == '') && ($addingVideo)) { ?>
                    </div><!-- .wrapper -->
                    <?php } ?>

                <?php } ?>
            </section>

        <?php } ?><!-- } else { -->

<?php } ?>