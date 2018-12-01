<?php
/*
 * Template Name: Шаблон - Цікаві статті
 */

get_header();
?>


	Всі статті
	<br>
	<br>
	<br>
	<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
				?>
	 <div><p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.</p></div>
	         	<?php
	         	 
	         	$args = array(
	         		'posts_per_page' => -1,
	         	  'post_type' => 'blogs'
	         	);
	         	 
	         	$my_query = new WP_Query( $args );
	         	 
	         	if ( $my_query->have_posts() ) {
	         	 
	         	    while ( $my_query->have_posts() ) {
	         	 
	         	        $my_query->the_post();
	         	 			/*$bla = get_field('tour_img');*/
	         	        ?>


	   				<a href="<?php the_permalink(); ?>">
	   					<div><?php the_title(); ?></div>
	   				
	   					
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
