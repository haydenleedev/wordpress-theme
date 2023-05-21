<?php
$sectionId = get_sub_field('section_id');
$image = get_sub_field('image');
$altText = get_sub_field('alt_text');
$title = get_sub_field('title');
$text = get_sub_field('text');
$formTitle = get_sub_field('form_title');
$formDescription = get_sub_field('form_description');
$formShortcode = get_sub_field('form_shortcode');
$htag       = ( get_sub_field('htag') ) ? get_sub_field('htag') : "h1";
$class = ( get_sub_field('class') ) ? get_sub_field('class') : " text-center";
?>

<?php if ($formShortcode != '') { ?>
    <section<?php echo ($sectionId != '') ? ' id="' . $sectionId . '"' : ''; ?> class="form-with-image form-with-text">
        <div class="grid-container">
            <div class="row">
                <?php if ($title != '' || $text != '') { ?>
                    <div class="col-left form-description">
                        <div class="description-container">

                        <?php if ($image['url'] != '') { ?>
                            <img class="left-logo-image" src="<?php echo $image['url']; ?>" alt="<?php echo $altText; ?>">
                            <?php } ?>

                            <?php if ($title != '') { ?>
                            <<?php echo $htag; ?> class="text-30px text-600<?php echo $class; ?>"><?php echo $title; ?></<?php echo $htag; ?>>
                            <?php } ?>

                            <div class="text"><?php echo $text; ?></div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-right form-shortcode ">
                    <div class="form-background">
                        <div class="info">
                        <?php if (!empty($formTitle)) { ?>
                            <h2 class="form-title"><?php echo $formTitle; ?></h2>
                         <?php } ?>
                            <div class="form-description"><?php echo $formDescription; ?></div>
                        </div>

                        <!-- START: Form Design -->
                        <div class="form-container">
                        <form action="">
                        <fieldset class="row">
                            <div class="col col-2">
                            <label htmlFor="email">
                                <span class="required">*</span> Email
                            </label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                autoComplete="email"
                                maxLength="50"
                                data-validate="email required"
                                aria-required="true"
                                required
                            />
                            </div>
                            <div class="col col-2">
                            <label htmlFor="phone">
                                <span class="required">*</span> Phone Number
                            </label>
                            <input
                                type="tel"
                                name="phone"
                                id="phone"
                                title="Phone Number"
                                required=""
                                minLength="3"
                            ></input>
                            </div>
                        </fieldset>

                        <fieldset class="row">
                            <div class="col col-2">
                            <label htmlFor="firstName">
                                <span class="required">*</span> First Name
                            </label>
                            <input
                                type="text"
                                name="firstName"
                                id="firstName"
                                autoComplete="firstName"
                                maxLength="50"
                                data-validate="firstName required"
                                aria-required="true"
                                required
                            />
                            </div>
                            <div class="col col-2">
                            <label htmlFor="lastName">
                                <span class="required">*</span> Last Name
                            </label>
                            <input
                                type="text"
                                name="lastName"
                                id="lastName"
                                autoComplete="lastName"
                                maxLength="50"
                                data-validate="lastName required"
                                aria-required="true"
                                required
                            />
                            </div>
                        </fieldset>

                        <fieldset class="row">
                            <div class="col col-2">
                            <label htmlFor="firstName">
                                <span class="required">*</span> Company Name
                            </label>
                            <input
                                type="text"
                                name="companyName"
                                id="companyName"
                                autoComplete="companyName"
                                maxLength="50"
                                data-validate="companyName required"
                                aria-required="true"
                                required
                            />
                            </div>
                            <div class="col col-2">
                            <label htmlFor="lastName">
                                <span class="required">*</span> Job Title
                            </label>
                            <input
                                type="text"
                                name="jobTitle"
                                id="jobTitle"
                                autoComplete="jobTitle"
                                maxLength="50"
                                data-validate="jobTitle required"
                                aria-required="true"
                                required
                            />
                            </div>
                        </fieldset>

                        <fieldset class="row">
                            <div class="col w-100">
                            <label htmlFor="employees">
                                <span class="required">*</span> # of Employees
                            </label>
                            <input
                                type="text"
                                name="employees"
                                id="employees"
                                autoComplete="employees"
                                maxLength="50"
                                data-validate="employees required"
                                aria-required="true"
                                required
                            />
                            </div>
                        </fieldset>

                        <div class="col">
                            <label htmlFor="subscriber" class="booleancheckbox">
                            <input
                                id="subscriber"
                                type="checkbox"
                                name="subscriber_to_the_ujet_blog"
                                value="true"
                            />
                            <span class="check">
                                Subscribe to UJET's marketing blog{" "}
                            </span>
                            </label>
                        </div>

                        <div class="col mb-10px">
                            <label
                            htmlFor="permission-received"
                            class="booleancheckbox d-flex"
                            >
                            <input
                                name="permission-received"
                                type="checkbox"
                                value="checked"
                                id="permission-received"
                            />
                            <span class="check">
                                <span class="required">* </span>
                                By proceeding I agree to{" "}
                                <a href="#" class="bold mlr-5px"
                                UJET's Privacy Statement
                                </a>
                                and
                                <a href="#" class="bold mlr-5px">
                                Terms of Services.
                                </a>
                            </span>
                            </label>
                        </div>
                        <p class="paragraph">
                            We&#x27;re commited to your privacy. UJET uses the information you
                            provide to us to contact you about our relevant content, products,
                            and services. You may unsubscribe from these communications at any
                            time. For more information, check out our{" "}
                            <a href="#" class="bold mlr-5px">
                            Privacy Policy.
                            </a>
                        </p>
                        <div class="col">
                            <button class="btn-navy btn-big" value="Submit" ></button>
                        </div>
                        </form>
                    </div>
                        <!-- END: Form Design -->

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>