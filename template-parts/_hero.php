<?php
$hero = get_field('hero');
$cloudinaryVideo        = get_field( 'add_cloudinary_video' );

if ($hero) {
    $sectionId = $hero['section_id'];
    $sectionClass = $hero['section_class'];
    $title = $hero['title'];
    $text = $hero['text'];
    $button = $hero['button'];
    $crop = $hero['crop'] ? 'crop--' . $hero['crop'] : '';
    $background = $hero['background'];
    $altText = $hero['alt_text'];
    $rightImage = $hero['right_image'];
    $repeater_separator = $hero['repeater_separator'];
    $htag       = ( $hero['htag'] ) ? $hero['htag'] : "h2";
    $imgWidth   = $hero['image_width'] ? $hero['image_width'] : "auto";
    $imgHeight   = $hero['image_height'] ? $hero['image_height'] : "auto";
    
    $addingVideo         = $hero( 'adding_video' ); 
    $video         = $hero( 'video' ); 
    ?>

<?php if($cloudinaryVideo) { ?>
    <link href="https://unpkg.com/cloudinary-video-player@1.5.3/dist/cld-video-player.light.min.css" rel="stylesheet">
<script src="https://unpkg.com/cloudinary-core@latest/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/cloudinary-video-player@1.5.3/dist/cld-video-player.light.min.js"
type="text/javascript"></script>
<?php } ?>

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

            <div class="round-image pt-30px">

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
                        <div class="text"><?php echo $text; ?></div>

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
                    <img alt="" src="<?php echo $rightImage['url']; ?>" width="<?php echo $imgWidth; ?>" height="<?php echo $imgHeight; ?>">
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
            </div>
        <?php } ?>
    </section>
<?php } ?>