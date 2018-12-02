<footer id="contacts" class="my-footer">
        <div class="main-footer">
          <div class="container">
            <div class="row">

              <div class="col-md-4 col-sm-6 col-12 order">
                <div class="footer-column">
                  <img src="<?php the_field('site_logo', 'option'); ?>" class="logo-footer" alt="">
                  <p></p>
                  <div class="social">
      							<a href="<?php the_field('facebook_link', 'option'); ?>" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      							<a href="<?php the_field('instagram_link', 'option'); ?>" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      							<a href="<?php the_field('email_link', 'option'); ?>" target="blank"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
    							</div>
                </div>
              </div>

              <div class="col-md-4 col-sm-6 col-12">
                <div class="footer-column">
                  <div class="contacts-footer">
                  	<div class="contact-item contact-adress">
											<i class="fa fa-map-marker" aria-hidden="true"></i>
											<div class="bio"><?php the_field('adress', 'option'); ?></div>
										</div>
										<div class="contact-item contact-mail">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<div class="bio"><?php the_field('email_footer', 'option'); ?></div>
										</div>
										<div class="contact-item contact-tel">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<div class="bio"><?php the_field('phone_life', 'option'); ?></div>
										</div>
                    <div class="contact-item contact-tel">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                      <div class="bio"><?php the_field('phone_kyivstar', 'option'); ?></div>
                    </div>
                    <div class="contact-item contact-tel">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                      <div class="bio"><?php the_field('phone_mtc', 'option'); ?></div>
                    </div>
										<div class="contact-item contact-time">
											<i class="fa fa-clock-o" aria-hidden="true"></i>
											<div class="bio"><?php the_field('time_open', 'option'); ?></div>
										</div>
									</div>
                </div>
              </div>

              <div class="col-md-4 col-12">
                <div class="footer-column">
                  <div class="map">
                  	<iframe src="<?php the_field('maps_link', 'option'); ?>"></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      	
      </footer>
			
			<div class="top" title="Догори"><i class="fa <?php the_field('up_button', 'option'); ?>"></i></div>

</body>
</html>
