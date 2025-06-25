<?php
$section_index = $args['section_index'] ?? 0;
$section_id = get_sub_field('id'); // Text
$ticker = get_sub_field('ticker'); // Text
$title = get_sub_field('title'); // Text or WYSIWYG
$platform_logos = get_sub_field('platform_logos'); // Repeater (each item has 'image' subfield)

// Return early if nothing to show
if (empty($ticker) && empty($title) && empty($platform_logos)) return;
?>

<section class="platforms-logo section-<?php echo esc_attr($section_index); ?>" <?php if ($section_id): ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?>>
  <div class="container">
    <div class="text-center pb-5">
      <?php if ($ticker): ?>
        <div class="ticker"><?php echo esc_html($ticker); ?></div>
      <?php endif; ?>

      <?php if ($title): ?>
        <h2><?php echo wp_kses_post($title); ?></h2>
      <?php endif; ?>
    </div>

    <div class="content-wrapper slide-activated">
      <?php if ($platform_logos): ?>
        <div class="platforms">
          <?php foreach ($platform_logos as $logo): ?>
            <div class="item">
              <?php echo wp_get_attachment_image($logo['image'], 'full', false, ['class' => 'img-fluid']); ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <div class="more">
        <div class="slide-more">
          <span>+</span>
          <span class="text">MORE</span> 
          <svg xmlns="http://www.w3.org/2000/svg" width="11" height="18" viewBox="0 0 11 18" fill="none">
            <path d="M3.09049 16.6114C2.02052 17.6814 0.19104 16.9236 0.19104 15.4104L0.191039 1.99343C0.191039 0.48027 2.02052 -0.277522 3.09049 0.792447L9.79897 7.50093C10.4623 8.16422 10.4623 9.23962 9.79897 9.90291L3.09049 16.6114Z" fill="#262F34"/>
          </svg>
        </div>
      </div>
    </div>
  </div>
</section>
