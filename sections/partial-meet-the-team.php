<?php
if (!defined('ABSPATH')) exit;

$section_index = $args['section_index'] ?? 0;

// ACF Fields
$section_id           = get_sub_field('id'); // Text
$ceo_image            = get_sub_field('ceo_image'); // Image ID
$ceo_title            = get_sub_field('ceo_title'); // Text
$ceo_paragraphs       = get_sub_field('ceo_paragraphs'); // WYSIWYG
$ceo_name             = get_sub_field('ceo_name'); // Text
$ceo_position         = get_sub_field('ceo_position'); // Text
$group_title_1        = get_sub_field('group_title_1'); // Text
$group_text_1         = get_sub_field('group_text_1'); // WYSIWYG
$group_title_2        = get_sub_field('group_title_2'); // Text
$group_text_2         = get_sub_field('group_text_2'); // WYSIWYG
$team_members         = get_sub_field('team_members'); // Repeater (each with: image (Image ID), description (Text), name (Text), position (Text))

if (empty($ceo_image) && empty($ceo_paragraphs) && empty($team_members)) return;
?>

<section class="meet-the-team section-<?php echo esc_attr($section_index); ?>" <?php if ($section_id): ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?>>
  <div class="container">

    <?php if ($ceo_image || $ceo_paragraphs): ?>
      <div class="ceo-section">
        <div class="content-row">
          <?php if ($ceo_image): ?>
            <div class="image">
              <div class="image-wrapper box-style">
                <?php echo wp_get_attachment_image($ceo_image, 'full'); ?>
              </div>
            </div>
          <?php endif; ?>

          <div class="content">
            <div class="text">
              <?php if ($ceo_title): ?><h2><?php echo esc_html($ceo_title); ?></h2><?php endif; ?>
              <?php if ($ceo_paragraphs): ?>
                <?php echo wp_kses_post($ceo_paragraphs); ?>
              <?php endif; ?>
            </div>
            <?php if ($ceo_name || $ceo_position): ?>
              <div class="details">
                <?php if ($ceo_name): ?><div class="name"><?php echo esc_html($ceo_name); ?></div><?php endif; ?>
                <?php if ($ceo_position): ?><div class="position"><i><?php echo esc_html($ceo_position); ?></i></div><?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="team-section">
      <div class="text">
        <?php if ($group_title_1 || $group_text_1): ?>
          <div class="meet">
            <?php if ($group_title_1): ?><h2><?php echo wp_kses_post($group_title_1); ?></h2><?php endif; ?>
            <?php if ($group_text_1): ?><?php echo wp_kses_post($group_text_1); ?><?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($group_title_2 || $group_text_2): ?>
          <div class="meet">
            <?php if ($group_title_2): ?><h2><?php echo wp_kses_post($group_title_2); ?></h2><?php endif; ?>
            <?php if ($group_text_2): ?><?php echo wp_kses_post($group_text_2); ?><?php endif; ?>
          </div>
        <?php endif; ?>
      </div>

      <?php if ($team_members): ?>
        <div class="team-images">
          <?php foreach ($team_members as $member): ?>
            <?php
              $image     = $member['image'] ?? ''; // Image ID
              $text      = $member['description'] ?? ''; // wysiwyg
              $name      = $member['name'] ?? ''; // Text
              $position  = $member['position'] ?? ''; // Text
            ?>
            <div class="item box-style">
              <?php if ($image): ?>
                <div class="image-wrapper">
                  <?php echo wp_get_attachment_image($image, 'full', false, ['class' => 'absolute-image']); ?>
                </div>
              <?php endif; ?>
              <div class="content-wrapper">
                <?php if ($text): ?><p><?php echo esc_html($text); ?></p><?php endif; ?>
                <div class="item-details">
                  <?php if ($name): ?><div class="team-name"><?php echo esc_html($name); ?></div><?php endif; ?>
                  <?php if ($position): ?><div class="team-position"><i><?php echo esc_html($position); ?></i></div><?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </div>

  </div>
</section>
