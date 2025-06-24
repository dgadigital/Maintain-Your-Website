<?php
// Load all fields first
$section_index = $args['section_index'] ?? 0;
$section_title     = get_sub_field('section_title');
$highlighted_words = get_sub_field('highlighted_words');
$logos             = get_sub_field('logos');

// Do not render the section if there's nothing to show
if (empty($section_title) && empty($highlighted_words) && empty($logos)) {
    return;
}
?>

<section class="client-logos brand-background" id="section-<?php echo esc_attr($section_index); ?>">
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
            $logo_image = isset($logo_row['logo_image']) ? $logo_row['logo_image'] : '';
          ?>
          <?php if (!empty($logo_image)): ?>
            <div class="item">
              <img class="img-fluid" src="<?php echo esc_url($logo_image); ?>" alt="Client Logo">
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
