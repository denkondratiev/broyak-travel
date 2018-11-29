<?php
/**
 * The template for displaying one category
 */

get_header();
?>

	Категорія: <?php single_cat_title(); ?>
	<br>
	<br>
	<br>
<?php 
		if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		//
		the_title();
		the_content();
		//
	} // end while
} // end if
?>
                 
                   
            

<?php get_footer(); ?>

