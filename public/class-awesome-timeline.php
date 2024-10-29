<?php

namespace PublicSide;

/**
 * Plugin Name:       AwesomeTimeline
 * Plugin URI:        awesometimeline.com
 * Description:       Awesome Timeline: Great for creating announcements for your site and adding them as timelines.
 * Version:           1.0.0
 * Author:            Nitesh Singh
 * Author URI:        http://wptimeline.net
 * Text Domain:       awesometimeline
 * License:           GPL-2.0+ 
 */
if(!class_exists("AwesomeTimeline")){
    class AwesomeTimeline
    {

        /**
         * Plugin version, used for cache-busting of style and script file references.
         *
         * @since   1.0.0
         *
         * @var     string
         */
        const VERSION = '1.0.0';

        /**
         *
         * Unique identifier for plugin.
         *
         *
         * The variable name is used as the text domain when internationalizing strings
         * of text. Its value should match the Text Domain file header in the main
         * plugin file.
         *
         * @since    1.0.0
         *
         * @var      string
         */
        protected $pluginSlug = 'awesome-timeline';

        /**
         * Instance of this class.
         *
         * @since    1.0.0
         *
         * @var      object
         */
        protected static $instance = null;

        /**
         * Initialize the plugin by setting localization and loading public scripts
         * and styles.
         *
         * @since     1.0.0
         */
        private function __construct()
        {
            // Load plugin text domain
            add_action('init', array( $this, 'loadAwesomeTimelineTextdomain' ));

            // Activate plugin when new blog is added
            add_action('wpmu_new_blog', array( $this, 'activateNewSite' ));

            // Load public-facing style sheet and JavaScript.
            add_action('wp_enqueue_scripts', array( $this, 'enqueueStyles' ));
            add_action('wp_enqueue_scripts', array( $this, 'enqueueScripts' ));

            /* Define custom functionality.
             * Refer To http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
             */
            add_action('@TODO', array( $this, 'actionMethodName' ));
            add_filter('@TODO', array( $this, 'filterMethodName' ));

            // add_shortcode('awesome-timeline',array($this),"awesomeTimelineShortcodeView");
            add_action('init',array($this, 'registerAwesomeTimelineShortcode'));
        }

        /**
         * Return the plugin slug.
         *
         * @since    1.0.0
         *
         * @return    Plugin slug variable.
         */
        public function getPluginSlug()
        {
            return $this->pluginSlug;
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
         * Fired when the plugin is activated.
         *
         * @since    1.0.0
         *
         * @param    boolean    $networkWide    True if WPMU superadmin uses
         *                                       "Network Activate" action, false if
         *                                       WPMU is disabled or plugin is
         *                                       activated on an individual blog.
         */
        public static function activate($networkWide)
        {
            if (function_exists('is_multisite') && is_multisite()) {
                if ($networkWide) {
                    // Get all blog ids
                    $blogIds = self::getBlogIds();
                    foreach ($blogIds as $blogId) {
                        switch_to_blog($blogId);
                        self::singleActivate();
                    }
                    restore_current_blog();
                } else {
                    self::singleActivate();
                }
            } else {
                self::singleActivate();
            }
            $demo_page = get_option('demo_timeline_post');
            $demo_page_object = get_post($demo_page);
            if( empty($demo_page) || ! is_object($demo_page_object) ||   ! property_exists($demo_page_object, 'post_status' )|| ($demo_page_object->post_status != 'publish') ||   ! property_exists($demo_page_object, 'post_type' ) || ($demo_page_object->post_type != 'page') ||   ! property_exists($demo_page_object, 'post_content' ) || ((strpos($demo_page_object->post_content, '[awesome-timeline]') == false) && (strpos($demo_page_object->post_content, '[awesome-timeline]') != 0 ))) {//Add Demo Page
                $my_post = array(
                    'post_title'    => __('Demo Timeline Post','awesometimeline'),
                    'post_content'  => '[awesome-timeline]',
                    'post_status'   => 'publish',
                    'post_type' => 'page',
                    'post_author'   => 1,
                    );
                // Insert the post into the database.
                $post_id = wp_insert_post( $my_post );
                update_option('demo_timeline_post',$post_id);
            }
        }

        /**
         * Fired when the plugin is deactivated.
         *
         * @since    1.0.0
         *
         * @param    boolean    $networkWide    True if WPMU superadmin uses
         *                                       "Network Deactivate" action, false if
         *                                       WPMU is disabled or plugin is
         *                                       deactivated on an individual blog.
         */
        public static function deactivate($networkWide)
        {
            if (function_exists('is_multisite') && is_multisite()) {
                if ($networkWide) {
                    // Get all blog ids
                    $blogIds = self::getBlogIds();
                    foreach ($blogIds as $blogId) {
                        switch_to_blog($blogId);
                        self::singleDeactivate();
                    }
                    restore_current_blog();
                } else {
                    self::singleDeactivate();
                }
            } else {
                self::singleDeactivate();
            }
        }

        /**
         * Fired when a new site is activated with a WPMU environment.
         *
         * @since    1.0.0
         *
         * @param    int    $blogId    ID of the new blog.
         */
        public function activateNewSite($blogId)
        {
            if (1 !== did_action('wpmu_new_blog')) {
                return;
            }
            switch_to_blog($blogId);
            self::singleActivate();
            restore_current_blog();
        }

        /**
         * Get all blog ids of blogs in the current network that are:
         * - not archived
         * - not spam
         * - not deleted
         *
         * @since    1.0.0
         *
         * @return   array|false    The blog ids, false if no matches.
         */
        private static function getBlogIds()
        {
            global $wpdb;
            // get an array of blog ids
            $sql = "SELECT blog_id FROM $wpdb->blogs
            WHERE archived = '0' AND spam = '0'
            AND deleted = '0'";
            return $wpdb->get_col($sql);
        }

        /**
         * Fired for each blog when the plugin is activated.
         *
         * @since    1.0.0
         */
        private static function singleActivate(){}

        /**
         * Fired for each blog when the plugin is deactivated.
         *
         * @since    1.0.0
         */
        private static function singleDeactivate(){}

        /**
         * Load the plugin text domain for translation.
         *
         * @since    1.0.0
         */
        public function loadAwesomeTimelineTextdomain()
        {
            $domain = $this->pluginSlug;
            $locale = apply_filters('plugin_locale', get_locale(), $domain);
            load_textdomain($domain, trailingslashit(WP_LANG_DIR) . $domain . '/' . $domain . '-' . $locale . '.mo');
            load_plugin_textdomain($domain, false, basename(plugin_dir_path(dirname(__FILE__))) . '/languages/');
        }

        /**
         * Register and enqueue public-facing style sheet.
         *
         * @since    1.0.0
         */
        public function enqueueStyles()
        {
            // global $values;
            wp_enqueue_style($this->pluginSlug . '-plugin-styles', plugins_url('assets/css/public.css', __FILE__), array(), self::VERSION);
            /* MAIN STYLE.CSS */
            wp_enqueue_style($this->pluginSlug . '-main-styles', plugins_url('assets/style.css', __FILE__), array(), self::VERSION);
            /* FONT-AWSOME CSS */       
            wp_enqueue_style('font-awesome-style', plugins_url( 'assets/css/fonts/font-awesome/css/font-awesome.css', __FILE__) , array(), \PublicSide\AwesomeTimeline::VERSION);
            /* GENERICONS CSS  */
            wp_enqueue_style('genericons-style', plugins_url( 'assets/css/fonts/genericons/genericons.css', __FILE__) , array(), \PublicSide\AwesomeTimeline::VERSION);
            /* DASHICONS CSS */
            wp_enqueue_style($this->pluginSlug . '-dashicons-public-styles', get_stylesheet_uri(), array('dashicons' ), self::VERSION);
            /* FETCH DYNAMIC CSS */
            if(isset($_GET['is_atl_preview']) && $_GET['is_atl_preview'] == 'true'){
              $timeline_settings_values = $_GET;
            }else{
              $timeline_settings_values = get_option('awesome-timeline-display-settings');
            }
            // $timeline_settings_values =  get_option('awesome-timeline-display-settings'); 
            //heading alignment
            $atl_heading_align = $timeline_settings_values['heading_alignment']; 
            //date settings        
            $atl_date_color = $timeline_settings_values['date_font_color'];
            //post settings
            $atl_post_title_font = $timeline_settings_values['post_title_font'];
            $atl_post_content_font = $timeline_settings_values['post_content_font'];
            //  ENQUEUE GOOGLE FONTS ON FRONT-END
            wp_enqueue_style($this->pluginSlug . '-wpb-google-fonts-post', 'https://fonts.googleapis.com/css?family='. $atl_post_title_font);
            wp_enqueue_style($this->pluginSlug . '-wpb-google-fonts-title', 'https://fonts.googleapis.com/css?family='. $atl_post_content_font);
            $atl_post_title_font = str_replace('+', ' ', $atl_post_title_font);
            $atl_post_content_font = str_replace('+', ' ', $atl_post_content_font);
            //color settings
            $atl_post_cont_border = $timeline_settings_values['container_border_color'];
            $atl_post_background = $timeline_settings_values['post_background_color'];
            //readmore button
            $atl_btn_read_bg = $timeline_settings_values['read_more']['button_color'];
            $atl_btn_read_hover = $timeline_settings_values['read_more']['button_hover_color'];
            $readmore_button_color_light = $this->atlAdjustBrightness($atl_btn_read_bg, 35);
            $custom_css = "
               .entry-title{

             text-align: {$atl_heading_align};
            }

            #awesome-timeline .timeline-ver .content-date-left, #awesome-timeline .timeline-ver .content-date-right{
                color: {$atl_date_color};
            }               

            #wdm_timeline_post_title_font{

                font-family: '{$atl_post_title_font}';
            }

            #wdm_timeline_post_content_font{

            font-family: '{$atl_post_content_font}';

            }

            .atl-btn-flat{
                padding: 6px;
                background: {$atl_btn_read_bg};
                color: #fff !important;
            }

            .atl-btn-flat:hover{
                background: {$atl_btn_read_hover};
            }
            .atl-btn-sharp{
                padding: 6px;
                background: linear-gradient(to bottom,{$readmore_button_color_light} 30%,{$atl_btn_read_bg});
                box-shadow: 1px 1px 5px 0px;
                border: 1px solid #d3d3d3;
                color: #fff !important;
            }
            .atl-btn-sharp:hover{
                background: {$atl_btn_read_hover};
            }           

            .timeline-excerpt-ver{

                background: {$atl_post_background};
            }

            .atl-fade-in{

                opacity: 0;
            }

            .timeline-content-right, .timeline-content-left{

                border: 1px solid {$atl_post_cont_border};
            }
            ";
            wp_add_inline_style( $this->pluginSlug . '-main-styles' , $custom_css );
        }

        /**
         * Register and enqueues public-facing JavaScript files.
         *
         * @since    1.0.0
         */
        public function enqueueScripts()
        {
            /* PUBLIC JS */        
            wp_enqueue_script($this->pluginSlug . '-plugin-script', plugins_url('assets/js/public.js', __FILE__), array( 'jquery' ), self::VERSION);
            //GOOGLE FONT
               wp_enqueue_script($this->pluginSlug . '-google-font-picker-script-public', plugins_url('assets/js/jquery.fontselect.min.js', __FILE__), array( 'jquery'), \PublicSide\AwesomeTimeline::VERSION);
            /* MAIN JS */
            wp_enqueue_script($this->pluginSlug . '-main-script', plugins_url('assets/js/main.js', __FILE__), array( 'jquery' ), self::VERSION);
        }


        public function atlAdjustBrightness($hex, $steps) {
          // Steps should be between -255 and 255. Negative = darker, positive = lighter
          $steps = max(-255, min(255, $steps));

          // Normalize into a six character long hex string
          $hex = str_replace('#', '', $hex);
          if (strlen($hex) == 3) {
              $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
          }

          // Split into three parts: R, G and B
          $color_parts = str_split($hex, 2);
          $return = '#';

          foreach ($color_parts as $color) {
              $color   = hexdec($color); // Convert to decimal
              $color   = max(0,min(255,$color + $steps)); // Adjust color
              $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
          }

          return $return;
        }

        /**
         * NOTE:  Actions are points in the execution of a page or process
         *        lifecycle that WordPress fires.
         *
         *        Actions:    http://codex.wordpress.org/Plugin_API#Actions
         *        Reference:  http://codex.wordpress.org/Plugin_API/Action_Reference
         *
         * @since    1.0.0
         */
        public function actionMethodName(){}

        /**
         * NOTE:  Filters are points of execution in which WordPress modifies data
         *        before saving it or sending it to the browser.
         *
         *        Filters: http://codex.wordpress.org/Plugin_API#Filters
         *        Reference:  http://codex.wordpress.org/Plugin_API/Filter_Reference
         *
         * @since    1.0.0
         */
        public function filterMethodName(){}

        public function registerAwesomeTimelineShortcode(){
            add_shortcode('awesome-timeline',array($this,"awesomeTimelineShortcodeView"));
        }

        public function awesomeTimelineShortcodeView(){
            do_action('awesometimeline_before_display');
            include 'views/awesometimeline-shortcode-view.php';
            do_action('awesometimeline_after_display');
        }        

        public function showAlertForMailchimp($plugin, $network_wide){
            if( $plugin == plugin_basename( dirname(dirname(__FILE__ )) ."/awesome-timeline.php")){
                if ( ! is_network_admin() ) {
                        $recent = (array) get_option( 'recently_activated' );
                        unset( $recent[ $plugin ] );
                        update_option( 'recently_activated', $recent );
                    } else {
                        $recent = (array) get_site_option( 'recently_activated' );
                        unset( $recent[ $plugin ] );
                        update_site_option( 'recently_activated', $recent );
                    }
                 wp_redirect( self_admin_url("plugins.php?activate=true&plugin_status=all&is_atl_plugin=yes&paged=1&s") );
                 exit();
            }else{
                return;
            }
            
        }
    }
}
