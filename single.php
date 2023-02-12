<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package air-light
 */

get_header(); ?>

<div id="content" class="content-area">
	<main role="main" id="main" class="site-main">

		<section id="blog-post">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
			      <?php while ( have_posts() ) {
			      	the_post();
							get_template_part( 'template-parts/content', get_post_type() );

							the_post_navigation();

						} ?>
					</div>
					<div class="col-md-4">
						<?php get_sidebar(); ?>
					</div>
				</div>
	    </div><!-- .container -->
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
