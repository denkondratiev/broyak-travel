<?php
/**
 * The template for displaying all single blogs
 */

get_header();
?>

<section class="s-single-blog">

  <div class="container">
    <div class="row">
      
      <div class="col-12">
        <div class="single-blog-content">
          
          <?php 
						if ( have_posts() ) {
					while ( have_posts() ) {
						the_post(); 
							$blog_img = get_field('blog_img');
						?>
					<div class="content-title">
					<h3><span><?php the_title(); ?></span></h3>
				</div>
				<div class="single-blog-img">
					<img src="<?php echo $blog_img['sizes']['large'] ?>" alt="<?php echo the_title_attribute(); ?>">
				</div>

				<?php the_content(); ?>

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
