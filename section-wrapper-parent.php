<div class="section" id="content-section-<?php echo $post->ID; ?>" data-anchor="<?php echo $post->post_name; ?>">

	<div class="slide content-<?php the_field('slide_type'); ?>" id="slide-<?php echo $post->post_name; ?>">
		<?php include('section-type-'.get_field('slide_type').'.php'); ?>
	</div>

	<?php $child_args = array(
		'post_type'		=>	'page',
		'post_status'	=>	'publish',
		'post_parent'	=>	$post->ID,
		'orderby'		=>	'menu_order',
		'order'			=>	'ASC'	
	);

	$child_query = new WP_Query($child_args);
	if($child_query->have_posts()) : while($child_query->have_posts()) : $child_query->the_post(); ?>

		<div class="slide content-<?php the_field('slide_type'); ?>" id="<?php echo $post->post_name; ?>">
			<?php include('section-type-'.get_field('slide_type').'.php'); ?>
		</div>

	<?php endwhile; endif; 
	wp_reset_query(); ?>

</div>