<?php
$sectionId  = get_sub_field('section_id');
$statistics = get_sub_field('statistics');
?>

<?php if ( have_rows('statistics') ) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="post-statistics">
        <div class="smaller-grid-container stats-row"">
            <div class="stats row">
                <?php while ( have_rows( 'statistics' ) ) {
                    the_row();
                    $statTextOrImage = get_sub_field('text_or_image');
                    $statTitle       = get_sub_field('title');
                    $statImage       = get_sub_field('image');
                    $statDescription = get_sub_field('description'); ?>

                    <div class="stat">
                        <div class="stat__heading">
                            <?php if($statTextOrImage) { ?>
                                <?php echo $statImage['url'] ? '<img src="' . $statImage['url'] . '"/>' : ''; ?>
                            <?php } else {
                                echo  $statTitle;
                            } ?>
                        </div>
                        <div class="stat__description"><?php echo $statDescription; ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>
