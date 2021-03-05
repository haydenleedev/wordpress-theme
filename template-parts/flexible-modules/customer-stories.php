<?php
$sectionId  = get_sub_field('section_id');
$title      = get_sub_field('title');
$background = get_sub_field('background_image');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
?>

<?php if (have_rows('customer_stories')) { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="cards-grid customer-stories">
        <div class="with-background" <?php echo ($background) ? "style='background-image: url(" . $background['url'] . ")'" : ""; ?>>
            <div class="grid-container">
                <<?php echo $htag; ?> class="title"><?php echo $title; ?></<?php echo $htag; ?>>

                <div class="all-items cards">
                    <?php while (have_rows('customer_stories')) {
                        the_row();
                        $story = get_sub_field('story');

                        if($story) {
                            $post = $story;
                            setup_postdata($post);
                            $storyTitle = $post->post_title;
                            $storyText  = $post->post_content; ?>

                            <div class="card">
                            <a href="<?php echo get_permalink() ?>">
                                <img alt="<?php echo $storyTitle. ' presentation image'; ?>" src="<?php echo get_the_post_thumbnail_url(); ?>">
                            </a>
                                <div class="card-body">
                                    <h3 class="card__title">
                                    <a href="<?php echo get_permalink() ?>">    
                                    <?php echo $storyTitle ?>
                                    </a>
                                </h3>
                                    <div class="card__text">
                                        <p>
                                        <a href="<?php echo get_permalink() ?>"> 
                                            <?php echo $storyText; ?>
                                        </a>
                                    </p>
                                    </div>
                                    <a class="btn" href="<?php echo get_permalink() ?>">Read Full Story <i></i></a>
                                </div>
                            </div>
                        <?php wp_reset_postdata(); } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>