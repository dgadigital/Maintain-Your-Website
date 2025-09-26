<section class="hero-banner style-5 <?php if( get_sub_field('center_floating_image') ): ?>center<?php endif; ?>">
  <div class="container">
    <div class="banner-wrap">
      <div class="content">
        <h1><?php echo get_sub_field('title'); ?></h1>
        <p class="decription"><?php echo get_sub_field('description'); ?></p>
      </div>
      <div class="image">
        <img src="<?php echo get_sub_field('image'); ?>" class="img-fluid">
      </div>
    </div>
  </div>
  <img src="<?php echo get_sub_field('floating_image'); ?>" class="floating-image2">
</section>
