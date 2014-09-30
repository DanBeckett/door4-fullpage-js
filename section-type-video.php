<video autoplay loop muted class="fp-video">
	<source src="<?php the_field('video_media_mp4'); ?>" type="video/mp4">
	<source src="<?php the_field('video_media_webm'); ?>" type="video/webm">
</video>
<?php if(get_field('video_overlay_text')) { ?>
	<div class="layer">
		<h1><?php the_field('video_overlay_text'); ?></h1>
	</div>
<?php }; ?>