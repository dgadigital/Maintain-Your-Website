<?php get_header(); ?>

<main class="site-archive">
  <div class="container">
    <header class="archive-header">
      <h1 class="archive-title">
        <?php
          if (is_post_type_archive()) {
            post_type_archive_title();
          } elseif (is_category()) {
            single_cat_title();
          } elseif (is_tag()) {
            single_tag_title();
          } elseif (is_author()) {
            the_post();
            echo 'Author: ' . get_the_author();
            rewind_posts();
          } elseif (is_day()) {
            echo 'Archive: ' . get_the_date();
          } elseif (is_month()) {
            echo 'Archive: ' . get_the_date('F Y');
          } elseif (is_year()) {
            echo 'Archive: ' . get_the_date('Y');
          } else {
            echo 'Archives';
          }
        ?>
      </h1>
    </header>

    <?php if (have_posts()) : ?>
      <div class="archive-posts">
        <?php while (have_posts()) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="excerpt"><?php the_excerpt(); ?></div>
          </article>
        <?php endwhile; ?>

        <div class="pagination">
          <?php the_posts_pagination(); ?>
        </div>
      </div>
    <?php else : ?>
      <p>No content found.</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
