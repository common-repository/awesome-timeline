<?php
namespace AdminSide\ManageTimeline;

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
 * Handles all the operations for Timeline
 *
 * @package AwesomeTimeline_Timeline
 * @author    WisdmLabs <support@wisdmlabs.com>
 */
class Timeline
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
        add_action( 'admin_menu',array($this, 'timeline_menu'), 0 );
        add_action('load-timeline-settings-page',array($this,'timelineSaveSettings'));

        // add_action('wp_ajax_update_timeline_settings_callback', array($this, 'update_timeline_settings_callback'));
   
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

    // Register Custom Post Type timeline
    public function timeline_menu() {
        // add_menu_page(__( 'Timeline' , 'awesometimeline' ) , __( 'Timeline' , 'awesometimeline' ) , 'manage_options' , "timeline-settings-page" , array( $this , 'display_plugin_template_page' ) , 'dashicons-image-rotate' , '17');
        add_submenu_page('edit.php?post_type=announcement', '', __( 'Timeline' , 'awesometimeline' ), 'manage_options', 'timeline-settings-page', array($this,'display_plugin_template_page'));
    }

    public function display_plugin_template_page(){
        $values = get_option('awesome-timeline-display-settings');
        $demo_post_id = get_option('demo_timeline_post');
        // $demo_post_url = 
        // echo "<pre>".print_r($values,1)."</pre>";die();
        include_once(dirname(dirname(__FILE__)).'/views/timeline_menu.php');
    }

    /**
    * Save data on Timeline Page
    */
    public function timelineSaveSettings(){
            $action = 'timeline_settings_save_page';
            $nonce = 'timeline_settings_page_nonce';                 

            // If the user doesn't have permission to save, then display an error message           
            if ( ! $this->timeline_user_can_save( $action, $nonce ) ) {
                return;
            }

    }

    public function timeline_user_can_save($action,$nonce){
        $is_nonce_set = isset( $_POST[ $nonce ] );
        $is_valid_nonce = false;
        if ( $is_nonce_set ) {
            $is_valid_nonce = wp_verify_nonce( $_POST[ $nonce ], $action );
        }
        return ( $is_nonce_set && $is_valid_nonce );
    }

    public function update_timeline_settings_callback(){
        $values = $_POST['values'];
        update_option('awesome-timeline-display-settings',$values);
        $response = array(
                    'success' => true,
                    'message' => __('Timeline Setting have been updated successfully.','awesometimeline'),
                );
        echo json_encode($response);
        die();
    }
}
 