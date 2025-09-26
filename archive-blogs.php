<?php get_header(); ?>

<section class="blog-archive">
	<div class="container">

		<div class="text-center pb-5">
			<div class="ticker">blogs and guides</div>
			<h2>Website Maintenance Resources</h2>
		</div>


		<div class="wrapper-blogs">  
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); 
			$image = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$title = get_the_title();
			$excerpt = get_the_excerpt();
			$content = get_the_content();
			$categories = get_the_category();
			$tag = $categories ? $categories[0]->name : 'Uncategorized';
			?>
			<div class="item-blog">
				<div class="resources-box-archive">
					<div class="item">
						<div class="image">
							<?php if ($image): ?>
							<img src="<?php echo esc_url($image); ?>" class="absolute-image">
							<?php endif; ?>
						</div>
						<div class="content">
							<div class="title"><?php echo esc_html($title); ?></div>
							<p><?php echo esc_html(wp_trim_words($excerpt, 20, '...')); ?></p>
						</div>
					</div>
				</div>
				<div class="content-side">
					<div class="content-side-wrapper">
						<div class="tag"><?php echo esc_html($tag); ?></div>
						<div class="title"><?php echo esc_html($title); ?></div>
						<div class="copy"><?php echo esc_html(wp_trim_words($content, 80, '...')); ?></div>
					</div>
					<div class="content-side-cta">
						<a href="<?php the_permalink(); ?>" class="btn btn-solid">read more</a>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>


		<?php
		$paged = max(1, get_query_var('paged')); // fallback-safe

		global $wp_query;
		$total_pages = $wp_query->max_num_pages;

		if ($total_pages > 1): ?>
		<div class="text-center pt-5 mt-3 checkxz">
			<?php for ($page = 1; $page <= $total_pages; $page++): 
			$is_current = ($page === $paged);
			$url = get_pagenum_link($page);
			$class = 'btn btn-solid testimonial-page';
			if ($page !== $total_pages) $class .= ' mr-3';
			if ($is_current) $class .= ' active';
			?>
			<a href="<?php echo esc_url($url); ?>" class="<?php echo esc_attr($class); ?>"><?php echo $page; ?></a>
			<?php endfor; ?>
		</div>
		<?php endif; ?>

	</div>
</section>
	  


<?php get_footer(); ?>
