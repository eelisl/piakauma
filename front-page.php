<?php

/**
 * The template for displaying front page
 *
 * Contains the closing of the #content div and all content after.
 * Initial styles for front page template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package air-light
 */

// Featured image.
$featured_image = '';
if (has_post_thumbnail()) :
	$featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
else :
	$featured_image = get_theme_file_uri('images/Edkauma_valtiosali.jpg');
endif;

get_header();
?>

<div id="content" class="content-area">
	<main role="main" id="main" class="site-main">

		<!--- HEADER -->
		<div class="entry-header-front" style="background-image: url(<?php echo $featured_image; ?>);background-position: <?php
																															if (get_field('kuvien_asettelu_leveys')) :
																																echo get_field('kuvien_asettelu_leveys');
																															else : echo "50";
																															endif; ?>% <?php if (get_field('kuvien_asettelu_korkeus')) :
																																			echo get_field('kuvien_asettelu_korkeus');
																																		else : echo "50";
																																		endif; ?>%;">
			<div class=" shade"></div>

			<!---
			<div class="kokoomus">
				<img src="/images/uma_logo_valkea.png" alt="Kokoomus Espoo">
			</div>
			 --->

			<div class="frontpage-hero">
				<div class="container-larger">
					<h1>
						<?php echo the_field("etusivu_otsikko"); ?>
					</h1>

					<p>
						<?php echo the_field("etusivun_kuvaus"); ?>
					</p>


				</div>
			</div>
		</div>

		<!--- INTRO SECTION -->
		<section id="values">
			<div class="container-larger">
				<h2 class="values-title"><?php if (get_field("arvoblokin_otsikko")) {
												echo get_field("arvoblokin_otsikko");
											} ?></h2>
				<p><?php if (get_field("arvoblokin_teksti")) {
						echo get_field("arvoblokin_teksti");
					} ?>
				</p>
				<div class="col-md-12">

					<?php if (have_rows('arvot')) : ?>

						<?php while (have_rows('arvot')) : the_row();
							$arvo_header = get_sub_field('arvon_otsikko');
							$arvo_description = get_sub_field('arvon_kuvaus');
							$arvo_image = get_sub_field('arvon_kuva');
							$arvo_linkki = get_sub_field('arvon_linkki'); ?>

							<div class="col-md-3 col-sm-6 col-xs-12">
								<?php if ($arvo_image) : ?>
									<div class="img-wrapper">
										<img src="<?php echo $arvo_image; ?>" alt="<?php echo $arvo_image; ?>">
									</div>
								<?php endif; ?>
								<h3>
									<?php echo $arvo_header; ?>
								</h3>
								<p>
									<?php echo $arvo_description; ?>
								</p>
								<?php if ($arvo_linkki) : ?>
									<a href="<?php echo $arvo_linkki; ?>">Lue lis???? aiheesta <?php include get_theme_file_path('/svg/chevron-right-dark.svg'); ?></a>
								<?php endif; ?>
							</div>

						<?php endwhile; ?>

					<?php endif; ?>
				</div>
			</div>
		</section>
		<section id="introduction">
			<div class="container-larger">
				<div class="col-md-12">
					<div class="col-md-5">
						<?php if (get_field("lainaus_kuva")) : ?>

							<img src=<?php echo get_field("lainaus_kuva"); ?> />

						<?php endif; ?>
						<?php if (get_field("lainausteksti")) : ?>
							<p>
								<?php echo the_field("lainausteksti"); ?>
							</p>

						<?php endif; ?>
					</div>
					<div class="col-md-7">
						<h2>
							<?php echo the_field("esittelyn_otsikko"); ?>
						</h2>
						<p>
							<?php echo the_field("esittelyn_tekstit"); ?>
						</p>

					</div>
				</div>
			</div>
		</section>

		<!--- VALUES  -->


		<?php
		// include('template-parts/favourite-tags.php'); 
		?>

		<!--- LATEST BLOG POSTS  -->
		<section id="blog">
			<div class="container-larger">

				<div class="row">
					<h2>Viimeisimm??t kirjoitukset</h2>
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
							<div class="col-md-4 col-sm-6 col-xs-12">
								<a href="<?php the_permalink(); ?>">
									<div class="box">
										<span class="date">
											<?php echo get_the_date(); ?></span>
										<h3>
											<?php the_title(); ?>
										</h3>
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
						echo "<h2>Uusia julkaisuja odotellessa...</h2>";
					}
					?>
				</div>

				<div class="show-all">
					<a href="blogi-kannanotot">N??yt?? kaikki kirjoitukset
						<?php include get_theme_file_path('/svg/chevron-right.svg'); ?></a>
				</div>
			</div>
		</section>

		<?php include("template-parts/social-media.php"); ?>


	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
