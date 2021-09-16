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
                        
                        <form name="formname" action="" method="post">
					<input type="hidden" name="formId" value="10523" />
					<input type="hidden" name="form_url" value="https://www.apple.com/feedback/iphone.html" />
					<input type="hidden" name="thankyou" value="https://www.apple.com/feedback/iphone_thankyou.html" />
					<input type="hidden" name="product" value="iPhone" />
					<ul class="inputs">
                        <li>
                            <label for="Email">Email Address:</label>
                            <span class="formwrap"><input type="text" id="Email" name="Email" maxlength="50" class="validate-required-email required" />
                                <i aria-hidden="true">Required</i>
                            </span>
                        </li>
						<li>
                            <label for="FirstName">First Name:</label>
                            <span class="formwrap"><input type="text" id="FirstName" name="FirstName" maxlength="50" class="required" />
                                <i aria-hidden="true">Required</i>
                            </span>
                        </li>
                        <li>
                            <label for="LastName">Last Name:</label>
                            <span class="formwrap"><input type="text" id="LastName" name="LastName" maxlength="50" class="required" />
                                <i aria-hidden="true">Required</i>
                            </span>
                        </li>
                        <li>
                            <label for="Title">Job Title:</label>
                            <span class="formwrap"><input type="text" id="Title" name="Title" maxlength="250" class="required" />
                                <i aria-hidden="true">Required</i>
                            </span>
                        </li>
                        <li>
                            <label for="Company">Company Name:</label>
                            <span class="formwrap"><input type="text" id="Company" name="Company" maxlength="250" class="required" />
                                <i aria-hidden="true">Required</i>
                            </span>
                        </li>


                        <li class="dropdown">
                            <label for="feedback_type"># of Employees:</label>
                            <select name="feedback_type" class="required">
                                <option value="">Select # of Employees:</option>
                                <option value="0-49">0-49</option>
                                <option value="0-49">0-49</option>
                                <option value="0-49">0-49</option>
                                <option value="0-49">0-49</option>
                                <option value="0-49">0-49</option>
                                <option value="0-49">0-49</option>
                                <option value="0-49">0-49</option>
                            </select>
                            <i>Required</i>
                            <span></span>
                        </li>

                        <li id="comments" class="comments">
                            <label for="feedback_comment">Comments:</label>
                            <span class="formwrap"><textarea id="feedback_comment" name="feedback_comment" class="required" maxlength="800"></textarea></span>
                            <i>Required</i>
                        </li>

                        <li class="dropdown">
                            <label for="ios_version">Which version of iOS are you using?</label>
                                <select class="form-dropdown" name="ios_version" id="ios_version">
                                    <option value="">Select Version:</option>
                                    <option value="iOS 14.5">iOS 14.5</option>
                            </select>
                            <span></span>
                        </li>

						<li class="dropdown">
							<label for="os_version">If you have a problem syncing your iPhone with your computer, which operating system are you using?</label>
							<select id="os_version" name="os_version">
								<option value="">Select Version:</option>
								<option value="macOS Big Sur 11.2.3">macOS Big Sur 11.2.3</option>
								<option value="" disabled="disabled">— — — — — — — — — —</option>
								<option value="Windows 10">Windows 10</option>
                                <option value="Earlier versions of Windows">Earlier versions of Windows</option>
								<option value="" disabled="disabled">— — — — — — — — — —</option>
								<option value="Other">Other</option>
							</select>
							<span></span>
						</li>
					</ul>
					<input type="submit" name="submit" value="Submit Feedback" class="submit" />
					<p class="sosumi policy">Please read <a href="/legal/intellectual-property/policies/ideas.html">Apple’s Unsolicited Idea Submission Policy</a> before you send us your feedback.</p>

				</form>



                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>