<?php
$section_index = $args['section_index'] ?? 0;
$section_id = get_sub_field('id'); // Text
$ticker = get_sub_field('ticker'); // Text
$title = get_sub_field('title'); // Text
$button = get_sub_field('button'); // Link
$image = get_sub_field('image'); // Image
$floating_image = get_sub_field('floating_image'); // Image

// Return early if nothing to show
if (empty($ticker) && empty($title) && empty($button) && empty($image) && empty($floating_image)) return;
?>

<section class="small-banner section-<?php echo esc_attr($section_index); ?>" <?php if ($section_id): ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?>>
  <div class="bg brand-background"></div>

  <div class="outer-container">
    <div class="container">
      <div class="content-wrapper">
        <div class="content">
          <?php if ($ticker): ?>
            <div class="ticker"><?php echo esc_html($ticker); ?></div>
          <?php endif; ?>

          <?php if ($title): ?>
            <h2><?php echo wp_kses_post($title); ?></h2>
          <?php endif; ?>

          <?php if ($button): ?>
            <a href="<?php echo esc_url($button['url']); ?>" class="btn btn-solid" <?php if (!empty($button['target'])): ?>target="<?php echo esc_attr($button['target']); ?>"<?php endif; ?>>
              <?php echo esc_html($button['title']); ?>
            </a>
          <?php endif; ?>
        </div>

        <?php if ($image): ?>
          <div class="image">
                  <?php echo wp_get_attachment_image($image['ID'], 'full', false, ['class' => 'img-fluid']); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <?php if ($floating_image): ?>
      <img src="<?php echo $floating_image['url'] ?>" alt="" class = "floating-small-banner">
      
    <?php endif; ?>
  </div>
</section>
