<div class="container-fluid">
	<form action="" method="post" id="timeline_settings_form" name="timeline_settings_form">
		<div class="row">
			<!-- LHS -->
			<div class="col-md-9">
				<!-- TITLE -->
				<div>				
					<h2><?php _e('Awesome Timeline - Add New Timeline','awesometimeline'); ?></h2>
				</div>
				<!-- ADD TITLE -->				
				<div class="form-group">				
					<input type="text" name="wdm_timeline_name" id="wdm_timeline_name" class="form-control" placeholder="<?php _e('Enter the Title','awesometimeline'); ?>">
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
									
										<option>All events</option>
										<option>Past events</option>
										<option>Future events</option>

									</select>
									<span class="tl-info-mg"><i>(some info text goes here)</i></span>
								</div>	
								

							</div>

							<div class="col-md-4"></div>

						</div>

						<!-- MULTI SELECT -->

	<!-- 					<div class="row mg-btm">

							<div class="select-announcetment-mg">
								
								// <label><?php// _e('Select Announcement','awesometimeline'); ?></label>

							</div>
							
							<div class="col-md-12">

								<div class="form-group">											
								
									<select id='announcement-select' multiple='multiple' class="form-control">

									  <option value='elem_1' selected>Announcement 1</option>
									  <option value='elem_2'>Announcement 2</option>
									  <option value='elem_3'>Announcement 3</option>
									  <option value='elem_4'>Announcement 4</option>
									  <option value='elem_5'>Announcement 5</option>
									  
									</select>

								</div>

								<button id="refresh-announcements" class="button">Refresh</button>

							</div>

						</div> -->
						

						<!-- DISPLAY ORDER -->

							<div class="row">
							
							<div class="col-md-2">
								
								<label><?php _e('Display Order','awesometimeline'); ?></label>

							</div>
							<div class="col-md-6">

								<div class="form-group">
									<select class="form-control tl-input" name="wdm_timeline_display_order" id="wdm_timeline_display_order">
										<option>Ascending</option>	
										<option>Descending</option>								
									</select>
									<span class="tl-info-mg"><i>(some info text goes here)</i></span>
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
										<option>Yes</option>
										<option>No</option>									\
									</select>
									<span class="tl-info-mg"><i>(some info text goes here)</i></span>
								</div>
							</div>

							<div class="col-md-4"></div>

						</div>

						<!-- SCROLL SPEED (MS) -->

						<div class="row">
							
							<div class="col-md-2">
								
								<label><?php _e('Scroll Speed (ms)','awesometimeline'); ?></label>

							</div>
							<div class="col-md-6">

								<div class="form-group">
									<input type="text" name="wdm_timeline_scroll_speed" id="wdm_timeline_scroll_speed" class="form-control tl-input" >
									<span class="tl-info-mg"><i>(some info text goes here)</i></span>
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
										<option>H1</option>
										<option>H2</option>
										<option>H3</option>
										<option>H4</option>
										<option>H5</option>
										<option>H6</option>									
									</select>
									<span class="tl-info-mg"><i>(some info text goes here)</i></span>
								</div>						
								
								<!-- <input type="text" name="timeline_name" id="title" class="form-control tl-input" > -->
								

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
										<option>Center</option>
										<option>Right</option>
										<option>Left</option>
									</select>
									<span class="tl-info-mg"><i>(some info text goes here)</i></span>
								</div>
								<!-- <input type="text" name="timeline_name" id="title" class="form-control tl-input" > -->
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
													
													<input name="wdm_timeline_date_font_color" id="wdm_timeline_date_font_color" type="text" class="jscolor form-control tl-input" value="DE3C16">	
													<span class="tl-info-mg"><i>(some info text goes here)</i></span> 
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

									</div>

									<!-- CIRCLE COLOUR -->
									<div class="row">
											
											<div class="col-md-4">
												
												<label class="tl-read-mg"><?php _e('Circle Color','awesometimeline'); ?></label>

											</div>

											<div class="col-md-6">

												<div class="form-group">
													
													<input name="wdm_timeline_circle_color" id="wdm_timeline_circle_color" type="text" class="jscolor form-control tl-input" value="DE3C16">	
													<span class="tl-info-mg"><i>(some info text goes here)</i></span> 
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

									</div>

									<!-- DISPLAY TYPE -->
									<div class="row">
											
											<div class="col-md-4">
												
												<label class="tl-read-mg"><?php _e('Display Type','awesometimeline'); ?></label>

											</div>

											<div class="col-md-6">

												<div class="form-group">
												<select class="form-control tl-input" name="wdm_timeline_date_display_type" id="wdm_timeline_date_display_type">
													<option>Month and Year</option>
													<option>Year</option>
												</select>
													<span class="tl-info-mg"><i>(some info text goes here)</i></span> 
												</div>							

											</div>

											<div class="col-md-2">
											</div>
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
													<input type="text" name="wdm_timeline_post_title_font" id="wdm_timeline_post_title_font" class="form-control tl-input" >	
													<span class="tl-info-mg"><i>(some info text goes here)</i></span> 
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

									</div>

									<!-- POST CONTENT FONT -->
									<div class="row">
											
											<div class="col-md-4">
												
												<label class="tl-read-mg"><?php _e('Post Content Font','awesometimeline'); ?></label>

											</div>

											<div class="col-md-6">

												<div class="form-group">
													<input type="text" name="wdm_timeline_post_content_font" id="wdm_timeline_post_content_font" class="form-control tl-input" >	
													<span class="tl-info-mg"><i>(some info text goes here)</i></span> 
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

									</div>

									<!-- DISPLAY DATE -->
									<div class="row">
											
											<div class="col-md-4">
												
												<label class="tl-read-mg"><?php _e('Display Date','awesometimeline'); ?></label>

											</div>

											<div class="col-md-6">

												<div class="form-group">
													<span>								
														<input type="radio" name="wdm_timeline_display_date" id="wdm_timeline_display_date" checked value="Yes">
														<label class="tl-read-mg"><?php _e('Yes','awesometimeline'); ?></label>
													</span>
													<span>
														<input type="radio" name="wdm_timeline_display_date" id="wdm_timeline_display_date" class="radio-mg-left" value="No">
														<label class="tl-read-mg"><?php _e('No','awesometimeline'); ?></label>
													</span>
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

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
												
												<label class="tl-read-mg"><?php _e('Container Border (px)','awesometimeline'); ?></label>

											</div>

											<div class="col-md-6">

												<div class="form-group">													
													<input name="wdm_timeline_container_border" id="wdm_timeline_container_border" type="text" class="jscolor form-control" value="eeeeee">		
													<span class="tl-info-mg"><i>(some info text goes here)</i></span> 
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

									</div>

									<!-- CONTAINER BACKGROUND -->
									<div class="row">
											
											<div class="col-md-4">
												
												<label class="tl-read-mg"><?php _e('Container Background','awesometimeline'); ?></label>

											</div>

											<div class="col-md-6">

												<div class="form-group">														
													<input name="wdm_timeline_container_background" id="wdm_timeline_container_background" type="text" class="jscolor form-control" value="eeeeee">
													<span class="tl-info-mg"><i>(some info text goes here)</i></span> 	
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

									</div>

									<!-- POST BORDER -->
									<div class="row">
											
											<div class="col-md-4">
												
												<label class="tl-read-mg"><?php _e('Post Border (px)','awesometimeline'); ?></label>

											</div>

											<div class="col-md-6">

												<div class="form-group">													
													<input name="wdm_timeline_post_border" id="wdm_timeline_post_border" type="text" class="jscolor form-control" value="eeeeee">	
													<span class="tl-info-mg"><i>(some info text goes here)</i></span> 	
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

									</div>

									<!-- POST BACKGROUND-->
									<div class="row">
											
											<div class="col-md-4">
												
												<label class="tl-read-mg"><?php _e('Post Background','awesometimeline'); ?></label>

											</div>

											<div class="col-md-6">

												<div class="form-group">																	
															
														<input name="wdm_timeline_post_background" id="wdm_timeline_post_background" type="text" class="jscolor form-control" value="eeeeee">
														<span class="tl-info-mg"><i>(some info text goes here)</i></span> 	
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

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
									
										<option>Post Excerpt</option>
										<option>Post Content</option>									

									</select>
									<span class="tl-info-mg"><i>(some info text goes here)</i></span>
								</div>						
								
								<!-- <input type="text" name="timeline_name" id="title" class="form-control tl-input" > -->
								

							</div>

							<div class="col-md-4"></div>

						</div>

						<!-- SHOW READ MORE -->

						<div class="row">
							
							<div class="col-md-2">
								
								<label><?php _e('Show Read More','awesometimeline'); ?></label>

							</div>
							<div class="col-md-6">

								<div class="form-group">

									
									<span>								
										<input type="radio" name="wdm_timeline_read_more" id="wdm_timeline_read_more" checked value="no">
										<label class="tl-read-mg"><?php _e('No','awesometimeline'); ?></label>
									</span>
									<span>
										<input type="radio" name="wdm_timeline_read_more" id="wdm_timeline_read_more" class="radio-mg-left" value="link">
										<label class="tl-read-mg"><?php _e('Link','awesometimeline'); ?></label>
									</span>
									<span>
										<input type="radio" name="wdm_timeline_read_more" id="wdm_timeline_read_more" class="radio-mg-left" value="button">
										<label class="tl-read-mg"><?php _e('Button','awesometimeline'); ?></label>
									</span>


									<!-- <span class="tl-info-mg"><i>(some info text goes here)</i></span> -->
								</div>						
								
								

								<!-- CHARACTHER LIMIT -->

								<div id="character-limit">
									
									<div class="row" >
											
											<div class="col-md-4">
												<label class="tl-read-mg"><?php _e('Character Limit','awesometimeline'); ?></label>
											</div>
											<div class="col-md-6">

												<div class="form-group">
													<input type="text" name="wdm_timeline_character_limit" id="wdm_timeline_character_limit" class="form-control tl-input" >
													<span class="tl-info-mg"><i>(some info text goes here)</i></span> 	
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

									</div>
								</div>

								<!-- READ MORE BUTTON -->

								<div id="option-button">	

									<!-- CHARACTER LIMIT -->
									<div class="row" >
												
												<div class="col-md-4">
													
													<label class="tl-read-mg"><?php _e('Character Limit','awesometimeline'); ?></label>

												</div>

												<div class="col-md-6">

													<div class="form-group">
														<input type="text" class="form-control tl-input" >
														<span class="tl-info-mg"><i>(some info text goes here)</i></span> 	
													</div>									

												</div>

												<div class="col-md-2">
													
												</div>

									</div>						
									
									<!-- TYPE -->
									<div class="row">
											
											<div class="col-md-4">
												
												<label class="tl-read-mg"><?php _e('Type','awesometimeline'); ?></label>

											</div>

											<div class="col-md-6">

												<div class="form-group">
													<select name="wdm_timeline_button_type" id="wdm_timeline_button_type" class="form-control tl-input">
									
														<option>Flat</option>
														<option>Sharp</option>									

													</select>	
													<span class="tl-info-mg"><i>(some info text goes here)</i></span> 
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

									</div>

									<!-- TEXT -->
									<div class="row">
											
											<div class="col-md-4">
												
												<label class="tl-read-mg"><?php _e('Text','awesometimeline'); ?></label>

											</div>

											<div class="col-md-6">

												<div class="form-group">
													<input type="text" name="wdm_timeline_readmore_button_text" id="wdm_timeline_readmore_button_text" class="form-control tl-input" >	
													<span class="tl-info-mg"><i>(some info text goes here)</i></span> 
												</div>									

											</div>

											<div class="col-md-2">
												
											</div>

									</div>

									<!-- COLOUR -->

									<div class="row">
											
											<div class="col-md-4">
												
												<label class="tl-read-mg"><?php _e('Color','awesometimeline'); ?></label>

											</div>

											<div class="col-md-6">

												<div class="form-group">													
													<input type="text" name="wdm_timeline_readmore_button_color" id="wdm_timeline_readmore_button_color" class="jscolor form-control  tl-input" value="eeeeee">	
													<span class="tl-info-mg"><i>(some info text goes here)</i></span> 	
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
													<input type="text" name="wdm_timeline_readmore_button_hover" id="wdm_timeline_readmore_button_hover" class="jscolor form-control  tl-input" value="eeeeee">		
													<span class="tl-info-mg"><i>(some info text goes here)</i></span> 
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
									<input type="submit" name="submit" class="button button-primary" value="Publish">
									<?php //submit_button( 'Publish' ); ?>
									<?php //wp_nonce_field( 'timeline_settings_save_page', 'timeline_settings_page_nonce' ); ?>
									<!-- <button class="button">Publish</button> -->

								</div>
								<div class="col-md-6">
									
									<button class="button button-primary">Preview</button>

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
							
							<input type="text" name="timeline_name" id="title" class="form-control tl-input" >

						</div>

					</div>
					
				</div>

				
				<!-- EXTRA META BOXES FOR BANNERS -->

				<!-- BOX 1 -->
				<div class="banner-box">
					
				</div>

				<!-- BOX 2 -->
				<div class="banner-box">
					
				</div>

				<!-- BOX 3 -->
				<div class="banner-box">
					
				</div>

			</div>

		</div>
	</form>

</div>


