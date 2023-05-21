<?php
$sectionId               = get_sub_field( 'section_id' );
$addingVideo  = get_sub_field( 'add_cloudinary_video' );
$video         = get_sub_field['video']; 
?>
<section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="text-center aligncenter">
<div class="round-image pt-30px pb-40px alignright">

    <video
        id="ujet-player-<?php echo $count; ?>"
        controls
        class="ujet-video-player" width="540" height="304">
    </video>

    <script>
    var player = [];

    var cld = cloudinary.Cloudinary.new({ cloud_name: "ujet-videos"});
    player['<?php echo $count; ?>'] = cld.videoPlayer('ujet-player-<?php echo $count; ?>', {
        "fluid": false,
        "controls": true,
        "muted": false,
        "colors": {
            "accent": "#ffffff"
        },
        "hideContextMenu": true,
        "autoplay": true,
        "showLogo": false,
        "loop": true,
        "transformation": {quality: "auto", width: 900, crop: "scale"}
    });

    var $videoSource = {
            publicId: '<?php echo $video; ?>'
        }
    player['<?php echo $count; ?>'].source($videoSource);


    var audio = $("#audio")[0];
    $("#div4").mouseenter(function() {
    audio.play();
    });
    </script>

</div>
<?php $count++;  ?>