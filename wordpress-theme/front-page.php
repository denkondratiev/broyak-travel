<?php
/*
 * Template Name: Шаблон - Головна
 */

get_header();
?>

<section class="s-main slider">
  <?php                 
    $args = array(
        'post_type'     => 'tours',
        'post_per_page' =>  3,
    );

    $my_query = new WP_Query( $args );

    if ( $my_query->have_posts() ) {
      while ( $my_query->have_posts() ) {
        $my_query->the_post();
          $tour_img = get_field('tour_img');
          $slider_text = get_field('slider_text');
          $content = get_the_content(); 
  ?>
  <div class="slider-item" style="background-image: url(<?php echo $tour_img['sizes']['large']; ?>);">
    <div class="container">
      <div class="row">
        <div class="col-8 offset-2 col-md-5 offset-md-7">
          <div class="slider-item-block">
            <p><?php echo kama_excerpt( array('maxchar'=>70, $content) ); ?></p>
            <p class="color-p"><?php echo $slider_text ?></p>
            <a href="<?php the_permalink(); ?>" class="button">Детальніше</a>
          </div>
        </div>
      </div>
    </div>
  </div>
      <?php                    
    }
  }
    // Reset the `$post` data to the current post in main query.
    wp_reset_postdata();
  ?><!-- End of slider --> 

  </section><!-- End of main -->

  <section class="s-portfolio">
    <div class="section-title">
      <h3><?php the_field('recent_tour_title', 'option') ?></h3>
      <span><?php the_field('recent_tour_sub_title', 'option') ?></span>
    </div>
    <div class="container">
      <div class="row">
        <?php  
                    
          $args = array(
              'post_type'     => 'tours',
              'post_per_page' =>  6,
          );

          $my_query = new WP_Query( $args );

          if ( $my_query->have_posts() ) {
            while ( $my_query->have_posts() ) {
              $my_query->the_post();
                $tour_price_simple = get_field('tour_price_simple');
                $tour_price_sale = get_field('tour_price_sale');
                $tour_price_old = get_field('tour_price_old');
                $tour_date = get_field('tour_date');
                $tour_img_card = get_field('tour_img_card');
                $content = get_the_content(); 
        ?>
        <div class="p-item-wrap col-lg-4 col-sm-6">
          <div class="p-item">
            <div class="p-item-img">
              <div class="overlay-wrap">
              <div class="overlay-outer">
                <div class="overlay-inner">
                  <a href="<?php the_permalink(); ?>"><div class="overlay-icon">+</div></a>
                  <div class="overlay-title">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span class="date"><?php echo $tour_date ?></span>
                  </div>
                </div>
              </div>
            </div>
             <img src="<?php echo $tour_img_card['sizes']['large'] ?>" alt="<?php echo the_title_attribute(); ?>">
            </div>
            <div class="item-info">
              <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
              <i class="fa fa-calendar" aria-hidden="true"></i>
              <span class="date"><?php echo $tour_date ?></span>
              <div class="price">
                <span class="simple"><?php echo $tour_price_simple; ?></span>
                <span class="sale"><?php echo $tour_price_sale; ?></span>
                <span class="full"><?php echo $tour_price_old ?></span>
              </div>
              <p><?php echo kama_excerpt( array('maxchar'=>70, $content) ); ?></p>
              <a href="<?php the_permalink(); ?>" class="button">Детальніше</a>
              <a href="<?php echo get_permalink(178); ?>" class="button btn-go">Поїхати з нами</a>
            </div>
          </div>
        </div>
        <?php                    
    }
  }
    // Reset the `$post` data to the current post in main query.
    wp_reset_postdata();
  ?><!-- End of portfolio --> 

      <div class="col-12"><button class="button-all"><a href="<?php echo get_permalink(149); ?>">Ще більше турів</a></button></div>
    

  </section>

  <section class="s-slogan" style="background-image: url(<?php the_field('slogan_image', 'option') ?>);">
    <div class="slogan">
      <p><?php the_field('slogan_text', 'option') ?></p>
    </div>
  </section><!--End slogan-->


  <section id="gallery" class="s-gallery">
    <div class="section-title">
      <h3><?php  the_field('gallery_title', 'option') ?></h3>
      <span><?php  the_field('gallery_sub_title', 'option') ?></span>
    </div>
      <div class="container-fluid">
        <div class="row">

        <?php
          $images = get_field('gallery_images', 'option');
          if( $images ): ?>

          <div class="owl-carousel">
            <?php foreach( $images as $image ): ?>
              <img src="<?php echo $image['sizes']['large'] ?>" style="width: 100%; height: 220px;" alt="<?php echo the_title_attribute(); ?>">
            <?php endforeach; ?>
          </div>

        <?php endif; ?><!--End of gallery-->

        </div>
      </div>
  </section>

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
              'post_per_page' => 3,
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
              <a href="<?php the_permalink(); ?>"><img src="<?php echo $blog_img_card['sizes']['medium'] ?>" alt="<?php echo the_title_attribute(); ?>"></a>
            </div>
            <div class="blog-title">
              <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
            </div>
            <div class="blog-text">
              <p><?php echo kama_excerpt( array('maxchar'=>100, $content) ); ?></p>
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
