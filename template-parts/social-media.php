<?php

/**
 * Template for Social Media Feed.
 *
 * This is the default hero image for page templates, called
 * 'block'. Strictly air specific.
 *
 * @package air-light
 */
?>

<!--- SOCIAL MEDIA FEED  -->
<section id="feed">
    <div class="container-larger">
        <h2>Pia sosiaalisessa mediassa</h2>
        <div class="col-md-12">
            <h3>Twitter</h3>
            <?php echo do_shortcode("[custom-twitter-feeds feed=1]"); ?>
        </div>

    </div>
    <div class="container-larger justify-content-center">
        <div class="col-md-5 col-sm-12">
            <h3>Instagram</h3>
            <?php echo do_shortcode("[instagram-feed feed=1]") ?>
        </div>
    </div>
    <div class="container-larger">
        <div class="col-md-5 col-sm-12">
            <h3>Facebook</h3>
            <?php echo do_shortcode("[custom-facebook-feed feed=1]") ?>
        </div>
    </div>
</section>