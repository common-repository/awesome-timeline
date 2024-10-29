<?php
if(isset($_GET['is_atl_preview']) && $_GET['is_atl_preview'] == 'true'){
  $values = $_GET;
}else{
  $values = get_option('awesome-timeline-display-settings');
}
// echo "<pre>".print_r($values,1)."</pre>";die();
//Display Order
if(isset($values['display_order'])&&($values['display_order'] == 'ascending' )){
  $order =  "ASC";
}else{
  $order = "DESC";
}
// echo "<pre>".print_r($order,1)."</pre>";die();
$timeframe = array();
//Time Frame
if(isset($values['timeframe'])&&($values['timeframe'] == 'past_events' )){
  $timeframe =  array(
    'key'       => 'announcement-scheduled-date',
    'value'     => date("m/d/Y"),
    'compare'   => '<=',
    );
}else if(isset($values['timeframe'])&&($values['timeframe'] == 'future_events' )){
  $timeframe =  array(
    'key'       => 'announcement-scheduled-date',
    'value'     => date("m/d/Y"),
    'compare'   => '>=',
    );
}

$animation_class = isset($values['animation']) && ($values['animation'] == 'yes' ) ? 'atl-fade-in' :'';
// WP_Query arguments
$args = array (
  'post_type'              => 'announcement',
  'post_status'            =>  'publish' ,
  'order'                  => $order,
  'orderby'                => 'meta_value',
  'meta_key'  => 'announcement-scheduled-date',
  'meta_type' => 'DATE',
  'posts_per_page'    => -1,
  'meta_query' => array($timeframe),
  );

// The Query
$query = new WP_Query( $args );
// echo "<pre>".print_r($query,1)."</pre>";die();
?>
<!-- VERTICAL TIMELINE BEGINS -->
<div id="awesome-timeline">
  <!-- TIMELINE CONTAINER  BEGINS -->
  <div  class="timeline-container"> 
  <?php
    if(isset($values['heading_tag'])&&!empty($values['heading_tag'])){
      echo "<".$values['heading_tag']." class='entry-title' >".stripslashes($values['title'])."</".$values['heading_tag'].">";
    }else{
      echo "<h1 class='entry-title'>".stripslashes($values['title'])."</h1>";
    }
  ?>
  <!-- TIMELINE LIST BEGINS -->
  <ul class="timeline-ver">
     <?php
      // THE LOOP BEGINS
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
          $ID = get_the_ID();
          $icon = get_post_meta( $ID, 'announcement-icon', true );
          $icon = explode("|", $icon);
          $character_limit = isset($values['read_more']['character_limit'])&& !empty($values['read_more']['character_limit'])?intval($values['read_more']['character_limit']):250;
          $read_more_text = isset($values['read_more']['button_text'])&&!empty($values['read_more']['button_text'])?$values['read_more']['button_text']:__('Read More', 'awesometimeline');
          $icon_bg_color = get_post_meta($ID,'announcement-icon-bg-color',true);
          if(isset($query->current_post) && ($query->current_post%2 == 0)){
            $div_class =  "timeline-content-right";
          }else{
            $div_class =  "timeline-content-left";
          }
          $icon_color = !empty(get_post_meta($ID,'announcement-icon-color',true))?get_post_meta($ID,'announcement-icon-color',true):'#ffffff';
          ?>
          <!-- TIMELINE RIGHT & LEFT BEGINS -->
          <li class="<?php if(isset($query->current_post) && ($query->current_post%2 == 0)){echo "awsme-timeline-right";}else{echo "awsme-timeline-left";}?>">

           <!-- TIMELINE DATE RIGHT & LEFT BEGINS -->
            <span class="<?php  if(isset($query->current_post) && ($query->current_post%2 == 0)){echo "content-date-left";}else{echo "content-date-right";}?>">

            <?php 
              if($values['date_display_type'] == 'mmyy'){
               echo date('F, Y',strtotime(get_post_meta( $ID, 'announcement-scheduled-date', true )));
              }else{
               echo date('Y',strtotime(get_post_meta( $ID, 'announcement-scheduled-date', true )));
              }
 
            ?>
              
            </span><!-- TIMELINE DATE RIGHT & LEFT ENDS -->


            <!-- TIMELINE ICON BEGINS -->
            <div class="timeline-icon">
              <span class="icon-logo" style="background: <?php echo $icon_bg_color; ?>; border-radius: 50%;">
                <i class="<?php echo $icon[0]." ".$icon[1];?>" style="color: <?php echo $icon_color; ?>;"></i>
              </span>
            </div><!-- TIMELINE ICON ENDS -->

             <!-- TIMELINE CONTENT BEGINS -->
            <div class="<?php echo $div_class." ".$animation_class;?>">
              <!-- TIMELINE IMAGE BEGINS -->
              <section class="<?php if(isset($query->current_post) && ($query->current_post%2 == 0)){echo 'timeline-img-right';}else{echo 'timeline-img-left';}?>" >
              <?php 
                
                $post_thumbnail_id = get_post_thumbnail_id( $ID );
                if ( $post_thumbnail_id ) {
                $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
                echo '<a href="'.get_the_permalink($ID).'"><img src="' . $post_thumbnail_img[0] . '" class="post-img-ver" /></a>';}
               
               ?>
              </section> <!-- TIMELINE IMAGES ENDS -->
             <section class="timeline-excerpt-ver">
               <h5 id="wdm_timeline_post_title_font"><a href="<?php echo get_the_permalink($ID);?>"> <?php the_title();?></a></h5>
            <?php
             if($values['display_date']=="Yes"){?>
               <span class="excerpt-date"><?php the_time('F j, Y'); ?></span>
             <?php
             }
            ?>
                <p id="wdm_timeline_post_content_font">
                  <?php
                  if(isset($values['post_content'])&& ($values['post_content'] == 'content' )){
                  // $this->content($character_limit);
                    // substr(get_the_content(), 0, $character_limit);
                    echo mb_strimwidth(get_the_content(), 0, $character_limit, "...");
                  }else{
                  // $this->excerpt($character_limit);
                    echo mb_strimwidth(get_the_excerpt(), 0, $character_limit, "...");
                  }
                  ?>
                </p>
                <?php
                if(isset($values['read_more']['type'])&&($values['read_more']['type'] == 'link')){
                  echo '<a href="'. get_the_permalink($ID).'">'.$read_more_text.'</a>';
                }else if(isset($values['read_more']['type'])&&($values['read_more']['type'] == 'button')){
                  $button_type = isset($values['read_more']['button_type'])?$values['read_more']['button_type']:'flat';
                  $button_class = ($button_type == 'sharp' )?'atl-btn-sharp':'atl-btn-flat';
                   echo '<a href="'. get_the_permalink($ID).'" class="'.$button_class.'">'.stripslashes($read_more_text).'</a>';
                }
                ?>
			</section>
            </div><!-- TIMELINE CONTENT ENDS -->
          </li><!-- TIMELINE RIGHT & LEFT ENDS -->
          <?php
        }
      }else {
          // no posts found
      }
// THE LOOP Ends
      ?>
    </ul><!-- TIMELINE LIST ENDS -->
  </div><!-- TIMELINE CONTAINER ENDS -->
</div><!-- VERTICAL TIMELINE ENDS -->
<?php
// Restore original Post Data
wp_reset_postdata();
