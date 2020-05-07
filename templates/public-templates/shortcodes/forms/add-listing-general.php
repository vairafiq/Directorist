<?php
/**
 * @author  AazzTech
 * @since   7.0
 * @version 7.0
 */
?>
<div class="atbd_content_module atbd_general_information_module">
	<div class="atbd_content_module_title_area">
		<div class="atbd_area_title">
			<h4><?php esc_html_e('General information', 'directorist') ?></h4>
		</div>
	</div>
	<div class="atbdb_content_module_contents">
		<?php if (empty($display_title_for)) { ?>
			<div class="form-group" id="atbdp_listing_title">
				<label for="listing_title"><?php
					esc_html_e($title . ':', 'directorist');
					if ($require_title) {
						echo '<span class="atbdp_make_str_red"> *</span>';
					} ?></label>
				<input type="text" name="listing_title"
					   value="<?php echo !empty($listing->post_title) ? esc_attr($listing->post_title) : ''; ?>"
					   class="form-control directory_field"
					   placeholder="<?php echo __('Enter a title', 'directorist'); ?>"/>
			</div>
		<?php } ?>
		<?php if (empty($display_desc_for)) { ?>
			<div class="form-group" id="atbdp_listing_content">
				<label for="listing_content"><?php
					esc_html_e($long_details . ':', 'directorist');
					if ($require_long_details) {
						echo '<span class="atbdp_make_str_red"> *</span>';
					} ?></label>
				<?php wp_editor(
					!empty($listing->post_content) ? wp_kses_post($listing->post_content) : '',
					'listing_content',
					apply_filters('atbdp_add_listing_wp_editor_settings', array(
						'media_buttons' => false,
						'quicktags' => true,
						'editor_height' => 200
					))); ?>
			</div>
		<?php } ?>
		<?php if (!empty($display_tagline_field) && empty($display_tagline_for)) { ?>
			<div class="form-group" id="atbdp_excerpt">
				<label for="atbdp_excerpt"><?php
					esc_html_e($tagline_label . ':', 'directorist');
					?></label>
				<input type="text" name="tagline"
					   id="has_tagline"
					   value="<?php echo !empty($tagline) ? esc_attr($tagline) : ''; ?>"
					   class="form-control directory_field"
					   placeholder="<?php echo esc_attr($tagline_placeholder); ?>"/>
			</div>
		<?php } ?>
		<?php
		//data for average price range
		$plan_average_price = true;
		if (is_fee_manager_active()) {
			$plan_average_price = is_plan_allowed_average_price_range($fm_plan);
		}
		$plan_price = true;
		if (is_fee_manager_active()) {
			$plan_price = is_plan_allowed_price($fm_plan);
		}
		$price_range = !empty($price_range) ? $price_range : '';
		$atbd_listing_pricing = !empty($atbd_listing_pricing) ? $atbd_listing_pricing : '';

		if (empty($display_price_for && $display_price_range_for) && !empty($display_pricing_field || $display_price_range_field) && ($plan_average_price || $plan_price)) {
			?>
			<div class="form-group" id="atbd_pricing">
				<input type="hidden" id="atbd_listing_pricing"
					   value="<?php echo $atbd_listing_pricing ?>">
				<label for="#"><?php
					esc_html_e($pricing_label . ':', 'directorist');
					?></label>
				<div class="atbd_pricing_options">
					<?php
					if ($plan_price && empty($display_price_for) && !empty($display_pricing_field)) {
						?>
						<label for="price_selected" data-option="price">
							<input type="checkbox" id="price_selected" value="price"
								   name="atbd_listing_pricing"
								<?php echo ('price' === $atbd_listing_pricing) ? 'checked' : (empty($p_id) ? 'checked' : ''); ?>>
							<?php
							/*Translator: % is the name of the currency such eg. USD etc.*/
							printf(esc_html__('%s [%s]%s', 'directorist'), $price_label, $currency, $require_price ? '<span class="atbdp_make_str_red">*</span>' : ''); ?>
						</label>
						<?php
					}
					if ($plan_average_price && empty($display_price_range_for) && !empty($display_price_range_field)) {
						if ($plan_price && empty($display_price_for) && !empty($display_pricing_field)) {
							printf('<span>%s</span>', __('Or', 'directorist'));
						}
						?>
						<label for="price_range_selected" data-option="price_range">
							<input type="checkbox" id="price_range_selected"
								   value="range"
								   name="atbd_listing_pricing" <?php echo ('range' === $atbd_listing_pricing) ? 'checked' : ''; ?>>
							<?php
							echo esc_attr($price_range_label);
							echo $require_price_range ? '<span class="atbdp_make_str_red">*</span>' : ''; ?>
							<!--<p id='price_range_option'><?php /*echo __('Price Range', 'directorist'); */ ?></p></label>-->
						</label>
						<?php
					}
					?>

					<small><?php _e('(Optional - Uncheck to hide pricing for this listing)', 'directorist') ?></small>
				</div>

				<?php
				if ($plan_price && empty($display_price_for) && !empty($display_pricing_field)) {
					/**
					 * @since 6.2.1
					 */
					do_action('atbdp_add_listing_before_price_field', $p_id);
					?>
					<input type="number" <?php echo !empty($allow_decimal) ? 'step="any"' : ''; ?>
						   id="price" name="price"
						   value="<?php echo !empty($price) ? esc_attr($price) : ''; ?>"
						   class="form-control directory_field"
						   placeholder="<?php echo esc_attr($price_placeholder); ?>"/>

				<?php }
				if ($plan_average_price && empty($display_price_range_for) && !empty($display_price_range_field)) {
					$c_symbol = atbdp_currency_symbol($currency);
					?>
					<select class="form-control directory_field" id="price_range"
							name="price_range">
						<option value=""><?php echo esc_attr($price_range_placeholder); ?></option>
						<option value="skimming" <?php selected($price_range, 'skimming'); ?>>
							<?php echo __('Ultra High ', 'directorist') . '(' . $c_symbol, $c_symbol, $c_symbol, $c_symbol . ')'; ?>
						</option>
						<option value="moderate" <?php selected($price_range, 'moderate'); ?>>
							<?php echo __('Expensive ', 'directorist') . '(' . $c_symbol, $c_symbol, $c_symbol . ')'; ?>
						</option>
						<option value="economy" <?php selected($price_range, 'economy'); ?>>
							<?php echo __('Moderate ', 'directorist') . '(' . $c_symbol, $c_symbol . ')'; ?>
						</option>
						<option value="bellow_economy" <?php selected($price_range, 'bellow_economy'); ?>>
							<?php echo __('Cheap ', 'directorist') . '(' . $c_symbol . ')'; ?>
						</option>
					</select>
				<?php }

				/**
				 * @since 4.7.1
				 * It fires after the price field
				 */
				do_action('atbdp_add_listing_after_price_field', $p_id);
				?>
			</div>

		<?php }
		if (!empty($display_views_count) && empty($display_views_count_for)) { ?>
			<div class="form-group">
				<label for="atbdp_views_count"><?php
					esc_html_e($views_count_label . ':', 'directorist'); ?></label>

				<input type="text" id="views_Count" name="atbdp_post_views_count"
					   value="<?php echo !empty($atbdp_post_views_count) ? esc_attr($atbdp_post_views_count) : ''; ?>"
					   class="form-control directory_field"/>
			</div>
		<?php }
		/**
		 * @since 4.7.1
		 * It fires after the price field
		 */
		do_action('atbdp_add_listing_after_price', $p_id);
		?>
		<?php if (!empty($display_excerpt_field) && empty($display_short_desc_for)) { ?>
			<div class="form-group" id="atbdp_excerpt_area">
				<label for="atbdp_excerpt"><?php
					esc_html_e($excerpt_label . ':', 'directorist');
					echo $require_excerpt ? '<span class="atbdp_make_str_red">*</span>' : ''; ?></label>
				<!--@todo; later let user decide if he wants to show tinymce or normal textarea-->
				<input type="hidden" id="has_excerpt"
					   value="<?php echo !empty($excerpt) ? esc_textarea(stripslashes($excerpt)) : ''; ?>">
				<textarea name="excerpt" id="atbdp_excerpt"
						  class="form-control directory_field" cols="30" rows="5"
						  placeholder="<?php echo esc_attr($excerpt_placeholder); ?>"><?php echo !empty($excerpt) ? esc_textarea(stripslashes($excerpt)) : ''; ?></textarea>
			</div>
		<?php }

		/**
		 * @since 5.10.0
		 * It fires after the excerpt field
		 */
		do_action('atbdp_add_listing_after_excerpt', $p_id);
		?>
		<!--***********************************************************************
			 Run the custom field loop to show all published custom fields asign to form
			 **************************************************************************-->
		<?php
		// custom fields information
		//// get all the custom field that has posted by admin ane return the field
		$custom_fields = new WP_Query(array(
			'post_type' => ATBDP_CUSTOM_FIELD_POST_TYPE,
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'meta_key' => 'associate',
			'meta_value' => 'form',
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => 'admin_use',
					'compare' => 'NOT EXISTS'
				),
				array(
					'key' => 'admin_use',
					'value' => 1,
					'compare' => '!='
				),
			)
		));
		$plan_custom_field = true;
		if (is_fee_manager_active()) {
			$plan_custom_field = is_plan_allowed_custom_fields($fm_plan);
		}
		if ($plan_custom_field) {
			$fields = $custom_fields->posts;
		} else {
			$fields = array();
		}
		foreach ($fields as $post) {
			setup_postdata($post);
			$post_id = $post->ID;
			$cf_required = get_post_meta(get_the_ID(), 'required', true);
			$post_meta = get_post_meta($post_id);
			$instructions = get_post_meta(get_the_ID(), 'instructions', true);
			?>
			<div class="form-group" id="atbdp_custom_field_area">
				<label for=""><?php the_title(); ?><?php if ($cf_required) {
						echo '<span style="color: red"> *</span>';
					}
					if (!empty($instructions)) {
						printf('<span class="atbd_tooltip atbd_tooltip--fw" aria-label="%s"> <i class="fa fa-question-circle"></i></span>', $instructions);
					}
					?>
				</label>
				<?php
				if (isset($post_meta[$post->ID])) {
					$value = $post_meta[0];
				}
				$value = get_post_meta($p_id, $post_id, true); ///store the value for the db
				$cf_meta_default_val = get_post_meta(get_the_ID(), 'default_value', true);

				if (isset($post_id)) {
					$cf_meta_default_val = $post_id;
				}
				$cf_meta_val = get_post_meta(get_the_ID(), 'type', true);
				$cf_rows = get_post_meta(get_the_ID(), 'rows', true);
				$cf_placeholder = '';
				switch ($cf_meta_val) {
					case 'text' :
						echo '<div>';
						printf('<input type="text" name="custom_field[%d]" class="form-control directory_field" placeholder="%s" value="%s"/>', $post_id, $cf_placeholder, $value);
						echo '</div>';
						break;
					case 'number' :
						echo '<div>';
						printf('<input type="number" %s  name="custom_field[%d]" class="form-control directory_field" placeholder="%s" value="%s"/>', !empty($allow_decimal) ? 'step="any"' : '', $post_id, $cf_placeholder, $value);
						echo '</div>';
						break;
					case 'textarea' :
						echo '<div>';
						printf('<textarea  class="form-control directory_field" name="custom_field[%d]" class="textarea" rows="%d" placeholder="%s">%s</textarea>', $post->ID, (int)$cf_rows, esc_attr($cf_placeholder), esc_textarea($value));
						echo '</div>';
						break;
					case 'radio':
						echo '<div>';
						$choices = get_post_meta(get_the_ID(), 'choices', true);
						$choices = explode("\n", $choices);
						echo '<ul class="atbdp-radio-list vertical">';
						foreach ($choices as $choice) {
							if (strpos($choice, ':') !== false) {
								$_choice = explode(':', $choice);
								$_choice = array_map('trim', $_choice);

								$_value = $_choice[0];
								$_label = $_choice[1];
							} else {
								$_value = trim($choice);
								$_label = $_value;
							}
							$_checked = '';
							if (trim($value) == $_value) $_checked = ' checked="checked"';

							printf('<li><label><input type="radio" name="custom_field[%d]" value="%s"%s>%s</label></li>', $post->ID, $_value, $_checked, $_label);
						}
						echo '</ul>';
						echo '</div>';
						break;

					case 'select' :
						echo '<div>';
						$choices = get_post_meta(get_the_ID(), 'choices', true);
						$choices = explode("\n", $choices);
						printf('<select name="custom_field[%d]" class="form-control directory_field">', $post->ID);
						if (!empty($field_meta['allow_null'][0])) {
							printf('<option value="">%s</option>', '- ' . __('Select an Option', 'directorist') . ' -');
						}
						foreach ($choices as $choice) {
							if (strpos($choice, ':') !== false) {
								$_choice = explode(':', $choice);
								$_choice = array_map('trim', $_choice);

								$_value = $_choice[0];
								$_label = $_choice[1];
							} else {
								$_value = trim($choice);
								$_label = $_value;
							}

							$_selected = '';
							if (trim($value) == $_value) $_selected = ' selected="selected"';

							printf('<option value="%s"%s>%s</option>', $_value, $_selected, $_label);
						}
						echo '</select>';
						echo '</div>';
						break;

					case 'checkbox' :
						echo '<div>';
						$choices = get_post_meta(get_the_ID(), 'choices', true);
						$choices = explode("\n", $choices);

						$values = explode("\n", $value);
						$values = array_map('trim', $values);
						echo '<ul class="atbdp-checkbox-list vertical">';

						foreach ($choices as $choice) {
							if (strpos($choice, ':') !== false) {
								$_choice = explode(':', $choice);
								$_choice = array_map('trim', $_choice);

								$_value = $_choice[0];
								$_label = $_choice[1];
							} else {
								$_value = trim($choice);
								$_label = $_value;
							}

							$_checked = '';
							if (in_array($_value, $values)) $_checked = ' checked="checked"';

							printf('<li><label><input type="hidden" name="custom_field[%s][]" value="" /><input type="checkbox" name="custom_field[%d][]" value="%s"%s> %s</label></li>', $post->ID, $post->ID, $_value, $_checked, $_label);
						}
						echo '</ul>';
						echo '</div>';
						break;
					case 'url'  :
						echo '<div>';
						printf('<input type="text" name="custom_field[%d]" class="form-control directory_field" placeholder="%s" value="%s"/>', $post->ID, esc_attr($cf_placeholder), esc_url($value));
						echo '</div>';
						break;

					case 'date'  :
						echo '<div>';
						printf('<input type="date" name="custom_field[%d]" class="form-control directory_field" placeholder="%s" value="%s"/>', $post->ID, esc_attr($cf_placeholder), esc_attr($value));
						echo '</div>';
						break;

					case 'email'  :
						echo '<div>';
						printf('<input type="email" name="custom_field[%d]" class="form-control directory_field" placeholder="%s" value="%s"/>', $post->ID, esc_attr($cf_placeholder), esc_attr($value));
						echo '</div>';
						break;
					case 'color'  :
						echo '<div>';
						printf('<input type="text" name="custom_field[%d]" id="color_code2" class="my-color-field" value="%s"/>', $post->ID, $value);
						echo '</div>';
						break;

					case 'time'  :
						echo '<div>';
						printf('<input type="time" name="custom_field[%d]" class="form-control directory_field" placeholder="%s" value="%s"/>', $post->ID, esc_attr($cf_placeholder), esc_attr($value));
						echo '</div>';
						break;
					case 'file'  :
						require ATBDP_TEMPLATES_DIR . 'file-uploader.php';
						break;
				}
				?>
			</div>
			<?php
		}
		wp_reset_postdata();
		?>
		<?php if (empty($display_loc_for)) { ?>
			<div class="form-group" id="atbdp_locations">
				<label for="at_biz_dir-location"><?php
					esc_html_e($location_label . ':', 'directorist');
					echo $require_location ? '<span class="atbdp_make_str_red">*</span>' : ''; ?></label>
				<?php
				$current_val = get_the_terms($p_id, ATBDP_LOCATION);;
				$ids = array();
				if (!empty($current_val)) {
					foreach ($current_val as $single_val) {
						$ids[] = $single_val->term_id;
					}
				}
				$locations = get_terms(ATBDP_LOCATION, array('hide_empty' => 0));
				?>

				<select name="tax_input[at_biz_dir-location][]" class="form-control"
						id="at_biz_dir-location" <?php echo !empty($multiple_loc_for_user) ? 'multiple="multiple"' : '' ?>>
					<?php
					if (empty($multiple_loc_for_user)) {
						echo '<option>' . $loc_placeholder . '</option>';
					}
					/*foreach ($locations as $key => $cat_title) {
						$checked = in_array($cat_title->term_id, $ids) ? 'selected' : '';
						printf('<option value="%s" %s>%s</option>', $cat_title->term_id, $checked, $cat_title->name);
					}*/
					$location_fields = add_listing_category_location_filter($query_args, ATBDP_LOCATION, $ids);
					echo $location_fields;
					?>
				</select>

			</div>
		<?php } ?>
		<?php
		$plan_tag = true;
		if (is_fee_manager_active()) {
			$plan_tag = is_plan_allowed_tag($fm_plan);
		}
		if ($plan_tag && empty($display_tag_for)) {
			?>
			<div class="form-group tag_area" id="atbdp_tags">
				<label for="at_biz_dir-tags"><?php
					$tag_label = get_directorist_option('tag_label', __('Tags', 'directorist'));
					esc_html_e($tag_label . ':', 'directorist');
					echo get_directorist_option('require_tags') ? '<span class="atbdp_make_str_red">*</span>' : ''; ?></label>
				<?php
				$output = array();
				if (!empty($p_tags)) {
					foreach ($p_tags as $p_tag) {
						$output[] = $p_tag->term_id;
					}
				} ?>
				<select name="tax_input[at_biz_dir-tags][]" class="form-control"
						id="at_biz_dir-tags" multiple="multiple">

					<?php foreach ($listing_tags as $l_tag) {
						$checked = in_array($l_tag->term_id, $output) ? 'selected' : '';
						?>
						<option <?php echo $checked; ?>
								value='<?php echo $l_tag->name ?>'><?php echo esc_html($l_tag->name) ?></option>
					<?php } ?>
				</select>
				<?php
				/**
				 * @since 4.7.2
				 * It fires after the tag field
				 */
				do_action('atbdp_add_listing_after_tag_field', $p_id);
				?>
			</div>
			<?php
		}
		/**
		 * @since 4.7.1
		 * It fires after the tag field
		 */
		do_action('atbdp_add_listing_after_tag', $p_id);
		?>
		<!--***********************************************************************
			Run the custom field loop to show all published custom fields asign to Category
		 **************************************************************************-->
		<!--@ Options for select the category.-->
		<div class="form-group" id="atbdp_categories">
			<label for="atbdp_select_cat"><?php
				$category_label = get_directorist_option('category_label', __('Select Category', 'directorist'));
				$cat_placeholder = get_directorist_option('cat_placeholder', __('Select Category', 'directorist'));

				esc_html_e($category_label . ':', 'directorist');
				echo get_directorist_option('require_category') ? '<span class="atbdp_make_str_red">*</span>' : ''; ?></label>
			<?php
			$category = wp_get_object_terms($p_id, ATBDP_CATEGORY, array('fields' => 'ids'));
			$selected_category = count($category) ? $category[0] : -1;
			$current_val = get_the_terms($p_id, ATBDP_CATEGORY);;
			$ids = array();
			if (!empty($current_val)) {
				foreach ($current_val as $single_val) {
					$ids[] = $single_val->term_id;
				}
			}
			$categories = get_terms(ATBDP_CATEGORY, array('hide_empty' => 0, 'exclude' => $plan_cat));
			?>

			<select name="admin_category_select[]" class="form-control"
					id="at_biz_dir-categories" <?php echo !empty($multiple_cat_for_user) ? 'multiple="multiple"' : ''; ?>>
				<?php
				if (empty($multiple_cat_for_user)) {
					echo '<option>' . $cat_placeholder . '</option>';
				}

				/*foreach ($categories as $key => $cat_title) {

					$checked = in_array($cat_title->term_id, $ids) ? 'selected' : '';
					printf('<option value="%s" %s>%s</option>', $cat_title->term_id, $checked, $cat_title->name);

				}*/
				$categories_field = add_listing_category_location_filter($query_args, ATBDP_CATEGORY, $ids, '', $plan_cat);
				echo $categories_field;
				?>
			</select>
		</div>
		<?php
		$plan_custom_field = true;
		if (is_fee_manager_active()) {
			$plan_custom_field = is_plan_allowed_custom_fields($fm_plan);
		}
		if ($plan_custom_field) {
			?>
			<div id="atbdp-custom-fields-list" data-post_id="<?php echo $p_id; ?>">
				<?php
				$selected_category = '';
				do_action('wp_ajax_atbdp_custom_fields_listings_front', $p_id, $selected_category); ?>
			</div>
			<?php
		}
		?>

		<?php
		if ($ids) {
			?>
			<div id="atbdp-custom-fields-list-selected" data-post_id="<?php echo $p_id; ?>">
				<?php
				$selected_category = !empty($selected_category) ? $selected_category : '';
				do_action('wp_ajax_atbdp_custom_fields_listings_front_selected', $p_id, $selected_category); ?>
			</div>
			<?php
		}
		do_action('atbdp_after_general_information', $p_id);
		?>

	</div>
</div><!-- end .atbd_custom_fields_contents -->