<div class="blog-carousel-item">
	<article>
		<div class="wpt-post-thumbnail">
			<a href="<?php echo get_the_permalink($blog); ?>">
				<img src="<?php echo $featured_image; ?>">
			</a>
		</div>

		<div class="text">
			<h4><a href="<?php echo get_the_permalink($blog); ?>" title="Link to<?php echo $blog->post_title; ?>"><?php echo $blog->post_title; ?></a></h4>
		</div>
	</article>
</div>
