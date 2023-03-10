<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package air-light
 */

get_header(); ?>

<section id="content" class="content-area">
	<main role="main" id="main" class="site-main">

    <div class="container">

      <?php if ( have_posts() ) { ?>

        <header class="page-header">
          <h1 class="page-title"><?php printf( esc_html__( 'Hakutulokset sanalla: %s', 'air-light' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </header><!-- .page-header -->

      <?php while ( have_posts() ) {
      	the_post();
				get_template_part( 'template-parts/content', 'search' );
      }

		} else {
    	get_template_part( 'template-parts/content', 'none' );
		} ?>

    </div><!-- .container -->

  </main><!-- #main -->
</section><!-- #primary -->

<?php get_footer();
