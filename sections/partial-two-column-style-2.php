<?php
if (!defined('ABSPATH')) exit;


$section_index = $args['section_index'] ?? 0;

// ACF fields
$section_id  = get_sub_field('id'); // Text
$image       = get_sub_field('image'); // Image ID
$ticker      = get_sub_field('ticker'); // Text
$title       = get_sub_field('title'); // Text
$content     = get_sub_field('content'); // WYSIWYG
$button      = get_sub_field('button'); // Link (array)

// Return early if nothing to show
if (empty($image) && empty($ticker) && empty($title) && empty($content) && empty($button)) {
  return;
}
?>

<section class="two-column-style-2 section-<?php echo esc_attr($section_index); ?>" <?php if ($section_id): ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?>>
  <div class="container">

    <div class="content-wrapper">
      <?php if ($image): ?>
        <div class="item left-content">
          <?php echo wp_get_attachment_image($image['ID'], 'full', false, ['class' => 'img-fluid']); ?>
        </div>
      <?php endif; ?>

      <div class="item right-content">
        <div class="right-content-text">
          <?php if ($ticker): ?>
            <div class="ticker"><?php echo esc_html($ticker); ?></div>
          <?php endif; ?>

          <?php if ($title): ?>
            <h2><?php echo wp_kses_post($title); ?></h2>
          <?php endif; ?>

          <?php if ($content): ?>
            <?php echo wp_kses_post($content); ?>
          <?php endif; ?>
        </div>

        <?php if ($button): ?>
          <a href="<?php echo esc_url($button['url']); ?>" class="btn btn-solid"
            <?php if (!empty($button['target'])): ?>
              target="<?php echo esc_attr($button['target']); ?>"
            <?php endif; ?>>
            <?php echo esc_html($button['title']); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>

  </div>
</section>
