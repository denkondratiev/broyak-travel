<?php
/*
 * Template Name: Шаблон - Цікаві статті
 */

get_header();
?>
 <section class="s-blog">
    <div class="section-title">
      <h3><?php  the_field('blog_title', 'option') ?></h3>
      <span><?php  the_field('blog_sub_title', 'option') ?></span>
    </div>
    <div class="container">
      <div class="row">
        <?php            
          $args = array(
              'post_type' => 'blogs',
              'post_per_page' => 24,
          );

          $my_query = new WP_Query( $args );

          if ( $my_query->have_posts() ) {
            while ( $my_query->have_posts() ) {
              $my_query->the_post();
                $content = get_the_content();
                $blog_img_card = get_field('blog_img_card');
        ?>
        <div class="col-lg-4 col-sm-6">
          <div class="blog-item">
            <div class="blog-img">
              <a href="<?php the_permalink(); ?>"><img src="<?php echo $blog_img_card['sizes']['medium'] ?>" alt=""></a>
            </div>
            <div class="blog-title">
              <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
            </div>
            <div class="blog-text">
              <p><?php echo kama_excerpt( array('maxchar'=>70, $content) ); ?></p>
            </div>
            <a href="<?php the_permalink(); ?>" class="button">Читати далі</a>
          </div>
        </div>
        <?php                    
          }
        }
          // Reset the `$post` data to the current post in main query.
          wp_reset_postdata();
        ?><!-- End of blog --> 
      </div>
    </div>
  </section>

<?php get_footer(); ?>
