<?php
$displayDifferentImages = get_sub_field( 'display_different_images' );
$sectionId              = get_sub_field( 'section_id' );
$sectionImage           = get_sub_field( 'section_image' );
$testimonials           = get_sub_field( 'testimonials' );
$altText                = get_sub_field( 'alt_text' );
$count_sliders          = 0;

?>

<?php if ( have_rows( 'testimonials' ) ) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="slider">


        <div class="testimonials grid-container <?php echo $displayDifferentImages ? 'testimonials-different-images' : 'testimonials-same-image'; ?>">
            <?php
            // display the same image for all quotes
            if ( ! $displayDifferentImages ) { ?>
                <div class="testimonials-image">
                    <img alt="<?php echo $altText; ?>" class="circular--square" src="<?php echo $sectionImage['url']; ?>"/>
                </div>
            <?php } ?>

            <div class="testimonial">

                <?php while ( have_rows( 'testimonials' ) ) {
                    the_row();
                    $count_sliders ++;
                    $testimonialTitle          = get_sub_field( 'title' );
                    $testimonialText           = get_sub_field( 'text' );
                    $testimonialImage          = get_sub_field( 'quote_image' );
                    $testimonialAuthorName     = get_sub_field( 'author_name' );
                    $testimonialAuthorPosition = get_sub_field( 'author_position' );
                    $testimonialAuthorCompany  = get_sub_field( 'author_company' );
                    $altText                   = get_sub_field( 'alt_text' );
                    $slideRating               = get_sub_field( 'rating' );

                    ?>
                    <div class="col-md-6">
                        <?php
                        // display different images for all quotes
                        if ( $displayDifferentImages && ! empty( $testimonialImage ) ) { ?>
                            <div class="testimonial-image">
                                <img alt="<?php echo $altText; ?>" class="circular--square" src="<?php echo $testimonialImage['url']; ?>"/>
                            </div>
                        <?php } ?>

                        <?php if ( $slideRating > 0 ) { ?>
                        <div class="review-rating star-rating">
                            <?php
                            for ( $star = 0; $star < 5; $star ++ ) {
                                echo '<span class="one-star';
                                if ( $slideRating == ( $star + 0.5 ) ) {
                                    echo '-half-empty';
                                } elseif ( $slideRating < ( $star + 0.5 ) ) {
                                    echo '-o';
                                };
                                echo '"></span>';
                            };
                            ?>
                        </div>
                        <?php } ?>

                        <?php if ( ! empty( $testimonialTitle ) ) { ?>
                            <h2 class="testimonial__title"><?php echo $testimonialTitle; ?></h2>
                        <?php } ?>

                        <?php if ( ! empty( $testimonialText ) ) { ?>
                            <div class="testimonial__text"><?php echo $testimonialText; ?></div>
                        <?php } ?>

                        <?php if ( ! empty( $testimonialAuthorName ) ) { ?>
                            <div class="testimonial__author"><?php echo $testimonialAuthorName; ?></div>
                        <?php } ?>

                        <?php if ( ! empty( $testimonialAuthorPosition ) ) { ?>
                            <div class="testimonial__author--position"><?php echo $testimonialAuthorPosition; ?></div>
                        <?php } ?>

                        <?php if ( ! empty( $testimonialAuthorCompany ) ) { ?>
                            <div class="testimonial__author--company"><?php echo $testimonialAuthorCompany; ?></div>
                        <?php } ?>

                    </div>

                <?php } ?>
            </div>


            <?php if ( $count_sliders > 1 ) { ?>
                <ul class="paginator">
                    <li class="previous"><img alt="previous slide" class="circular--square"
                                              src="<?php echo get_stylesheet_directory_uri() ?>/dist/images/previous.svg"/>
                    </li>
                    <li class="next"><img alt="next slide" class="circular--square"
                                          src="<?php echo get_stylesheet_directory_uri() ?>/dist/images/next.svg"/></li>
                </ul>
            <?php } ?>
        </div>
    </section>
<?php } ?>