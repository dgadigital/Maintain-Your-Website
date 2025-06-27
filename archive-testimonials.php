<?php get_header(); ?>

<section class="testimonials-section">
  <div class="container">
    <div class="text-center pb-5">
      <div class="ticker">test</div>
      <h2><span>Testimonials</span></h2>
    </div>

    <div class="testimonials-wrapper">
      <?php
        $paged = max(1, get_query_var('paged'));
        $query = new WP_Query([
          'post_type'      => 'testimonials',
          'posts_per_page' => 4,
          'paged'          => $paged,
        ]);

        if ($query->have_posts()) :
          $i = 1 + (($paged - 1) * 4);
          while ($query->have_posts()) : $query->the_post();

            $title    = get_the_title(); // Used as "name"
            $position = get_field('position');
            $company  = get_field('company');
            $content  = get_the_content();
            $reverse  = $i % 2 === 0 ? 'reverse' : '';
      ?>
        <div class="item <?php echo esc_attr($reverse); ?>">
          <div class="info">
            <div class="info-wrapper">
              <?php if ($title): ?><div class="name"><?php echo esc_html($title); ?></div><?php endif; ?>
              <?php if ($position): ?><div class="position"><?php echo esc_html($position); ?></div><?php endif; ?>
              <?php if ($company): ?><div class="company"><i><?php echo esc_html($company); ?></i></div><?php endif; ?>
            </div>
            <span class="number"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></span>
          </div>
          <div class="details">
            <p class="testimonial-text"><?php echo esc_html(wp_trim_words($content, 40, '...')); ?></p>
            
          </div>
        </div>
      <?php
          $i++;
          endwhile;
          wp_reset_postdata();
        else:
          echo '<p>No testimonials found.</p>';
        endif;
      ?>
    </div>

    <!-- Custom pagination buttons -->
    <div class="text-center pt-5 mt-3 checkxz">
      <?php
        $total_pages = $query->max_num_pages;
        if ($total_pages > 1) {
          for ($page = 1; $page <= $total_pages; $page++) {
            $is_current = $page === $paged;
            $url = get_pagenum_link($page);
            $class = 'btn btn-solid testimonial-page' . ($is_current ? ' active' : '');
            echo '<a href="' . esc_url($url) . '" class="' . esc_attr($class) . '">' . $page . '</a>';
          }
        }
      ?>
    </div>

  </div>
</section>

<?php get_footer(); ?>
