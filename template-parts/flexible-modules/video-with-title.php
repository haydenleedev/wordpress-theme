<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$videoLink = get_sub_field('video_link');
$videoUpload = get_sub_field('video_upload');
$videoOverlay = get_sub_field('video_overlay');
$button = get_sub_field('button');
$altText = get_sub_field('alt_text');
?>
<?php if ($videoLink || $videoUpload) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="video-with-title">
    <?php if (!empty($title)) { ?>
        <h1 class="title"><?php echo $title; ?></h1>
    <?php } ?>
        <div class="video-section">
            <?php if (!empty($videoOverlay)) { ?>
                <div class="video-overlay">
                    <img alt="<?php echo $altText ?>" src="<?php echo $videoOverlay['url']; ?>">
                </div>
            <?php } ?>

            <div class="video">
                <?php echo $videoLink; ?>
            </div>

            <?php if (!empty($videoUpload)) { ?>
                <div class="video-upload hide">
                    <video id="video_play" width="100%" loop webkit-playsinline playsinline muted>
                        <source src="<?php echo $videoUpload['url']; ?>" type="video/mp4">
                    </video>
                </div>
            <?php } ?>

            <?php if (!empty($button)) { ?>
                <div class="btn-wrapper">
                    <a class="btn btn-bright-blue btn-radius" href="<?php echo $button['url']; ?>"
                       target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>