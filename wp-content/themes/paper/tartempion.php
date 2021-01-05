<?php /* Template Name: page tartempion */ ?>
<?php get_header(); ?>




<!-- Comment récuper le contenu d'une page -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- on récupère grace à cela le titre de la page -->
<?php the_title(); ?>
<!-- L'image de présentation -->
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>
<!-- Le contenu -->
<?php endwhile; endif; ?>


<!-- ajout d'une page dans une page -->
<!-- On appel le titre de la page que l'on souhaite afficher -->
<?php echo get_post_field('post_title', '17'); ?><br/>
<!-- On appel le contenu de la page que l'on souhaite afficher -->
<?php echo get_post_field('post_content', '17'); ?>
<!-- 17 correspond à l'identifiant de notre page, en le modifiant on peut appeler une autre page -->

<br/>
<?php echo get_post_field('post_title', '21'); ?><br/>
<?php echo get_post_field('post_content', '21'); ?>

<br/>
<?php echo get_post_field('post_title', '34'); ?><br/>
<?php echo get_post_field('post_content', '34'); ?>






<!-- ajout de ma nouvelle widget area -->
 <?php if ( is_active_sidebar( 'nouvelle-zone' ) ) : ?>
	<?php dynamic_sidebar( 'nouvelle-zone' ); ?>
 <?php endif; ?>
 
<!-- ou sans la condition de savoir s'il y a quelque chose dedans -->
	<?php dynamic_sidebar( 'nouvelle-zone-2' ); ?>



	<?php
    $args = array( 'post_type' => 'post', 'posts_per_page' => 1000 );


	$loop = new WP_Query( $args );
	
		while ( $loop->have_posts() ) : $loop->the_post();
		
		echo '<a href="'.get_permalink().'">';	

		echo "test";
			echo '</a>';
		
		
	endwhile;

	
	echo '</div>';

	?>









<?php get_footer(); ?>