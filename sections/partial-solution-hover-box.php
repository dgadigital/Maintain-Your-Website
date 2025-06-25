<?php
if (!defined('ABSPATH')) exit;

// Section index
$section_index = $args['section_index'] ?? 0;

// ACF fields
$section_id = get_sub_field('id'); // Text
$ticker     = get_sub_field('ticker'); // Text
$title      = get_sub_field('title'); // Text
$boxes      = get_sub_field('boxes'); // Repeater

// Return early if nothing to show
if (empty($ticker) && empty($title) && empty($boxes)) {
  return;
}
?>

<section class="solution-hover-box section-<?php echo esc_attr($section_index); ?>" <?php if ($section_id): ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?>>
  <div class="container">

    <?php if ($ticker || $title): ?>
      <div class="text-center pb-5">
        <?php if ($ticker): ?>
          <div class="ticker"><?php echo esc_html($ticker); ?></div>
        <?php endif; ?>
        <?php if ($title): ?>
          <h2><?php echo wp_kses_post($title); ?></h2>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($boxes) && is_array($boxes)): ?>
      <div class="box-wrapper">
        <?php foreach ($boxes as $box): ?>
          <?php
            $image = $box['image'] ?? ''; // Image ID
            $text  = $box['title'] ?? ''; // Text
            $link  = $box['link'] ?? '#'; // URL
          ?>
          <div class="item box-style">
            <?php if ($image): ?>
              <div class="image">
                <?php echo wp_get_attachment_image($image, 'full', false, ['class' => 'absolute-image']); ?>
              </div>
            <?php endif; ?>

            <?php if ($text): ?>
              <a href="<?php echo esc_url($link); ?>" class="title">
                <?php echo esc_html($text); ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="17" viewBox="0 0 11 17" fill="none">
                  <path d="M3.28006 16.1911C2.24352 17.2277 0.471191 16.4935 0.471191 15.0277L0.471191 2.02984C0.47119 0.563944 2.24352 -0.17018 3.28006 0.866363L9.77897 7.36527C10.4215 8.00784 10.4215 9.04965 9.77897 9.69222L3.28006 16.1911Z" />
                </svg>
              </a>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
