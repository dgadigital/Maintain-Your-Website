<?php
if (!defined('ABSPATH')) exit;

// Section index
$section_index = $args['section_index'] ?? 0;

// ACF fields
$section_id   = get_sub_field('id'); // Text
$ticker       = get_sub_field('ticker'); // Text
$title        = get_sub_field('title'); // Text (can include <span>)
$boxes        = get_sub_field('boxes'); // Repeater
$cta_button   = get_sub_field('cta_button'); // Link (array)
$cta_link     = get_sub_field('cta_link'); // Link (array)

// Do not render the section if empty
if (empty($ticker) && empty($title) && empty($boxes) && empty($cta_button) && empty($cta_link)) {
  return;
}
?>

<section class="vertical-boxes section-<?php echo esc_attr($section_index); ?>" <?php if ($section_id): ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?>>
  <div class="container">

    <?php if ($ticker || $title): ?>
      <div class="text-center">
        <?php if ($ticker): ?>
          <div class="ticker"><?php echo esc_html($ticker); ?></div>
        <?php endif; ?>
        <?php if ($title): ?>
          <h2><?php echo wp_kses_post($title); ?></h2>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($boxes) && is_array($boxes)): ?>
      <div class="boxes-wrapper">
        <?php foreach ($boxes as $box): ?>
          <?php
            $svg_code  = $box['svg_code'] ?? ''; // Textarea (raw SVG)
            $box_title = $box['box_title'] ?? ''; // Text
            $box_text  = $box['box_text'] ?? ''; // Textarea or WYSIWYG
          ?>
          <div class="item box-style">
            <div class="title">
              <?php if ($svg_code): ?>
                <?php echo $svg_code; // SVG is trusted raw ?>
              <?php endif; ?>
              <?php echo esc_html($box_title); ?>
            </div>
            <?php if ($box_text): ?>
              <div class="text">
                <p><?php echo wp_kses_post($box_text); ?></p>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if ($cta_button || $cta_link): ?>
      <div class="cta-wrapper">
        <?php if ($cta_button): ?>
          <a href="<?php echo esc_url($cta_button['url']); ?>" class="btn btn-solid"
            <?php if (!empty($cta_button['target'])): ?>
              target="<?php echo esc_attr($cta_button['target']); ?>"
            <?php endif; ?>>
            <?php echo esc_html($cta_button['title']); ?>
          </a><br>
        <?php endif; ?>

        <?php if ($cta_link): ?>
          <a href="<?php echo esc_url($cta_link['url']); ?>" class="link-arrow"
            <?php if (!empty($cta_link['target'])): ?>
              target="<?php echo esc_attr($cta_link['target']); ?>"
            <?php endif; ?>>
            <?php echo esc_html($cta_link['title']); ?>
          </a>
        <?php endif; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
