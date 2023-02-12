<?php 
/**
 * Template for Youtube Video.
 *
 * This is the default hero image for page templates, called
 * 'block'. Strictly air specific.
 *
 * @package air-light
 */
?>

<?php
	$args = array('post_type' => 'youtube');
	$the_query = new WP_Query($args);
?>

	<?php if ($the_query->have_posts()) : ?>
			<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

			<section id="yt-video" style="background-image: url(<?php echo the_field("kuva"); ?>); padding: 150px 0; position: relative; background-size: cover; background-position: right;">
				<div class="container">
					<div class="play">
						<a class="popup-youtube" href="<?php echo the_field("videon_url"); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/play.png"></a>
					</div>
					<div class="shade"></div>

				</div>
			</section>
			<div class="play2">
				<a class="popup-youtube" href="<?php echo the_field("videon_url"); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/images/play.png"></a>
			</div>

	<?php endwhile; endif; ?>