<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   AwesomeTimeline
 * @author    WisdmLabs <support@wisdmlabs.com>
 * @license   GPL-2.0+
 * @link      https://wisdmlabs.com
 * @copyright 2016 WisdmLabs or Company Name
 */

// If uninstall not called from WordPress, then exit
if (! defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

global $wpdb;

if (is_multisite()) {

    $blogs = $wpdb->get_results("SELECT blog_id FROM {$wpdb->blogs}", ARRAY_A);
        /* @TODO: delete all transient, options and files you may have added
		delete_transient( 'TRANSIENT_NAME' );
		delete_option('OPTION_NAME');
		//info: remove custom file directory for main site
		$uploadDir = wp_upload_dir();
		$directory = $uploadDir['basedir'] . DIRECTORY_SEPARATOR . "CUSTOM_DIRECTORY_NAME" . DIRECTORY_SEPARATOR;
		if (is_dir($directory)) {
			foreach(glob($directory.'*.*') as $v){
				unlink($v);
			}
			rmdir($directory);
		}
		*/
    if ($blogs) {

        foreach ($blogs as $blog) {
            switch_to_blog($blog['blog_id']);
            /* @TODO: delete all transient, options and files you may have added
			delete_transient( 'TRANSIENT_NAME' );
			delete_option('OPTION_NAME');
			//info: remove custom file directory for main site
			$uploadDir = wp_upload_dir();
			$directory = $uploadDir['basedir'] . DIRECTORY_SEPARATOR . "CUSTOM_DIRECTORY_NAME" . DIRECTORY_SEPARATOR;
			if (is_dir($directory)) {
				foreach(glob($directory.'*.*') as $v){
					unlink($v);
				}
				rmdir($directory);
			}
			//info: remove and optimize tables
			$GLOBALS['wpdb']->query("DROP TABLE `".$GLOBALS['wpdb']->prefix."TABLE_NAME`");
			$GLOBALS['wpdb']->query("OPTIMIZE TABLE `" .$GLOBALS['wpdb']->prefix."options`");
			*/
            restore_current_blog();
        }
    }

} else {
    /* @TODO: delete all transient, options and files you may have added
	delete_transient( 'TRANSIENT_NAME' );
	delete_option('OPTION_NAME');
	//info: remove custom file directory for main site
	$uploadDir = wp_upload_dir();
	$directory = $uploadDir['basedir'] . DIRECTORY_SEPARATOR . "CUSTOM_DIRECTORY_NAME" . DIRECTORY_SEPARATOR;
	if (is_dir($directory)) {
		foreach(glob($directory.'*.*') as $v){
			unlink($v);
		}
		rmdir($directory);
	}
	//info: remove and optimize tables
	$GLOBALS['wpdb']->query("DROP TABLE `".$GLOBALS['wpdb']->prefix."TABLE_NAME`");
	$GLOBALS['wpdb']->query("OPTIMIZE TABLE `" .$GLOBALS['wpdb']->prefix."options`");
	*/
}
