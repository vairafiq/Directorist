<?php
/**
 * @author  AazzTech
 * @since   7.0
 * @version 7.0
 */

if ($enable_video_url && !empty($videourl) && $plan_video) { ?>
	<div class="atbd_content_module atbd_custom_fields_contents">
		<div class="atbd_content_module_title_area">
			<div class="atbd_area_title">
				<h4>
					<span class="<?php atbdp_icon_type(true);?>-video-camera atbd_area_icon"></span><?php echo esc_html($video_label); ?>
				</h4>
			</div>
		</div>

		<div class="atbdb_content_module_contents">
			<iframe class="atbd_embeded_video embed-responsive-item" src="<?php echo esc_attr(ATBDP()->atbdp_parse_videos($videourl)) ?>" allowfullscreen></iframe>
		</div>
	</div>
	<?php
}