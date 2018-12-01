<?php
/*
 *Template Name: Шаблон - Наші тури
 */

get_header();
?>




	<?php $tour_cats = get_terms('tour_category'); ?>
	<?php if (!empty($tour_cats) && !is_wp_error($tour_cats)) : ?>        
	    
	        <ul class="filter">              
	            <button type="button" class="active" href="#" data-filter="all">All</a></button>    
	            <?php foreach ($tour_cats as $tour_cat) : ?>
	                <button type="button" data-filter=".<?php echo $tour_cat->slug ?>"><?php echo $tour_cat->name ?></button>
	            <?php endforeach; ?>
	        </ul><!--/#portfolio-filter-->
	    
	<?php endif; ?>

<div class="confeta">

  <?php
  global $post;
  $args = array('posts_per_page' => -1, 'post_type' => 'tours', 'orderby' => 'menu_order', 'order' => 'ASC');
  $myposts = get_posts($args);
  foreach ($myposts as $post) : setup_postdata($post);
      ?>

      <?php
      $terms = get_the_terms($post->ID, 'tour_category');
      ?>
  
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
      endif;
      ?>

      <div class="mix <?php echo $tour_class_array; ?>">
        <a href="<?php the_permalink(); ?>">
          <div><?php the_title(); ?></div>
          <?php $bla = get_field('tour_img'); ?>
          <div><img src="<?php echo $bla[sizes][medium]; ?>" alt=""></div>  
  			</a>
              	
      </div>
  <?php endforeach; ?>

</div>


<?php get_footer(); ?>