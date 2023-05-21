<?php
$footerForm = get_field('footer_form');

if ($footerForm) {

    $title = $footerForm['title'] ? $footerForm['title'] : "I Want to Learn More";
    $htag       = ( $footerForm['htag'] ) ? $footerForm['htag'] : "h2";
    $formShortcode = $footerForm['form_shortcode'];
    $bgColor = $footerForm['bg_color'] ? ' ' . $footerForm['bg_color'] : ' bg-f0f6ff';
    ?>

    <?php if($formShortcode) { ?>
         <!-- form -->
         <a name="" id="form-go">
    <section class="form-center">
        <div class="col-center form-shortcode form-with-image form-with-text ptb-30px mt-40px<?php echo $bgColor; ?>">
            <<?php echo $htag; ?> class="form-title text-center text-600"><?php echo $title; ?></<?php echo $htag; ?>>   

            <?php echo $formShortcode; ?>

            <!--
                <script src="//info.ujet.co/js/forms2/js/forms2.min.js"></script>

                <form id="mktoForm_1486" class="aligncenter"></form><script>MktoForms2.loadForm("//info.ujet.co", "205-VHT-559", 1486);</script><script>
                MktoForms2.whenRendered(function (form){
                form.getFormElem()
                .find('button.mktoButton')
                .html('Contact Me');
                });
                </script>
            -->

        </div>
    </section>
        <!-- form -->
    <?php } ?><!-- } else { -->

<?php } ?>