<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="resources-content">
  <div class="container">
    <div class="text-center pb-5">
      <?php
        $categories = get_the_category();
        $tag = $categories ? $categories[0]->name : 'Topic/Focus';
      ?>
      <div class="ticker"><?php echo esc_html($tag); ?></div>
      <h2><span><?php echo esc_html(get_the_title()); ?></span></h2>
    </div>

    <div class="content">
		<?php if (has_post_thumbnail()) : ?>
		<?php $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
		<div class="featured-image mb-4 text-center">
			<img src="<?php echo esc_url($image_url); ?>" class="img-fluid" alt="<?php echo esc_attr(get_the_title()); ?>">
		</div>
		<?php endif; ?>

      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
