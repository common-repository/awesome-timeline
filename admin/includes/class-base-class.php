<?php
namespace AdminSide\Announcement;

/**
 * AwesomeTimeline.
 *
 * @package   AwesomeTimeline
 * @author    WisdmLabs <support@wisdmlabs.com>
 * @license   GPL-2.0+
 * @link      https://wisdmlabs.com
 * @copyright 2016 WisdmLabs or Company Name 
 */

/**
 * Handles all the operations for Announcements
 *
 * @package AwesomeTimeline_Announcement
 * @author    WisdmLabs <support@wisdmlabs.com>
 */
class Announcement
{

    /**
     * Instance of this class.
     *
     * @since    1.0.0
     *
     * @var      object
     */
    protected static $instance = null;

    /**
     * Slug of the plugin screen.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $pluginScrnHookSuf = null;

    /**
     * Initialize the plugin by loading admin scripts & styles and adding a
     * settings page and menu.
     *
     * @since     1.0.0
     */
    private function __construct()
    {

        /*
         * Call $pluginSlug from public plugin class.
         *
         */
        $plugin = \PublicSide\AwesomeTimeline::getInstance();
        $this->pluginSlug = $plugin->getPluginSlug();

       

        /*
         * Define custom functionality.
         *
         * Read more about actions and filters:
         * http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
         */
        add_action('@TODO', array( $this, 'actionMethodName' ));
        add_filter('@TODO', array( $this, 'filterMethodName' ));

    }

    /**
     * Return an instance of this class.
     *
     * @since     1.0.0
     *
     * @return    object    A single instance of this class.
     */
    public static function getInstance()
    {

        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * NOTE:     Filters are points of execution in which WordPress modifies data
     *           before saving it or sending it to the browser.
     *
     *           Filters: http://codex.wordpress.org/Plugin_API#Filters
     *           Reference:  http://codex.wordpress.org/Plugin_API/Filter_Reference
     *
     * @since    1.0.0
     */
    public function filterMethodName()
    {
        // @TODO: Define your filter hook callback here
    }
}
