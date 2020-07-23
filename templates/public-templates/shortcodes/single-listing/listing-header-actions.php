<?php
/**
 * @author  AazzTech
 * @since   7.0
 * @version 7.0
 */
?>
<div class="atbd_listing_action_area">

	<?php if ($enable_favourite): ?>
		<div class="atbd_action atbd_save" id="atbdp-favourites"><?php echo the_atbdp_favourites_link(); ?></div>
	<?php endif; ?>

	<?php if ($enable_social_share): ?>
		<div class="atbd_action atbd_share">
			<span class="<?php echo atbdp_icon_type(); ?>-share"><?php _e('Share', 'directorist'); ?></span>
			<div class="atbd_director_social_wrap">
				<ul>
					<?php foreach ( $social_share_data as $social ): ?>
						<li><a href="<?php echo esc_url( $social['link'] );?>"><span class="<?php echo esc_attr( $social['icon'] );?>"></span><?php echo esc_html( $social['title'] );?></a></li>
					<?php endforeach; ?>							
				</ul>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( $enable_report_abuse ): ?>
		<div class="atbd_action atbd_report">
			<?php if (atbdp_logged_in_user() || apply_filters('atbdp_allow_public_report', false)): ?>
				<span class="<?php echo atbdp_icon_type(true); ?>-flag"></span>
				<a href="" data-target="atbdp-report-abuse-modal"><?php _e('Report', 'directorist'); ?></a>
			<?php else: ?>
				<a href="javascript:void(0)" class="atbdp-require-login"><span class="<?php echo atbdp_icon_type(true); ?>-flag"></span><?php _e('Report', 'directorist'); ?></a>
			<?php endif; ?>
			<input type="hidden" id="atbdp-post-id" value="<?php echo esc_attr( $listing_id ); ?>"/>
		</div>
	<?php endif ?>

    <div class="at-modal atm-fade" id="atbdp-report-abuse-modal">
        <div class="at-modal-content at-modal-md">
            <div class="atm-contents-inner">
                <a href="" class="at-modal-close"><span aria-hidden="true">&times;</span></a>
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <form id="atbdp-report-abuse-form" class="form-vertical tst">
                            <div class="modal-header">
                                <h3 class="modal-title" id="atbdp-report-abuse-modal-label"><?php _e('Report Abuse', 'directorist'); ?></h3>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="atbdp-report-abuse-message"><?php _e('Your Complaint', 'directorist'); ?><span class="atbdp-star">*</span></label>
                                    <textarea class="form-control" id="atbdp-report-abuse-message" rows="3" placeholder="<?php _e('Message', 'directorist'); ?>..." required></textarea>
                                </div>
                                <div id="atbdp-report-abuse-g-recaptcha"></div>
                                <div id="atbdp-report-abuse-message-display"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><?php _e('Submit', 'directorist'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>