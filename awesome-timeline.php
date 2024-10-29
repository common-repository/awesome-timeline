<?php
/**
 *
 * Plugin Name:       Awesome Timeline
 * Plugin URI:        
 * Description:       Awesome Timeline: Great for creating announcements for your site and adding them as timelines.
 * Version:           1.0.1
 * Author:            Nitesh Singh
 * Author URI:        
 * Text Domain:       awesometimeline
 * License:           GPL-2.0+ 
 *
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

$activ_plugins = get_option('active_plugins');
if(in_array("AwesomeTimelinePro/awesome-timeline-pro.php", $activ_plugins)){return;}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once plugin_dir_path(__FILE__).'public/class-awesome-timeline.php';

if(class_exists('\PublicSide\AwesomeTimeline')){
    $timeline_public_obj = \PublicSide\AwesomeTimeline::getInstance();
    if(method_exists($timeline_public_obj, 'showAlertForMailchimp')){
        add_action('activated_plugin',array('\PublicSide\AwesomeTimeline','showAlertForMailchimp'),10,2);
    }
}
/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * @TODO:
 *
 * - replace Plugin_Name with the name of the class defined in
 *   `class-plugin-name.php`
 */
register_activation_hook(__FILE__, array('PublicSide\AwesomeTimeline', 'activate'));
register_deactivation_hook(__FILE__, array('PublicSide\AwesomeTimeline', 'deactivate'));

/*
 * @TODO:
 *
 * - replace Plugin_Name with the name of the class defined in
 *   `class-plugin-name.php`
 */
add_action('plugins_loaded', array('PublicSide\AwesomeTimeline', 'getInstance'));

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/
/*
 * The code below is intended to to give the lightest footprint possible.
 */
    // initiate Announcement Class
    require_once plugin_dir_path(__FILE__).'admin/includes/class-announcement.php';
    $announcement = \AdminSide\ManageAnnouncement\Announcement::getInstance();
if (is_admin()) {
    require_once plugin_dir_path(__FILE__).'admin/class-awesome-timeline-admin.php';
    add_action('plugins_loaded', array('AdminSide\AwesomeTimelineAdmin', 'getInstance'));
// initiate Timeline Class
    require_once plugin_dir_path(__FILE__).'admin/includes/class-timeline.php';
    $timeline = \AdminSide\ManageTimeline\Timeline::getInstance();
    add_action('wp_ajax_update_timeline_settings_callback',array($timeline,'update_timeline_settings_callback'));
}

/*----------------------------------------------------------------------------*
 * Add Plugin Upgrade Notice
 *----------------------------------------------------------------------------*/

$file = basename(__FILE__);
$folder = basename(dirname(__FILE__));
$hook = "in_plugin_update_message-{$folder}/{$file}";
if(!function_exists("showUpgradeNotification")){
    function showUpgradeNotification($currPluginMetadata, $newPluginMetadata)
    {
        // check "upgrade_notice"
        $newPluginMetadata->upgrade_notice = 'MY UPGRADE NOTICE';

        if (isset($newPluginMetadata->upgrade_notice) && strlen(trim($newPluginMetadata->upgrade_notice)) > 0) {
            echo '<p style="background-color: #d54e21; padding: 10px; color: #f9f9f9; margin-top: 10px"><strong>Important Upgrade Notice:</strong> ';
            echo esc_html($newPluginMetadata->upgrade_notice), '</p>';
        }
    }
    add_action($hook, 'showUpgradeNotification', 10, 2);
}