<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package air-light
 */

get_header(); ?>

<?php
if (is_home()) {
	$page_for_posts = get_option('page_for_posts');
	$image = get_the_post_thumbnail_url($page_for_posts);
	if ($image) { ?>
		<div class="entry-header-page" style="background-image: url(<?php echo $image; ?>);background-position: <?php
																												if (get_field('kuvien_asettelu_leveys')) :
																													echo get_field('kuvien_asettelu_leveys');
																												else : echo "50";
																												endif; ?>% <?php if (get_field('kuvien_asettelu_korkeus')) :
																																			echo get_field('kuvien_asettelu_korkeus');
																																		else : echo "50";
																																		endif; ?>%;"></div>
	<?php } ?>
<?php } ?>



<div id="content" class="content-area">
	<main role="main" id="main" class="site-main">

		<section id="blog-posts">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<?php if (have_posts()) {
							if (is_home() && !is_front_page()) { ?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
						<?php
							}

							while (have_posts()) {
								the_post();
								get_template_part('template-parts/content', get_post_type());
							}

							the_posts_navigation();
						} else {
							get_template_part('template-parts/content', 'none');
						} ?>
					</div>
					<div class="col-md-4">
						<?php get_sidebar(); ?>
					</div>

				</div>

				<h2><a href="arkisto">Katso arkisto</a></h2>
			</div><!-- .container -->
		</section><!-- .blog-posts -->

		<?php include("template-parts/social-media.php"); ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
