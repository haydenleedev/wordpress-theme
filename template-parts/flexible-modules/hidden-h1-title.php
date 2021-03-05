<?php
$title      = get_sub_field('title');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
?>

<?php if ($title != '') { ?>
            <<?php echo $htag; ?> class="off-screen"><?php echo $title; ?></<?php echo $htag; ?>>

<?php } ?>
