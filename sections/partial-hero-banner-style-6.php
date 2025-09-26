<section class="hero-banner style-6">
  <div class="container">
    <div class="banner-wrap">
      <div class="content">
        <h1><?php echo get_sub_field('title'); ?></h1>
      </div>
      <div class="image text-center">
        <img src="<?php echo get_sub_field('image'); ?>" class="img-fluid">
        <p class="decription"><?php echo get_sub_field('description'); ?></p>
        <?php if (get_sub_field('button')): ?>
          <a href="<?php echo esc_url(get_sub_field('button')['url']); ?>" class="btn btn-solid">
            <?php echo get_sub_field('button')['title']; ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <img src="<?php echo get_sub_field('floating_image'); ?>" class="floating-image2">
</section>
