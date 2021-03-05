<?php
$sectionId = get_sub_field( 'section_id' );
$title     = get_sub_field( 'title' );
?>

<?php if ( have_rows( 'featured_articles' ) ) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="featured-articles">
        <div class="smaller-grid-container">
            <h3 class="title"><?php echo $title; ?></h3>

            <div class="all-items">
                <?php while ( have_rows( 'featured_articles' ) ) {
                    the_row();
                    $article = get_sub_field( 'featured_article' );

                    if ( $article ) {
                        $post = $article;
                        setup_postdata( $post );
                        $articleStatus = $post->post_status;
                        $articleTitle  = $post->post_title;
                        $articleText   = $post->post_content;

                        if ( $articleStatus === 'publish' ) { ?>

                            <div class="item">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                <div class="card-body">
                                    <h3 class="card__title"><?php echo $articleTitle ?></h3>
                                    <div class="card__text">
                                        <p><?php echo $articleText; ?></p>
                                    </div>
                                    <a class="btn" href="<?php echo get_permalink() ?>">Read full story</a>
                                </div>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                    } ?>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>