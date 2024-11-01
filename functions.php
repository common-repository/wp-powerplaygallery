<?php
function pp_get_def_settings()
{
	$pp_settings = array('slideshow_height' => '550',
			'slideshow_width' => '550',
			'background_color' => '',
			'background_color_type' => 'gradient',
			'_bg_color_alpha1' => 1,
			'background_color2' => '',
			'_bg_color_alpha2' => 1,
			'autoplay' => 'yes',
			'autoplay_display_time' => 10,
			'fullscreen' => 'yes',
			'zoom_images' => 'disabled',
			'image_effect' => 'fade',
			'transition_time' => 1000,
			'closign_effect' => 'fade',
			'controls_color' => '#2f83cb',
			'full_image_scale' => 'yes',
			'thumbs_on_arrows' => 'yes',
			'thumbs_width' => 90,
			'thumbs_height' => 70,
			'thumbs_tooltip' => 'yes',
			'thumbs_image_scale' => 'yes',
			'show_description' => 'yes',
			'description_trans_effect' => 1,
			'description_color' => '#ffffff',
			'description_size' => 12,
			'desc_bg_color_type' => 'plain',
			'desc_bg_color1' => '#000000',
			'desc_bg_color_alpha1' => 0.5,
			'desc_bg_color2' => '#000000',
			'desc_bg_color_alpha2' => 1,
			'panel_position' => 'bottom',
			'thumbs_panel_state' => 'opened',
			'panel_height' => 80,
			'bg_color_type' => 'gradient',
			'bg_color1' => '#ffffff',
			'bg_color_alpha1' => 1,
			'bg_color2' => '#ffffff',
			'bg_color_alpha2' => 1,
			'thumbs_bar_height' => 24,
			'thumbs_bar_color' => '#000000',
			'thumbs_bar_alpha' => 0.4,
			'menu_button_bg_color' => '#000000',
			'menu_button_bg_alpha' => 0.4,
			'menu_up_color' => '#ffffff',
			'menu_over_color' => '#b5ff00',
			'scroll_bar' => 'yes',
			'show_price' => 'yes',
			'price_button_pos' => 'BR',
			'price_text_size' => 18,
			'price_color' => '#ffffff',
			'price_tag_image' => 'flower_red.png',
			'currency_symbol' => '$',
			'currency_color' => '#ffffff',
			'link_type' => 'current'	
			);
	return $pp_settings;
}
function __get_pp_xml_settings()
{
	$ops = get_option('pp_settings', array());
	$xml_settings = '<backgroundColor type="'.$ops['background_color_type'].'">
						<color code="'.$ops['background_color'].'" alpha="'.$ops['_bg_color_alpha1'].'" />			
						<color code="'.$ops['background_color2'].'" alpha="'.$ops['_bg_color_alpha2'].'" />
					</backgroundColor>
					<mainPanel>
						<textBar>
							<defaultTextColor>'.$ops['description_color'].'</defaultTextColor>
							<backgroundColor type="'.$ops['desc_bg_color_type'].'">
								<color code="'.$ops['desc_bg_color1'].'" alpha="'.$ops['desc_bg_color_alpha1'].'" />
								<color code="'.$ops['desc_bg_color2'].'" alpha="'.$ops['desc_bg_color_alpha2'].'" />
							</backgroundColor>
						</textBar>
						<defaultAutoplay>'.$ops['autoplay'].'</defaultAutoplay>
						<autoplayDisplayTime>'.$ops['autoplay_display_time'].'</autoplayDisplayTime>
						<displayArrowThumbs>'.$ops['thumbs_on_arrows'].'</displayArrowThumbs>
					</mainPanel>
					<thumbsPanel>
						<height>'.$ops['panel_height'].'</height>
						<backgroundColor type="'.$ops['bg_color_type'].'">
							<color code="'.$ops['bg_color1'].'" alpha="'.$ops['bg_color_alpha1'].'" />			
							<color code="'.$ops['bg_color2'].'" alpha="'.$ops['bg_color_alpha2'].'" />
						</backgroundColor>
						<thumb>
							<width>'.$ops['thumbs_width'].'</width>
							<height>'.$ops['thumbs_height'].'</height>
						</thumb>
						<bar>
							<height>'.$ops['thumbs_bar_height'].'</height>
							<color>'.$ops['thumbs_bar_color'].'</color>
							<alpha>'.$ops['thumbs_bar_alpha'].'</alpha>
						</bar>
						<menuButtons>
							<background>
								<color>'.$ops['menu_button_bg_color'].'</color>	
								<alpha>'.$ops['menu_button_bg_alpha'].'</alpha>
							</background>
							<upColor>'.$ops['menu_up_color'].'</upColor>
							<overColor>'.$ops['menu_over_color'].'</overColor>
						</menuButtons>
						<scrollbarEnabled>'.$ops['scroll_bar'].'</scrollbarEnabled>
						<controlsOverColor>'.$ops['controls_color'].'</controlsOverColor>
						<fullscreenEnabled>'.$ops['fullscreen'].'</fullscreenEnabled>
						<position>'.$ops['panel_position'].'</position>
						<defaultState>'.$ops['thumbs_panel_state'].'</defaultState>
					</thumbsPanel>
					<priceTag enabled="'.$ops['show_price'].'">
						<model>'.PPLAY_PLUGIN_URL."/price_images/".$ops['price_tag_image'].'</model>
						<position>'.$ops['price_button_pos'].'</position>
						<textSize>'.$ops['price_text_size'].'</textSize>
						<currency>
							<base>
								<color code="CECECE" alpha="0.8" />
								<color code="#CECECE" alpha="0.8" />
							</base>
							<label color="'.$ops['currency_color'].'" alpha="0.8" />
							<symbol>'.$ops['currency_symbol'].'</symbol>
						</currency>
						<price>
							<base color="#FF00CC" alpha="0.5" />
							<label color="'.$ops['price_color'].'" alpha="0.8" />
						</price>
					</priceTag>
					<imageEffect>
						<type>'.$ops['image_effect'].'</type>
						<time>'.$ops['transition_time'].'</time>
						<closingEffect>'.$ops['closign_effect'].'</closingEffect>
					</imageEffect>
					<descriptionEffect>
						<type>'.$ops['description_trans_effect'].'</type>
					</descriptionEffect>';
	return $xml_settings;
}
function pp_get_album_dir($album_id)
{
	global $gpp;
	$album_dir = PPLAY_PLUGIN_UPLOADS_DIR . "/{$album_id}_uploadfolder";
	return $album_dir;
}
/**
 * Get album url
 * @param $album_id
 * @return unknown_type
 */
function pp_get_album_url($album_id)
{
	global $gpp;
	$album_url = PPLAY_PLUGIN_UPLOADS_URL . "/{$album_id}_uploadfolder";
	return $album_url;
}
function pp_get_table_actions(array $tasks)
{
	?>
	<div class="bulk_actions">
		<form action="" method="post" class="bulk_form">Bulk action
			<select name="task">
				<?php foreach($tasks as $t => $label): ?>
				<option value="<?php print $t; ?>"><?php print $label; ?></option>
				<?php endforeach; ?>
			</select>
			<button class="button-secondary do_bulk_actions" type="submit">Do</button>
		</form>
	</div>
	<?php 
}
function shortcode_display_pp_gallery($atts)
{
	$vars = shortcode_atts( array(
									'cats' => '',
									'imgs' => '',
								), 
							$atts );
	//extract( $vars );
	
	$ret = display_pp_gallery($vars);
	return $ret;
}
function display_pp_gallery($vars)
{
	global $wpdb, $gpp;
	$ops = get_option('pp_settings', array());
	//print_r($ops);
	$albums = null;
	$images = null;
	$cids = trim($vars['cats']);
	if (strlen($cids) != strspn($cids, "0123456789,")) {
		$cids = '';
		$vars['cats'] = '';
	}
	$imgs = trim($vars['imgs']);
	if (strlen($imgs) != strspn($imgs, "0123456789,")) {
		$imgs = '';
		$vars['imgs'] = '';
	}
	$categories = '';
	$xml_filename = '';
	if( !empty($cids) && $cids{strlen($cids)-1} == ',')
	{
		$cids = substr($cids, 0, -1);
	}
	if( !empty($imgs) && $imgs{strlen($imgs)-1} == ',')
	{
		$imgs = substr($imgs, 0, -1);
	}
	//check for xml file
	if( !empty($vars['cats']) )
	{
		$xml_filename = "cat_".str_replace(',', '', $cids) . '.xml';	
	}
	elseif( !empty($vars['imgs']))
	{
		$xml_filename = "image_".str_replace(',', '', $imgs) . '.xml';
	}
	else
	{
		$xml_filename = "pp_all.xml";
	}
	//die(PPLAY_PLUGIN_XML_DIR . '/' . $xml_filename);


	
	if( !empty($vars['cats']) )
	{
		$query = "SELECT * FROM {$wpdb->prefix}pp_albums WHERE album_id IN($cids) AND status = 1 ORDER BY `order` ASC";
		//print $query;
		$albums = $wpdb->get_results($query, ARRAY_A);
		foreach($albums as $key => $album)
		{
			$images = $gpp->pp_get_album_images($album['album_id']);
			if ($images && !empty($images) && is_array($images)) {
				$album_dir = pp_get_album_url($album['album_id']);//PPLAY_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
				$categories .= "<category id=\"{$album['album_id']}\">
								<title><![CDATA[{$album['name']}]]></title>
								";
						$categories .= '<thumb scale="'.$generate_catthumb_scale.'">'.$album_dir."/thumb/".$album['thumb'].'</thumb>';
				foreach($images as $key => $img)
				{
					if( $img['status'] == 0 ) continue;
					
					$categories .= "<item zoom=\"{$ops['zoom_images']}\">
									<main scale=\"{$ops['full_image_scale']}\">".str_replace(" ","-",$album_dir)."/big/{$img['image']}</main>
									<thumb scale=\"{$ops['thumbs_image_scale']}\">".str_replace(" ","-",$album_dir)."/thumb/{$img['thumb']}</thumb>
									<label><![CDATA[".($ops['thumbs_tooltip']=='yes'?$img['title']:"")."]]></label>
									<description>".($ops['show_description']=='no'||$img['description']==""?"":"<![CDATA[<font size=\"".$ops['description_size']."\" >".$img['description']."</font>]]>")."</description>
									<link window=\"".$ops['link_type']."\">{$img['link']}</link>
									<price><regular>".($ops['show_price']=='no'||$img['price']==0?"":$img['price'])."</regular><updated></updated></price>
								</item>";
				}
				$categories .= "</category>";
			}
		}
		//$xml_filename = "cat_".str_replace(',', '', $cids) . '.xml';
	}
	elseif( !empty($vars['imgs']))
	{
		$query = "SELECT * FROM {$wpdb->prefix}pp_images WHERE image_id IN($imgs) AND status = 1 ORDER BY `order` ASC";
		$images = $wpdb->get_results($query, ARRAY_A);
		if ($images && !empty($images) && is_array($images)) {
			$categories .= "<category id=\"\">
								<title><![CDATA[]]></title>
								";
			foreach($images as $key => $img)
			{
				$album = $gpp->pp_get_album($img['category_id']);
				$album_dir = pp_get_album_url($album['album_id']);//PPLAY_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
				if( $img['status'] == 0 ) continue;
				
				$categories .= "<item zoom=\"{$ops['zoom_images']}\">
									<main scale=\"{$ops['full_image_scale']}\">".str_replace(" ","-",$album_dir)."/big/{$img['image']}</main>
									<thumb scale=\"{$ops['thumbs_image_scale']}\">".str_replace(" ","-",$album_dir)."/thumb/{$img['thumb']}</thumb>
									<label><![CDATA[".($ops['thumbs_tooltip']=='yes'?$img['title']:"")."]]></label>
									<description>".($ops['show_description']=='no'||$img['description']==""?"":"<![CDATA[<font size=\"".$ops['description_size']."\" >".$img['description']."</font>]]>")."</description>
									<link window=\"".$ops['link_type']."\">{$img['link']}</link>
									<price><regular>".($ops['show_price']=='no'||$img['price']==0?"":$img['price'])."</regular><updated></updated></price>
								</item>";
			}
			$categories .= "</category>";
		}
	}
	//no values paremeters setted
	else//( empty($vars['cats']) && empty($vars['imgs']))
	{
		$query = "SELECT * FROM {$wpdb->prefix}pp_albums WHERE status = 1 ORDER BY `order` ASC";
		$albums = $wpdb->get_results($query, ARRAY_A);
		foreach($albums as $key => $album)
		{
			$images = $gpp->pp_get_album_images($album['album_id']);
			$album_dir = pp_get_album_url($album['album_id']);//PPLAY_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
			if ($images && !empty($images) && is_array($images)) {
				$categories .= "<category id=\"{$album['album_id']}\">
								<title><![CDATA[{$album['name']}]]></title>
								";
                $categories .= '<thumb>'.$album_dir."/thumb/".$album['thumb'].'</thumb>
                ';
				foreach($images as $key => $img)
				{
					if($img['status'] == 0 ) continue;
					$categories .= "<item zoom=\"{$ops['zoom_images']}\">
									<main scale=\"{$ops['full_image_scale']}\">".str_replace(" ","-",$album_dir)."/big/{$img['image']}</main>
									<thumb scale=\"{$ops['thumbs_image_scale']}\">".str_replace(" ","-",$album_dir)."/thumb/{$img['thumb']}</thumb>
									<label><![CDATA[".($ops['thumbs_tooltip']=='yes'?$img['title']:"")."]]></label>
									<description>".($ops['show_description']=='no'||$img['description']==""?"":"<![CDATA[<font size=\"".$ops['description_size']."\" >".$img['description']."</font>]]>")."</description>
									<link window=\"".$ops['link_type']."\">{$img['link']}</link>
									<price><regular>".($ops['show_price']=='no'||$img['price']==0?"":$img['price'])."</regular><updated></updated></price>
								</item>";
				}
				$categories .= "</category>";
			}
		}
		//$xml_filename = "pp_all.xml";
	}
    $plugContId= 'gal'.time();
	$xml_tpl = __get_pp_xml_template($plugContId);
	$settings = __get_pp_xml_settings();
	$xml = str_replace(array('{settings}', '{default_category}', '{categories}'), 
						array($settings, $album['album_id'], $categories), $xml_tpl);
	//write new xml file
	$fh = fopen(PPLAY_PLUGIN_XML_DIR . '/' . $xml_filename, 'w+');
	fwrite($fh, $xml);
	fclose($fh);
	//print "<h3>Generated filename: $xml_filename</h3>";
	//print $xml;
	if( file_exists(PPLAY_PLUGIN_XML_DIR . '/' . $xml_filename ) )
	{
		$fh = fopen(PPLAY_PLUGIN_XML_DIR . '/' . $xml_filename, 'r');
		$xml = fread($fh, filesize(PPLAY_PLUGIN_XML_DIR . '/' . $xml_filename));
		fclose($fh);
		//print "<h3>Getting xml file from cache: $xml_filename</h3>";
		$ret_str = "<div align='center' id='".$plugContId."'>
		<script language=\"javascript\">AC_FL_RunContent = 0;</script>
<script src=\"".PPLAY_PLUGIN_URL."/js/AC_RunActiveContent.js\" language=\"javascript\"></script>

		<script language=\"javascript\"> 
	if (AC_FL_RunContent == 0) {
		alert(\"This page requires AC_RunActiveContent.js.\");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '".$ops['slideshow_width']."',
			'height', '".$ops['slideshow_height']."',
			'src', '".PPLAY_PLUGIN_URL."/js/wp_powerplay',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', '".$ops['wmode']."',
			'devicefont', 'false',
			'id', 'xmlswf_vmpp',
			'mobile', '".PPLAY_PLUGIN_URL."/xml/$xml_filename',
			'bgcolor', '".$ops['background_color']."',
			'name', 'xmlswf_vmpp',
			'menu', 'true',
			'allowFullScreen', 'true',
			'allowScriptAccess','sameDomain',
			'movie', '".PPLAY_PLUGIN_URL."/js/wp_powerplay',
			'salign', '',
			'flashVars','XMLFile=".PPLAY_PLUGIN_URL."/xml/$xml_filename'
			); //end AC code
	}
</script>
</div>
";
//echo PPLAY_PLUGIN_UPLOADS_URL."<hr>";
//		print $xml;
		return $ret_str;
	}
	return true;
}
function __get_pp_xml_template($plugContId)
{
	$ops = get_option('pp_settings', array());
	$xml_tpl = '<?xml version="1.0" encoding="utf-8" ?>
				<data>
					<mobileSettings>
						<currencySymbol>'.$ops['currency_symbol'].'</currencySymbol>
						<width>'.$ops['slideshow_width'].'</width>
						<height>'.$ops['slideshow_height'].'</height>
						<containerid>'.$plugContId.'</containerid>
                        <heightManual>'.$ops['heightManual'].'</heightManual>
                        <mheight1>'.$ops['bannerHeight1'].'</mheight1>
                        <mheight2>'.$ops['bannerHeight2'].'</mheight2>
                        <mheight3>'.$ops['bannerHeight3'].'</mheight3>
                        <mheight4>'.$ops['bannerHeight4'].'</mheight4>
					</mobileSettings>
					<settings>{settings}</settings><!-- end settings -->
				<images>	
				
						<defaultSelectedCategory>{default_category}</defaultSelectedCategory>
						<content>{categories}<!-- end categories -->
					</content>
							</images><!-- end images -->
				</data>';
	return $xml_tpl;
}
?>