<?php
$sectionId  = get_sub_field('section_id');
$title      = get_sub_field('title');
$text       = get_sub_field('text');
$image      = get_sub_field('image');
$altText = get_sub_field('alt_text');
$button     = get_sub_field('button');
$background = get_sub_field('background_image');
$btnAlign      = get_sub_field( 'btn_align' );
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h2";

?>

<?php if ($title != '' || $text != '') { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="colored-section">
        <div class="with-background bg-gradient-blue" <?php echo ($background) ? "style='background-image: url(" . $background['url'] . ")'" : ""; ?>>
            <div class="grid-container">
                <div class="row<?php echo ( $btnAlign  ) ? ' text-center' : '  text-left'; ?>" >
                    <div class="<?php echo ($image) ? 'col-md-6 text-right' : 'col-md-12 text-center big-text'; ?> details">

                        <?php if (!empty($title)) { ?>
                            <<?php echo $htag; ?> class="title"><?php echo $title; ?></<?php echo $htag; ?>>
                        <?php } ?>

                        <div class="text"><?php echo $text; ?></div>
                       
                    </div>
                    <?php if($image) { ?>
                        <div class="col-md-6 image">
                            <img alt="<?php echo $altText; ?>" src="<?php echo $image['url']; ?>" width="180" height="54">
                        </div>
                    <?php } ?>

                    <?php if(!empty($button)) { ?>
                            <a class="btn btn-blue btn-radius mt-40px" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                        <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
