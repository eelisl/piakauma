<?php
$args = array('post_type' => 'footer');

$the_query = new WP_Query($args);

?>
</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<div class="container-larger">

		<div class="row">

			<div class="col-md-3 col-sm-3 col-xs-12 logo-footer">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-white.png" alt="Pia Kauma">
				</a>

			</div>

			<div class="col-md-3 col-sm-3 col-xs-12">
				<?php wp_nav_menu(array(
					'theme_location' => 'footer',
					'container' => false,
					'depth' => 4,
					'menu_class' => 'menu-items',
					'menu_id' => 'main-menu',
					'echo' => true,
					'fallback_cb' => 'Air_Light_Navwalker::fallback',
					'items_wrap' => '<ul class="%2$s" id="%1$s">%3$s</ul>',
					'walker' => new Air_Light_Navwalker(),
				)); ?>
			</div>

			<div class="col-md-3 col-sm-3 col-xs-12 yhteys">

				<?php if ($the_query->have_posts()) : ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

						<h4><?php the_field('otsikko'); ?></h4>
						<div class="icon">
							<?php if (have_rows('somelinkit')) : ?>

								<?php while (have_rows('somelinkit')) : the_row();
									$somelinkki = get_sub_field('somelinkki');
									$somekuva = get_sub_field('somekuva'); // kuva  
								?>

									<a href="<?php echo $somelinkki; ?>" target="_blank">
										<img src="<?php echo $somekuva; ?>" alt="<?php echo $somekuva; ?>">
									</a>

								<?php endwhile; ?>
							<?php endif; ?>
						</div>

						<?php the_field('yhteystiedot'); ?>

					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query(); ?>

			</div>
			<?php
			// <div class="col-md-3 col-sm-3 col-xs-12 yhteys">

			// 	<?php if ($the_query->have_posts()) : 
			// 		<?php while ($the_query->have_posts()) : $the_query->the_post(); 
			// 			<h4>Teemaryhmät</h4>
			// 			<p><?php the_field('yhteystiedot_vaalitiimi'); </p>

			// 		<?php endwhile; 
			// 	<?php endif; 

			// </div>
			?>

		</div>
	</div>

</footer><!-- #colophon -->

<div class="footer-copy">
	<div class="container-larger">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<p>&copy; <?php date('Y') ?> Pia Kauma</p>
			</div>

			<div class="col-md-6 right col-sm-12">
				<p>Sivut tuottaa: <a href="http://eelisloikkanen.fi" target="_blank">Eelis Loikkanen</a></p>
			</div>
		</div>

	</div>
</div>

</div><!-- #page -->


<?php wp_footer(); ?>
</body>

</html>