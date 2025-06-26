<?php
if (!defined('ABSPATH')) exit;

// Section index from parent flexible content
$section_index = $args['section_index'] ?? 0;

// Custom query to fetch latest blog posts
$articles = new WP_Query([
  'post_type'      => 'post',
  'posts_per_page' => 6,
  'post_status'    => 'publish',
]);

// Bail if no posts found
if (!$articles->have_posts()) return;
?>

<section class="resources-slider section-<?php echo esc_attr($section_index); ?>">
  <div class="container">

    <div class="text-center">
      <h2><span>Website Maintenance Resources</span></h2>
    </div>

    <div class="resources-box">
      <?php foreach ($articles->posts as $post): ?>
        <?php
          $post_id    = $post->ID;
          $title      = get_the_title($post_id);
          $excerpt    = get_the_excerpt($post_id);
          $permalink  = get_permalink($post_id);
          $thumbnail  = get_the_post_thumbnail($post_id, 'medium', ['class' => 'absolute-image']);

          // Skip if no title or link
          if (empty($title) || empty($permalink)) continue;
        ?>
        <div class="item">
          <?php if ($thumbnail): ?>
            <div class="image">
              <?php echo $thumbnail; ?>
            </div>
          <?php endif; ?>

          <div class="content">
            <div class="title"><?php echo esc_html($title); ?></div>
            <?php if ($excerpt): ?>
              <p><?php echo esc_html(custom_excerpt_chars($excerpt, 100)); ?></p>
              
            <?php endif; ?>
            <a href="<?php echo esc_url($permalink); ?>" class="readmore">Read more</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center pt-5">
      <a href="/blog" class="btn btn-solid">see other RESOURCES</a>
    </div>

  </div>
</section>

<?php wp_reset_postdata(); ?>


<!-- <section class="resources-slider">
      <div class="container">
        <div class="text-center">
          <h2><span>Website Maintenance Resources</span></h2>
        </div>

        <div class="resources-box">
          
          <div class="item">
            <div class="image">
              <img src="./assets/images/resource.png" class="absolute-image">
            </div>
            <div class="content">
              <div class="title">BLOG ARTICLE TITLE</div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" class="readmore">Read more</a>
            </div>
          </div>

          <div class="item">
            <div class="image">
              <img src="./assets/images/resource.png" class="absolute-image">
            </div>
            <div class="content">
              <div class="title">BLOG ARTICLE TITLE</div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" class="readmore">Read more</a>
            </div>
          </div>

          <div class="item">
            <div class="image">
              <img src="./assets/images/resource.png" class="absolute-image">
            </div>
            <div class="content">
              <div class="title">BLOG ARTICLE TITLE</div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" class="readmore">Read more</a>
            </div>
          </div>

          <div class="item">
            <div class="image">
              <img src="./assets/images/resource.png" class="absolute-image">
            </div>
            <div class="content">
              <div class="title">BLOG ARTICLE TITLE</div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" class="readmore">Read more</a>
            </div>
          </div>
          <div class="item">
            <div class="image">
              <img src="./assets/images/resource.png" class="absolute-image">
            </div>
            <div class="content">
              <div class="title">BLOG ARTICLE TITLE</div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" class="readmore">Read more</a>
            </div>
          </div>
          <div class="item">
            <div class="image">
              <img src="./assets/images/resource.png" class="absolute-image">
            </div>
            <div class="content">
              <div class="title">BLOG ARTICLE TITLE</div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" class="readmore">Read more</a>
            </div>
          </div>
          <div class="item">
            <div class="image">
              <img src="./assets/images/resource.png" class="absolute-image">
            </div>
            <div class="content">
              <div class="title">BLOG ARTICLE TITLE</div>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" class="readmore">Read more</a>
            </div>
          </div>

        </div>

        <div class="text-center pt-5">
          <a href="#" class="btn btn-solid">see other RESOURCES</a>
        </div>
      </div>
    </section> -->