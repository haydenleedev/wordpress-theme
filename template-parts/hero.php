<?php
$hero = get_field('hero');

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
    ?>

    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="hero-section <?php echo ($sectionClass != '') ? $sectionClass : ''; ?>">
        <?php if (!$background) {
            // image as background
            $heroBackground = $hero['image']['url'];

            if ($heroBackground != '') { ?>
                <div class="hero-image <?php echo $crop; ?>"
                     style='background-image: url("<?php echo $heroBackground; ?>")'>
                    <span class="background-alt" role="img" aria-label="<?php echo $altText; ?>"> </span>
                </div>
            <?php } ?>

            <?php if ($title != '' || $text != '') { ?>
                <div class="description">
                    <div class="descriptionTST">
                        <h2 class="title"><?php echo $title; ?></h2>
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
                    <img alt="" src="<?php echo $rightImage['url']; ?>">
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