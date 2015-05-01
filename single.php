<?php get_header(); ?>

  <section id = "main-content">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article id = "project">
      <header>
        <h1><?php the_title(); ?></h1>
        <h3><?php the_content(); ?></h3>
        <aside>
          <h4><?php echo get_the_modified_date(); ?></h4>
          <div class = "meta">
            <?php echo get_the_category_list(""); ?>
            <?php echo get_the_tag_list('<ul><li>','</li><li>','</li></ul>'); ?>
          </div>
        </div>
      </header>
      <ul id = "project-images" class = "<?php $category = get_the_category(); echo $category[0]->cat_name; ?>">
        <?php
          display_images_in_list("<li style = 'background-image: url(", ")' /></li>");
        ?>
      </ul>
    </article>

    <?php endwhile; endif; ?>

  </section>

<?php get_footer(); ?>
