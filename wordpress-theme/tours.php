<?php
/*
 *Template Name: Шаблон - Наші тури
 */

get_header();
?>

<section class="s-portfolio">
  <div class="section-title">
    <h3><?php the_field('recent_tour_title', 'option') ?></h3>
    <span><?php the_field('recent_tour_sub_title', 'option') ?></span>
  </div>

	<?php $tour_cats = get_terms('tour_category'); ?>
	<?php if (!empty($tour_cats) && !is_wp_error($tour_cats)) : ?>        
	    
    <ul class="portfolio-filter col-12">              
      <li class="button-filter" data-filter="all">All</li>    
        <?php foreach ($tour_cats as $tour_cat) : ?>
          <li class="button-filter" data-filter=".<?php echo $tour_cat->slug ?>"><?php echo $tour_cat->name ?></li>
        <?php endforeach; ?>
    </ul>
	    
	<?php endif; ?><!--/End portfolio filter-->

<div class="container">
  <div class="row portfolio-mix">

    <?php
    global $post;
    $args = array('posts_per_page' => -1, 'post_type' => 'tours', 'orderby' => 'menu_order', 'order' => 'ASC');
    $myposts = get_posts($args);

    foreach ($myposts as $post) : setup_postdata($post); ?>

     <!-- Maybe past terms again -->

      <?php
        $terms = get_the_terms($post->ID, 'tour_category');
        if ($terms && !is_wp_error($terms)) :
            $tour_cat_slug = array();
            $tour_cat_name = array();
            foreach ($terms as $term) {
                $tour_cat_slug[] = $term->slug;
            }
            foreach ($terms as $term) {
                $tour_cat_name[] = $term->name;
            }
            $tour_cat_array = join(", ", $tour_cat_slug);
            $tour_class_array = join(" ", $tour_cat_slug);
            $tour_assigned_list = join(", ", $tour_cat_name);
            $tour_price_simple = get_field('tour_price_simple');
            $tour_price_sale = get_field('tour_price_sale');
            $tour_price_old = get_field('tour_price_old');
            $tour_date = get_field('tour_date');
            $tour_img_card = get_field('tour_img_card');
            $content = get_the_content(); 
        endif;
          ?>

        <div class="mix p-item-wrap col-lg-4 col-md-6 <?php echo $tour_class_array ?>">
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
             <img src="<?php echo $tour_img_card['sizes']['large'] ?>" alt="">
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
              <div class="p-text">
                <?php echo kama_excerpt( array('maxchar'=>70, $content) ); ?>
              </div>
              <a href="<?php the_permalink(); ?>" class="button">Детальніше</a>
              <a href="<?php echo get_permalink(178); ?>" class="button btn-go">Поїхати з нами</a>
            </div>
          </div>
        </div>
  <?php endforeach; ?>

  </div>
</section>

<?php get_footer(); ?>