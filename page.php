<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package air-light
 */

// Featured image.



get_header(); ?>

<?php
$featured_image = '';
$image_position = '';
if (get_field('kuvien_asettelu')) :
	$image_position = get_field('kuvien asettelu');
endif;
if (has_post_thumbnail()) :
	$featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
	<div class="entry-header-page" style="background-image: url(<?php echo $featured_image; ?>); background-position: 50% <?php if ($image_position) : echo $image_position;
																															else : echo "50";
																															endif; ?>%"></div>
<?php endif; ?>

<div id="content" class="content-area">
	<main role="main" id="main" class="site-main">

		<section id="page">
			<div class="container">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="col-md-8">
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</div>

						<div class="col-md-4">
							<?php get_sidebar(); ?>
						</div>
				<?php endwhile;
				endif; ?>
			</div><!-- .container -->
		</section>

		<?php
		if (get_field('videon_kuva') && get_field('videon_url')) {
		?>
			<section id="yt-video" style="background-image: url(<?php echo the_field("videon_kuva"); ?>); padding: 150px 0; position: relative; background-size: cover;">
				<div class="container">
					<div class="play">
						<a class="popup-youtube" href="<?php echo the_field("videon_url"); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/play.png"></a>
					</div>
					<div class="shade"></div>

				</div>
			</section>

		<?php } ?>

		<?php include('template-parts/favourite-tags.php'); ?>

		<!--- LATEST BLOG POSTS  -->
		<section id="blog">
			<div class="container-larger">

				<div class="row">
					<h2>Viimeisimmät kirjoitukset</h2>
					<?php
					$posts = 3;
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => $posts,
					);

					$post_query = new WP_Query($args);

					if ($post_query->have_posts()) {
						while ($post_query->have_posts()) {
							$post_query->the_post();
					?>
							<div class="col-md-4">
								<a href="<?php the_permalink(); ?>">
									<div class="box">
										<span class="date"><?php echo get_the_date(); ?></span>
										<h3><?php the_title(); ?></h3>
										<div class="lead">
											<?php the_excerpt(); ?>
										</div>
									</div>
								</a>

							</div>
					<?php

						}
						wp_reset_postdata();
					} else {
						echo "<h3>Uusia julkaisuja odotellessa...</h3>";
					}
					?>
				</div>

				<div class="show-all">
					<a href="blogi-kannanotot">Näytä kaikki kirjoitukset <?php include get_theme_file_path('/svg/chevron-right.svg'); ?></a>
				</div>
			</div>
		</section>

		<?php include("template-parts/social-media.php"); ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
