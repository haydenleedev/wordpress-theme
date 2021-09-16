<?php
$title = get_sub_field('title');
$text = get_sub_field('description');
$background = get_sub_field('image');
$button = get_sub_field('link');

?>
<style>.popup-bg{
    <?php echo ($background) ? "background-image: url(" . $background['url'] . ")" : ""; ?>
    }
</style>
<?php if ($title != '' || $text != '') { ?>
    <section class="popup off-screen" id="popup">
        <div class="popup-overlay" id="popup-overlay"><span class="off-screen">Close Popup</span></div>
        <div class="popup-wrap popup-bg" id="popup-wrap">
        <button class="close-btn" id="close-btn" tabindex="-1">&times;</button>
            <div class="content-padding">
            <a class="popup-ad" id="popup-ad" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" rel="follow" data-analytics-region="<?php echo $button['title']; ?>" aria-hidden="true" tabindex="-1"><span class="off-screen">Popup Ad</span></a>
            <div class="popup-content">   
                <h2 class="popup-title text-16px text-orange"><?php echo $title; ?></h2>
                <div class="popup-text text-30px text-white"><?php echo $text; ?></div>
                <div class="popup-btn-wrap btn-orange close-popup">
                    <span class="btn btn-radius orange-static-btn"><?php echo $button['title']; ?></aspan>
                </div>
            </div>  
        </div>

        </div>
    </section>
<?php } ?>
<script>
    function assignCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    $(document).ready(function () {
        const popUpContainer = document.getElementById("popup");
        const clickAdArea = document.getElementById("popup-ad")
        function goToAd(e) {
            e.preventDefault();
            e.stopPropagation();
            popUpContainer.remove();
            assignCookie("Remove-popUp-Timer", "remove-it", 1);

            setTimeout(
                function(){ 
                    window.location.assign("<?php echo $button['url']; ?> ");   
            }, 0);
        }
    clickAdArea.addEventListener('click', goToAd);
    });

</script>
