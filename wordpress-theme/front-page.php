<?php
/*
 * Template Name: Шаблон - Головна
 */

get_header();?>

<section class="s-main slider">
  <?php                 
    $args = array(
        'post_type'     => 'tours',
        'post_per_page' =>  -1,
    );

    $my_query = new WP_Query( $args );

    if ( $my_query->have_posts() ) {
      while ( $my_query->have_posts() ) {
        $my_query->the_post();
          $tour_img = get_field('tour_img');
          $text_slider = get_field('text_slider'); 
  ?>
  <div class="slider-item" style="background-image: url(<?php echo $tour_img[sizes][large]; ?>);">
    <div class="container">
      <div class="row">
        <div class="col-8 offset-2 col-md-5 offset-md-7">
          <div class="slider-item-block">
            <p><?php the_excerpt(); ?></p>
            <p class="color-p"><?php echo $text_slider ?></p>
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
      <h3>Наші найближчі подорожі</h3>
      <span>Оберіть свій відпочинок разом з нами</span>
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
                $tour_img = get_field('tour_img');
                $tour_price_simple = get_field('tour_price_simple');
                $tour_price_sale = get_field('tour_price_sale');
                $tour_price_old = get_field('tour_price_old');
                $tour_date = get_field('tour_date');
                $thumb = get_the_post_thumbnail( $post->ID , array(330,220));
        ?>
        <div class=" p-item-wrap col-lg-4 col-sm-6">
          <div class="p-item">
            <div class="p-item-img">
              <div class="overlay-wrap">
              <div class="overlay-outer">
                <div class="overlay-inner">
                  <a href="single-tour.html"><div class="overlay-icon">+</div></a>
                  <div class="overlay-title">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span class="date"><?php echo $tour_date ?></span>
                  </div>
                </div>
              </div>
            </div>
             <?php echo $thumb ?>
            </div>
            <div class="item-info">
              <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
              <i class="fa fa-calendar" aria-hidden="true"></i>
              <span class="date"><?php echo $tour_date ?></span>
              <div class="price">
                <span class="sale"><?php echo $tour_price_sale; ?></span>
                <span class="full"><?php echo $tour_price_old ?></span>
              </div>
              <p><?php echo the_excerpt(); ?></p>
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

  <section class="s-slogan" style="background-image: url(img/slogan.jpg);">
    <div class="slogan">
      <p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Напоивший но страну переписали за имеет переулка рыбными, всеми, грамматики.</p>
    </div>
  </section>

  <section id="gallery" class="s-gallery">
    <div class="section-title">
      <h3>Галерея</h3>
      <span>Фото з наших поїздок</span>
    </div>
      <div class="container-fluid">
        <div class="row">
          <div class="owl-carousel">
            <div><img src="img/main-3.jpg" alt=""></div>
            <div><img src="img/main-4.jpg" alt=""></div>
            <div><img src="img/main-3.jpg" alt=""></div>
            <div><img src="img/main-4.jpg" alt=""></div>
          </div>
        </div>
      </div>
  </section>

  <section class="s-blog">
    <div class="section-title">
      <h3>Новини туризму</h3>
      <span>Радимо почитати перед поїздкою</span>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="blog-item">
            <div class="blog-img">
              <a href="single-blog.html"><img src="img/main-3.jpg" alt=""></a>
            </div>
            <div class="blog-title">
              <a href="single-blog.html"><h2>Новина 1</h2></a>
            </div>
            <div class="blog-text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit ut quis iure voluptate, consequuntur, repellat nesciunt ducimus quos excepturi, sed assumenda fugit nam quia ab. Similique</p>
            </div>
            <a href="single-blog.html" class="button">Читати далі</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="blog-item">
            <div class="blog-img">
              <a href="single-blog.html"><img src="img/main-2.jpg" alt=""></a>
            </div>
            <div class="blog-title">
              <a href="single-blog.html"><h2>Новина 2</h2></a>
            </div>
            <div class="blogblog-text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit ut quis iure voluptate, consequuntur, repellat nesciunt ducimus quos excepturi, sed assumenda fugit nam quia ab. Similique</p>
            </div>
            <a href="single-blog.html" class="button">Читати далі</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="blog-item">
            <div class="blog-img">
              <a href="single-blog.html"><img src="img/main-4.jpg" alt=""></a>
            </div>
            <div class="blog-title">
              <a href="single-blog.html"><h2>Новина 3</h2></a>
            </div>
            <div class="blog-text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit ut quis iure voluptate, consequuntur, repellat nesciunt ducimus quos excepturi, sed assumenda fugit nam quia ab. Similique</p>
            </div>
            <a href="single-blog.html" class="button">Читати далі</a>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php 
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post(); 
        ?>
   <div><p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.</p></div>
          <?php 
            $args = array(
                'posts_per_page' => -1,

            );
             
            $my_query = new WP_Query( $args );
             
            if ( $my_query->have_posts() ) {
             
                while ( $my_query->have_posts() ) {
             
                    $my_query->the_post();
                  $bla = get_field('tour_img');
          ?>
                  <a href="<?php the_permalink(); ?>">
                  <div><?php the_title(); ?></div>
                  <div><img src="<?php echo $bla[sizes][medium]; ?>" alt=""></div>
              
            </a>
                  <?php
             
                }
             
            }
             
            // Reset the `$post` data to the current post in main query.
            wp_reset_postdata();
             
            ?>
       


          <?php
    } // end while
  } // end if
  ?>
	


<?php get_footer(); ?>
