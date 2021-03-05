<?php
$sectionId = get_sub_field('section_id');
$title = get_sub_field('title');
$text = get_sub_field('text');
$image = get_sub_field('image');
$button = get_sub_field('button');
$background = get_sub_field('background_image');

?>

<?php if ($title != '' || $text != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="card-section">
        <div class="with-background" <?php echo ($background) ? "style='background-image: url(" . $background['url'] . ")'" : ""; ?>>

            <div class="grid-container">
                <div class="row card">
                    <div class="col-md-6 card-details">
                        <h2 class="card-title"><?php echo $title; ?></h2>
                        <div class="card-text"><?php echo $text; ?></div>
                        <a class="btn btn-bright-blue btn-radius" href="<?php echo $button['url']; ?>"
                           target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                    </div>
                </div>
            </div>
            <div class="row card">
                <div class="col-md-6 card-image">
                    <div class="side-background-image" <?php echo ($image) ? "style='background-image: url(" . $image['url'] . ")'" : ""; ?>></div>
                </div>
            </div>

        </div>
    </section>
<?php } ?>
<script>
    $(document).ready(function () {
        var height = $('.card-section').height();
        console.log(height);
        $('.card-image').css("height", height);
    });

</script>
