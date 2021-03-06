<?php
/**
 * @author  AazzTech
 * @since   6.6
 * @version 6.6
 */

?>
<div id="directorist" class="directorist atbd_wrapper directory_search_area atbdp-bg-white atbdp-style-meterial single_area ads-advaced--wrapper" style="background-image: url('<?php echo !empty( $bgimg['url'] ) ? esc_url( $bgimg['url'] ) : ''; ?>')">
	<div class="<?php echo esc_attr( $container_class ); ?>">

		<?php
		/**
		 * @since 5.0.8
		 */
		do_action('atbdp_search_listing_before_title');

		if ( $searchform->show_title_subtitle && ( $searchform->search_bar_title || $searchform->search_bar_sub_title ) ) { ?>

			<div class="atbd_search_title_area">
				<?php if ($searchform->search_bar_title): ?>
					<h2 class="title"><?php echo esc_html($searchform->search_bar_title); ?></h2>
				<?php endif; ?>

				<?php if ($searchform->search_bar_sub_title): ?>
					<p class="sub_title"><?php echo esc_html($searchform->search_bar_sub_title); ?></p>
				<?php endif; ?>
			</div>

		<?php } ?>

		<form action="<?php echo ATBDP_Permalink::get_search_result_page_link(); ?>" role="form" class="atbd_ads-form">
			<div class="atbd_seach_fields_wrapper"<?php echo $border_inline_style; ?>>
				<?php
				/**
				 * @since 5.10.0
				 */
				do_action('atbdp_before_search_form');

				$searchform->listing_type_template();
				$term = get_term( $searchform->listing_type, ATBDP_TYPE );
				$slug = $term->slug;
				?>
				<input type="hidden" name="directory_type" id="listing_type" value="<?php echo esc_attr( $slug ); ?>">
				<div class="atbdp-whole-search-form">
					<div class="row atbdp-search-form atbdp-search-form-inline">
						<?php
						foreach ( $searchform->form_data[0]['fields'] as $field ){
							$searchform->field_template( $field );
						}
						if ( $searchform->more_filters_display !== 'always_open' ){
							$searchform->more_buttons_template();
						}
						
						?>
					</div>

					<?php
					if ( $searchform->more_filters_display == 'always_open' ){
						$searchform->advanced_search_form_fields_template();
					}
					else {
					
						if ($searchform->has_more_filters_button) { ?>
							<div class="<?php echo ('overlapping' === $searchform->more_filters_display ) ? 'ads_float' : 'ads_slide' ?>">
								<?php $searchform->advanced_search_form_fields_template();?>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</form>
		
		<?php do_action('atbdp_search_listing_after_search_bar'); ?>
		<?php $searchform->top_categories_template(); ?>

	</div>
</div>