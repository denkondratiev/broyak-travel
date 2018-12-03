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
        <div class="content-title">
          <h3><span>Про подорож</span></h3>
        </div>
				<?php the_content(); ?>
			</div>
			<div class="tour-program">
        <div class="content-title">
          <h3><span>Програма подорожі</span></h3>
        </div>

       <?php if( have_rows('tour_program') ): ?>
        <ul>
        	<?php while( have_rows('tour_program') ): the_row(); 
						$day = get_sub_field('tour_day');
						$day_number = get_sub_field('day_number');
					?>
          <li>
            <?php if( $day ): ?>
            	<input type="checkbox" checked>
            	<i></i>
            	<h4>Подивитись <span><?php echo $day_number ?></span> день</h4>
							<p><?php echo $day; ?></p>
						<?php endif; ?>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif;?>

      </div>
      <div class="tour-service">
        <div class="content-title">
          <h3><span>Що входить у подорож</span></h3>
        </div>
        <?php echo the_field('tour_service'); ?>
      </div>
      <div class="tour-hotel">
        <div class="content-title">
          <h3><span>Де ми будемо жити</span></h3>
        </div>

         <?php if( have_rows('our_hotel') ):
        	while( have_rows('our_hotel') ): the_row(); 
						$hotel_info = get_sub_field('hotel_info');
						$hotel_img_1 = get_sub_field('hotel_img_1');
						$hotel_img_2 = get_sub_field('hotel_img_2');
					?>

	          <?php if( $hotel_info ):
	          	echo $hotel_info; 
						endif; ?>
					<div class="img-block">
						<?php if( $hotel_img_1 ):?>
	          	<img src="<?php echo $hotel_img_1['sizes']['large']; ?>" alt="<?php echo the_title_attribute(); ?>">	 
						<?php endif; ?>
						<?php if( $hotel_img_2 ):?>
	          	<img src="<?php echo $hotel_img_2['sizes']['large']; ?>" alt="<?php echo the_title_attribute(); ?>">
						<?php	endif; ?>
					</div>

	        <?php endwhile; ?>
	      <?php endif;?>
 
      </div>
      <div class="atention">
        <div class="content-title">
          <h3><span>Зверніть увагу</span></h3>
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
