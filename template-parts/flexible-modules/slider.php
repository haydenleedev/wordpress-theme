<?php
$sectionId = get_sub_field('section_id');
$sectionClass = get_sub_field('section_class');
$title = get_sub_field('title');
$useImageOrVideo = get_sub_field('use_image_or_video');
$slides = get_sub_field('slides');
$numberOfItemsPerSlide = get_sub_field('number_of_columns_per_slide');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";

if (!$numberOfItemsPerSlide) {
    $numberOfItemsPerSlide = 1;
}
?>

<?php if ($slides) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="slider section <?php echo $sectionClass; ?>">

        <?php if (!empty($title)) { ?>
            <<?php echo $htag; ?> class="section-title"><?php echo $title; ?></<?php echo $htag; ?>>
        <?php } ?>

        <div class="slider grid-container">
            <?php
            $index = 0;
            $maxNumberOfSlides = count($slides) / $numberOfItemsPerSlide;
            //for ($i = 0; $i < $maxNumberOfSlides; $i++) { ?>
            <?php
            $counter = 0;
            while ($index < count($slides)) {
                $slideSubtitle = $slides[$index]['subtitle'];
                $slideTitle = $slides[$index]['title']; ?>
                <?php if (!$useImageOrVideo) {
                    $slideMedia = $slides[$index]['image'];
                    $altText = $slides[$index]['alt_text'];
                    $slideLink = $slides[$index]['link']; ?>
                    <div class="slide__content">

                        <div class="slide__media slide__image">
                        <?php echo (!empty($slideLink)) ? '<a href="' . $slideLink['url'] . '" target="' . $slideLink['target'] . '">' : ''; ?>
                            <img alt="<?php echo $altText; ?>" src="<?php echo $slideMedia['url']; ?>">
                            <?php echo (!empty($slideLink)) ? '</a>' : ''; ?>
                        </div>
                        

                        
                                <div class="slide__subtitle">
                                <?php echo (!empty($slideLink)) ? '<a href="' . $slideLink['url'] . '" target="' . $slideLink['target'] . '">' : ''; ?>
                                    <?php echo $slideSubtitle; ?>
                                    <?php echo (!empty($slideLink)) ? '</a>' : ''; ?>
                            </div>
                                

                                <div class="blue-line"></div>
                                <div class="slide__text">
                                
                                <?php echo (!empty($slideLink)) ? '<a href="' . $slideLink['url'] . '" target="' . $slideLink['target'] . '">' : ''; ?>
                                <?php echo $slideTitle; ?>
                                <?php echo (!empty($slideLink)) ? '</a>' : ''; ?>

                                <p class="read-more">

                                <?php echo (!empty($slideLink)) ? '<a href="' . $slideLink['url'] . '" target="' . $slideLink['target'] . '">' : ''; ?>
                                Read more > 
                                <?php echo (!empty($slideLink)) ? '</a>' : ''; ?>
                                
                                <p>
                                </div>

                        

                    </div>
                <?php } else {
                    $slideMedia = $slides[$index]['video']; ?>
                    <div class="slide__content">
                        <div class="slide__media slide__video">
                            <?php if (htmlspecialchars($_COOKIE["notice_preferences"]) == '1:' || htmlspecialchars($_COOKIE["notice_preferences"]) == '2:') {
                                echo $slideMedia;
                            } ?>
                        </div>

                        <div class="slide__subtitle"><?php echo $slideSubtitle; ?></div>
                        <div class="slide__text"><?php echo $slideTitle; ?></div>

                    </div>
                <?php } ?>
                <?php
                $index++;
                $counter++;
            } ?>
            <?php //} ?>
        </div>
        <?php if (count($slides) > 3) { ?>
            <ul class="paginator">
                <li class="previous ">
                    <img class="circular--square" alt="previous slide arrow"
                         src="<?php echo get_stylesheet_directory_uri() ?>/dist/images/previous.svg"/></li>
                <li class="next ">
                    <img class="circular--square" alt="next slide arrow"
                         src="<?php echo get_stylesheet_directory_uri() ?>/dist/images/next.svg"/>
                </li>
            </ul>
        <?php } ?>
    </section>
<?php } ?>
