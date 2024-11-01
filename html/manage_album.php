<?php
//print_r($album);
global $gpp;

?>
<?php if(isset($gpp->messages['upload']) && is_array($gpp->messages['upload']) && count($gpp->messages['upload']) > 0): ?>
<div class="updated">
<p class="">
<?php foreach($gpp->messages['upload'] as $msg): ?>
	<span><?php print $msg; ?></span><br/>
<?php endforeach;?>
</p>
</div>
<?php endif; ?>


<script type="text/javascript">var pp_current_album_id = <?php print $album['album_id']; ?>;</script>
<div class="dataTable_wrapper">
	<div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix">
		<div id="album_images_length" class="dataTables_length">
			<form action="" method="get" class="change_rows_per_page">
				<label>
					Show 
					<select name="num_rows" class="set_num_rows" onchange="set_table_rows('album_images', this.value, 'images_pager');">
						<option value="5" selected>5</option>
						<option value="10">10</option>
						<option value="25">25</option>
						<option value="50">50</option>
						<option value="100">100</option>
					</select> entries
				</label>
			</form>
		</div>&nbsp;&nbsp;&nbsp;
		<?php pp_get_table_actions(array('pp_bulk_delete_images' => 'Delete', 
											'pp_bulk_disable_images' => 'Disable', 
											'pp_bulk_enable_images' => 'Enable')); ?>
	</div>
	<table class="widefat data-table" id="album_images">
	<thead>
	<tr>
		<th><input type="checkbox" name="select_all_images" class="select_all_images" value="" /></th>
		<th><?php _e('ID'); ?></th>
		<th><?php _e('Title'); ?></th>
		<th><?php _e('Thumb'); ?></th>
		<th><?php _e('Description'); ?></th>
		<th><?php _e('Price'); ?></th>
		<th><?php _e('Order'); ?></th>
		<th><?php _e('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php require_once PPLAY_PLUGIN_DIR . '/html/images_rows.php'; ?>
	</tbody>
	</table>
	<div id="images_pager" class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix"></div>
</div><!-- end class="dataTable_wrapper" -->
<h3><?php _e('Add Images'); ?></h3>
<ul id="menu_tabs">
	<li><a href="javascript:;" class="tab" rel="#single_upload"><?php _e('Single Image Upload'); ?></a></li>
	<li><a href="javascript:;" class="tab" rel="#multiple_upload"><?php _e('Multiple image Upload'); ?></a></li>
</ul>
<div id="tabs_container">
<div id="single_upload" class="tab_content">
	<form id="single_upload_form" action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="task" value="pp_single_image_upload" />
		<input type="hidden" id="single_album_key" name="album_id" value="<?php print $album['album_id']; ?>" />
		<table>
		<tr>
			<td><?php _e('Title'); ?></td>
			<td><input type="text" name="image_title" value="" /></td>
		</tr>
		<tr>
			<td><?php _e('Description'); ?></td>
			<td><textarea name="image_description"></textarea></td>
		</tr>
		<tr>
			<td><?php _e('Price'); ?></td>
			<td><input type="text" name="image_price" value="" /></td>
		</tr>
		<tr>
			<td><?php _e('Upload Image'); ?></td>
			<td><input type="file" name="image_file" value="" /></td>
		</tr>
		<tr>
			<td><?php _e('Choose Option'); ?></td>
			<td>
				<input type="radio" name="image_thumb" value="generate" onclick="document.getElementById('image_thumb_row').style.visibility = 'hidden';" /><span><?php _e('Generate Thumb'); ?></span>&nbsp;
				<input type="radio" name="image_thumb" value="upload" onclick="document.getElementById('image_thumb_row').style.visibility = 'visible';" /><span><?php _e('Upload Thumb'); ?></span>&nbsp;
			</td>
		</tr>	
		<tr id="image_thumb_row" style="visibility: hidden;">
			<td><?php _e('Upload Thumb'); ?></td>
			<td><input type="file" name="image_file_thumb" value="" /></td>
		</tr>	
		</table>
		<p>
			<button type="submit" class="button-primary"><?php _e('Add Image'); ?></button>
		</p>
	</form>
</div><!-- end id="single_upload" -->
<div id="multiple_upload" class="tab_content">
<!--
	<form id="multi_upload_form" action="" method="post">
		<input type="hidden" name="task" value="multiple_image_upload" />
		<input type="hidden" id="multi_album_id" name="album_id" value="<?php print $album['album_id']; ?>" />
		<input type="hidden" id="cpage" name="cpage" value="<?php print $cpage; ?>" />
		<input type="hidden" id="view" name="view" value="<?php print $_REQUEST['view']; ?>" />
		<fieldset>
			<legend><?php _e('Upload Options'); ?></legend>
			<table>
			<tr>
				<td><?php _e('Price'); ?></td>
				<td><input type="text" id="multi_image_price" name="image_price" value="" /></td>
			</tr>
			</table>
			<fieldset>
				<legend><?php _e('Upload Queue'); ?></legend>
				<div id="upload_queue"></div>			
			</fieldset>
			<div style="display:none;">
				<span><span id="queue_files">0</span>&nbsp; files in queue.</span>&nbsp;&nbsp;&nbsp;<span id="uploaded_files_msg"></span>
			</div>
			<p>
				<input type="file" id="uploadify" name="uploadify" value="" />
			</p>
			<p>
				<!-- 
				<button type="button" class="button-secondary" onclick="jQuery('#uploadify').uploadifyUpload();"><?php //_e('Start Upload'); ?></button>
			
				<button type="button" class="button-secondary" disabled="disabled" onclick="jQuery('#uploadify')..uploadifyCancel();"><?php //_e('Cancel Upload'); ?></button>
				 -->
<!--
			</p>
		</fieldset>
	</form>
-->


	<form id="form" method="post" action="<?php echo  PPLAY_PLUGIN_URL . '/thumbnail.php' ?> ">
	<div id="uploader">
		<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
	</div>
	<input type="hidden" id="albumid" name="albumid" value="<?php echo $_REQUEST['album_id']; ?>">
	<input type="hidden" id="ulr" name="url" value="<?php echo $_REQUEST['album_id']; ?>">

	<br />
	<input type="submit" id="pupsubmit" value="Submit" />
</form>
<?php $albmid = $_REQUEST['album_id']; ?>
<script type="text/javascript">

jQuery(function() {

  	jQuery("#uploader").plupload({
		// General settings
		runtimes : 'html5,flash,silverlight,html4',
		url : "<?php echo PPLAY_PLUGIN_URL . '/upload.php?albumid='.$albmid ?>",

		// User can upload no more then 20 files in one go (sets multiple_queues to false)
		max_file_count: 20,
		
		chunk_size: '1mb',

		// Resize images on clientside if we can
		// resize : {
		// 	width : 200, 
		// 	height : 200, 
		// 	quality : 90,
		// 	crop: true // crop to exact dimensions
		// },
		
		filters : {
			// Maximum file size
			max_file_size : '1000mb',
			// Specify what files to browse for
			mime_types: [
				{title : "Image files", extensions : "jpg,gif,png"},
				{title : "Zip files", extensions : "zip"}
			]
		},

		// Rename files by clicking on their titles
		rename: true,
		
		// Sort files
		sortable: true,

		// Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
		dragdrop: true,

		// Views to activate
		views: {
			list: true,
			thumbs: true, // Show thumbs
			active: 'thumbs'
		},

		// Flash settings
		flash_swf_url : "<?php echo PPLAY_PLUGIN_URL . '/js/Moxie.swf'; ?>",

		// Silverlight settings
		silverlight_xap_url : "<?php echo PPLAY_PLUGIN_URL . '/js/Moxie.xap'; ?>"
	});


	// Handle the case when form was submitted before uploading has finished
	jQuery('#form').submit(function(e) {
		// Files in queue upload them first


		if (jQuery('#uploader').plupload('getFiles').length > 0) {

			// When all files are uploaded submit form
			jQuery('#uploader').on('complete', function() {

				jQuery('#form')[0].submit();
				//return false;
				
			});

			jQuery('#uploader').plupload('start');
		} else {
			alert("You must have at least one file in the queue.");
		}
		return false; // Keep the form from submitting
	});

  // jQuery("#pupsubmit").click(function(){
   
         


  //    });
   
});

</script>

</div><!-- end id="single_upload" -->
</div><!-- end id="tab_container" -->