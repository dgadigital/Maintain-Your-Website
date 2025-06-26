    <?php
if (!defined('ABSPATH')) exit;


$id = get_sub_field('id'); // Text
$title = get_sub_field('title'); // Text
$subtitle = get_sub_field('subtitle'); // Text
$contact_phone = get_sub_field('contact_phone'); // Text
$contact_email = get_sub_field('contact_email'); // Text
$contact_address = get_sub_field('contact_address'); // Textarea
$social_links = get_sub_field('social_links'); // Repeater
$form_title = get_sub_field('form_title'); // Text
$form_description = get_sub_field('form_description'); // WYSIWYG
$form_shortcode = get_sub_field('form_shortcode'); // Text
$map_embed = get_sub_field('map_embed'); // WYSIWYG

if (
  empty($title) &&
  empty($subtitle) &&
  empty($contact_phone) &&
  empty($contact_email) &&
  empty($contact_address) &&
  empty($form_shortcode) &&
  empty($map_embed)
) return;
?>

<section class="contact-us" id="<?php echo esc_attr($id); ?>">
  <div class="container">
    <div class="content-row">
      <div class="content">
        <?php if ($title): ?>
          <h2><span><?php echo esc_html($title); ?></span></h2>
        <?php endif; ?>

        <?php if ($subtitle): ?>
          <p><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>

        <div class="details">
          <?php if ($contact_phone): ?>
            <div class="item">
              <div class="title">Contact Us</div>
              <p><a href="tel:<?php echo esc_attr($contact_phone); ?>"><?php echo esc_html($contact_phone); ?></a></p>
            </div>
          <?php endif; ?>

          <?php if ($contact_address): ?>
            <div class="item">
              <div class="title">Event Location</div>
              <?php echo nl2br(($contact_address)); ?>
            </div>
          <?php endif; ?>

          <?php if ($contact_email): ?>
            <div class="item">
              <div class="title">Email</div>
              <p><a href="mailto:<?php echo esc_attr($contact_email); ?>"><?php echo esc_html($contact_email); ?></a></p>
            </div>
          <?php endif; ?>

          <?php if (!empty($social_links)): ?>
            <div class="item">
              <div class="title">Follow Us</div>
              <div class="socials">
                <?php foreach ($social_links as $social): ?>
                  <?php
                  $url = $social['url']; // Url
                  $icon_svg = $social['icon']; // SVG as WYSIWYG
                  ?>
                  <?php if ($url && $icon_svg): ?>
                    <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener">
                      <?php echo $icon_svg; ?>
                    </a>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="form">
        <div class="form-wrapper">
          <?php if ($form_title): ?>
            <div class="title"><?php echo esc_html($form_title); ?></div>
          <?php endif; ?>

          <?php if ($form_description): ?>
            <?php echo ($form_description); ?>
          <?php endif; ?>

          <?php if ($form_shortcode): ?>
            <div class="actual-form">
              <?php echo do_shortcode($form_shortcode); ?>
                            <!-- 
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Contact Number">
                </div>
                <div class="form-group pt-4">
                  <textarea class="form-control" placeholder="Message"></textarea>
                </div>
                <button type="submit" class="btn btn-solid round mt-4">Send message</button>
               -->
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <?php if ($map_embed): ?>
      <div class="map-section">
        <?php echo $map_embed; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

    
