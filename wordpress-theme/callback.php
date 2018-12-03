<?php 
/*
 * Template Name: Шаблон - Форма заявки
 */

get_header();
?>



<section class="s-form">
  <div class="container">
    <div class="row">
      <div class="col-12">
      	<div class="formhead"><h3>Замовити тур</h3></div>
      	
		<div class="callback">

				<?php echo do_shortcode('[contact-form-7 id="270" title="Форма заявки"]'); ?>
      
      
    </div>

      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>