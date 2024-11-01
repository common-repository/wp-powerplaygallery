<?php
global $wpdb, $gpp;
$ops = get_option('pp_settings', array());
//$ops = array_merge($pp_settings, $ops);
?>
<div class="wrap">
	<h2><?php _e('Create XML File'); ?></h2>
	<form action="" method="post">
		<input type="hidden" name="task" value="save_pp_settings" />
		<table>
		<tr>
			<td><?php _e('Slideshow Width'); ?></td>
			<td><input type="text" name="settings[slideshow_width]" value="<?php print @$ops['slideshow_width']; ?>" /></td>
		</tr>
        <tr>
            <td><?php _e('SlideShow Height'); ?></td>
            <td><input type="text" name="settings[slideshow_height]" value="<?php print  @$ops['slideshow_height']; ?>" /></td>
        </tr>
        <tr>
            <td><?php _e('Apply banner height manually (for mobile)'); ?>
                <span style="font-size: 10px;color: #ccc;"><br/>Set banner height manually<br/>(yes=Recommended if different resolution images are shown,<br/> No=Automatically adjust gallery height and ignore below (4)heights)</span>
            </td>
            <td>
                <select name="settings[heightManual]">
                    <option value="no" <?php print (@$ops['heightManual'] == 'no') ? 'selected' : ''; ?>><?php _e('No'); ?></option>
                    <option value="yes" <?php print (@$ops['heightManual'] == 'yes') ? 'selected' : ''; ?>><?php _e('Yes'); ?></option>
                </select>
            </td>
        </tr>

        <tr>
            <td><?php _e('Height1 for width range[768-959](px)'); ?>
                <span style="font-size: 10px;color: #ccc;"><br/>Only tablet(portrait) and phone(landscape)</span>
            </td>
            <td><input type="text" name="settings[bannerHeight1]"   value="<?php print @$ops['bannerHeight1']; ?>" /></td>
        </tr>

        <tr>
            <td><?php _e('Height2 for width range[568-767](px)'); ?>
                <span style="font-size: 10px;color: #ccc;"><br/>Only tablet(landscape)</span>
            </td>
            <td><input type="text" name="settings[bannerHeight2]"   value="<?php print @$ops['bannerHeight2']; ?>" /></td>
        </tr>

        <tr>
            <td><?php _e('Height3 for width range[480-567](px)'); ?>
                <span style="font-size: 10px;color: #ccc;"><br/>Only phone(landscape)</span>
            </td>
            <td><input type="text" name="settings[bannerHeight3]"   value="<?php print @$ops['bannerHeight3']; ?>" /></td>
        </tr>

        <tr>
            <td><?php _e('Height4 for max-width[479](px)'); ?>
                <span style="font-size: 10px;color: #ccc;"><br/>Only phone(portrait)</span>
            </td>
            <td><input type="text" name="settings[bannerHeight4]"   value="<?php print @$ops['bannerHeight4']; ?>" /></td>
        </tr>


        <tr>
			<td><?php _e('Flash gallery BG color type'); ?></td>
			<td>
				<input type="radio" name="settings[background_color_type]" value="gradient" 
					<?php print (@$ops['background_color_type'] == 'gradient') ? 'checked' : ''; ?> /> gradient
				<input type="radio" name="settings[background_color_type]" value="plain" 
					<?php print (@$ops['background_color_type'] == 'plain') ? 'checked' : ''; ?> /> plain
			</td>
		</tr>
		<tr>
			<td><?php _e('Gallery BG color1'); ?></td>
			<td>
				<input type="text" name="settings[background_color]" class="color {hash:true,caps:false}" value="<?php print @$ops['background_color']; ?>" />
			</td>
		</tr>
		<tr>
			<td><?php _e('Gallery BG color alpha1'); ?></td>
			<td>
				<select name="settings[_bg_color_alpha1]"> 
					<option value="0" <?php print (@$ops['_bg_color_alpha1'] == 0) ? 'selected' : ''; ?>>0</option>
					<option value="0.1" <?php print (@$ops['_bg_color_alpha1'] == 0.1) ? 'selected' : ''; ?>>0.1</option>
					<option value="0.2" <?php print (@$ops['_bg_color_alpha1'] == 0.2) ? 'selected' : ''; ?>>0.2</option>
					<option value="0.3" <?php print (@$ops['_bg_color_alpha1'] == 0.3) ? 'selected' : ''; ?>>0.3</option>
					<option value="0.4" <?php print (@$ops['_bg_color_alpha1'] == 0.4) ? 'selected' : ''; ?>>0.4</option>
					<option value="0.5" <?php print (@$ops['_bg_color_alpha1'] == 0.5) ? 'selected' : ''; ?>>0.5</option>
					<option value="0.6" <?php print (@$ops['_bg_color_alpha1'] == 0.6) ? 'selected' : ''; ?>>0.6</option>
					<option value="0.7" <?php print (@$ops['_bg_color_alpha1'] == 0.7) ? 'selected' : ''; ?>>0.7</option>
					<option value="0.8" <?php print (@$ops['_bg_color_alpha1'] == 0.8) ? 'selected' : ''; ?>>0.8</option>
					<option value="0.9" <?php print (@$ops['_bg_color_alpha1'] == 0.9) ? 'selected' : ''; ?>>0.9</option>
					<option value="1" <?php print (@$ops['_bg_color_alpha1'] == 1) ? 'selected' : ''; ?>>1</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Gallery BG color2'); ?></td>
			<td>
				<input type="text" name="settings[background_color2]" class="color {hash:true,caps:false}" value="<?php print @$ops['background_color2']; ?>" />
			</td>
		</tr>
		<tr>
			<td><?php _e('Gallery BG color alpha2'); ?></td>
			<td>
				<select name="settings[_bg_color_alpha2]"> 
					<option value="0" <?php print (@$ops['_bg_color_alpha2'] == 0) ? 'selected' : ''; ?>>0</option>
					<option value="0.1" <?php print (@$ops['_bg_color_alpha2'] == 0.1) ? 'selected' : ''; ?>>0.1</option>
					<option value="0.2" <?php print (@$ops['_bg_color_alpha2'] == 0.2) ? 'selected' : ''; ?>>0.2</option>
					<option value="0.3" <?php print (@$ops['_bg_color_alpha2'] == 0.3) ? 'selected' : ''; ?>>0.3</option>
					<option value="0.4" <?php print (@$ops['_bg_color_alpha2'] == 0.4) ? 'selected' : ''; ?>>0.4</option>
					<option value="0.5" <?php print (@$ops['_bg_color_alpha2'] == 0.5) ? 'selected' : ''; ?>>0.5</option>
					<option value="0.6" <?php print (@$ops['_bg_color_alpha2'] == 0.6) ? 'selected' : ''; ?>>0.6</option>
					<option value="0.7" <?php print (@$ops['_bg_color_alpha2'] == 0.7) ? 'selected' : ''; ?>>0.7</option>
					<option value="0.8" <?php print (@$ops['_bg_color_alpha2'] == 0.8) ? 'selected' : ''; ?>>0.8</option>
					<option value="0.9" <?php print (@$ops['_bg_color_alpha2'] == 0.9) ? 'selected' : ''; ?>>0.9</option>
					<option value="1" <?php print (@$ops['_bg_color_alpha2'] == 1) ? 'selected' : ''; ?>>1</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Autoplay'); ?></td>
			<td>
				<input type="radio" name="settings[autoplay]" value="yes" <?php print (@$ops['autoplay'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[autoplay]" value="no" <?php print (@$ops['autoplay'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
			</td>
		</tr>
		<tr>
			<td><?php _e('Autoplay display time'); ?></td>
			<td><input type="text" name="settings[autoplay_display_time]" value="<?php print @$ops['autoplay_display_time']; ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Enable Full Screen'); ?></td>
			<td>
				<input type="radio" name="settings[fullscreen]" value="yes" <?php print (@$ops['fullscreen'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[fullscreen]" value="no" <?php print (@$ops['fullscreen'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
			</td>
		</tr>
		<tr>
			<td><?php _e('Zoom image'); ?></td>
			<td>
				<select name="settings[zoom_images]">
					<option value="enabled" <?php print (@$ops['zoom_images'] == 'enabled') ? 'selected' : '';?>><?php _e('Enabled'); ?></option>
					<option value="disabled" <?php print (@$ops['zoom_images'] == 'disabled') ? 'selected' : '';?>><?php _e('Disabled'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Image Transition Effect'); ?></td>
			<td>
				<select name="settings[image_effect]">

<option value="1" <?php print (@$ops['image_effect'] == '1') ? 'selected' : ''; ?>><?php _e('Fade'); ?></option>
<option value="2" <?php print (@$ops['image_effect'] == '2') ? 'selected' : ''; ?>><?php _e('Zoom Out'); ?></option>
<option value="3" <?php print (@$ops['image_effect'] == '3') ? 'selected' : ''; ?>><?php _e('Elastic Zoom In'); ?></option>
<option value="4" <?php print (@$ops['image_effect'] == '4') ? 'selected' : ''; ?>><?php _e('Blur Zoom Out'); ?></option>
<option value="5" <?php print (@$ops['image_effect'] == '5') ? 'selected' : ''; ?>><?php _e('Elastic Slide'); ?></option>
<option value="6" <?php print (@$ops['image_effect'] == '6') ? 'selected' : ''; ?>><?php _e('Squares'); ?></option>
<option value="7" <?php print (@$ops['image_effect'] == '7') ? 'selected' : ''; ?>><?php _e('Triple Squares'); ?></option>
<option value="8" <?php print (@$ops['image_effect'] == '8') ? 'selected' : ''; ?>><?php _e('Horizontal Stripes'); ?></option>
<option value="9" <?php print (@$ops['image_effect'] == '9') ? 'selected' : ''; ?>><?php _e('Vertical Stripes'); ?></option>
<option value="10" <?php print (@$ops['image_effect'] == '10') ? 'selected' : ''; ?>><?php _e('Waves'); ?></option>
<option value="11" <?php print (@$ops['image_effect'] == '11') ? 'selected' : ''; ?>><?php _e('Scales Bars'); ?></option>
<option value="12" <?php print (@$ops['image_effect'] == '12') ? 'selected' : ''; ?>><?php _e('Bounce Slide'); ?></option>
<option value="13" <?php print (@$ops['image_effect'] == '13') ? 'selected' : ''; ?>><?php _e('Iris'); ?></option>
<option value="14" <?php print (@$ops['image_effect'] == '14') ? 'selected' : ''; ?>><?php _e('Alpha Mask'); ?></option>
<option value="15" <?php print (@$ops['image_effect'] == '15') ? 'selected' : ''; ?>><?php _e('Intersected Bars'); ?></option>

				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Image Transition Time'); ?></td>
			<td><input type="text" name="settings[transition_time]" value="<?php print @$ops['transition_time']; ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Image closing effect'); ?></td>
			<td>
				<input type="radio" name="settings[closign_effect]" value="fade" <?php print (@$ops['closign_effect'] == 'fade') ? 'checked' : ''; ?> />
				<span><?php _e('Fade Out'); ?></span>
				<input type="radio" name="settings[closign_effect]" value="default" <?php print (@$ops['closign_effect'] == 'default') ? 'checked' : ''; ?> />
				<span><?php _e('Default'); ?></span>
			</td>
		</tr>
		<tr>
			<td><?php _e('Controls Color'); ?></td>
			<td><input type="text" name="settings[controls_color]" id="settings[controls_color]" class="color {hash:true,caps:false}" value="<?php print @$ops['controls_color']; ?>" />  <div id="color_picker_color1" style="float:right"></div> </td>
		</tr>
		<tr>
			<td><?php _e('Full image scale'); ?></td>
			<td>
				<input type="radio" name="settings[full_image_scale]" value="yes" <?php print (@$ops['full_image_scale'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[full_image_scale]" value="no" <?php print (@$ops['full_image_scale'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
			</td>
		</tr>
		<tr>
			<td><?php _e('Display Thumb On Arrows'); ?></td>
			<td>
				<input type="radio" name="settings[thumbs_on_arrows]" value="yes" <?php print (@$ops['thumbs_on_arrows'] == 'yes') ? 'checked' : ''; ?> />
				<span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[thumbs_on_arrows]" value="no" <?php print (@$ops['thumbs_on_arrows'] == 'no') ? 'checked' : ''; ?> />
				<span><?php _e('No'); ?></span>
			</td>
		</tr>
		<tr>
			<td><?php _e('Thumbs width'); ?></td>
			<td><input type="text" name="settings[thumbs_width]" value="<?php print @$ops['thumbs_width']; ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Thumbs height'); ?></td>
			<td><input type="text" name="settings[thumbs_height]" value="<?php print @$ops['thumbs_height']; ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Tooltip on thumbimage'); ?></td>
			<td>
				<input type="radio" name="settings[thumbs_tooltip]" value="yes" <?php print (@$ops['thumbs_tooltip'] == 'yes') ? 'checked' : ''; ?> />
				<span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[thumbs_tooltip]" value="no" <?php print (@$ops['thumbs_tooltip'] == 'no') ? 'checked' : ''; ?> />
				<span><?php _e('No'); ?></span>
			</td>
		</tr>
		<tr>
			<td><?php _e('Thumb image scale'); ?></td>
			<td>
				<input type="radio" name="settings[thumbs_image_scale]" value="yes" <?php print (@$ops['thumbs_image_scale'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[thumbs_image_scale]" value="no" <?php print (@$ops['thumbs_image_scale'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
			</td>
		</tr>
		<tr>
			<td><?php _e('Show Description'); ?></td>
			<td>
				<input type="radio" name="settings[show_description]" value="yes" <?php print (@$ops['show_description'] == 'yes') ? 'checked' : ''; ?> />
				<span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[show_description]" value="no" <?php print (@$ops['show_description'] == 'no') ? 'checked' : ''; ?> />
				<span><?php _e('No'); ?></span>
			</td>
		</tr>
		<tr>
			<td><?php _e('Description Transition Effect'); ?></td>
			<td>
				<select name="settings[description_trans_effect]">
<option value="1" <?php print (@$ops['description_trans_effect'] == '1') ? 'selected' : ''; ?>><?php _e('Fade'); ?></option>
<option value="2" <?php print (@$ops['description_trans_effect'] == '2') ? 'selected' : ''; ?>><?php _e('Linear Fade'); ?></option>
<option value="3" <?php print (@$ops['description_trans_effect'] == '3') ? 'selected' : ''; ?>><?php _e('Linear Drop'); ?></option>
<option value="4" <?php print (@$ops['description_trans_effect'] == '4') ? 'selected' : ''; ?>><?php _e('Linear Elastic Drop'); ?></option>
<option value="5" <?php print (@$ops['description_trans_effect'] == '5') ? 'selected' : ''; ?>><?php _e('Linear Pop'); ?></option>
<option value="6" <?php print (@$ops['description_trans_effect'] == '6') ? 'selected' : ''; ?>><?php _e('Linear Elastic Pop'); ?></option>
<option value="7" <?php print (@$ops['description_trans_effect'] == '7') ? 'selected' : ''; ?>><?php _e('Random Elastic Drop'); ?></option>
<option value="8" <?php print (@$ops['description_trans_effect'] == '8') ? 'selected' : ''; ?>><?php _e('Random Elastic Pop'); ?></option>

				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Description color'); ?></td>
			<td>
				<input type="text" name="settings[description_color]" id="settings[description_color]" class="color {hash:true,caps:false}" value="<?php print @$ops['description_color']; ?>" />
				<div id="color_picker_color2" style="float:right"></div>
			</td>
		</tr>
		<tr>
			<td><?php _e('Description size'); ?></td>
			<td>
				<input type="text" name="settings[description_size]" value="<?php print @$ops['description_size']; ?>" />
			</td>
		</tr>
		<tr>
			<td><?php _e('Desc BG color type'); ?></td>
			<td>
				<input type="radio" name="settings[desc_bg_color_type]" value="gradient" <?php print (@$ops['desc_bg_color_type'] == 'gradient') ? 'checked' : '';  ?> />
				<span><?php _e('gradient');?></span>
				<input type="radio" name="settings[desc_bg_color_type]" value="plain" <?php print (@$ops['desc_bg_color_type'] == 'plain') ? 'checked' : '';  ?> />
				<span><?php _e('plain');?></span>
			</td>
		</tr>
		<tr>
			<td><?php _e('Desc BG color 1'); ?></td>
			<td><input type="text" name="settings[desc_bg_color1]" id="settings[desc_bg_color1]" class="color {hash:true,caps:false}" value="<?php print @$ops['desc_bg_color1']; ?>" /><div id="color_picker_color3" style="float:right"></div></td>
		</tr>
		<tr>
			<td><?php _e('Desc BG 1 alpha'); ?></td>
			<td>
				<select name="settings[desc_bg_color_alpha1]"> 
					<option value="0" <?php print (@$ops['desc_bg_color_alpha1'] == 0) ? 'selected' : ''; ?>>0</option>
					<option value="0.1" <?php print (@$ops['desc_bg_color_alpha1'] == 0.1) ? 'selected' : ''; ?>>0.1</option>
					<option value="0.2" <?php print (@$ops['desc_bg_color_alpha1'] == 0.2) ? 'selected' : ''; ?>>0.2</option>
					<option value="0.3" <?php print (@$ops['desc_bg_color_alpha1'] == 0.3) ? 'selected' : ''; ?>>0.3</option>
					<option value="0.4" <?php print (@$ops['desc_bg_color_alpha1'] == 0.4) ? 'selected' : ''; ?>>0.4</option>
					<option value="0.5" <?php print (@$ops['desc_bg_color_alpha1'] == 0.5) ? 'selected' : ''; ?>>0.5</option>
					<option value="0.6" <?php print (@$ops['desc_bg_color_alpha1'] == 0.6) ? 'selected' : ''; ?>>0.6</option>
					<option value="0.7" <?php print (@$ops['desc_bg_color_alpha1'] == 0.7) ? 'selected' : ''; ?>>0.7</option>
					<option value="0.8" <?php print (@$ops['desc_bg_color_alpha1'] == 0.8) ? 'selected' : ''; ?>>0.8</option>
					<option value="0.9" <?php print (@$ops['desc_bg_color_alpha1'] == 0.9) ? 'selected' : ''; ?>>0.9</option>
					<option value="1" <?php print (@$ops['desc_bg_color_alpha1'] == 1) ? 'selected' : ''; ?>>1</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Desc BG color 2'); ?></td>
			<td><input type="text" name="settings[desc_bg_color2]" id="settings[desc_bg_color2]" class="color {hash:true,caps:false}" value="<?php print @$ops['desc_bg_color2']; ?>" /><div id="color_picker_color4" style="float:right"></div></td>
		</tr>
		<tr>
			<td><?php _e('Desc BG 2 alpha'); ?></td>
			<td>
				<select name="settings[desc_bg_color_alpha2]"> 
					<option value="0" <?php print (@$ops['desc_bg_color_alpha2'] == 0) ? 'selected' : ''; ?>>0</option>
					<option value="0.1" <?php print (@$ops['desc_bg_color_alpha2'] == 0.1) ? 'selected' : ''; ?>>0.1</option>
					<option value="0.2" <?php print (@$ops['desc_bg_color_alpha2'] == 0.2) ? 'selected' : ''; ?>>0.2</option>
					<option value="0.3" <?php print (@$ops['desc_bg_color_alpha2'] == 0.3) ? 'selected' : ''; ?>>0.3</option>
					<option value="0.4" <?php print (@$ops['desc_bg_color_alpha2'] == 0.4) ? 'selected' : ''; ?>>0.4</option>
					<option value="0.5" <?php print (@$ops['desc_bg_color_alpha2'] == 0.5) ? 'selected' : ''; ?>>0.5</option>
					<option value="0.6" <?php print (@$ops['desc_bg_color_alpha2'] == 0.6) ? 'selected' : ''; ?>>0.6</option>
					<option value="0.7" <?php print (@$ops['desc_bg_color_alpha2'] == 0.7) ? 'selected' : ''; ?>>0.7</option>
					<option value="0.8" <?php print (@$ops['desc_bg_color_alpha2'] == 0.8) ? 'selected' : ''; ?>>0.8</option>
					<option value="0.9" <?php print (@$ops['desc_bg_color_alpha2'] == 0.9) ? 'selected' : ''; ?>>0.9</option>
					<option value="1" <?php print (@$ops['desc_bg_color_alpha2'] == 1) ? 'selected' : ''; ?>>1</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Panel position'); ?></td>
			<td>
				<select name="settings[panel_position]">
					<option value="bottom" <?php print (@$ops['panel_position'] == 'bottom') ? 'selected' : ''; ?>><?php _e('Bottom'); ?></option>
					<option value="top" <?php print (@$ops['panel_position'] == 'top') ? 'selected' : ''; ?>><?php _e('Top'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Thumbs panel state'); ?></td>
			<td>
				<select name="settings[thumbs_panel_state]">
					<option value="opened" <?php print (@$ops['thumbs_panel_state'] == 'opened') ? 'selected' : ''; ?>><?php _e('Opened'); ?></option>
					<option value="closed" <?php print (@$ops['thumbs_panel_state'] == 'closed') ? 'selected' : ''; ?>><?php _e('Closed'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Panel Height'); ?></td>
			<td><input type="text" name="settings[panel_height]" value="<?php print @$ops['panel_height']; ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Background color type'); ?></td>
			<td>
				<input type="radio" name="settings[bg_color_type]" value="gradient" <?php print (@$ops['bg_color_type'] == 'gradient') ? 'checked' : '';  ?> />
				<span><?php _e('gradient');?></span>
				<input type="radio" name="settings[bg_color_type]" value="plain" <?php print (@$ops['bg_color_type'] == 'plain') ? 'checked' : '';  ?> />
				<span><?php _e('plain');?></span>
			</td>
		</tr>
		<tr>
			<td><?php _e('Background color1'); ?></td>
			<td><input type="text" name="settings[bg_color1]" id="settings[bg_color1]" class="color {hash:true,caps:false}" value="<?php print @$ops['bg_color1']; ?>" /><div id="color_picker_color5" style="float:right"></div></td>
		</tr>
		<tr>
			<td><?php _e('Background color alpha1'); ?></td>
			<td>
				<select name="settings[bg_color_alpha1]"> 
					<option value="0" <?php print (@$ops['bg_color_alpha1'] == 0) ? 'selected' : ''; ?>>0</option>
					<option value="0.1" <?php print (@$ops['bg_color_alpha1'] == 0.1) ? 'selected' : ''; ?>>0.1</option>
					<option value="0.2" <?php print (@$ops['bg_color_alpha1'] == 0.2) ? 'selected' : ''; ?>>0.2</option>
					<option value="0.3" <?php print (@$ops['bg_color_alpha1'] == 0.3) ? 'selected' : ''; ?>>0.3</option>
					<option value="0.4" <?php print (@$ops['bg_color_alpha1'] == 0.4) ? 'selected' : ''; ?>>0.4</option>
					<option value="0.5" <?php print (@$ops['bg_color_alpha1'] == 0.5) ? 'selected' : ''; ?>>0.5</option>
					<option value="0.6" <?php print (@$ops['bg_color_alpha1'] == 0.6) ? 'selected' : ''; ?>>0.6</option>
					<option value="0.7" <?php print (@$ops['bg_color_alpha1'] == 0.7) ? 'selected' : ''; ?>>0.7</option>
					<option value="0.8" <?php print (@$ops['bg_color_alpha1'] == 0.8) ? 'selected' : ''; ?>>0.8</option>
					<option value="0.9" <?php print (@$ops['bg_color_alpha1'] == 0.9) ? 'selected' : ''; ?>>0.9</option>
					<option value="1" <?php print (@$ops['bg_color_alpha1'] == 1) ? 'selected' : ''; ?>>1</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Background color 2'); ?></td>
			<td><input type="text" name="settings[bg_color2]" id="settings[bg_color2]" class="color {hash:true,caps:false}" value="<?php print @$ops['bg_color2']; ?>" /><div id="color_picker_color6" style="float:right"></div></td>
		</tr>
		<tr>
			<td><?php _e('Background color alpha2'); ?></td>
			<td>
				<select name="settings[bg_color_alpha2]"> 
					<option value="0" <?php print (@$ops['bg_color_alpha2'] == 0) ? 'selected' : ''; ?>>0</option>
					<option value="0.1" <?php print (@$ops['bg_color_alpha2'] == 0.1) ? 'selected' : ''; ?>>0.1</option>
					<option value="0.2" <?php print (@$ops['bg_color_alpha2'] == 0.2) ? 'selected' : ''; ?>>0.2</option>
					<option value="0.3" <?php print (@$ops['bg_color_alpha2'] == 0.3) ? 'selected' : ''; ?>>0.3</option>
					<option value="0.4" <?php print (@$ops['bg_color_alpha2'] == 0.4) ? 'selected' : ''; ?>>0.4</option>
					<option value="0.5" <?php print (@$ops['bg_color_alpha2'] == 0.5) ? 'selected' : ''; ?>>0.5</option>
					<option value="0.6" <?php print (@$ops['bg_color_alpha2'] == 0.6) ? 'selected' : ''; ?>>0.6</option>
					<option value="0.7" <?php print (@$ops['bg_color_alpha2'] == 0.7) ? 'selected' : ''; ?>>0.7</option>
					<option value="0.8" <?php print (@$ops['bg_color_alpha2'] == 0.8) ? 'selected' : ''; ?>>0.8</option>
					<option value="0.9" <?php print (@$ops['bg_color_alpha2'] == 0.9) ? 'selected' : ''; ?>>0.9</option>
					<option value="1" <?php print (@$ops['bg_color_alpha2'] == 1) ? 'selected' : ''; ?>>1</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Thumbs bar height'); ?></td>
			<td><input type="text" name="settings[thumbs_bar_height]" value="<?php print @$ops['thumbs_bar_height']; ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Thumbs bar color'); ?></td>
			<td><input type="text" name="settings[thumbs_bar_color]" id="settings[thumbs_bar_color]" class="color {hash:true,caps:false}" value="<?php print @$ops['thumbs_bar_color']; ?>" /><div id="color_picker_color7" style="float:right"></div></td>
		</tr>
		<tr>
			<td><?php _e('Thumbs bar alpha'); ?></td>
			<td>
				<select name="settings[thumbs_bar_alpha]"> 
					<option value="0" <?php print (@$ops['thumbs_bar_alpha'] == 0) ? 'selected' : ''; ?>>0</option>
					<option value="0.1" <?php print (@$ops['thumbs_bar_alpha'] == 0.1) ? 'selected' : ''; ?>>0.1</option>
					<option value="0.2" <?php print (@$ops['thumbs_bar_alpha'] == 0.2) ? 'selected' : ''; ?>>0.2</option>
					<option value="0.3" <?php print (@$ops['thumbs_bar_alpha'] == 0.3) ? 'selected' : ''; ?>>0.3</option>
					<option value="0.4" <?php print (@$ops['thumbs_bar_alpha'] == 0.4) ? 'selected' : ''; ?>>0.4</option>
					<option value="0.5" <?php print (@$ops['thumbs_bar_alpha'] == 0.5) ? 'selected' : ''; ?>>0.5</option>
					<option value="0.6" <?php print (@$ops['thumbs_bar_alpha'] == 0.6) ? 'selected' : ''; ?>>0.6</option>
					<option value="0.7" <?php print (@$ops['thumbs_bar_alpha'] == 0.7) ? 'selected' : ''; ?>>0.7</option>
					<option value="0.8" <?php print (@$ops['thumbs_bar_alpha'] == 0.8) ? 'selected' : ''; ?>>0.8</option>
					<option value="0.9" <?php print (@$ops['thumbs_bar_alpha'] == 0.9) ? 'selected' : ''; ?>>0.9</option>
					<option value="1" <?php print (@$ops['thumbs_bar_alpha'] == 1) ? 'selected' : ''; ?>>1</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Menu Button BG Color '); ?></td>
			<td><input type="text" name="settings[menu_button_bg_color]" id="settings[menu_button_bg_color]" class="color {hash:true,caps:false}" value="<?php print @$ops['menu_button_bg_color']; ?>" /><div id="color_picker_color8" style="float:right"></div></td>
		</tr>
		<tr>
			<td><?php _e('Menu Button BG Alpha'); ?></td>
			<td>
				<select name="settings[menu_button_bg_alpha]"> 
					<option value="0" <?php print (@$ops['menu_button_bg_alpha'] == 0) ? 'selected' : ''; ?>>0</option>
					<option value="0.1" <?php print (@$ops['menu_button_bg_alpha'] == 0.1) ? 'selected' : ''; ?>>0.1</option>
					<option value="0.2" <?php print (@$ops['menu_button_bg_alpha'] == 0.2) ? 'selected' : ''; ?>>0.2</option>
					<option value="0.3" <?php print (@$ops['menu_button_bg_alpha'] == 0.3) ? 'selected' : ''; ?>>0.3</option>
					<option value="0.4" <?php print (@$ops['menu_button_bg_alpha'] == 0.4) ? 'selected' : ''; ?>>0.4</option>
					<option value="0.5" <?php print (@$ops['menu_button_bg_alpha'] == 0.5) ? 'selected' : ''; ?>>0.5</option>
					<option value="0.6" <?php print (@$ops['menu_button_bg_alpha'] == 0.6) ? 'selected' : ''; ?>>0.6</option>
					<option value="0.7" <?php print (@$ops['menu_button_bg_alpha'] == 0.7) ? 'selected' : ''; ?>>0.7</option>
					<option value="0.8" <?php print (@$ops['menu_button_bg_alpha'] == 0.8) ? 'selected' : ''; ?>>0.8</option>
					<option value="0.9" <?php print (@$ops['menu_button_bg_alpha'] == 0.9) ? 'selected' : ''; ?>>0.9</option>
					<option value="1" <?php print (@$ops['menu_button_bg_alpha'] == 1) ? 'selected' : ''; ?>>1</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Menu Up Color '); ?></td>
			<td><input type="text" name="settings[menu_up_color]" id="settings[menu_up_color]" class="color {hash:true,caps:false}" value="<?php print @$ops['menu_up_color']; ?>" /><div id="color_picker_color9" style="float:right"></div></td>
		</tr>
		<tr>
			<td><?php _e('Menu Over Color '); ?></td>
			<td><input type="text" name="settings[menu_over_color]" id="settings[menu_over_color]" class="color {hash:true,caps:false}" value="<?php print @$ops['menu_over_color']; ?>" /><div id="color_picker_color10" style="float:right"></div></td>
		</tr>
		<tr>
			<td><?php _e('Scroll Bar'); ?></td>
			<td>
				<input type="radio" name="settings[scroll_bar]" value="yes" <?php print (@$ops['scroll_bar'] == 'yes') ? 'checked' : '';  ?> />
				<span><?php _e('Yes');?></span>
				<input type="radio" name="settings[scroll_bar]" value="no" <?php print (@$ops['scroll_bar'] == 'no') ? 'checked' : '';  ?> />
				<span><?php _e('No');?></span>
			</td>
		</tr>
		<tr>
			<td><?php _e('Show Price'); ?></td>
			<td>
				<input type="radio" name="settings[show_price]" value="yes" <?php print (@$ops['show_price'] == 'yes') ? 'checked' : ''; ?> />
				<span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[show_price]" value="no" <?php print (@$ops['show_price'] == 'no') ? 'checked' : ''; ?> />
				<span><?php _e('No'); ?></span>
			</td>
		</tr>
		<tr>
			<td><?php _e('Price Button Position'); ?></td>
			<td>
				<select name="settings[price_button_pos]">
					<option value="BR" <?php print (@$ops['price_button_pos'] == 'BR') ? 'selected' : ''; ?>><?php _e('Bottom Right');?></option>
					<option value="BL" <?php print (@$ops['price_button_pos'] == 'BL') ? 'selected' : ''; ?>><?php _e('Bottom Left');?></option>
					<option value="TR" <?php print (@$ops['price_button_pos'] == 'TR') ? 'selected' : ''; ?>><?php _e('Top Right');?></option>
					<option value="TL" <?php print (@$ops['price_button_pos'] == 'TL') ? 'selected' : ''; ?>><?php _e('Top Left');?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Price Text Size'); ?></td>
			<td><input type="text" name="settings[price_text_size]" value="<?php print @$ops['price_text_size']; ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Price Color'); ?></td>
			<td><input type="text" name="settings[price_color]" id="settings[price_color]" class="color {hash:true,caps:false}" value="<?php print @$ops['price_color']; ?>" /><div id="color_picker_color11" style="float:right"></div></td>
		</tr>
		<tr>
			<td><?php _e('Price Tag Image'); ?></td>
			<td>
				<select name="settings[price_tag_image]">
					<option value="flower_blue.png" <?php print (@$ops['price_tag_image'] == 'flower_blue.png') ? 'selected' : ''; ?>><?php _e('flower blue');?></option>
					<option value="flower_green.png" <?php print (@$ops['price_tag_image'] == 'flower_green.png') ? 'selected' : ''; ?>><?php _e('flower green');?></option>
					<option value="flower_mauve.png" <?php print (@$ops['price_tag_image'] == 'flower_mauve.png') ? 'selected' : ''; ?>><?php _e('flower mauve');?></option>
					<option value="flower_red.png" <?php print (@$ops['price_tag_image'] == 'flower_red.png') ? 'selected' : ''; ?>><?php _e('flower red');?></option>
					<option value="star_blue.png" <?php print (@$ops['price_tag_image'] == 'star_blue.png') ? 'selected' : ''; ?>><?php _e('star blue');?></option>
					<option value="star_fuchsia.png" <?php print (@$ops['price_tag_image'] == 'star_fuchsia.png') ? 'selected' : ''; ?>><?php _e('star fuchsia');?></option>
					<option value="star_green.png" <?php print (@$ops['price_tag_image'] == 'star_green.png') ? 'selected' : ''; ?>><?php _e('star green');?></option>
					<option value="star_orange.png" <?php print (@$ops['price_tag_image'] == 'star_orange.png') ? 'selected' : ''; ?>><?php _e('star orange');?></option>
					<option value="stiker_green.png" <?php print (@$ops['price_tag_image'] == 'stiker_green.png') ? 'selected' : ''; ?>><?php _e('stiker green');?></option>
					<option value="stiker_mauve.png" <?php print (@$ops['price_tag_image'] == 'stiker_mauve.png') ? 'selected' : ''; ?>><?php _e('stiker mauve');?></option>
					<option value="stiker_orange.png" <?php print (@$ops['price_tag_image'] == 'stiker_orange.png') ? 'selected' : ''; ?>><?php _e('stiker orange');?></option>
					<option value="stiker_red.png" <?php print (@$ops['price_tag_image'] == 'stiker_red.png') ? 'selected' : ''; ?>><?php _e('stiker red');?></option>

				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Currency Symbol'); ?></td>
			<td><input type="text" name="settings[currency_symbol]" value="<?php print @$ops['currency_symbol']; ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Currency Color'); ?></td>
			<td><input type="text" name="settings[currency_color]" id="settings[currency_color]" class="color {hash:true,caps:false}" value="<?php print @$ops['currency_color']; ?>" /><div id="color_picker_color12" style="float:right"></div></td>
		</tr>
		<tr>
			<td><?php _e('Open Link Type'); ?></td>
			<td>
				<input type="radio" name="settings[link_type]" value="new" 
					<?php print (@$ops['link_type'] == 'new') ? 'checked' : ''; ?> /> New Window
				<input type="radio" name="settings[link_type]" value="current" 
					<?php print (@$ops['link_type'] == 'current') ? 'checked' : ''; ?> /> Current Window
			</td>
		</tr>

		<tr>
			<td><?php _e('Wmode'); ?></td>
			<td>
				<select name="settings[wmode]">
					<option value="transparent" <?php print (@$ops['wmode'] == 'transparent') ? 'selected' : ''; ?>><?php _e('Transparent'); ?></option>
					<option value="none" <?php print (@$ops['wmode'] == 'none') ? 'selected' : ''; ?>><?php _e('None'); ?></option>
				</select>
			</td>
		</tr>
		
		</table>
	<p><button type="submit" class="button-primary"><?php _e('Save Config'); ?></button></p>
	</form>
</div>