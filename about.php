<?php
/*
Template Name: Profile
*/
?>
<?php get_header(); ?>

	<section id = "main-content">
		<article id = "project">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<header>
				<h1>About</h1>
				<h3><?php echo get_the_excerpt(); ?></h3>
			</header>

			<?php the_content(); ?>
	    
			
			<?php endwhile; endif; wp_reset_query(); ?>
			
			
		</article>
	
	</section>

<?php get_footer(); ?>
