<div class="section content-<?php the_field('slide_type'); ?>" id="content-section-<?php echo $post->ID; ?>" data-anchor="<?php echo $post->post_name; ?>">
	<?php include('section-type-'.get_field('slide_type').'.php'); ?>
</div>