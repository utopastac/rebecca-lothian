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
				<h3><?php echo get_bloginfo ( 'description' );  ?></h3>
			</header>

			<div class = "content">
				<?php the_content(); ?>
			</div>
	    
			
			<?php endwhile; endif; ?>
			
			
		</article>
	
	</section>

<?php get_footer(); ?>
