<div id="atl-timeline-results"></div>
</div><div class="container-fluid">
	<form action="" method="post" id="timeline_settings_form" name="timeline_settings_form">
		<div class="row">
			<!-- LHS -->
			<div class="col-md-9">
				<!-- TITLE -->
				<div>				
					<h2 class="atl-setting-heading"><?php _e('Awesome Timeline - Timeline Settings','awesometimeline'); ?></h2>
				</div>
				<!-- ADD TITLE -->				
				<div class="form-group">				
					<input type="text" name="wdm_timeline_name" id="wdm_timeline_name" class="form-control" placeholder="<?php _e('Enter the Timeline Title','awesometimeline'); ?>" value="<?php if(isset($values['title'])) { echo stripslashes($values['title']); } ?>">					
				</div>
				<div class="panel panel-default">
					<div class="panel-heading tl-heading-container">
						<h2 class="tl-heading"><?php _e('Timeline Settings','awesometimeline'); ?></h2>
					</div>

					<div class="panel-body">

						<!-- TIME-FRAME -->

						<div class="row">
							
							<div class="col-md-2">
								
								<label><?php _e('Time Frame','awesometimeline'); ?></label>

							</div>
							<div class="col-md-6">

								<div class="form-group">
									<select class="form-control tl-input" name="wdm_timeline_time_frame" id="wdm_timeline_time_frame">
									
										<option value="all_events" <?php if(isset($values['timeframe'])&&($values['timeframe'] == 'all_events')) {echo "selected";}?> ><?php _e("All events","awesometimeline"); ?></option>
										<option value="past_events" <?php if(isset($values['timeframe'])&&($values['timeframe'] == 'past_events')) {echo "selected";}?>><?php _e("Past events","awesometimeline"); ?></option>
										<option value="future_events" <?php if(isset($values['timeframe'])&&($values['timeframe'] == 'future_events')) {echo "selected";}?>><?php _e("Future events","awesometimeline"); ?></option>

									</select>
									<span class="tl-info-mg"><i><?php _e("(Select the time frame for which you need to show events)","awesometimeline"); ?></i></span>
									<div class="tl-info-mg">
										<i><?php _e("(Note: This will show according to the scheduled date of an event & not published date of an event.)","awesometimeline"); ?></i>
									</div>
								</div>	
							</div>
							<div class="col-md-4"></div>
						</div>					
						
						<!-- DISPLAY ORDER -->

							<div class="row">
							<div class="col-md-2">
								<label><?php _e('Display Order','awesometimeline'); ?></label>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<select class="form-control tl-input" name="wdm_timeline_display_order" id="wdm_timeline_display_order">
										<option value="ascending" <?php if(isset($values['display_order'])&&($values['display_order'] == 'ascending')) {echo "selected";}?>><?php _e("Ascending","awesometimeline"); ?></option>
										<option value="descending" <?php if(isset($values['display_order'])&&($values['display_order'] == 'descending')) {echo "selected";}?>><?php _e("Descending","awesometimeline"); ?></option>
									</select>
									<span class="tl-info-mg"><i><?php _e("(Select the order in which events will be displayed in timeline. Ascending: Arranged on basis of increasing announcement date. Descending: Arranged on basis decreasing announcement.)","awesometimeline"); ?></i></span>
								</div>		

							</div>

							<div class="col-md-4"></div>

						</div>

						<!-- ANIMATION -->

						<div class="row">
							
							<div class="col-md-2">
								
								<label><?php _e('Animation','awesometimeline'); ?></label>

							</div>
							<div class="col-md-6">

								<div class="form-group">
									<select class="form-control tl-input" name="wdm_timeline_animation" id="wdm_timeline_animation">
										<option value="yes" <?php if(isset($values['animation'])&&($values['animation'] == 'yes')) {echo "selected";}?>><?php _e("Yes","awesometimeline"); ?></option>
										<option value="no" <?php if(isset($values['animation'])&&($values['animation'] == 'no')) {echo "selected";}?>><?php _e("No","awesometimeline"); ?></option>									\
									</select>
									<span class="tl-info-mg"><i><?php _e("(If active then announcements will appear upon scrolling else all announcements will be visible at once.)","awesometimeline"); ?></i></span>
								</div>
							</div>

							<div class="col-md-4"></div>

						</div>

						<!-- HEADING TAG -->

						<div class="row">
							
							<div class="col-md-2">
								
								<label><?php _e('Heading Tag','awesometimeline'); ?></label>

							</div>
							<div class="col-md-6">

								<div class="form-group">
									<select class="form-control tl-input" name="wdm_timeline_heading_tag" id="wdm_timeline_heading_tag">
										<option value="h1" <?php if(isset($values['heading_tag'])&&($values['heading_tag'] == 'h1')) {echo "selected";}?>><?php _e("H1","awesometimeline"); ?></option>
										<option value="h2" <?php if(isset($values['heading_tag'])&&($values['heading_tag'] == 'h2')) {echo "selected";}?>><?php _e("H2","awesometimeline"); ?></option>
										<option value="h3" <?php if(isset($values['heading_tag'])&&($values['heading_tag'] == 'h3')) {echo "selected";}?>><?php _e("H3","awesometimeline"); ?></option>
										<option value="h4" <?php if(isset($values['heading_tag'])&&($values['heading_tag'] == 'h4')) {echo "selected";}?>><?php _e("H4","awesometimeline"); ?></option>
										<option value="h5" <?php if(isset($values['heading_tag'])&&($values['heading_tag'] == 'h5')) {echo "selected";}?>><?php _e("H5","awesometimeline"); ?></option>
										<option value="h6" <?php if(isset($values['heading_tag'])&&($values['heading_tag'] == 'h6')) {echo "selected";}?>><?php _e("H6","awesometimeline"); ?></option>									
									</select>
									<span class="tl-info-mg"><i><?php _e("(Choose heading style for timeline title)","awesometimeline"); ?></i></span>
								</div>
							</div>
							<div class="col-md-4"></div>
						</div>
						<!-- HEADING ALIGNMENT -->
						<div class="row">
							<div class="col-md-2">
								<label><?php _e('Heading Alignment','awesometimeline'); ?></label>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<select class="form-control tl-input" name="wdm_timeline_heading_alignment" id="wdm_timeline_heading_alignment">
										<option value="center" <?php if(isset($values['heading_alignment'])&&($values['heading_alignment'] == 'center')) {echo "selected";}?>><?php _e("Center","awesometimeline"); ?></option>
										<option value="right" <?php if(isset($values['heading_alignment'])&&($values['heading_alignment'] == 'right')) {echo "selected";}?>><?php _e("Right","awesometimeline"); ?></option>
										<option value="left" <?php if(isset($values['heading_alignment'])&&($values['heading_alignment'] == 'left')) {echo "selected";}?>><?php _e("Left","awesometimeline"); ?></option>
									</select>
									<span class="tl-info-mg"><i><?php _e("(Choose heading alignment for timeline title)","awesometimeline"); ?></i></span>
								</div>								
							</div>
							<div class="col-md-4"></div>
						</div>

						<!-- DATE SETTINGS -->
						<div class="row">
							<div class="col-md-2">
								<label><?php _e('Date Settings','awesometimeline'); ?></label>
							</div>
							<div class="col-md-6">
								<div class="date-settings">
								<!-- FONT COLOUR -->
									<div class="row">
											<div class="col-md-4">
												<label class="tl-read-mg"><?php _e('Font Color','awesometimeline'); ?></label>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input name="wdm_timeline_date_font_color" id="wdm_timeline_date_font_color" type="text" class="jscolor tl-input" value ="<?php if(isset($values['date_font_color'])) {echo $values['date_font_color'];}?>">	
													
													<span class="tl-info-mg"><i><?php _e("(Choose color of font of date shown as marker in timeline)","awesometimeline"); ?></i></span> 
												</div>									

											</div>
											<div class="col-md-2"></div>
									</div>							

									<!-- DISPLAY TYPE -->
									<div class="row">
											<div class="col-md-4">
												<label class="tl-read-mg"><?php _e('Display Type','awesometimeline'); ?></label>
											</div>
											<div class="col-md-6">
												<div class="form-group">
												<select class="form-control tl-input" name="wdm_timeline_date_display_type" id="wdm_timeline_date_display_type">
													<option value="mmyy" <?php if(isset($values['date_display_type'])&&($values['date_display_type'] == 'mmyy')) {echo "selected";}?>><?php _e("Month and Year","awesometimeline"); ?></option>
													<option value="yy" <?php if(isset($values['date_display_type'])&&($values['date_display_type'] == 'yy')) {echo "selected";}?>><?php _e("Year","awesometimeline"); ?></option>
												</select>
													<span class="tl-info-mg"><i><?php _e("(some info text goes here)","awesometimeline"); ?></i></span> 
												</div>
											</div>
											<div class="col-md-2"></div>
									</div>
								</div>
							</div>

							<div class="col-md-4"></div>
						</div>

						<!-- POST SETTINGS -->

						<div class="row">
							<div class="col-md-2">
								<label><?php _e('Post Settings','awesometimeline'); ?></label>
							</div>
							<div class="col-md-6">
								<div class="post-settings">
								<!-- POST TITLE FONT -->
									<div class="row">
											<div class="col-md-4">
												<label class="tl-read-mg"><?php _e('Post Title Font','awesometimeline'); ?></label>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="wdm_timeline_post_title_font" id="wdm_timeline_post_title_font" class="form-control tl-input" value ="<?php if(isset($values['post_title_font'])) {echo $values['post_title_font'];}?>">	
													<span class="tl-info-mg"><i><?php _e("(some info text goes here)","awesometimeline"); ?></i></span> 
												</div>
											</div>
											<div class="col-md-2"></div>
									</div>

									<!-- POST CONTENT FONT -->
									<div class="row">
											<div class="col-md-4">
												<label class="tl-read-mg"><?php _e('Post Content Font','awesometimeline'); ?></label>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="wdm_timeline_post_content_font" id="wdm_timeline_post_content_font" class="form-control tl-input" value ="<?php if(isset($values['post_content_font'])) {echo $values['post_content_font'];}?>">
												
													<span class="tl-info-mg"><i><?php _e("(Select font type for Content of announcement post)","awesometimeline"); ?></i></span> 
												</div>
											</div>

											<div class="col-md-2"></div>
									</div>

									<!-- DISPLAY DATE -->
									<div class="row">
											<div class="col-md-4">
												
												<label class="tl-read-mg"><?php _e('Display Date inside post','awesometimeline'); ?></label>

											</div>

											<div class="col-md-6">
												<div class="form-group">
													<span>								
														<input type="radio" name="wdm_timeline_display_date" id="wdm_timeline_display_date"  <?php if(isset($values['display_date'])&&($values['display_date'] == 'Yes')) {echo 'checked="checked"';}?> value="Yes">
														<label class="tl-read-mg"><?php _e('Yes','awesometimeline'); ?></label>
													</span>
													<span>
														<input type="radio" name="wdm_timeline_display_date" id="wdm_timeline_display_date" class="radio-mg-left" <?php if(!isset($values['display_date'])||($values['display_date'] != 'Yes')) {echo 'checked="checked"';}?> value="No">
														<label class="tl-read-mg"><?php _e('No','awesometimeline'); ?></label>
													</span>
												</div>
											</div>
											<div class="col-md-2"></div>
									</div>
								</div>
							</div>
							<div class="col-md-4"></div>
						</div>

						<!-- COLOUR SETTINGS -->

						<div class="row">
							<div class="col-md-2">
								<label><?php _e(' Color Settings','awesometimeline'); ?></label>
							</div>
							<div class="col-md-6">
								<div class="color-settings">
								<!-- CONTAINER BORDER -->
									<div class="row">
											<div class="col-md-4">
												
												<label class="tl-read-mg"><?php _e('Container Border','awesometimeline'); ?></label>

											</div>
											<div class="col-md-6">
												<div class="form-group">		
													<input name="wdm_timeline_container_border" id="wdm_timeline_container_border" type="text" class="jscolor" value="<?php if(isset($values['container_border_color'])){echo $values['container_border_color'];}?>">		
													<span class="tl-info-mg"><i><?php _e("(Select border color of timeline container)","awesometimeline"); ?></i></span>
												</div>
											</div>
											<div class="col-md-2"></div>
									</div>

									<!-- POST BACKGROUND-->
									<div class="row">
											<div class="col-md-4">
												<label class="tl-read-mg"><?php _e('Post Background','awesometimeline'); ?></label>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input name="wdm_timeline_post_background" id="wdm_timeline_post_background" type="text" class="jscolor" value="<?php if(isset($values['post_background_color'])){echo $values['post_background_color'];}?>">
													<span class="tl-info-mg"><i><?php _e("(Select background color of announcement post)","awesometimeline"); ?></i></span> 	
												</div>
											</div>
											<div class="col-md-2"></div>
									</div>
								</div>
							</div>
							<div class="col-md-4"></div>
						</div>
						<!-- CONTENT -->
						<div class="row">
							<div class="col-md-2">
								<label><?php _e('Content','awesometimeline'); ?></label>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<select class="form-control tl-input" name="wdm_timeline_post_content" id="wdm_timeline_post_content">
										<option value="excerpt" <?php if(isset($values['post_content'])&&($values['post_content']=='excerpt')){echo 'selected';}?> ><?php _e("Post Excerpt","awesometimeline"); ?></option>
										<option value="content" <?php if(isset($values['post_content'])&&($values['post_content']=='content')){echo 'selected';}?> ><?php _e("Post Content","awesometimeline"); ?></option>
									</select>
									<span class="tl-info-mg"><i><?php _e("(Select the content to be shown inside announcement portion. Post Excerpt: If announcement has an excerpts then this will be displayed inside the announcement portion. Post Content: If announcement has a content (i.e. description) then this  will be shown inside it.)","awesometimeline"); ?></i></span>
								</div>						

							</div>
							<div class="col-md-4"></div>
						</div>

						<!-- SHOW READ MORE -->
						<div class="row">
							<div class="col-md-2">
								<label><?php _e('Show "Read More"','awesometimeline'); ?></label>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<span>								
										<input type="radio" name="wdm_timeline_read_more" id="wdm_timeline_read_more" <?php if(isset($values['read_more']['type'])&&($values['read_more']['type'] == 'no')) {echo 'checked="checked"';}?> value="no">
										<label class="tl-read-mg"><?php _e("Don't show",'awesometimeline'); ?></label>
									</span>
									<span>
										<input type="radio" name="wdm_timeline_read_more" id="wdm_timeline_read_more" class="radio-mg-left" <?php if(isset($values['read_more']['type'])&&($values['read_more']['type'] == 'link')) {echo 'checked="checked"';}?> value="link">
										<label class="tl-read-mg"><?php _e('Link','awesometimeline'); ?></label>
									</span>
									<span>
										<input type="radio" name="wdm_timeline_read_more" id="wdm_timeline_read_more" class="radio-mg-left" <?php if(isset($values['read_more']['type'])&&($values['read_more']['type'] == 'button')) {echo 'checked="checked"';}?> value="button">
										<label class="tl-read-mg"><?php _e('Button','awesometimeline'); ?></label>
									</span>
								</div>

								<!-- CHARACTHER LIMIT -->
								<div id="character-limit">
									<div class="row" >
											<div class="col-md-4">
												<label class="tl-read-mg"><?php _e('Character Limit','awesometimeline'); ?></label>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="number" min="0" name="wdm_timeline_character_limit" id="wdm_timeline_character_limit" class="form-control tl-input" value = "<?php if(isset($values['read_more']['character_limit'])){ echo $values['read_more']['character_limit'];}?>">
													<span class="tl-info-mg"><i><?php _e("(Enter how many characters do you want to show inside announcement portion. If the announcement has more text then “Read More” will be displayed.)","awesometimeline"); ?></i>
													</span>													
												</div>
											</div>
											<div class="col-md-2"></div>
									</div>
								</div>

								<!-- READ MORE BUTTON -->
								<div id="option-button">															
									
									<!-- TYPE -->
									<div class="row">
											
											<div class="col-md-4">
												<label class="tl-read-mg"><?php _e('Type','awesometimeline'); ?></label>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<select name="wdm_timeline_button_type" id="wdm_timeline_button_type" class="form-control tl-input">
														<option value="flat" <?php if(isset($values['read_more']['button_type'])&&($values['read_more']['button_type'] == 'flat')){echo "selected";} ?>><?php _e("Flat","awesometimeline"); ?></option>
														<option value="sharp" <?php if(isset($values['read_more']['button_type'])&&($values['read_more']['button_type'] == 'sharp')){echo "selected";} ?>><?php _e("Sharp","awesometimeline"); ?></option>
													</select>	
													<span class="tl-info-mg"><i><?php _e("(Select button type)","awesometimeline"); ?></i></span> 
												</div>
											</div>
											<div class="col-md-2"></div>
									</div>

									<!-- TEXT -->
									<div class="row">
											<div class="col-md-4">
												<label class="tl-read-mg"><?php _e('Text','awesometimeline'); ?></label>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" name="wdm_timeline_readmore_button_text" id="wdm_timeline_readmore_button_text" class="form-control tl-input" value="<?php if(isset($values['read_more']['button_text'])){echo stripslashes($values['read_more']['button_text']);}else{_e('Read More', 'awesometimeline');}?>" >	
													<span class="tl-info-mg"><i><?php _e("(Enter what text should appear in button)","awesometimeline"); ?></i></span> 
												</div>
											</div>
											<div class="col-md-2"></div>
									</div> 

									<!-- COLOUR -->
									<div class="row">
										<div class="col-md-4">
											<label class="tl-read-mg"><?php _e('Color','awesometimeline'); ?></label>
										</div>
										<div class="col-md-6">
											<div class="form-group">													
													<input type="text" name="wdm_timeline_readmore_button_color" id="wdm_timeline_readmore_button_color" class="jscolor tl-input" value="<?php if(isset($values['read_more']['button_color'])){echo $values['read_more']['button_color'];}?>">	
													<span class="tl-info-mg"><i><?php _e("(Select button color)","awesometimeline"); ?></i></span> 	
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

									</div>

									<!-- HOVER COLOUR -->

									<div class="row">
											
											<div class="col-md-4">
												
												<label class="tl-read-mg"><?php _e('Hover Color','awesometimeline'); ?></label>

											</div>

											<div class="col-md-6">

												<div class="form-group">
													<input type="text" name="wdm_timeline_readmore_button_hover" id="wdm_timeline_readmore_button_hover" value="<?php if(isset($values['read_more']['button_hover_color'])){echo $values['read_more']['button_hover_color'];}?>">		
													<span class="tl-info-mg"><i><?php _e("(Select hover color)","awesometimeline"); ?></i></span> 
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

									</div>

								</div>

							</div>

							<div class="col-md-4"></div>

						</div>

					</div>

				</div>	


			</div>


			<!-- RHS -->

			<div class="col-md-3">

				<!-- PUBLISH -->

				<div class="tl-mg-top">
					
					<div class="panel panel-default">
						
						<div class="panel-heading tl-heading-container">
							
							<h2 class="tl-heading"><?php _e('Publish','awesometimeline'); ?></h2>

						</div>

						<div class="panel-body">
								
							<div class="row">
			
								<div class="col-md-6">
									<input type="submit" name="submit" class="button button-primary" value="<?php _e('Publish','awesometimeline');?>">
									<?php //submit_button( 'Publish' ); ?>
									<?php //wp_nonce_field( 'timeline_settings_save_page', 'timeline_settings_page_nonce' ); ?>									

								</div>
								<div class="col-md-6">
									
									<a class="button button-primary" href="<?php echo get_the_permalink($demo_post_id);?>" target="_blank" id="atl-preview-button"><?php _e('Preview','awesometimeline'); ?></a>

								</div>						

							</div>

						</div>

					</div>
					

				</div>

				<!-- SHORTCODE -->

				<div>
					
					<div class="panel panel-default">
						
						<div class="panel-heading tl-heading-container">
							
							<h2 class="tl-heading"><?php _e('Shortcode','awesometimeline'); ?></h2>

						</div>

						<div class="panel-body">
							
							<input onClick="this.select()" type="text" name="timeline_name" id="title" class="form-control tl-input"  value="[awesome-timeline]" readonly>

						</div>

					</div>
					
				</div>

				
				<!-- EXTRA META BOXES FOR BANNERS -->

				<!-- BOX 1 -->
				<div class="banner-box">
					
				</div>

				<!-- SUPPORT AWESOME TIMELINE -->
				<!-- <div class="banner-box atl-support-box">
					<div class="help-atl">
						
						<p class="atl-help-title"><?php //_e("Support Awesome Timeline","awesometimeline"); ?></p>
						<div class="atl-star-cont">
							<p><?php //_e("Leave A Review","awesometimeline"); ?></p>							
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
							<span class="dashicons dashicons-star-filled"></span>
							<p><?php //_e("Tweet About It","awesometimeline"); ?></p>	
							<button class="btn btn-tweet"><span class="dashicons dashicons-twitter"></span> Tweet</button>	
						</div>
						
					</div>
				</div> -->

				<!-- HELP & DOCUMENTATION --> 
				<!-- <div class="banner-box atl-help-box">
					<div class="help-atl">
						
						<p class="atl-help-title"><?php //_e("Help &amp; Documentation","awesometimeline"); ?></p>
						<p class="atl-help-content"><?php //_e("If you need help, or run into any issues, you can reach out for support in the WordPress.org support forums. Additionally, please see our documentation for tutorials, frequent issues and how-tos.","awesometimeline"); ?></p>
						<div class="atl-help-buttons">
						
								<button>Support Forums</button>
							
								<button>Documentation</button>						
														
						</div>

					</div>
				</div> -->

			</div>

		</div>
	</form>

</div>