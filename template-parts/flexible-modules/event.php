<?php
$sectionId = get_sub_field( 'section_id' );
$title     = get_sub_field( 'title' );
$events    = get_sub_field( 'events' );
$currentDateTime = date ( "Ymd");
?>

<?php if (!empty($events)) { ?>
    <section<?php echo ( $sectionId != '' ) ? ' id="' . $sectionId . '"' : ''; ?> class="events-section">
        <div class="grid-container">
            <h1 class="section-title"><?php echo $title; ?></h1>

            <div class="events all-items">

            <?php // echo "current date: " . $currentDateTime ; ?>

                <?php
                while (have_rows( 'events' )) {
                    the_row();
                    $event = get_sub_field('event');
                    

                    if ($event) {
                        $post = $event;
                        setup_postdata($post);
                        $eventId       = $post->ID;
                        //$eventImage    = get_field("image");
                       // $altText = get_field('alt_text');
                        $eventDate     = get_field("event_date");
                        $eventEndDate     = get_field("event_end_date");
                        $eventEndDateUnix = date ( "Ymd", strtotime(get_field("event_end_date")));
                        $eventType = get_field("event_type");
                        $eventLocation = get_field("event_location");
                        $eventLink     = get_field("event_link");
                        $eventTitle = get_field("event_title");
                        $eventDescription = get_field("event_description");

                        // echo "event end: " . $eventEndDateUnix;
                        
                        if ($currentDateTime <= $eventEndDateUnix) {
                        ?>



                        <div class="event clearfix">
                            
                            <div class="col p-30px">
                                <div class="event__type mb-20px">
                                    <?php echo $eventType; ?>
                                </div>
                                <div class="event__title text-24px text-600 mb-20px">
                                    <?php echo $eventTitle; ?>
                                </div>
                                <div class="event__description text-16px mb-20px">
                                    <?php echo $eventDescription; ?>
                                </div>
								
								
                                <?php if ($eventLocation != "") { ?>
                                <div class="event__location mb-20px">
                                <span class="icon"></span> <?php echo $eventLocation; ?>
                                </div>
                                <?php }?>
								
								
                                <div class="event__date text-16px text-600 mb-20px">
                                <span class="icon"></span><?php echo $eventDate . " PT <span class=\"longdash\">- </span>" . $eventEndDate . " PT"; ?>
                                </div>
                                
                                <div class="event__link btn-orange">
                                    <?php if ($eventLink['url'] != "") { ?>
                                        <a href="<?php echo $eventLink['url']; ?>" target="<?php echo $eventLink['target']; ?>"><?php echo $eventLink['title']; ?></a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>



                        <?php
                        } // if ($currentDateTime < $eventEndDate)) {
                            else {
                                echo "<p class=\"text-center\">There are no upcoming events.  Please check back soon.</p>";
                            }

                        wp_reset_postdata();
                    }
                } ?>
            </div>
        </div>
    </section>
<?php } ?>
