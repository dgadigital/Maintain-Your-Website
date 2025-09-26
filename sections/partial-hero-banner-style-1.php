 <section class="hero-banner style-1">
	 <div class="container">
		 <div class="banner-wrap">
			 <div class="content">
				 <div class="banner-ticker">
					 <?php echo get_sub_field('ticker');?>
				 </div>
				 <h1><?php echo get_sub_field('title');?></h1>
				 <ul>
					 <?php if( have_rows('list') ): ?>
						 <?php while( have_rows('list') ): the_row(); ?>
							<li><?php echo get_sub_field('item');?></li>
						 <?php endwhile; ?>
					 <?php endif; ?>
				 </ul>
				 <div class="banner-cta">
					 
					 <?php if( get_sub_field('button') ): ?>
					 	<a href="<?php echo esc_url( get_sub_field('button')['url'] ); ?>" class="btn btn-solid"><?php echo get_sub_field('button')['title'] ?></a>
					<?php endif; ?>
					 
					<?php if( get_sub_field('arrow_link') ): ?>
					 	<a href="<?php echo esc_url( get_sub_field('arrow_link')['url'] ); ?>" class="link-arrow"><?php echo get_sub_field('arrow_link')['title'] ?></a>
					<?php endif; ?>
					 
				 </div>
			 </div>
			 <div class="image">
				 <img src="<?php echo get_sub_field('image');?>" class="img-fluid">
				 <p class="image-description"><?php echo get_sub_field('image_text');?></p>
			 </div>
		 </div>
	 </div>
	 <img src="<?php echo get_sub_field('floating_image');?>" class="floating-image1">
</section>