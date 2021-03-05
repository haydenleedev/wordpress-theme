<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$background = get_sub_field('background_image');
$postSlug = get_sub_field('post_slug');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
?>

<?php if ($postSlug != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="posts-with-specific-categories">
        <div class="with-background" <?php echo ($background) ? "style='background-image: url(" . $background['url'] . ")'" : ""; ?>>
            <<?php echo $htag; ?> class="section-title"><?php echo $title; ?></<?php echo $htag; ?>>

            <?php
            $args = array(
                    'posts_per_page' => -1,
                    'cat' => $postSlug
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) { ?>
                <div class="slider grid-container">
                    <?php
                    while ($query->have_posts()) {
                        $query->the_post(); ?>

                        <div class="slide__content">
							
							
                            <div class="slide__top">
                                <div class="slide__top--category">

                                <?php if (get_field('use_post_link_or_external_link') != '' && get_field('post_external_link') != '') {
                                    $postExternalLink = get_field('post_external_link'); ?>
                                    <a class="anchor"  href="<?php echo $postExternalLink['url'] ?>"
                                       target="<?php echo $postExternalLink['target'] ?>">
                                <?php } else { ?>
                                    <a class="anchor"  href="<?php echo get_permalink() ?>"
                                       target="_self">
                                <?php } ?>
                                    <?php echo get_the_category()[0]->name; ?>
                                </a>

                                </div>
                                <div class="slide__top--date">

                                <?php if (get_field('use_post_link_or_external_link') != '' && get_field('post_external_link') != '') {
                                    $postExternalLink = get_field('post_external_link'); ?>
                                    <a class="anchor"  href="<?php echo $postExternalLink['url'] ?>"
                                       target="<?php echo $postExternalLink['target'] ?>">
                                <?php } else { ?>
                                    <a class="anchor"  href="<?php echo get_permalink() ?>"
                                       target="_self">
                                <?php } ?>
                                    <?php echo get_the_date(); ?>
                                </a>
                                </div>
                            </div>
                            <?php if (get_field('post_card_tag') != '') { ?>
                                <div class="slide__tag">

                                <?php if (get_field('use_post_link_or_external_link') != '' && get_field('post_external_link') != '') {
                                    $postExternalLink = get_field('post_external_link'); ?>
                                    <a class="anchor"  href="<?php echo $postExternalLink['url'] ?>"
                                       target="<?php echo $postExternalLink['target'] ?>">
                                <?php } else { ?>
                                    <a class="anchor"  href="<?php echo get_permalink() ?>"
                                       target="_self">
                                <?php } ?>
                                    <?php echo get_field('post_card_tag'); ?>
                                </a>
                                
                                </div>
                            <?php } ?>

                            <div class="slide__title">

                            <?php if (get_field('use_post_link_or_external_link') != '' && get_field('post_external_link') != '') {
                                    $postExternalLink = get_field('post_external_link'); ?>
                                    <a class="anchor"  href="<?php echo $postExternalLink['url'] ?>"
                                       target="<?php echo $postExternalLink['target'] ?>">
                                <?php } else { ?>
                                    <a class="anchor"  href="<?php echo get_permalink() ?>"
                                       target="_self">
                                <?php } ?>
                                <?php echo get_the_title(); ?>
                                </a>
                            </div>
                            <div class="link pl-20px text-600 text-blue">

                                <?php if (get_field('use_post_link_or_external_link') != '' && get_field('post_external_link') != '') {
                                    $postExternalLink = get_field('post_external_link'); ?>

                                    <?php if (get_field('use_post_link_or_external_link') != '' && get_field('post_external_link') != '') {
                                    $postExternalLink = get_field('post_external_link'); ?>
                                    <a class="anchor"  href="<?php echo $postExternalLink['url'] ?>"
                                       target="<?php echo $postExternalLink['target'] ?>">
                                <?php } else { ?>
                                    <a class="anchor"  href="<?php echo get_permalink() ?>"
                                       target="_self">
                                <?php } ?>
                                        <?php echo $postExternalLink['title']; ?><i></i>
                                    </a>


                                <?php } else { ?>

                                    <?php if (get_field('use_post_link_or_external_link') != '' && get_field('post_external_link') != '') {
                                    $postExternalLink = get_field('post_external_link'); ?>
                                    <a class="anchor"  href="<?php echo $postExternalLink['url'] ?>"
                                       target="<?php echo $postExternalLink['target'] ?>">
                                <?php } else { ?>
                                    <a class="anchor"  href="<?php echo get_permalink() ?>"
                                       target="_self">
                                <?php } ?>
                                    <?php echo __("Read More"); ?><i></i>
                                </a>


                                <?php } ?>
                            </div>

                          

                        </div>
                       
                    <?php } ?>
                </div>

                <ul class="paginator" >
                    <li class="previous <?php echo ($sectionId != '') ? $sectionId : ''; ?>">
                        <img class="circular--square"
                             src="<?php echo get_stylesheet_directory_uri() ?>/dist/images/previous.svg"/></li>
                    <li class="next <?php echo ($sectionId != '') ? $sectionId : ''; ?>">
                        <img class="circular--square"
                             src="<?php echo get_stylesheet_directory_uri() ?>/dist/images/next.svg"/>
                    </li>
                </ul>
                <ul class="paginator-white" >
                    <li class="previous-white <?php echo ($sectionId != '') ? $sectionId : ''; ?>">
                        <img class="circular--square"
                             src="<?php echo get_stylesheet_directory_uri() ?>/dist/images/previous-white.svg"/></li>
                    <li class="next-white <?php echo ($sectionId != '') ? $sectionId : ''; ?>">
                        <img class="circular--square"
                             src="<?php echo get_stylesheet_directory_uri() ?>/dist/images/next-white.svg"/>
                    </li>
                </ul>
            <?php }
            wp_reset_postdata(); ?>
        </div>
    </section>
<?php } ?>