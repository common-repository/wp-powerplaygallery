<?php
/**
 * upload.php
 *
 * Copyright 2013, Moxiecode Systems AB
 * Released under GPL License.
 *
 * License: http://www.plupload.com/license
 * Contributing: http://www.plupload.com/contributing
 */

#!! IMPORTANT: 
#!! this file is just an example, it doesn't incorporate any security checks and 
#!! is not recommended to be used in production environment as it is. Be sure to 
#!! revise it and customize to your needs.
require_once( "../../../wp-load.php" );

// Make sure file is not cached (as it happens for example on iOS devices)
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

/* 
// Support CORS
header("Access-Control-Allow-Origin: *");
// other CORS headers if any...
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	exit; // finish preflight CORS requests here
}
*/

echo get_admin_url();

$upload_dir = wp_upload_dir();
$targetDir = $upload_dir['basedir'] . '/power_play/'.$_REQUEST['albumid'].'_uploadfolder';

$srcPath = $targetDir . '/big/';
$destPath = $targetDir . '/thumb/';  

$srcDir = opendir($srcPath);
while($readFile = readdir($srcDir))
{
    if($readFile != '.' && $readFile != '..')
    {
        /* this check doesn't really make sense to me,
           you might want !file_exists($destPath . $readFile) */
        if (!file_exists($readFile)) 
        {
            
            $thumb = image_resize($targetDir . '/big/' . $readFile, 
										80,
										80, 
										0, 'resized');

             
             @copy($thumb, $destPath . basename($thumb));
			 @unlink($thumb);
        }
    }
}

closedir($srcDir);

wp_redirect (get_admin_url().'/admin.php?page=power_play_manage&view=manage_album&album_id='.$_REQUEST['albumid']); 
//echo '<script>window.history.back()</script>'; 
exit;
