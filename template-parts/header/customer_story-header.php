<?php
/**
 * Displays the customer story header
 *
 * @package    WordPress
 * @subpackage Twenty_Nineteen
 * @since      1.0.0
 */
?>

<?php
$hero = get_field('hero');
if ($hero) {
    $sectionId  = $hero['section_id'];
    $background = $hero['hero_image'];
    ?>

    <div <?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?>
         class="customer-story-header"<?php if ( !empty($background) ) : ?>
        style="background-image: url('<?php echo $background['url']; ?>');"<?php endif; ?>>
    </div>
<?php } ?>
