<?php
/*
 * Template Name: Шаблон - Наші Тури
 */

get_header();
?>

	<?php 
    $menuParameters = array(
      'menu'=> 'mymenu',
      'container'       => false,
      'echo'            => false,
      'items_wrap'      => '%3$s',
      'depth'           => 0,
    );
    echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
             ?>
<br>
<br>
<br>
<br>
	Наші тури
<br>
<br>
<br>
<br>


               

<?php wp_list_categories( 'style=none&separator=&current_category=button-filter' ); ?>
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
