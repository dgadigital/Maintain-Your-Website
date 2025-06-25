<?php
if (!defined('ABSPATH')) exit;

// Section index
$section_index = $args['section_index'] ?? 0;

// ACF fields
$section_id = get_sub_field('id'); // Text
$ticker     = get_sub_field('ticker'); // Text
$title      = get_sub_field('title'); // Text
$image      = get_sub_field('image'); // Image ID
$boxes      = get_sub_field('boxes'); // Repeater

// Return early if nothing to show
if (empty($ticker) && empty($title) && empty($image) && empty($boxes)) {
  return;
}
?>

<section class="two-column-style-1 section-<?php echo esc_attr($section_index); ?>" <?php if ($section_id): ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?>>
  <div class="container">
    <div class="content-wrapper">

      <div class="item left-content">
        <?php if ($ticker): ?>
          <div class="ticker"><?php echo esc_html($ticker); ?></div>
        <?php endif; ?>

        <?php if ($title): ?>
          <h2><?php echo wp_kses_post($title); ?></h2>
        <?php endif; ?>

        <?php if ($image): ?>
          <br>
          <?php echo wp_get_attachment_image($image, 'full', false, ['class' => 'img-fluid']); ?>
        <?php endif; ?>
      </div>

      <div class="item right-content">
        <?php if (!empty($boxes) && is_array($boxes)): ?>
          <?php foreach ($boxes as $box): ?>
            <?php
              $heading = $box['heading'] ?? ''; // Text
              $text    = $box['text'] ?? ''; // Textarea or WYSIWYG
              $button  = $box['button'] ?? ''; // Link
            ?>
            <div class="inside-box">
              <?php if ($heading): ?>
                <h3><?php echo esc_html($heading); ?></h3>
              <?php endif; ?>

              <?php if ($text): ?>
                <p><?php echo wp_kses_post($text); ?></p>
              <?php endif; ?>

              <?php if (!empty($button)): ?>
                <a href="<?php echo esc_url($button['url']); ?>" class="btn btn-solid"
                  <?php if (!empty($button['target'])): ?>
                    target="<?php echo esc_attr($button['target']); ?>"
                  <?php endif; ?>>
                  <?php echo esc_html($button['title']); ?>
                </a>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>
