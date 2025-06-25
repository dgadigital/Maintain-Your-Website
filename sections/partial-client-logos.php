<?php

$section_index       = $args['section_index'] ?? 0;
$section_id          = get_sub_field('id'); // Text
$section_title       = get_sub_field('section_title'); // Text
$highlighted_words   = get_sub_field('highlighted_words'); // Text
$logos               = get_sub_field('logos'); // Repeater

// Do not render the section if there's nothing to show
if (empty($section_title) && empty($highlighted_words) && empty($logos)) {
    return;
}
?>

<section class="client-logos brand-background section-<?php echo esc_attr($section_index); ?>" <?php if ($section_id): ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?>>
  <div class="container">

    <?php if ($section_title || $highlighted_words): ?>
      <div class="text-center">
        <h2>
          <?php if ($highlighted_words): ?>
            <span><?php echo esc_html($highlighted_words); ?></span>
          <?php endif; ?>
          <?php if ($section_title): ?>
            <?php echo esc_html($section_title); ?>
          <?php endif; ?>
        </h2>
      </div>
    <?php endif; ?>

    <?php if (!empty($logos) && is_array($logos)): ?>
      <div class="logo-wrapper">
          <?php foreach ($logos as $logo_row): ?>
            <?php
              $logo_url = $logo_row['logo_image'] ?? '';
              if ($logo_url):
            ?>
              <div class="item">
                <img src="<?php echo esc_url($logo_url); ?>" class="img-fluid" alt="Client Logo">
              </div>
            <?php endif; ?>
          <?php endforeach; ?>


      </div>
    <?php endif; ?>

  </div>
</section>
