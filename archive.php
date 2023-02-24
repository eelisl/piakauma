<?php

/*
Template name: Archives
 */

 $featured_image = '';
if (has_post_thumbnail()) :
	$featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
else :
	$featured_image = get_theme_file_uri('images/Edkauma_valtiosali.jpg');
endif;

get_header(); ?>

<div id="content" class="content-area">
	<main role="main" id="main" class="site-main">
    <section id="archive">
      <div class="row">
        <div class="container">
                <div class="col-md-8">
                  <?php if ( have_posts() ) : ?>
                  <?php while ( have_posts() ) : ?>
                    <?php the_post(); ?>

                          <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                    <?php endwhile; endif; ?>
                </div>
                <div class="col-md-4">
                  <h2>Arkisto kuukausittain:</h2>
                  <ul>
                    <?php wp_get_archives('type=monthly'); ?>
                  </ul>
                </div>
          </div>
      </div><!-- .container -->
    </section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
