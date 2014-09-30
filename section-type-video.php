<video autoplay loop muted class="fp-video">
	<source src="<?php echo get_template_directory_uri(); ?>/examples/imgs/<?php the_field('video_filename'); ?>.mp4" type="video/mp4">
	<source src="<?php echo get_template_directory_uri(); ?>/examples/imgs/<?php the_field('video_filename'); ?>.webm" type="video/webm">
</video>
<?php if(get_field('video_overlay_text')) { ?>
	<div class="layer">
		<h1><?php the_field('video_overlay_text'); ?></h1>
	</div>
<?php }; ?>