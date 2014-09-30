<?php // to get the most out of fullPage, we need to provide a list of
// loaded section anchors from PHP, forcing this script declaration inline. ?>

<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#fullpage').fullpage({
			verticalCentered: true,
			anchors: [<?php $anchor_count = count($js_anchors);
			foreach($js_anchors as $key => $anchor) {
				if(($key+1)===$anchor_count) {
					echo "'".$anchor."'";
				} else {
					echo "'".$anchor."', ";
				}
			}?>],
			animateAnchor: true,
			menu: '#fullpage_menu',
			afterRender: function(){
				//playing the video
				jQuery('video').each(function() {
					jQuery(this).get(0).play();
				});
			}
		});
	});
</script>
