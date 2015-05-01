<?php get_header(); ?>

  <section id = "projects">

    <h1><span><?php single_cat_title(); ?></span></h1>

    <ul id = "project-thumbs">

    <?php

      $cur_cat_id = get_cat_id( single_cat_title("",false) );

      $loop = new WP_Query( array( 
          'post_type' => 'Portfolio', 
          'cat' => $cur_cat_id,
          'posts_per_page' => 10
      ) );

      while ( $loop->have_posts() ) : $loop->the_post();

    ?>

    <li>

      <a class = "internal" href = "<?php echo the_permalink(); ?>" data-target = "<?php echo the_permalink(); ?>" data-title = "<?php echo $post->post_name; ?>">
        <?php $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
        <div class = "image" style = "background-image: url(<?php echo $thumbnail_url; ?>)"></div>
        <h2><?php echo the_title(); ?></h2>
        <div class = "meta">
          <h5><span>In</span> <?php $category = get_the_category(); echo $category[0]->cat_name; ?></h5>
          <p><?php echo get_the_date(); ?></p>
        </div>
      </a>

    </li>

    <?php endwhile; ?>

    </ul>
  </section>


<?php get_footer(); ?>
