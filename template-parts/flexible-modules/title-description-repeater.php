<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$description = get_sub_field('description');
$button = get_sub_field('button');
$separator = get_sub_field('separator');
$repeater_separator = get_sub_field('repeater_separator');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
?>

<?php if ($title != '' || $description != '' || have_rows('repeater')) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="support">
        <div class="grid-container">
            <?php if (!empty($title)) { ?>
                <<?php echo $htag; ?> class="title"><?php echo $title; ?></<?php echo $htag; ?>>
            <?php } ?>

            <div class="description"><?php echo $description; ?></div>
            <?php if (!empty($button)) { ?>
                <div class="btn-container">
                    <a class="btn btn-bright-blue btn-radius" href="<?php echo $button['url']; ?>"
                       target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                </div>
            <?php } ?>

            <?php if ($separator) { ?>
                <div class="separator"></div>
            <?php } ?>

            <?php if (have_rows('repeater')) { ?>
                <div class="repeater<?php echo $repeater_separator ? ' column-separator' : ''; ?>">
                    <?php
                    $columnsCount = 0;

                    while (have_rows('repeater')) {
                        the_row();
                        $columnsCount++;
                    }

                    while (have_rows('repeater')) {
                        the_row();
                        $columnImageOrVideo = get_sub_field('use_image_or_video');
                        $columnTitle = get_sub_field('title');
                        $columnImage = get_sub_field('image');
                        $columnLink = get_sub_field('link');
                        $columnVideo = get_sub_field('video');
                        $altText = get_sub_field('alt_text');
                        $columnText = get_sub_field('text'); ?>

                        <div class="col <?php echo ($columnsCount > 1) ? 'col-md-4' : 'col-md-12'; ?>">
                            <?php
                            if (!$columnImageOrVideo) {
                                if (!empty($columnLink) && isset($columnImage['url'])) { ?>
                                    <a href="<?php echo $columnLink['url']; ?>"
                                       target="<?php echo $columnLink['target']; ?>">
                                        <img alt="<?php echo $altText; ?>" src="<?php echo $columnImage['url']; ?>">
                                    </a>
                                <?php } else {
                                    echo isset($columnImage['url']) ? '<img src="' . $columnImage['url'] . '" alt="'. $altText .'"/>' : '';
                                }
                            } else {
                                if (htmlspecialchars($_COOKIE["notice_preferences"]) == '1:' || htmlspecialchars($_COOKIE["notice_preferences"]) == '2:') {
                                    echo $columnVideo;
                                }
                            } ?>
                            <?php echo $columnTitle ? '<h2 class="repeater__title">' . $columnTitle . '</h2>' : ''; ?>
                            <?php echo $columnText ? '<div class="repeater__description">' . $columnText . '</div>' : ''; ?>

                            <?php if (!empty($columnLink)) { ?>
                                <a href="<?php echo $columnLink['url']; ?>"
                                   target="<?php echo $columnLink['target']; ?>" class="learn-more">More Info
                                    <i></i></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>
