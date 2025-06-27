<?php
if (!defined('ABSPATH')) exit;

// Section index
$section_index = $args['section_index'] ?? 0;

// ACF Fields
$section_id = get_sub_field('id'); // Text
$ticker     = get_sub_field('ticker'); // Text
$section_title     = get_sub_field('section_title'); // Text

// Get testimonials (limit to 4)
$testimonials = get_posts([
    'post_type'      => 'testimonials',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
]);

// Early return if nothing to show

?>

<section class="testimonials-section section-<?php echo esc_attr($section_index); ?>" <?php if ($section_id): ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?>>
  <div class="container">

    <?php if ($section_title): ?>
      <div class="text-center pb-5">
        <div class="ticker"><?php echo esc_html($ticker); ?></div>
        <h2><?php echo ($section_title); ?></h2>
      </div>
    <?php endif; ?>

    <?php if (!empty($testimonials)): ?>
      <div class="testimonials-wrapper">
        <?php foreach ($testimonials as $index => $post): 
          setup_postdata($post);

          $name     = get_the_title($post);
          $content  = get_the_content(null, false, $post);
          $position = get_field('position', $post->ID);
          $company  = get_field('company', $post->ID);
          $number   = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
          $reverse  = ($index % 2 !== 0) ? ' reverse' : '';
        ?>
        <div class="item<?php echo esc_attr($reverse); ?>">
          <div class="info">
            <div class="info-wrapper">
              <?php if ($name): ?>
                <div class="name"><?php echo esc_html($name); ?></div>
              <?php endif; ?>
              <?php if ($position): ?>
                <div class="position"><?php echo esc_html($position); ?></div>
              <?php endif; ?>
              <?php if ($company): ?>
                <div class="company"><i><?php echo esc_html($company); ?></i></div>
              <?php endif; ?>
            </div>
            <span class="number"><?php echo esc_html($number); ?></span>
          </div>
          <div class="details">
            <div class="testimonial-text shorten"><p><?php echo wp_kses_post($content); ?></p></div>

            <a href="/testimonials" class="readmore-testimonials">READ MORE</a>
          </div>
        </div>
        <?php endforeach; wp_reset_postdata(); ?>
      </div>
    <?php endif; ?>

    <div class="text-center pt-5 mt-3">
      <a href="/testimonials" class="btn btn-solid">SEE MORE</a>
    </div>

  </div>
</section>
