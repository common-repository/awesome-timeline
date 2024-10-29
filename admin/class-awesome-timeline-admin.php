<?php
namespace AdminSide;
/**
 * AwesomeTimeline.
 *
 * Plugin Name:       AwesomeTimeline
 * Plugin URI:        awesometimeline.com
 * Description:       Awesome Timeline: Great for creating announcements for your site and adding them as timelines.
 * Version:           1.0.0
 * Author:            Nitesh Singh
 * Author URI:        http://wptimeline.net
 * Text Domain:       awesometimeline
 * License:           GPL-2.0+ 
 */
if(!class_exists('AwesomeTimelineAdmin')){
	class AwesomeTimelineAdmin
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
    		 * @TODO:
    		 *
    		 * - Rename "Plugin_Name" to the name of your initial plugin class
    		 *
    		 */
            $plugin = \PublicSide\AwesomeTimeline::getInstance();
            $this->pluginSlug = $plugin->getPluginSlug();

            // Load admin style sheet and JavaScript.
            add_action('admin_enqueue_scripts', array( $this, 'enqueueAdminStyles' ));
            add_action('admin_enqueue_scripts', array( $this, 'enqueueAdminScripts' ));
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
         * Register and enqueue admin-specific style sheet.
         *
         * @since     1.0.0
         *
         * @return    null    Return early if no settings page is registered.
         */
        public function enqueueAdminStyles()
        {

            $screen = get_current_screen();
            /*
            ----------------------------
            GOOGLE FONTS
            ----------------------------
            */
            wp_enqueue_style('google-font-style', plugins_url( 'assets/css/fontselect.css', __FILE__) , array(), \PublicSide\AwesomeTimeline::VERSION);


            /*
            ----------------------------
            WP COLOR PICKER
            ----------------------------
            */
            wp_enqueue_style( 'wp-color-picker' );

            /*
            ----------------------------
            DATE PICKER 
            ----------------------------            
            */
            wp_enqueue_style('date-picker-style', plugins_url( 'assets/css/jquery-ui.css', __FILE__) , array(), \PublicSide\AwesomeTimeline::VERSION);

            /*
            ----------------------------
            ICON PICKER 
            ----------------------------            
            */
            wp_enqueue_style('icon-picker-style', plugins_url( 'assets/css/icon-picker.css', __FILE__) , array(), \PublicSide\AwesomeTimeline::VERSION);

            /* FONT-AWESOME */
            wp_enqueue_style('font-awesome-style-admin', plugins_url( 'assets/css/fonts/font-awesome/css/font-awesome.css', __FILE__) , array(), \PublicSide\AwesomeTimeline::VERSION);

            /* GENERICONS */
            wp_enqueue_style('genericons-style-admin', plugins_url( 'assets/css/fonts/genericons/genericons.css', __FILE__) , array(), \PublicSide\AwesomeTimeline::VERSION);          

            /*
            ----------------------------
            BOOTSTRAP 
            ----------------------------
            */
            // wp_enqueue_style('bootstrap-style', plugins_url( 'assets/css/bootstrap.min.css', __FILE__) , array(), \PublicSide\AwesomeTimeline::VERSION);
            wp_enqueue_style('custom-bootstrap-style', plugins_url( 'assets/css/custom-bootstrap.css', __FILE__) , array(), \PublicSide\AwesomeTimeline::VERSION);

            /*
            ----------------------------
            CUSTOM CSS
            ----------------------------
            */
            wp_enqueue_style($this->pluginSlug .'-multi-select', plugins_url('assets/css/multi-select.css', __FILE__), array(), \PublicSide\AwesomeTimeline::VERSION);
            wp_enqueue_style($this->pluginSlug .'-admin-styles', plugins_url('assets/css/admin.css', __FILE__), array(), \PublicSide\AwesomeTimeline::VERSION);
            if($screen->id == "edit-announcement"){
                wp_enqueue_style($this->pluginSlug .'-admin-edit-announcement-style', plugins_url('assets/css/edit-announcement.css', __FILE__), array(), \PublicSide\AwesomeTimeline::VERSION);
            }
        }

        /**
         * Register and enqueue admin-specific JavaScript.
         *
         * @since     1.0.0
         *
         * @return    null    Return early if no settings page is registered.
         */
        public function enqueueAdminScripts()
        {
            wp_enqueue_script($this->pluginSlug . '-admin-script', plugins_url('assets/js/admin.js', __FILE__), array( 'jquery','jquery-ui-datepicker' ), \PublicSide\AwesomeTimeline::VERSION);
            wp_localize_script($this->pluginSlug . '-admin-script', 'atl_plugin_url', self_admin_url("plugins.php?plugin_status=all&is_atl_plugin=yes&paged=1&s") );
            wp_enqueue_script($this->pluginSlug . '-multi-select-script', plugins_url('assets/js/jquery.multi-select.js', __FILE__), array( 'jquery','jquery-ui-datepicker' ), \PublicSide\AwesomeTimeline::VERSION);
               
           //ICON PICKER
           wp_enqueue_script($this->pluginSlug . '-icon-picker-script', plugins_url('assets/js/icon-picker.js', __FILE__), array( 'jquery'), \PublicSide\AwesomeTimeline::VERSION);

           //GOOGLE FONT
           wp_enqueue_script($this->pluginSlug . '-google-font-picker-script', plugins_url('assets/js/jquery.fontselect.min.js', __FILE__), array( 'jquery'), \PublicSide\AwesomeTimeline::VERSION);

           //WP COLOR PICKER
           wp_enqueue_script( 'wp-color-picker' );
       }

        /**
         * Render the settings page for this plugin.
         *
         * @since    1.0.0
         */
        public function displayAdminPage()
        {
            include_once('views/admin.php');
        }

        /**
         * Add settings action link to the plugins page.
         *
         * @since    1.0.0
         */
        public function addActionLinks($links)
        {
            return array_merge(
                array(
                    'settings' => '<a href="' . admin_url('options-general.php?page=' . $this->pluginSlug) . '">' . __('Settings', $this->pluginSlug) . '</a>'
                ),
                $links
            );
        }

        /**
         * NOTE:     Actions are points in the execution of a page or process
         *           lifecycle that WordPress fires.
         *
         *           Actions:    http://codex.wordpress.org/Plugin_API#Actions
         *           Reference:  http://codex.wordpress.org/Plugin_API/Action_Reference
         *
         * @since    1.0.0
         */
        public function actionMethodName(){}

        /**
         * NOTE:     Filters are points of execution in which WordPress modifies data
         *           before saving it or sending it to the browser.
         *
         *           Filters: http://codex.wordpress.org/Plugin_API#Filters
         *           Reference:  http://codex.wordpress.org/Plugin_API/Filter_Reference
         *
         * @since    1.0.0
         */
        public function filterMethodName(){}
    }
}