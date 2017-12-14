<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wordpress.org/support/profile/jasie
 * @since      1.0.0
 *
 * @package    Widget_Pagination
 * @subpackage Widget_Pagination/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div id="<?php echo $this->plugin_name ?>" class="wrap">
	<div class="icon32" id="icon-themes"></div>

	<h1><?php _e('Settings') ?> › <?php echo esc_html(get_admin_page_title()); ?></h1>

	<?php
	// thsi is only needed, when using add_submenu_page() instead of add_options_page()
	settings_errors();
	?>

	<div class="metabox-holder">
		<p>
			<?php
			printf(__('Before you can see the widgets %s, %s, %s, %s, %s, %s or %s as a paginated list, you need to add them to your %s.', $this->plugin_name),
						'<a href="http://en.support.wordpress.com/widgets/archives-widget/">'.__("Archives").'</a>',
						'<a href="http://en.support.wordpress.com/widgets/categories-widget/">'. __("Categories").'</a>',
						'<a href="http://en.support.wordpress.com/widgets/links-widget/">'. __("Links").'</a>',
						'<a href="http://en.support.wordpress.com/widgets/meta-widget/">'.__("Meta").'</a>',
						'<a href="http://en.support.wordpress.com/widgets/pages-widget/">'. __("Pages").'</a>',
						'<a href="http://en.support.wordpress.com/widgets/recent-comments-widget/">'. __("Recent Comments").'</a>',
						'<a href="http://en.support.wordpress.com/widgets/recent-posts-widget/">'. __("Recent Posts").'</a>',
						'<a href="widgets.php">'. __("Widget Areas") .'</a>');
			?>
		</p>

		<?php
		$default = __('Default'); // for hint after input field
		$empty   = __('empty', $this->plugin_name); // for hint after input field

		//Grab all options
		$options = get_option($this->plugin_short);
		//print 'options: <pre>' . print_r ($options, true) . '</pre>';

		$options_pre_v1 = get_option('wgpag_options');
		//print 'old opt: <pre>' . print_r ($options_before_v1, true) . '</pre>';

		// Pagination Options (saved or default value)
		$pag_options_pagItem = isset($options['pag_option_ptsh_cnt']) ?
				$options['pag_option_ptsh_cnt'] : (isset($options_pre_v1['pag_option_ptsh']) ?
					$options_pre_v1['pag_option_ptsh'] : 7); // pages to show
		$pag_options_prevLabel = isset($options['pag_option_prev']) ?
				$options['pag_option_prev'] : (isset($options_pre_v1['pag_option_prev']) ?
					$options_pre_v1['pag_option_prev'] : '<');
		$pag_options_nextLabel = isset($options['pag_option_next']) ?
				$options['pag_option_next']  : (isset($options_pre_v1['pag_option_next']) ?
					$options_pre_v1['pag_option_next'] : '>');
		$pag_options_labelVis = isset($options['pag_option_prevnext_threshold_cnt']) ?
				$options['pag_option_prevnext_threshold_cnt'] : (isset($options_pre_v1['pag_option_prevnext_threshold']) ?
				$options_pre_v1['pag_option_prevnext_threshold'] : '');
		$pag_options_scrollSpeed = isset($options['pag_option_autoscroll_speed_cnt']) ?
				$options['pag_option_autoscroll_speed_cnt'] : (isset($options_pre_v1['pag_option_autoscroll_speed']) ?
					$options_pre_v1['pag_option_autoscroll_speed'] : '0');

		// Styling Options (saved or default value)
		$style_options_curItem_textClr = isset($options['cur_item_style_color']) ?
				$options['cur_item_style_color'] : (isset($options_pre_v1['cur_item_style_color']) ?
					$options_pre_v1['cur_item_style_color'] : '');
		$style_options_curItem_borderClr = isset($options['cur_item_style_border-color']) ?
				$options['cur_item_style_border-color'] : (isset($options_pre_v1['cur_item_style_border-color']) ?
					$options_pre_v1['cur_item_style_border-color'] : '');
		$style_options_curItem_bgClr = isset($options['cur_item_style_background-color']) ?
				$options['cur_item_style_background-color'] : (isset($options_pre_v1['cur_item_style_background-color']) ?
					$options_pre_v1['cur_item_style_background-color'] : '#F1F1F1');
		$style_options_curItem_fontSz = isset($options['cur_item_style_font-size']) ?
				$options['cur_item_style_font-size'] : (isset($options_pre_v1['cur_item_style_font-size']) ?
					$options_pre_v1['cur_item_style_font-size'] : '');

		$style_options_item_textClr = isset($options['item_style_color']) ?
				$options['item_style_color'] : (isset($options_pre_v1['item_style_color']) ?
					$options_pre_v1['item_style_color'] : '');
		$style_options_item_borderClr = isset($options['item_style_border-color']) ?
				$options['item_style_border-color'] : (isset($options_pre_v1['item_style_border-color']) ?
					$options_pre_v1['item_style_border-color'] : '#F1F1F1');
		$style_options_item_bgClr = isset($options['item_style_background-color']) ?
				$options['item_style_background-color'] : (isset($options_pre_v1['item_style_background-color']) ?
					$options_pre_v1['item_style_background-color'] : '');
		$style_options_item_fontSz = isset($options['item_style_font-size']) ?
				$options['item_style_font-size'] : (isset($options_pre_v1['item_style_font-size']) ?
					$options_pre_v1['item_style_font-size'] : '');

		$style_options_hovItem_textClr = isset($options['hover_item_style_color']) ?
				$options['hover_item_style_color'] : (isset($options_pre_v1['hover_item_style_color']) ?
					$options_pre_v1['hover_item_style_color'] : '');
		$style_options_hovItem_borderClr = isset($options['hover_item_style_border-color']) ?
				$options['hover_item_style_border-color'] : (isset($options_pre_v1['hover_item_style_border-color']) ?
					$options_pre_v1['hover_item_style_border-color'] : '');
		$style_options_hovItem_bgClr = isset($options['hover_item_style_background-color']) ?
				$options['hover_item_style_background-color'] : (isset($options_pre_v1['hover_item_style_background-color']) ?
					$options_pre_v1['hover_item_style_background-color'] : '');
		$style_options_hovItem_fontSz = isset($options['hover_item_style_font-size']) ?
				$options['hover_item_style_font-size'] : (isset($options_pre_v1['hover_item_style_font-size']) ?
					$options_pre_v1['hover_item_style_font-size'] : '');

		$style_options_list_icon = isset($options['list_item_style_list-style-type']) ?
				$options['list_item_style_list-style-type'] : (isset($options_pre_v1['list_item_style']) ?
					$options_pre_v1['list_item_style'] : '');

		$style_options_pag_horAlign = isset($options['pag_style_text-align']) ?
				$options['pag_style_text-align'] : (isset($options_pre_v1['pag_option_hor_align']) ?
					$options_pre_v1['pag_option_hor_align'] : 'center');
		$style_options_pag_margTop = isset($options['pag_style_margin-top']) ?
				$options['pag_style_margin-top'] : (isset($options_pre_v1['pag_option_margin_top']) ?
					$options_pre_v1['pag_option_margin_top'] : '0.5em');
		$style_options_pag_margRight = isset($options['pag_style_margin-right']) ?
				$options['pag_style_margin-right'] : ''; // new option (nothing to import from before 1.0)
		$style_options_pag_margBottom = isset($options['pag_style_margin-bottom']) ?
				$options['pag_style_margin-bottom'] : (isset($options_pre_v1['pag_option_margin_bottom']) ?
					$options_pre_v1['pag_option_margin_bottom'] : '');
		$style_options_pag_margLeft = isset($options['pag_style_margin-left']) ?
				$options['pag_style_margin-left'] : ''; // new option (nothing to import from before 1.0)

		// new options (nothing to import from before 1.0)
		$style_options_pag_paddTop = isset($options['pag_style_padding-top']) ?
				$options['pag_style_padding-top'] : '';
		$style_options_pag_paddRight = isset($options['pag_style_padding-right']) ?
				$options['pag_style_padding-right'] : '';
		$style_options_pag_paddBottom = isset($options['pag_style_padding-bottom']) ?
				$options['pag_style_padding-bottom'] : '';
		$style_options_pag_paddLeft = isset($options['pag_style_padding-left']) ?
				$options['pag_style_padding-left'] : '';

		// new options (nothing to import from before 1.0)
		$style_options_pag_bgClr = isset($options['pag_style_background-color']) ?
				$options['pag_style_background-color'] : '';
		/*$style_options_pag_borderClrTop = isset($options['pag_style_border-top-color']) ?
				$options['pag_style_border-top-color'] : '';
		$style_options_pag_borderClrBottom = isset($options['pag_style_border-bottom-color']) ?
				$options['pag_style_border-bottom-color'] : '';
		$style_options_pag_borderClrLeft = isset($options['pag_style_border-left-color']) ?
				$options['pag_style_border-left-color'] : '';
		$style_options_pag_borderClrRight = isset($options['pag_style_border-right-color']) ?
				$options['pag_style_border-right-color'] : '';*/
		$style_options_pag_borderClr = isset($options['pag_style_border-color']) ?
				$options['pag_style_border-color'] : '';
		$style_options_pag_borderLineTop = isset($options['pag_style_border-top-style']) ?
				$options['pag_style_border-top-style'] : '';
		$style_options_pag_borderLineRight = isset($options['pag_style_border-right-style']) ?
				$options['pag_style_border-right-style'] : '';
		$style_options_pag_borderLineBottom = isset($options['pag_style_border-bottom-style']) ?
				$options['pag_style_border-bottom-style'] : '';
		$style_options_pag_borderLineLeft = isset($options['pag_style_border-left-style']) ?
				$options['pag_style_border-left-style'] : '';
		?>

		<form method="post" name="wgpag_options" action="options.php">
			<?php
			settings_fields( $this->plugin_name ); // $option_group: This must match the group name used in register_setting(), which is the page slug name on which the form is to appear.
			do_settings_sections( $this->plugin_name ); // $page: The slug name of the page whose settings sections you want to output. This should match the page name used in add_settings_section().
			?>

			<div class="postbox-container">
				<div class="postbox">
					<h2 class="hndle"><?php _e('Items per Page', $this->plugin_name) ?>*</h2>

					<div class="inside">
						<p>
							<?php _e('If you want a pagination, enter the designated items per page for each widget. Otherwise, leave the according input field emtpy.', $this->plugin_name) ?>
						</p>

						<!---------- ITEMS PER PAGE ----------------------------------->
						<table class="widefat striped" id="items_per_page">
							<?php
							foreach ($this->widgets as $w => $name) :
								$ipp_value = $options['items_per_page_' . $w]; // no default
								$ipp_name = __($name);
								?>
								<tr class="<?php if (!$this->is_valid('number', $ipp_value)) echo 'invalid'; ?>">
									<th>
										<label for="<?php echo $this->plugin_short . '-items_per_page_' . $w ?>"
											   ><?php echo $ipp_name ?>:</label>
									</th>
									<td>
										<input type="number" steps="1"
											id="<?php echo $this->plugin_short . '-items_per_page_' . $w ?>"
											name="<?php echo $this->plugin_short . '[items_per_page_' . $w .']' ?>"
											value="<?php echo $ipp_value ?>" />
										<span class="hint">
											<?php echo $default ?>: <?php echo $empty ?>
											(<?php _e('off', $this->plugin_name) ?>)
										</span>
									</td>
								</tr>
							<?php endforeach; ?>

							<?php /* <tr>
								<th for="<?php echo $this->plugin_short . '-customwidget' ?>">
									<?php _e('Custom Widgets', $this->plugin_name) ?>
								</th>
								<td>
									<select id="<?php echo $this->plugin_short . '-customwidget' ?>"
											 name="<?php echo $this->plugin_short . '[customwidget]' ?>">
										<option value="" disabled="1"
												><?php _e('please choose', $this->plugin_name) ?></option>
										<option value="widget_views"
												>WP PostViews</option>
									</select>
								</td>
							</tr> */ ?>
						</table>
						</div><!-- /.inside -->
				</div><!-- /.postbox -->

				<div class="postbox">
					<h2 class="hndle">
						<?php _e('Pagination Options', $this->plugin_name) ?>
					</h2>

					<div class="inside">
						<p>
							<?php _e('Here you can change the defaults for how the pagination is returned. This will effect all paginations.', $this->plugin_name) ?>
						</p>

						<!---------- PAGINATION OPTIONS ------------------------------->
						<table class="widefat striped">
							<tr class="<?php if (!$this->is_valid('number', $pag_options_pagItem)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-pag_option_ptsh_cnt' ?>"
										   ><?php _e('Max. pagination items', $this->plugin_name) ?>:*</label>
								</th>
								<td>
									<input type="number" step="1" min="1"
										   id="<?php echo $this->plugin_short . '-pag_option_ptsh_cnt' ?>"
										   name="<?php echo $this->plugin_short . '[pag_option_ptsh_cnt]' ?>"
										   value="<?php echo $pag_options_pagItem ?>" />
									<span class="hint"> <?php echo $default ?>: 7</span>
								</td>
							</tr>

							<tr>
								<th>
									<label for="<?php echo $this->plugin_short . '-pag_option_prev' ?>"
										   ><?php _e('Previous label', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="5"
										   id="<?php echo $this->plugin_short . '-pag_option_prev' ?>"
										   name="<?php echo $this->plugin_short . '[pag_option_prev]' ?>"
										   value="<?php echo $pag_options_prevLabel ?>" />
									<span class="hint">
										<?php echo $default ?>: &lt;
									</span>
								</td>
							</tr>

							<tr>
								<th>
									<label for="<?php echo $this->plugin_short . '-pag_option_next' ?>"
										   ><?php _e('Next label', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="5"
										   id="<?php echo $this->plugin_short . '-pag_option_next' ?>"
										   name="<?php echo $this->plugin_short . '[pag_option_next]' ?>"
										   value="<?php echo $pag_options_nextLabel ?>" />
									<span class="hint">
										<?php echo $default ?>: &gt;
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('number', $pag_options_labelVis)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-pag_option_prevnext_threshold_cnt' ?>"
										   ><?php _e('Visibility of the labels', $this->plugin_name) ?>:*</label>
								</th>
								<td>
									<input type="number" maxlength="5" step="1"
										   id="<?php echo $this->plugin_short . '-pag_option_prevnext_threshold_cnt' ?>"
										   name="<?php echo $this->plugin_short . '[pag_option_prevnext_threshold_cnt]' ?>"
										   value="<?php echo $pag_options_labelVis ?>"
										   placeholder="<?php _e('e.g.', $this->plugin_name) ?> 3" />
									<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?> (<?php _e('off', $this->plugin_name) ?>)
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('number', $pag_options_scrollSpeed)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-pag_option_autoscroll_speed_cnt' ?>"
										   ><?php _e('Auto-scroll speed', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="number" maxlength="5" step="1" min="0"
										   id="<?php echo $this->plugin_short . '-pag_option_autoscroll_speed_cnt' ?>"
										   name="<?php echo $this->plugin_short . '[pag_option_autoscroll_speed_cnt]' ?>"
										   value="<?php echo $pag_options_scrollSpeed ?>" /> <?php _e('ms', $this->plugin_name) ?>
									<span class="hint">
										<?php echo $default ?>: 0 (<?php _e('off', $this->plugin_name) ?>)
									</span>
								</td>
							</tr>
						</table>

					</div><!-- /.inside -->
				</div><!-- /.postbox -->

				<div class="postbox">
					<h2 class="hndle">
						<?php _e('Styling Options for List Items', $this->plugin_name) ?>
					</h2>

					<div class="inside">
						<p>
							<?php _e('The widget items are created by Wordpress, and their styling by the active theme. We do not want to interfere with it, hence the plugin offers only this one option (which might not work).', $this->plugin_name) ?>
						</p>

						<!--------- LIST ITEMS --------------------------------------->
						<table class="widefat striped">
							<tr>
								<th>
									<label for="<?php echo $this->plugin_short . '-list_item_style_list-style-type' ?>"
										   ><?php _e('List style type', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<select id="<?php echo $this->plugin_short . '-list_item_style_list-style-type' ?>"
											name="<?php echo $this->plugin_short . '[list_item_style_list-style-type]' ?>">
										<option value="inherit"
											<?php if ($style_options_list_icon === '')
												{echo 'selected="selected"';} ?>>
											<?php _e('from theme', $this->plugin_name) ?>&nbsp;</option>
										<option value="none"
											<?php if ($style_options_list_icon === 'none')
												{echo 'selected="selected"';} ?>>
											<?php _e('none', $this->plugin_name) ?>&nbsp;</option>
										<option value="square"
											<?php if ($style_options_list_icon === 'square')
												{echo 'selected="selected"';} ?>>
											■ <?php _e('Square', $this->plugin_name) ?> </option>
										<option value="disc"
											<?php if ($style_options_list_icon === 'disc')
												{echo 'selected="selected"';} ?>>
											&#9679; <?php _e('Disc', $this->plugin_name) ?></option>
										<option value="circle"
											<?php if ($style_options_list_icon === 'circle')
												{echo 'selected="selected"';} ?>>
											○ <?php _e('Circle', $this->plugin_name) ?></option>
									</select>
									<span class="hint">
										<?php echo $default ?>: <?php _e('from theme', $this->plugin_name) ?>
									</span>
								</td>
							</tr>
						</table>

					</div><!-- /.inside -->
				</div><!-- /.postbox -->
			</div><!-- /.postbox-container -->

			<div class="postbox-container">
				<div class="postbox">
					<h2 class="hndle"><?php _e('Styling Options for the Pagination', $this->plugin_name) ?></h2>

					<div class="inside">
						<p>
							<?php _e('The pagination is created by and appended to the widget(s) by the plugin. Hence we offer a large varity of styling options. If you want to change the appearance of the pagination, enter the designated value.', $this->plugin_name) ?>
						</p>

						<!--------- CURRENT PAGINATION ITEM --------------------------->
						<table class="widefat striped">
							<caption><?php _e('Current pagination item', $this->plugin_name) ?>*</caption>

							<tr class="<?php if (!$this->is_valid('hex', $style_options_curItem_textClr)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-cur_item_style_color' ?>"
										   ><?php _e('Text colour', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-cur_item_style_color' ?>"
										   name="<?php echo $this->plugin_short . '[cur_item_style_color]' ?>"
										   value="<?php echo $style_options_curItem_textClr ?>" />
									<span class="hint">
										<?php echo $default ?>: <?php _e('from theme', $this->plugin_name) ?>
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('hex', $style_options_curItem_borderClr)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-cur_item_style_border-color' ?>"
										   ><?php _e('Border colour', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-cur_item_style_border-color' ?>"
										   name="<?php echo $this->plugin_short . '[cur_item_style_border-color]' ?>"
										   value="<?php echo $style_options_curItem_borderClr ?>" />
									<span class="hint">
										<?php echo $default ?>: <?php _e('transparent', $this->plugin_name) ?>
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('hex', $style_options_curItem_bgClr)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-cur_item_style_background-color' ?>"
										   ><?php _e('Background colour', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-cur_item_style_background-color' ?>"
										   name="<?php echo $this->plugin_short . '[cur_item_style_background-color]' ?>"
										   value="<?php echo $style_options_curItem_bgClr ?>" />
									<span class="hint"><?php echo $default ?>: #F1F1F1</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('size', $style_options_curItem_fontSz)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-cur_item_style_font-size' ?>"
										   ><?php _e('Font size', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="7" maxlength="5"
										   id="<?php echo $this->plugin_short . '-cur_item_style_font-size' ?>"
										   name="<?php echo $this->plugin_short . '[cur_item_style_font-size]' ?>"
										   value="<?php echo $style_options_curItem_fontSz ?>"
										   placeholder="<?php _e('e.g.', $this->plugin_name) ?> 12px <?php _e('or', $this->plugin_name) ?> 0.9em" />
									<span class="hint">
										<?php echo $default ?>: <?php _e('from theme', $this->plugin_name) ?>
									</span>
								</td>
							</tr>
						</table>

						<!--------- LINKED PAGINATION ITEMS --------------------------->
						<table class="widefat striped">
							<caption><?php _e('Linked pagination items', $this->plugin_name) ?>*</caption>

							<tr class="<?php if (!$this->is_valid('hex', $style_options_item_textClr)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-item_style_color' ?>"
										   ><?php _e('Text colour', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-item_style_color' ?>"
										   name="<?php echo $this->plugin_short . '[item_style_color]' ?>"
										   value="<?php echo $style_options_item_textClr ?>" />
									<span class="hint">
										<?php echo $default ?>: <?php _e('from theme', $this->plugin_name) ?>
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('hex', $style_options_item_borderClr)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-item_style_border-color' ?>"
										   ><?php _e('Border colour', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-item_style_border-color' ?>"
										   name="<?php echo $this->plugin_short . '[item_style_border-color]' ?>"
										   value="<?php echo $style_options_item_borderClr ?>" />
									<span class="hint"><?php echo $default ?>: #F1F1F1</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('hex', $style_options_item_bgClr)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-item_style_background-color' ?>"
										   ><?php _e('Background colour', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-item_style_background-color' ?>"
										   name="<?php echo $this->plugin_short . '[item_style_background-color]' ?>"
										   value="<?php echo $style_options_item_bgClr ?>" />
									<span class="hint">
										<?php echo $default ?>: <?php _e('transparent', $this->plugin_name) ?>
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('size', $style_options_item_fontSz)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-item_style_font-size' ?>"
										   ><?php _e('Font size', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="7" maxlength="5"
										   id="<?php echo $this->plugin_short . '-item_style_font-size' ?>"
										   name="<?php echo $this->plugin_short . '[item_style_font-size]' ?>"
										   value="<?php echo $style_options_item_fontSz ?>"
										   placeholder="<?php _e('e.g.', $this->plugin_name) ?> 12px <?php _e('or', $this->plugin_name) ?> 0.9em" />
									<span class="hint">
										<?php echo $default ?>: <?php _e('from theme', $this->plugin_name) ?>
									</span>
								</td>
							</tr>
						</table>

						<!--------- HOVER ON LINKED PAGINATION ITEM ------------------->
						<table class="widefat striped">
							<caption><?php _e('Mouseover on linked pagination items', $this->plugin_name) ?>*</caption>

							<tr class="<?php if (!$this->is_valid('hex', $style_options_hovItem_textClr)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-hover_item_style_color' ?>"
										   ><?php _e('Text colour', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-hover_item_style_color' ?>"
										   name="<?php echo $this->plugin_short . '[hover_item_style_color]' ?>"
										   value="<?php echo $style_options_hovItem_textClr ?>" />
									<span class="hint">
										<?php echo $default ?>: <?php _e('from theme', $this->plugin_name) ?>
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('hex', $style_options_hovItem_borderClr)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-hover_item_style_border-color' ?>"
										   ><?php _e('Border colour', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-hover_item_style_border-color' ?>"
										   name="<?php echo $this->plugin_short . '[hover_item_style_border-color]' ?>"
										   value="<?php echo $style_options_hovItem_borderClr ?>" />
									<span class="hint">
										<?php echo $default ?>: <?php _e('from theme', $this->plugin_name) ?>
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('hex', $style_options_hovItem_bgClr)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-hover_item_style_background-color' ?>"
										   ><?php _e('Background colour', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-hover_item_style_background-color' ?>"
										   name="<?php echo $this->plugin_short . '[hover_item_style_background-color]' ?>"
										   value="<?php echo $style_options_hovItem_bgClr ?>" />
									<span class="hint">
										<?php echo $default ?>: <?php _e('from theme', $this->plugin_name) ?>
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('size', $style_options_hovItem_fontSz)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-hover_item_style_font-size' ?>"
										   ><?php _e('Font size', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="7" maxlength="5"
										   id="<?php echo $this->plugin_short . '-hover_item_style_font-size' ?>"
										   name="<?php echo $this->plugin_short . '[hover_item_style_font-size]' ?>"
										   value="<?php echo $style_options_hovItem_fontSz ?>"
										   placeholder="<?php _e('e.g.', $this->plugin_name) ?> 12px <?php _e('or', $this->plugin_name) ?> 0.9em" />
									<span class="hint">
										<?php echo $default ?>: <?php _e('from theme', $this->plugin_name) ?>
									</span>
								</td>
							</tr>
						</table>

						<!---------- PAGINATION BAR ----------------------------------->
						<table class="widefat striped">
							<caption><?php _e('Pagination bar itself', $this->plugin_name) ?></caption>

							<tr>
								<th>
									<label><?php _e('Horizontal alignment', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<label class="radio">
										<input type="radio" value="left"
											   name="<?php echo $this->plugin_short . '[pag_style_text-align]' ?>"
											<?php if ($style_options_pag_horAlign == 'left')
												{echo 'checked="checked"';} ?> /><?php _e('left-aligned', $this->plugin_name) ?>
									</label>
									<label class="radio">
										<input type="radio" value="center"
											   name="<?php echo $this->plugin_short . '[pag_style_text-align]' ?>"
											<?php if ($style_options_pag_horAlign == 'center')
												{echo 'checked="checked"';} ?> /><?php _e('centered', $this->plugin_name) ?>
									</label>
									<label class="radio">
										<input type="radio" value="right"
											   name="<?php echo $this->plugin_short . '[pag_style_text-align]' ?>"
											<?php if ($style_options_pag_horAlign == 'right')
												{echo 'checked="checked"';} ?> /><?php _e('right-aligned', $this->plugin_name) ?>
									</label>
									<br />
									<span class="hint"><?php echo $default ?>: <?php _e('center', $this->plugin_name) ?></span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('size', $style_options_pag_margTop)) echo 'invalid'; ?>">
								<th rowspan="4">
									<label for="<?php echo $this->plugin_short . '-pag_style_margin-top' ?>"
										   ><?php _e('Outer space', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="5" maxlength="5"
										   id="<?php echo $this->plugin_short . '-pag_style_margin-top' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_margin-top]' ?>"
										   value="<?php echo $style_options_pag_margTop ?>"
										   placeholder="<?php _e('e.g.', $this->plugin_name) ?> 10px <?php _e('or', $this->plugin_name) ?> 1.0em"/>
									<?php _e('top', $this->plugin_name) ?>
									<span class="hint">
											<?php echo $default ?>: 0.5em
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('size', $style_options_pag_margRight)) echo 'invalid'; ?>">
								<td>
									<input type="text" size="5" maxlength="5"
										   id="<?php echo $this->plugin_short . '-pag_style_margin-right' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_margin-right]' ?>"
										   value="<?php echo $style_options_pag_margRight ?>"
										   placeholder="<?php _e('e.g.', $this->plugin_name) ?> 10px <?php _e('or', $this->plugin_name) ?> 0.5em" />
									<?php _e('right', $this->plugin_name) ?>
									<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?>
										(<?php _e('from theme', $this->plugin_name) ?>)
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('size', $style_options_pag_margBottom)) echo 'invalid'; ?>">
								<td>
									<input type="text" size="5" maxlength="5"
										   id="<?php echo $this->plugin_short . '-pag_style_margin-bottom' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_margin-bottom]' ?>"
										   value="<?php echo $style_options_pag_margBottom ?>"
										   placeholder="<?php _e('e.g.', $this->plugin_name) ?> 10px <?php _e('or', $this->plugin_name) ?> 0.5em" />
									<?php _e('bottom', $this->plugin_name) ?>
										<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?>
										(<?php _e('from theme', $this->plugin_name) ?>)
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('size', $style_options_pag_margLeft)) echo 'invalid'; ?>">
								<td>
									<input type="text" size="5" maxlength="5"
										   id="<?php echo $this->plugin_short . '-pag_style_margin-left' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_margin-left]' ?>"
										   value="<?php echo $style_options_pag_margLeft ?>"
										   placeholder="<?php _e('e.g.', $this->plugin_name) ?> 10px <?php _e('or', $this->plugin_name) ?> 0.5em" />
									<?php _e('left', $this->plugin_name) ?>
									<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?>
										(<?php _e('from theme', $this->plugin_name) ?>)
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('size', $style_options_pag_paddTop)) echo 'invalid'; ?>">
								<th rowspan="4">
									<label for="<?php echo $this->plugin_short . '-pag_style_padding-top' ?>"
										   ><?php _e('Inner space', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="5" maxlength="5"
										   id="<?php echo $this->plugin_short . '-pag_style_padding-top' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_padding-top]' ?>"
										   value="<?php echo $style_options_pag_paddTop ?>"
										   placeholder="<?php _e('e.g.', $this->plugin_name) ?> 5px <?php _e('or', $this->plugin_name) ?> 1.0em"/>
									<?php _e('top', $this->plugin_name) ?>
									<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?>
										(<?php _e('from theme', $this->plugin_name) ?>)
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('size', $style_options_pag_paddRight)) echo 'invalid'; ?>">
								<td>
									<input type="text" size="5" maxlength="5"
										   id="<?php echo $this->plugin_short . '-pag_style_padding-right' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_padding-right]' ?>"
										   value="<?php echo $style_options_pag_paddRight ?>"
										   placeholder="<?php _e('e.g.', $this->plugin_name) ?> 5px <?php _e('or', $this->plugin_name) ?> 1.0em" />
									<?php _e('right', $this->plugin_name) ?>
									<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?>
										(<?php _e('from theme', $this->plugin_name) ?>)
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('size', $style_options_pag_paddBottom)) echo 'invalid'; ?>">
								<td>
									<input type="text" size="5" maxlength="5"
										   id="<?php echo $this->plugin_short . '-pag_style_padding-bottom' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_padding-bottom]' ?>"
										   value="<?php echo $style_options_pag_paddBottom ?>"
										   placeholder="<?php _e('e.g.', $this->plugin_name) ?> 5px <?php _e('or', $this->plugin_name) ?> 1.0em" />
										<?php _e('bottom', $this->plugin_name) ?>
									<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?>
										(<?php _e('from theme', $this->plugin_name) ?>)
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('size', $style_options_pag_paddLeft)) echo 'invalid'; ?>">
								<td>
									<input type="text" size="5" maxlength="5"
										   id="<?php echo $this->plugin_short . '-pag_style_padding-left' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_padding-left]' ?>"
										   value="<?php echo $style_options_pag_paddLeft ?>"
										   placeholder="<?php _e('e.g.', $this->plugin_name) ?> 5px <?php _e('or', $this->plugin_name) ?> 1.0em" />
									<?php _e('left', $this->plugin_name) ?>
									<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?>
										(<?php _e('from theme', $this->plugin_name) ?>)
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('hex', $style_options_pag_bgClr)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-pag_style_background-color' ?>"
										   ><?php _e('Background colour', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-pag_style_background-color' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_background-color]' ?>"
										   value="<?php echo $style_options_pag_bgClr ?>" />
									<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?>
										(<?php _e('from Theme', $this->plugin_name) ?>)
									</span>
								</td>
							</tr>

							<tr class="<?php if (!$this->is_valid('hex', $style_options_pag_borderClr)) echo 'invalid'; ?>">
								<th>
									<label for="<?php echo $this->plugin_short . '-pag_style_border-color' ?>"
										   ><?php _e('Border colour', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<?php /* <input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-pag_style_border-top-color' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_border-top-color]' ?>"
										   value="<?php echo $style_options_pag_borderClrTop ?>" />
									<?php _e('top', $this->plugin_name) ?>
									<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?>
										(<?php _e('from Theme', $this->plugin_name) ?>)
									</span><br />

									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-pag_style_border-right-color' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_border-right-color]' ?>"
										   value="<?php echo $style_options_pag_borderClrRight ?>" />
									<?php _e('right', $this->plugin_name) ?>
									<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?>
										(<?php _e('from Theme', $this->plugin_name) ?>)
									</span><br />

									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-pag_style_border-bottom-color' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_border-bottom-color]' ?>"
										   value="<?php echo $style_options_pag_borderClrBottom ?>" />
									<?php _e('bottom', $this->plugin_name) ?>
									<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?>
										(<?php _e('from Theme', $this->plugin_name) ?>)
									</span><br />

									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-pag_style_border-left-color' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_border-left-color]' ?>"
										   value="<?php echo $style_options_pag_borderClrLeft ?>" />
									<?php _e('left', $this->plugin_name) ?>
									<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?>
										(<?php _e('from Theme', $this->plugin_name) ?>)
									</span> */ ?>

									<input type="text" size="7" maxlength="7" class="color-picker"
										   id="<?php echo $this->plugin_short . '-pag_style_border-color' ?>"
										   name="<?php echo $this->plugin_short . '[pag_style_border-color]' ?>"
										   value="<?php echo $style_options_pag_borderClr ?>" />
									<span class="hint">
										<?php echo $default ?>: <?php _e('empty', $this->plugin_name) ?>
										(<?php _e('from Theme', $this->plugin_name) ?>)
									</span>
								</td>
							</tr>

							<tr>
								<th rowspan="4">
									<label><?php _e('Border style', $this->plugin_name) ?>:</label>
								</th>
								<td>
									<fieldset>
										<legend><?php _e('top', $this->plugin_name) ?>:</legend>
										<label class="radio">
											<input type="radio" value=""
												   name="<?php echo $this->plugin_short . '[pag_style_border-top-style]' ?>"
												<?php if ($style_options_pag_borderLineTop == '')
													{echo 'checked="checked"';} ?> /><?php _e('no line', $this->plugin_name) ?>
										</label>
										<label class="radio">
											<input type="radio" value="solid"
												   name="<?php echo $this->plugin_short . '[pag_style_border-top-style]' ?>"
												<?php if ($style_options_pag_borderLineTop == 'solid')
													{echo 'checked="checked"';} ?> /><?php _e('solid line', $this->plugin_name) ?>
										</label>
										<label class="radio">
											<input type="radio" value="dashed"
												   name="<?php echo $this->plugin_short . '[pag_style_border-top-style]' ?>"
												<?php if ($style_options_pag_borderLineTop == 'dashed')
													{echo 'checked="checked"';} ?> /><?php _e('dashed line', $this->plugin_name) ?>
										</label>
										<label class="radio">
											<input type="radio" value="dotted"
												   name="<?php echo $this->plugin_short . '[pag_style_border-top-style]' ?>"
												<?php if ($style_options_pag_borderLineTop == 'dotted')
													{echo 'checked="checked"';} ?> /><?php _e('dotted line', $this->plugin_name) ?>
										</label>
									</fieldset>

									<span class="hint">
										<?php echo $default ?>: <?php _e('no line', $this->plugin_name) ?>
										<?php _e('on any side', $this->plugin_name) ?>
									</span>
								</td>
							</tr>

							<tr>
								<td>
									<fieldset>
										<legend><?php _e('right', $this->plugin_name) ?>:</legend>
										<label class="radio">
											<input type="radio" value=""
												   name="<?php echo $this->plugin_short . '[pag_style_border-right-style]' ?>"
												<?php if ($style_options_pag_borderLineRight == '')
													{echo 'checked="checked"';} ?> /><?php _e('no line', $this->plugin_name) ?>
										</label>
										<label class="radio">
											<input type="radio" value="solid"
												   name="<?php echo $this->plugin_short . '[pag_style_border-right-style]' ?>"
												<?php if ($style_options_pag_borderLineRight == 'solid')
													{echo 'checked="checked"';} ?> /><?php _e('solid line', $this->plugin_name) ?>
										</label>
										<label class="radio">
											<input type="radio" value="dashed"
												   name="<?php echo $this->plugin_short . '[pag_style_border-right-style]' ?>"
												<?php if ($style_options_pag_borderLineRight == 'dashed')
													{echo 'checked="checked"';} ?> /><?php _e('dashed line', $this->plugin_name) ?>
										</label>
										<label class="radio">
											<input type="radio" value="dotted"
												   name="<?php echo $this->plugin_short . '[pag_style_border-right-style]' ?>"
												<?php if ($style_options_pag_borderLineRight == 'dotted')
													{echo 'checked="checked"';} ?> /><?php _e('dotted line', $this->plugin_name) ?>
										</label>
									</fieldset>
								</td>
							</tr>

							<tr>
								<td>
									<fieldset>
										<legend><?php _e('bottom', $this->plugin_name) ?>:</legend>
										<label class="radio">
											<input type="radio" value=""
												   name="<?php echo $this->plugin_short . '[pag_style_border-bottom-style]' ?>"
												<?php if ($style_options_pag_borderLineBottom == '')
													{echo 'checked="checked"';} ?> /><?php _e('no line', $this->plugin_name) ?>
										</label>
										<label class="radio">
											<input type="radio" value="solid"
												   name="<?php echo $this->plugin_short . '[pag_style_border-bottom-style]' ?>"
												<?php if ($style_options_pag_borderLineBottom == 'solid')
													{echo 'checked="checked"';} ?> /><?php _e('solid line', $this->plugin_name) ?>
										</label>
										<label class="radio">
											<input type="radio" value="dashed"
												   name="<?php echo $this->plugin_short . '[pag_style_border-bottom-style]' ?>"
												<?php if ($style_options_pag_borderLineBottom == 'dashed')
													{echo 'checked="checked"';} ?> /><?php _e('dashed line', $this->plugin_name) ?>
										</label>
										<label class="radio">
											<input type="radio" value="dotted"
												   name="<?php echo $this->plugin_short . '[pag_style_border-bottom-style]' ?>"
												<?php if ($style_options_pag_borderLineBottom == 'dotted')
													{echo 'checked="checked"';} ?> /><?php _e('dotted line', $this->plugin_name) ?>
										</label>
									</fieldset>
								</td>
							</tr>

							<tr>
								<td>
									<fieldset>
										<legend><?php _e('left', $this->plugin_name) ?>:</legend>
										<label class="radio">
											<input type="radio" value=""
												   name="<?php echo $this->plugin_short . '[pag_style_border-left-style]' ?>"
												<?php if ($style_options_pag_borderLineLeft == '')
													{echo 'checked="checked"';} ?> /><?php _e('no line', $this->plugin_name) ?>
										</label>
										<label class="radio">
											<input type="radio" value="solid"
												   name="<?php echo $this->plugin_short . '[pag_style_border-left-style]' ?>"
												<?php if ($style_options_pag_borderLineLeft == 'solid')
													{echo 'checked="checked"';} ?> /><?php _e('solid line', $this->plugin_name) ?>
										</label>
										<label class="radio">
											<input type="radio" value="dashed"
												   name="<?php echo $this->plugin_short . '[pag_style_border-left-style]' ?>"
												<?php if ($style_options_pag_borderLineLeft == 'dashed')
													{echo 'checked="checked"';} ?> /><?php _e('dashed line', $this->plugin_name) ?>
										</label>
										<label class="radio">
											<input type="radio" value="dotted"
												   name="<?php echo $this->plugin_short . '[pag_style_border-left-style]' ?>"
												<?php if ($style_options_pag_borderLineLeft == 'dotted')
													{echo 'checked="checked"';} ?> /><?php _e('dotted line', $this->plugin_name) ?>
										</label>
									</fieldset>
								</td>
							</tr>
						</table>
					</div><!-- /.inside -->
				</div><!-- /.postbox -->

				<?php submit_button() ?>
			</div><!-- /.postbox-container -->

		</form>

		<div class="postbox-container alignright">
			<div class="postbox alignleft">
				<h2 class="hndle">
					<?php _e('Contact the Plugin Developers', $this->plugin_name) ?>
				</h2>

				<div class="inside">
					<p>
						<?php _e('You have a question, want to report a bug, help translating, or suggest a feature', $this->plugin_name) ?>?
					</p>
					<p>
						&rarr; <a href="https://wordpress.org/support/plugin/widget-pagination">Plugin Forum</a><br />
						&rarr; <a href="http://wgpag.jana-sieber.de/">Plugin Homepage</a>
					</p>
				</div><!-- /.inside -->
			</div><!-- /.postbox -->

			<div class="postbox alignright">
				<h2 class="hndle">
					<?php _e('Theme Compatibility', $this->plugin_name) ?>
				</h2>

				<div class="inside">

					<p>
						<?php _e('This plugin might not work in custom themes, if the lists are generated in a different way than in the standard wordpress themes. We are working on increasing the compatibility of this plugin. Feel free to drop us a link to your theme or your page.', $this->plugin_name) ?>
					</p>
					<p>
						<?php _e('Note for Developers', $this->plugin_name) ?>:
						<br />
						<?php
						printf(__('If you are using %s, just set the parameter *class* to *widget_links*. Meanwhile, we are working on a solution for %s.', $this->plugin_name),
								'<a href="http://codex.wordpress.org/Function_Reference/wp_list_bookmarks"><i>wp_list_bookmarks()</i></a>',
								'wp_get_archives(), wp_list_categories(), wp_list_authors(), wp_list_pages() and wp_list_comments()');
						?>
					</p>
				</div><!-- /.inside -->
			</div><!-- /.postbox -->

			<div class="postbox clear">
				<h2 class="hndle">* <?php _e('Explanations', $this->plugin_name) ?></h2>

				<div class="inside">

				<p>
					<img src="<?php echo plugin_dir_url( __FILE__ ) ?>../images/legend.png"
						alt="<?php _e('Legend', $this->plugin_name) ?>"
						title="<?php _e('screenshot of paginated links widget', $this->plugin_name) ?>"
						class="alignleft"/>
					<?php _e('The image shows the 1st page of a paginated links widget, with 2 items per page and a max. number of 4 pages to show.', $this->plugin_name) ?>
				</p>

				<dl>
					<dt><?php _e('Items per Page', $this->plugin_name) ?> (a)</dt>
					<dd>
						<?php _e('This number distributes all widget links on x pages, so that you see this number of links on each of the pages. (e.g. 2)', $this->plugin_name) ?>
					</dd>

					<dt><?php _e('Max. pagination items', $this->plugin_name) ?> (b)</dt>
					<dd>
						<?php _e('Maximum number of pages shown in the pagination. If there are more pages, a separator (&hellip;) is shown.', $this->plugin_name) ?>
					</dd>

					<dt><?php _e('Current pagination item', $this->plugin_name) ?> (c)</dt>
					<dd>
						<?php _e('The currently open page number (hence not a link).', $this->plugin_name) ?>
					</dd>

					<dt><?php _e('Linked pagination items', $this->plugin_name) ?> (d)</dt>
					<dd>
						<?php _e('The page numbers and the previous/next links.', $this->plugin_name) ?>
					</dd>

					<dt><?php _e('Mouseover on linked pagination items', $this->plugin_name) ?> (e)</dt>
					<dd>
						<?php _e('An effect to highlight interactive elements.', $this->plugin_name) ?>
					</dd>

					<dt><?php _e('Visibility of the labels', $this->plugin_name) ?> (f)</dt>
					<dd>
						<?php _e('Only show the previous and next labels if there are more pages in the pagination than the number given in this setting.)', $this->plugin_name) ?>
					</dd>

					<dt><?php _e('px/em units', $this->plugin_name) ?></dt>
					<dd>
						<?php _e('If you want to set fixed font sizes or margins, use the absolute, theme-independent unit px. If you want them to depend on your theme though, use the relative unit em. (1em corresponds to 100% resp. 1 line)', $this->plugin_name) ?>
					</dd>
				</dl>

				</div><!-- /.inside -->
			</div><!-- /.postbox -->
		</div><!-- /.postbox-container -->
	</div><!-- /metabox-holder -->
</div><!-- /wrap -->
