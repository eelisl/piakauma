<?php

/*
Template name: Tukiryhmän esittely
 */
?>



<?php get_header(); ?>
<!--- SOCIAL MEDIA FEED  -->
<section id="tukiryhma">
    <div class="container-larger">
        <h2><?php the_title(); ?></h2>
        <div class="col-md-12">
            <div class="row">

            <?php if (have_rows('henkilot')) : ?>

                    <?php while (have_rows('henkilot')) : the_row();
                $kuva = get_sub_field('henkilon_kuva');
                $esittely = get_sub_field('henkilon_esittely'); // kuva  
                $nimi = get_sub_field('henkilon_nimi');
                $titteli = get_sub_field('henkilon_titteli'); ?>
                
                <div class="col-md-6 col-sm-6 henkilo">
                    <div class="kuva-wrapper">
                        <img src="<?php echo $kuva; ?>">
                    </div>
                    <div class="esittely-teksti">
                        <?php echo $esittely; ?>

                        <p><span><b><?php echo $nimi; ?></b></span><br>
                        <span class="tyonkuva"><?php echo $titteli; ?></span></p>
                    </div>
                </div>

<?php endwhile; endif; ?>
                
            </div>
        </div>
    </div>
</section>

<?php include("template-parts/social-media.php"); ?>

<?php get_footer(); ?>