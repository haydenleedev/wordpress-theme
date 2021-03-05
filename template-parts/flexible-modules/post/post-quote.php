<?php
$sectionId = get_sub_field('section_id');
$text = get_sub_field('text');
$author = get_sub_field('author');

?>

<?php if ($text != '' || $author != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="post-quote">
        <div class="gray-background">
            <div class="quote smaller-grid-container">
                <h2 class="quote__text"><?php echo $text; ?></h2>
                <div class="quote__author"><?php echo $author; ?></div>
            </div>
        </div>
    </section>
<?php } ?>
