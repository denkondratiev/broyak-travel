<?php
/**
 * The template for displaying all single blogs
 */

get_header();
?>

<section class="single-tour">
  <div class="container">
    <div class="row">

      <div class="col-12">
        <div class="tour-wrap">

	<?php 
	$tour_price_simple = get_field('tour_price_simple');
  $tour_price_sale = get_field('tour_price_sale');
  $tour_price_old = get_field('tour_price_old');
  $tour_date = get_field('tour_date');
  $tour_img = get_field('tour_img');
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
			 ?>
			<div class="section-title">
        <h3><?php the_title(); ?></h3>
        <span><?php the_field('recent_tour_sub_title', 'option') ?></span>
      </div>
      <div class="tour-info">
        <div class="info-date">
          <i class="fa fa-calendar" aria-hidden="true"></i>
          <span class="date"><?php echo $tour_date ?></span>
        </div>
        <div class="info-price">
          <span class="simple"><?php echo $tour_price_simple; ?></span>
          <span class="sale"><?php echo $tour_price_sale; ?></span>
          <span class="full"><?php echo $tour_price_old ?></span>
        </div>
        <a href="<?php echo get_permalink(178); ?>" class="info-button">Поїхати з нами</a>
      </div>
      <div class="tour-img">
        <img src="<?php echo $tour_img['sizes']['large'] ?>" alt="<?php echo the_title_attribute(); ?>">
      </div>
      <div class="tour-content">
        <!-- Main section -->
        <div class="content-title">
          <h3><span><?php echo the_field('title_about_tour'); ?></span></h3>
        </div>

				<?php the_content(); ?>
        <!-- Main section end -->
        <?php
        if( have_rows('custom_section') ):
          while ( have_rows('custom_section') ) : the_row(); 
          ?>
            <div class="content-title">
              <h3><span><?php echo the_sub_field('custom_section_title'); ?></span></h3>
            </div> 
            <?php echo the_sub_field('custom_section_content'); ?>
         <?php endwhile; endif;?>

			</div>

			<div class="tour-program">
        <div class="content-title">
          <h3><span><?php echo the_field('title_tour_program'); ?></span></h3>
        </div>
       <?php if( have_rows('tour_program') ): ?>
        <ul>
        	<?php while( have_rows('tour_program') ): the_row(); 
						$tour_day = get_sub_field('tour_day');
            $tour_day_button = get_sub_field('tour_day_button');
					?>
          <li>
            <?php if( $tour_day ): ?>
            	<input type="checkbox" checked>
            	<i></i>
            	<h4><?php echo $tour_day_button; ?></h4>
							<p><?php echo $tour_day; ?></p>
						<?php endif; ?>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif;?>
      </div>
      
      <div class="atention">
        <div class="content-title">
          <h3><span><?php echo the_field('title_atention') ?></span></h3>
        </div>
        <?php echo the_field('atention'); ?>
      </div>

		<?php
		} // end while
	} // end if
	?>

        </div>
       </div>

    </div>
	</div>
</section>

<?php get_footer(); ?>
