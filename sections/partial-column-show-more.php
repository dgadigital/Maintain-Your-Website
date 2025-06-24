<?php
// Ensure this file is not accessed directly
if (!defined('ABSPATH')) exit;
$section_index = $args['section_index'] ?? 0;
$ticker = get_sub_field('ticker');
$title = get_sub_field('title');
$content = get_sub_field('content');
$image = get_sub_field('image');
$quote_text = get_sub_field('quote_text');
$quote_left_image = get_sub_field('quote_left_image');
$quote_right_image = get_sub_field('quote_right_image');

// Do not render the section if there's nothing to show
if (
    empty($ticker) &&
    empty($title) &&
    empty($content) &&
    empty($image) &&
    empty($quote_text)
) {
    return;
}
?>

<section id="section-<?php echo esc_attr($section_index); ?>" class="column-show-more">  
  <div class="container">
    <?php if (!empty($ticker) || !empty($title)): ?>  
      <div class="text-center pb-5">
        <?php if ($ticker): ?>
          <div class="ticker"><?php echo esc_html($ticker); ?></div>
        <?php endif; ?>
        <?php if ($title): ?>
          <h2><?php echo wp_kses_post($title); ?></h2>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($content) || !empty($image) || !empty($quote_text)): ?>      
      <div class="content-row">
        <div class="text">
          <?php if ($content): ?>
            <div class="content">
              <div class="text-wrapper">
                <?php echo wp_kses_post($content); ?>
                <div class="shadow"></div>
              </div>
              <div class="text-center">
                <div class="showmore">Show More +</div>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <div class="image">
          <?php if ($image): ?>
            <div class="image-wrapper">
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid">
            </div>
          <?php endif; ?>

          <?php if ($quote_text): ?>
            <div class="quote">
              <span>
                <?php if ($quote_left_image): ?>
                  <img src="<?php echo esc_url($quote_left_image['url']); ?>" alt="Quote Left" class="quote-left">
                <?php endif; ?>
                <?php echo wp_kses_post($quote_text); ?>
                <?php if ($quote_right_image): ?>
                  <img src="<?php echo esc_url($quote_right_image['url']); ?>" alt="Quote Right" class="quote-right">
                <?php endif; ?>
              </span>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
