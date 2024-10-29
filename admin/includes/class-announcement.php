<?php
namespace AdminSide\ManageAnnouncement;

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
        add_action( 'init',array($this, 'cpt_announcement'),100 );
        
        /**
         * Manage wp-list table columns
         */
        add_filter( 'manage_posts_columns',array($this, 'announcement_columns') );
        add_action( 'manage_posts_custom_column' , array($this, 'display_announcements_columns'), 10, 2 );

        /**
         * Adding Meta box for Scheduled Date
         */
        add_action('add_meta_boxes', array($this,'announcementRegisterMetaBoxes'),0);
        add_action('save_post', array($this,'announcementMetaSave'),10,1);
        
        //ADDING CUSTOM TEXT FOR FEATURED IMAGE
        add_filter( 'admin_post_thumbnail_html', array($this,'add_featured_image_instruction'));

        //Custom Excerpt Title for Announcement
        add_filter( 'gettext', array($this,'custom_excerpt_title'), 10, 2 );

        //Custom Update Message
        add_filter( 'post_updated_messages', array($this, 'announcement_update_messages') );
    }
    public function move_metabox_after_title () {
        global $post, $wp_meta_boxes;
        do_meta_boxes( 'announcement-meta', 'advanced', '' );
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

    // Register Custom Post Type Announcement
    public function cpt_announcement() {
		$labels = array(
            'name'                  => _x( 'Awesome Timeline - Manage Announcements', 'Post Type General Name', 'awesometimeline' ),
            'singular_name'         => _x( 'Announcement', 'Post Type Singular Name', 'awesometimeline' ),
            'menu_name'             => __( 'Awesome Timeline', 'awesometimeline' ),
            'name_admin_bar'        => __( 'Announcement', 'awesometimeline' ),
            'archives'              => __( 'Awesome Timeline - Announcements', 'awesometimeline' ),
            'parent_item_colon'     => __( 'Announcement:', 'awesometimeline' ),
            'all_items'             => __( 'All Announcements', 'awesometimeline' ),
            'add_new_item'          => __( 'Awesome Timeline - Add Announcement', 'awesometimeline' ),
            'add_new'               => __( 'Add Announcement', 'awesometimeline' ),
            'new_item'              => __( 'Awesome Timeline - New Announcement', 'awesometimeline' ),
            'edit_item'             => __( 'Awesome Timeline - Edit Announcement', 'awesometimeline' ),
            'update_item'           => __( 'Awesome Timeline - Update Announcement', 'awesometimeline' ),
            'view_item'             => __( 'View Announcement', 'awesometimeline' ),
            'search_items'          => __( 'Search Announcements', 'awesometimeline' ),
            'not_found'             => __( 'Not found', 'awesometimeline' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'awesometimeline' ),
            'featured_image'        => __( 'Announcement Image', 'awesometimeline' ),
            'set_featured_image'    => __( 'Set Announcement image', 'awesometimeline' ),
            'remove_featured_image' => __( 'Remove Announcement image', 'awesometimeline' ),
            'use_featured_image'    => __( 'Use as Announcement image', 'awesometimeline' ),
            'insert_into_item'      => __( 'Insert into Announcement', 'awesometimeline' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Announcement', 'awesometimeline' ),
            'items_list'            => __( 'Announcements list', 'awesometimeline' ),
            'items_list_navigation' => __( 'Announcements list navigation', 'awesometimeline' ),
            'filter_items_list'     => __( 'Filter items list', 'awesometimeline' ),
            );
        $args = array(
            'label'                 => __( 'Announcement', 'awesometimeline' ),
            'description'           => __( 'Announcements', 'awesometimeline' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
            'taxonomies'            => array(),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-arrow-right',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            );
        register_post_type( 'announcement', $args );
        flush_rewrite_rules();
    }

    /**
     * Remove the default columns and add new columns
     */
    public function announcement_columns( $columns ) {
        global $post;
        if($post->post_type == "announcement" ){
            $newColumns = array(
                'cb' => $columns['cb'],
                'title' => $columns['title'],
                'thumbnail' => __( 'Thumbnail', 'awesometimeline' ),
                'sch_date' => __( 'Scheduled Date', 'awesometimeline' ),
                'announcement_icon' => __( 'Icon', 'awesometimeline' ),
                'date' => __( 'Published Date', 'awesometimeline' ),
                );
            /** Remove Columns **/
            unset($columns);
            return $newColumns;
        }else{
            return $columns;
        }
    }

    /* Display custom column */
    public function display_announcements_columns( $column, $post_id ) {
        if ($column == 'thumbnail'){
            $post_thumbnail_id = get_post_thumbnail_id( $post_id );
            if ( $post_thumbnail_id ) {
                $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
                echo '<img src="' . $post_thumbnail_img[0] . '" />';
            }
        }
        if ($column == 'sch_date'){
            $schDate = get_post_meta($post_id,'announcement-scheduled-date',true);
            if($schDate){
                echo $schDate;
            }
        }
        if ($column == 'announcement_icon'){
            $icon = get_post_meta($post_id,'announcement-icon',true);
            $icon_bg_color = get_post_meta($post_id,'announcement-icon-bg-color',true);
            if($icon){?>
                <div class=" <?php if( isset( $icon ) ) { $v=explode('|',$icon); echo $v[0].' '.$v[1]; } ?>">
                    <?php
                }
            }
        }


    /**
     * Register meta box.
     */
    public function announcementRegisterMetaBoxes()
    {
        global $_wp_post_type_features;
        // echo "<pre>".print_r($_wp_post_type_features,1)."</pre>";die();
     if (isset($_wp_post_type_features['announcement']['editor']) && $_wp_post_type_features['announcement']['editor']) {
            unset($_wp_post_type_features['announcement']['editor']);
        add_meta_box('announcement-meta', __('Announcement Settings', 'awesometimeline'), array($this,'announcementMetaDisplay'), 'announcement','advanced','high');
    }
    }


    /**
     * Meta box display callback.
     *
     * @param WP_Post $post Current post object.
     */
    public function announcementMetaDisplay($post)
    {
        // Display code/markup goes here. Don't forget to include nonces!

        // $options = get_option( 'icon_picker_settings' );
        $announcemetSchDateValue = !empty(get_post_meta($post->ID,'announcement-scheduled-date',true))?get_post_meta($post->ID,'announcement-scheduled-date',true):date('Y-m-d');
        $announcemetSchIconValue = !empty(get_post_meta($post->ID,'announcement-icon',true))?get_post_meta($post->ID,'announcement-icon',true):'dashicons|dashicons-blank';
        $announcemetSchIconBgColor = !empty(get_post_meta($post->ID,'announcement-icon-bg-color',true))?get_post_meta($post->ID,'announcement-icon-bg-color',true):'#eeeeee';
        $announcemetSchIconColor = !empty(get_post_meta($post->ID,'announcement-icon-color',true))?get_post_meta($post->ID,'announcement-icon-color',true):'#ffffff';
        ?>
        <!-- JQUERY DATE PICKER -->
        <div class="atl-date-picker-container">

         <label><?php _e('Select Date','awesometimeline'); ?></label> <input id="atl-date-picker" name="date-picker-announcement" class="atl-datepicker" type="text" readonly value="<?php echo $announcemetSchDateValue;?>"/>

         <?php 

           // Noncename needed to verify where the data originated

         echo '<input type="hidden" name="date_picker_noncename" id="date_picker_noncename" value="' . wp_create_nonce( $this->pluginSlug."-announcement-settings" ) . '" />';  
         ?>


     </div>

     <!-- ICON PICKER -->
     <div class="atl-icon-picker-container">

        <label><?php _e('Select Icon','awesometimeline'); ?></label>

        <input class="regular-text" type="hidden" id="icon_picker_example_icon1" name="icon_picker_settings[icon1]" value="<?php if( isset( $announcemetSchIconValue ) ) { echo esc_attr( $announcemetSchIconValue ); } ?>"/>

        <div id="preview_icon_picker_example_icon1" data-target="#icon_picker_example_icon1" class="button icon-picker <?php if( isset( $announcemetSchIconValue ) ) { $v=explode('|',$announcemetSchIconValue); echo $v[0].' '.$v[1]; } ?>">

        </div>

    </div>

    <!-- ICON BACKGROUND COLOR -->
    <div class="atl-icon-picker-bg-container">

        <label><?php _e('Icon Background Color','awesometimeline'); ?></label>
        <input type="text" name="wdm_announcement_background_color" id="wdm_announcement_background_color" value="<?php if( isset( $announcemetSchIconBgColor ) ) { echo esc_attr( $announcemetSchIconBgColor ); } ?>"/>

    </div>

    <!-- ICON COLOR -->
    <div class="atl-icon-picker-container">

        <label id="atl-icon-color-label"><?php _e('Icon Color','awesometimeline'); ?></label>
        <input type="text" name="wdm_announcement_icon_color" id="wdm_announcement_icon_color" value="<?php if( isset( $announcemetSchIconColor ) ) { echo esc_attr( $announcemetSchIconColor ); } ?>"/>

    </div>

    <?php
        echo '</div></div><div class="wp-editor-wrap">';
    // the_editor is deprecated in WP3.3, use instead:
    wp_editor($post->post_content, 'content', array('dfw' => true, 'tabindex' => 1) );
    // the_editor($post->post_content);
    echo '</div><div class="postbox "><div>';
}

    /**
     * Save meta box content.
     *
     * @param int $post_id Post ID
     */
    public function announcementMetaSave($post_id)
    {

        // Save logic goes here. Don't forget to include nonce checks!
        $announcemetSchDateKey = "announcement-scheduled-date";
        $announcemetSchIconKey = "announcement-icon";
        $announcemetSchIconBgColorKey = 'announcement-icon-bg-color';
        $announcemetSchIconColorKey = 'announcement-icon-color';
        $announcemetSchDateValue = isset($_POST['date-picker-announcement'])?$_POST['date-picker-announcement']:date('Y-m-d');
        $announcemetSchIconValue = isset($_POST['icon_picker_settings']['icon1'])?$_POST['icon_picker_settings']['icon1']:'dashicons|dashicons-blank';
        $announcemetSchIconBgColor = isset($_POST['wdm_announcement_background_color'])?$_POST['wdm_announcement_background_color']:'#eeeeee';
        $announcemetSchIconColor = isset($_POST['wdm_announcement_icon_color'])?$_POST['wdm_announcement_icon_color']:'#ffffff';

        // echo "<pre>".print_r($announcemetSchIconValue,1)."</pre>";die();
        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times



        if ( !wp_verify_nonce( isset($_POST['date_picker_noncename'])?$_POST['date_picker_noncename']: '', $this->pluginSlug."-announcement-settings" )) {

            return $post_id;
        }

        // Is the user allowed to edit the post or page?

        if ( !current_user_can( 'edit_post', $post_id )) { return $post_id; }

        if(get_post_meta($post_id, $announcemetSchDateKey, true)) { // If the custom field already has a value

            update_post_meta($post_id, $announcemetSchDateKey, $announcemetSchDateValue);

        } else { // If the custom field doesn't have a value

        add_post_meta($post_id, $announcemetSchDateKey, $announcemetSchDateValue);

    }

        if(get_post_meta($post_id, $announcemetSchIconKey, true)) { // If the custom field already has a value
            // echo "<pre>".print_r($announcemetSchIconValue,1)."</pre>";die();
            update_post_meta($post_id, $announcemetSchIconKey, $announcemetSchIconValue);

        } else { // If the custom field doesn't have a value

        add_post_meta($post_id, $announcemetSchIconKey, $announcemetSchIconValue);

    }

        if(get_post_meta($post_id, $announcemetSchIconBgColorKey, true)) { // If the custom field already has a value
            // echo "<pre>".print_r($announcemetSchIconValue,1)."</pre>";die();
            update_post_meta($post_id, $announcemetSchIconBgColorKey, $announcemetSchIconBgColor);

        } else { // If the custom field doesn't have a value

// echo "<pre>".$announcemetSchIconBgColor." ". $announcemetScahIconColor . "</pre>"; die();
        add_post_meta($post_id, $announcemetSchIconBgColorKey, $announcemetSchIconBgColor);

    }
         if(get_post_meta($post_id, $announcemetSchIconColorKey, true)) { // If the custom field already has a value

            update_post_meta($post_id, $announcemetSchIconColorKey, $announcemetSchIconColor);

        } else { // If the custom field doesn't have a value
 // echo "<pre>".print_r($announcemetSchIconColor,1)."</pre>";die();
        add_post_meta($post_id, $announcemetSchIconColorKey, $announcemetSchIconColor);

    }
    return;

}

     // FILTER TO ADD TEXT BELOW FEATURED IMAGE 


    public function add_featured_image_instruction( $content ) {
      global $post;
      if($post->post_type == 'announcement'){
        return $content .=  sprintf("%s%s%s","<p><span class='atl-alert-img'>",__('Recommended Image size is 600 x 400','awesometimeline'),"</spam></p>");
      }else{
        return $content;
      }
    }

    public function is_post_type($type){
        global $wp_query;
        if($type == get_post_type($wp_query->post->ID)) return true;
        return false;
    }


    public function custom_excerpt_title($translation, $original )
    {
        global $post;
        // if(is_single() && $this->is_post_type('announcement')){
        if(isset($post->post_type) && $post->post_type == 'announcement'){
            if ( 'Excerpt' == $original ) {
                return 'Announcement Excerpts';
            } else {
                $pos = strpos($original, 'Excerpts are optional hand-crafted summaries of your');
                if ($pos !== false) {
                    return  '';
                }
            }
        }
        return $translation;
    }
    public function announcement_update_messages( $messages ) {
        global $post;
        $post_ID = $post->ID;
        $post_type = get_post_type( $post_ID );
        $obj = get_post_type_object( $post_type );
        $singular = $obj->labels->singular_name;
        if($post_type == 'announcement'){
            $messages[$post_type] = array(
                    0 => '', // Unused. Messages start at index 1.
                    1 => sprintf( __( '%s updated. <a href="%s" target="_blank">View %s</a>' ), esc_attr( $singular ), esc_url( get_permalink( $post_ID ) ), strtolower( $singular ) ),
                    2 => __( 'Custom field updated.', 'maxson' ),
                    3 => __( 'Custom field deleted.', 'maxson' ),
                    4 => sprintf( __( '%s updated.', 'maxson' ), esc_attr( $singular ) ),
                    5 => isset( $_GET['revision']) ? sprintf( __('%2$s restored to revision from %1$s', 'maxson' ), wp_post_revision_title( (int) $_GET['revision'], false ), esc_attr( $singular ) ) : false,
                    6 => sprintf( __( '%s published. <a href="%s">View %s</a>'), $singular, esc_url( get_permalink( $post_ID ) ), strtolower( $singular ) ),
                    7 => sprintf( __( '%s saved.', 'maxson' ), esc_attr( $singular ) ),
                    8 => sprintf( __( '%s submitted. <a href="%s" target="_blank">Preview %s</a>'), $singular, esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ), strtolower( $singular ) ),
                    9 => sprintf( __( '%s scheduled for: <strong>%s</strong>. <a href="%s" target="_blank">Preview %s</a>' ), $singular, date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ), strtolower( $singular ) ),
                    10 => sprintf( __( '%s draft updated. <a href="%s" target="_blank">Preview %s</a>'), $singular, esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ), strtolower( $singular ) )
            );
        }
        return $messages;
    }


}
