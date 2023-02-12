<?php

/**
 * Template for Favourite Tags.
 *
 * This is the default hero image for page templates, called
 * 'block'. Strictly air specific.
 *
 * @package air-light
 */
?>
<?php if ( is_front_page() ) { ?>
<section id="post_tags">
<?php } else {  ?>
<section id="post_tags" style="border-top: 1px solid #d1d1d1;">
<?php } ?>
	<div class="container">
		<div class="row">

		<h2>Kirjoituksiani eri aiheista:</h2>
			<?php 
				$tags = get_tags(array(
					'number'                    => 12,  
					'orderby'                   => 'count', 
					'order'                     => 'DESC',
				));
				foreach ( $tags as $tag ) {
					$tag_link = get_tag_link( $tag->term_id );
					$html .= '<div class="col-md-4 tagi">';
					$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
					$html .= "{$tag->name}</a>";
					$html .= '</div>';
				}
				echo $html;
			?>
		</div>	
	</div>
</section>