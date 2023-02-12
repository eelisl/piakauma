<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package air-light
 */

get_header(); ?>

<section class="error-404 not-found">
	<div id="content" class="content-area">
		<main role="main" id="main" class="site-main">
			<div class="container">

					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e('Tätä sivua ei löytynyt!', 'air-light'); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php include get_theme_file_path('/svg/chevron-left.svg'); ?>
						<a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Palaa takaisin', 'air-light'); ?>
						</a></p>
						
					</div><!-- .page-content -->


			</div><!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->
</section><!-- .error-404 -->
<?php
get_footer();
