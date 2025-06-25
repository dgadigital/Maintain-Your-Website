<?php
// Ensure this file is not accessed directly
if (!defined('ABSPATH')) exit;

$section_index = $args['section_index'] ?? 0;
$section_id = get_sub_field('id'); // Text
$ticker = get_sub_field('ticker'); // Text
$title = get_sub_field('title'); // Text or WYSIWYG
$boxes = get_sub_field('boxes'); // Repeater (number, title, description)

if (empty($ticker) && empty($title) && empty($boxes)) return;
?>

<section class="numbered-boxes section-<?php echo esc_attr($section_index); ?>" <?php if ($section_id): ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?>>
  <div class="container">
    <div class="text-center pb-5">
      <?php if ($ticker): ?>
        <div class="ticker"><?php echo esc_html($ticker); ?></div>
      <?php endif; ?>
      <?php if ($title): ?>
        <h2><?php echo wp_kses_post($title); ?></h2>
      <?php endif; ?>
    </div>

    <?php if ($boxes): ?>
      <div class="boxes">
        <?php foreach ($boxes as $box):
          $number = $box['number']; // Text or Number
          $box_title = $box['title']; // Text
          $description = $box['description']; // Text
          ?>
          <div class="item box-style">
            <?php if ($number): ?><div class="number"><?php echo esc_html($number); ?></div><?php endif; ?>
            <?php if ($box_title): ?><div class="title"><?php echo esc_html($box_title); ?></div><?php endif; ?>
            <?php if ($description): ?><p><?php echo esc_html($description); ?></p><?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
