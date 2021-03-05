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
    $background = $hero['hero_image'];
    ?>
    <img class="integration-logo" src="<?php echo $background['url']; ?>" width="200" height="94">

<?php } ?>
