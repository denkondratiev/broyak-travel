<?php
/**
 * The template for displaying all single blogs
 */

get_header();
?>

	Один тур
	<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {

				the_post(); 
				the_title();
				the_content();?>
				
			<div class="container">
				<?php if( have_rows('tour_program') ): ?>
					<ul>
					<?php while( have_rows('tour_program') ): the_row(); 
						// vars
						$day = get_sub_field('tour_day');
					?>
						<li>
						<?php if( $day ): ?>
							<?php echo $day; ?>"
						<?php endif; ?>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif;?>
			</div>
	<?php
	} // end while
} // end if
?>

<?php get_footer(); ?>
