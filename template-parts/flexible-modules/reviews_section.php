<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$slides = get_sub_field('slides');
$button = get_sub_field('button');
$numberOfItemsPerSlide = get_sub_field('number_of_columns_per_slide');

if (!$numberOfItemsPerSlide) {
    $numberOfItemsPerSlide = 1;
}
?>

<?php if ($title != '' && $slides) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="reviews-slider">
        <h1 class="section-title"><?php echo $title; ?></h1>

        <div class="slider grid-container">
            <?php
            $index = 0;
            $maxNumberOfSlides = count($slides) / $numberOfItemsPerSlide;
            //for ($i = 0; $i < $maxNumberOfSlides; $i++) { ?>
            <?php
            $counter = 0;
            while ($index < count($slides)) {
                $slideReview = $slides[$index]['review'];
                $slideTitle = $slides[$index]['title'];
                $slideReviewer = $slides[$index]['reviewer'];
                $slideRating = $slides[$index]['rating'];
//                $slideMedia = $slides[$index]['image'];
                $slideLink = $slides[$index]['link']; ?>
                <div class="slide__content">
                    <?php echo (!empty($slideLink)) ? '<a href="' . $slideLink['url'] . '" target="' . $slideLink['target'] . '">' : ''; ?>
                    <div class="slide__media slide__image">
<!--                        <img src="--><?php //echo $slideMedia['url']; ?><!--" alt="Slider image">-->

                        <div class="review-rating star-rating">
                            <?php
                            for ($star = 0; $star < 5; $star++) {
                                echo '<span class="one-star';
                                if ($slideRating == ($star + 0.5)) {
                                    echo '-half-empty';
                                } elseif ($slideRating < ($star + 0.5)) {
                                    echo '-o';
                                };
                                echo '"></span>';
                            };
                            ?>
                        </div>
                    </div>

                    <div class="slide__text"><?php echo $slideTitle; ?></div>

                    <div class="slide__review"><?php echo $slideReview; ?></div>

                    <div class="slide__reviewer"><?php echo $slideReviewer; ?></div>
                    <a class="slide__link" href="<?php echo $slideLink['url']; ?>" target="<?php echo $slideLink['target']; ?>"><?php echo $slideLink['title']; ?> <i></i></a>
                </div>

                <?php
                $index++;
                $counter++;
            } ?>
            <?php //} ?>
        </div>
        <?php if (count($slides) > 3) { ?>
            <ul class="paginator">
                <li class="previous <?php echo ($sectionId != '') ? $sectionId : ''; ?>">
                    <img class="circular--square"
                         src="<?php echo get_stylesheet_directory_uri() ?>/dist/images/previous.svg"/></li>
                <li class="next <?php echo ($sectionId != '') ? $sectionId : ''; ?>">
                    <img class="circular--square"
                         src="<?php echo get_stylesheet_directory_uri() ?>/dist/images/next.svg"/>
                </li>
            </ul>
        <?php } ?>

        <?php if (!empty($button)) { ?>
            <div class="btn-container">
                <a class="btn btn-bright-blue btn-radius" href="<?php echo $button['url']; ?>"
                   target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
            </div>
        <?php } ?>
    </section>
<?php } ?>
