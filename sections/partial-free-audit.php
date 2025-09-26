    <section class="free-audit">
      <div class="container">
        <div class="text-center pb-5">
          <div class="ticker"><?php echo get_sub_field('ticker');?></div>
          <h2><?php echo get_sub_field('title');?></h2>
        </div>
        <div class="row">

          <div class="col-lg-6">
			  
			  <?php if( have_rows('boxes') ): ?>
				  <?php while( have_rows('boxes') ): the_row(); ?>
					  <div class="item box-style">
						  <div class="box-title">
							  <?php echo get_sub_field('title');?>
						  </div>
						  <p><?php echo get_sub_field('description');?></p>
					  </div>
				  <?php endwhile; ?>
			  <?php endif; ?>
            
          </div>
          <div class="col-lg-6">
            <div class="audit-form">

              <div class="title">Your inquiry matters</div>
				
				<?php echo do_shortcode('[contact-form-7 id="1603037" title="Free Audit"]'); ?>

            </div>
          </div>
        </div>
      </div>
    </section>