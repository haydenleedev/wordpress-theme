<?php
$subscribe_box = get_field( 'subscribe_box', 'options' );
if ( $subscribe_box ) : ?>
    <div class="subscribe-box"><?php
        echo ( $subscribe_box['title'] ) ? '<h2>' . $subscribe_box['title'] . '</h2>' : '';
        echo ( $subscribe_box['description'] ) ? '<h3>' . $subscribe_box['description'] . '</h3>' : '';
        if ( $subscribe_box['form'] ) : ?>
            <div id="hs_cos_wrapper_my_form"
                 class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_form"
                 style="" data-hs-cos-general-type="widget"
                 data-hs-cos-type="form">
                <div id="hs_form_target_my_form"><?php echo $subscribe_box['form']; ?></div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>