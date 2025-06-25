<?php
$section_index = $args['section_index'] ?? 0;
$section_id = get_sub_field('id'); // text
$ticker = get_sub_field('ticker'); // text
$title = get_sub_field('title'); // text
$description = get_sub_field('description'); // wysiwyg
$button = get_sub_field('button'); // link
$list_title = get_sub_field('list_title'); // text
$list_items = get_sub_field('list_items'); // repeater (image,text,textarea)

// Return early if nothing to show
if (empty($ticker) && empty($title) && empty($description) && empty($list_items)) return;
?>

<section class="column-with-list section-<?php echo esc_attr($section_index); ?>" <?php if ($section_id): ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?>>
  <div class="container">
    <div class="content-row">

      <div class="text">
        <div class="text-wrapper">
          <?php if ($ticker): ?>
            <div class="ticker"><?php echo esc_html($ticker); ?></div>
          <?php endif; ?>

          <?php if ($title): ?>
            <h2><?php echo wp_kses_post($title); ?></h2>
          <?php endif; ?>

          <?php if ($description): ?>
            <p><?php echo wp_kses_post($description); ?></p>
          <?php endif; ?>

          <?php if ($list_items): ?>
            <ul>
              <?php foreach ($list_items as $item): ?>
                <?php
                  $item_title = $item['title'] ?? ''; // string
                  $item_description = $item['description'] ?? ''; // string
                ?>
                <li>
                  <?php if ($item_title): ?><strong><?php echo esc_html($item_title); ?>:</strong><?php endif; ?>
                  <?php echo esc_html($item_description); ?>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>

        <?php if (!empty($button['url']) && !empty($button['title'])): ?>
          <div class="btn-holder">
            <a href="<?php echo esc_url($button['url']); ?>" class="btn btn-solid" <?php if (!empty($button['target'])): ?>target="<?php echo esc_attr($button['target']); ?>"<?php endif; ?>>
              <?php echo esc_html($button['title']); ?>
            </a>
          </div>
        <?php endif; ?>
      </div>

      <div class="list">
        <?php if ($list_title): ?>
          <div class="top-title"><?php echo esc_html($list_title); ?></div>
        <?php endif; ?>

        <?php if ($list_items): ?>
          <div class="list-wrapper">
            <?php foreach ($list_items as $item): ?>
              <?php
                $icon_svg = $item['icon'] ?? ''; // SVG string
                $item_title = $item['title'] ?? '';
                $item_description = $item['description'] ?? '';
              ?>
              <div class="list-item">
                <?php if ($icon_svg): ?>
                  <div class="icon"><?php echo $icon_svg; // raw SVG ?></div>
                <?php endif; ?>
                <div class="details">
                  <?php if ($item_title): ?><div class="title"><?php echo esc_html($item_title); ?></div><?php endif; ?>
                  <?php if ($item_description): ?><p><?php echo esc_html($item_description); ?></p><?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>
