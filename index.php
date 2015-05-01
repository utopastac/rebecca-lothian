<?php get_header(); ?>

  <section id = "projects">
    <ul id = "project-thumbs">

    <?php
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => 30,
            'orderby'=> 'modified',
            'order' => 'ASC'
        );
        $posts = new WP_Query($args );
        
        //$posts->query($args);
        while($posts->have_posts()) :
             $posts->the_post();
    ?>
    <li>

      <a class = "internal" href = "<?php echo the_permalink(); ?>" data-target = "<?php echo the_permalink(); ?>" data-title = "<?php echo $post->post_name; ?>">
        <?php $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
        <div class = "image" style = "background-image: url(<?php echo $thumbnail_url; ?>)"></div>
        <h2><?php echo the_title(); ?></h2>
        <div class = "meta">
          <h5><span>In</span> <?php $category = get_the_category(); echo $category[0]->cat_name; ?></h5>
          <p><?php echo get_the_modified_date(); ?></p>
        </div>
      </a>

    </li> 
      
    <?php endwhile; ?>

    </ul>
  </section>


<?php get_footer(); ?>
