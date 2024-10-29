(function ( $ ) {
	"use strict";

	$(function () {
		$(document).ready(function($) {
		// SHOW READMORE OPTIONS IF SELECTED
		var readMoreOptions = $('input:radio[name="wdm_timeline_read_more"]:checked').val();
		if(readMoreOptions== 'link'){
			$("#character-limit").show();
			$('#option-button').hide();
		}else if(readMoreOptions == 'button'){
			$("#character-limit").show();
			$('#option-button').show();
		}else{
			$("#character-limit").hide();
			$("#option-button").hide();
		}

		// SHOW READMORE OPTIONS ON SELECT
		$('input:radio[name="wdm_timeline_read_more"]').on('change',function(){
		if($(this).is(':checked') && $(this).val() == 'link'){
			$("#character-limit").show();
			$('#option-button').hide();
		}else if($(this).is(':checked') && $(this).val() == 'button'){
			$("#character-limit").show();
			$('#option-button').show();
		}else{
			$("#character-limit").hide();
			$("#option-button").hide();
		}
	});

	//CODE TO HIDE FONT SELECT WHEN CLICKED OUTSIDE	
	$(document).on('mouseup',function(e){

		var container = $(".font-select");

	    if (!container.is(e.target) // if the target of the click isn't the container
	        && container.has(e.target).length === 0) // nor a descendant of the container
	    {
	        $('.fs-drop').hide();
	        $('.font-select').removeClass('font-select-active');
	    }
	});

		

	$('#timeline_settings_form').on('submit',function(e){		

			e.preventDefault();
			var $form = $(this);
			var serializedData = $form.serialize();
			var values = {};
			var read_more = {};
			values['title']= $("#wdm_timeline_name").val();
			values['timeframe']= $("#wdm_timeline_time_frame").val();
			values['display_order']= $("#wdm_timeline_display_order").val();
			values['animation']= $("#wdm_timeline_animation").val();
			values['heading_tag']= $("#wdm_timeline_heading_tag").val();
			values['heading_alignment']= $("#wdm_timeline_heading_alignment").val();
			values['date_font_color']= $("#wdm_timeline_date_font_color").val();
			values['icon_circle_color']= $("#wdm_timeline_circle_color").val();
			values['date_display_type']= $("#wdm_timeline_date_display_type").val();
			values['post_title_font']= $("#wdm_timeline_post_title_font").val();
			values['post_content_font']= $("#wdm_timeline_post_content_font").val();
			values['display_date']= $("input:radio[name='wdm_timeline_display_date']:checked").val();
			values['container_border_color']= $("#wdm_timeline_container_border").val();
			values['container_background_color']= $("#wdm_timeline_container_background").val();
			values['post_border_color']= $("#wdm_timeline_post_border").val();
			values['post_background_color']= $("#wdm_timeline_post_background").val();
			values['post_content']= $("#wdm_timeline_post_content").val();
			read_more['type']= $("input:radio[name='wdm_timeline_read_more']:checked").val();
			read_more['character_limit']= $("#wdm_timeline_character_limit").val();
			read_more['button_type']= $("#wdm_timeline_button_type").val();
			read_more['button_text']= $("#wdm_timeline_readmore_button_text").val();
			read_more['button_color']= $("#wdm_timeline_readmore_button_color").val();
			read_more['button_hover_color']= $("#wdm_timeline_readmore_button_hover").val();
			values['read_more']= read_more;
			var post_bg_color = $("#wdm_timeline_post_background").val();
			$.ajax({
				url: ajaxurl,
				datatype: "json",
				type: 'POST',
				data:{
					'action' :'update_timeline_settings_callback',
					'values' : values,
				},
				success: function ( output_data ) {
					var output = JSON.parse( output_data );
	                if ( output.hasOwnProperty( 'success' ) && output.hasOwnProperty( 'message' ) ) {
	                	if ( output['success'] ) {
	                    	$( "body #atl-timeline-results" ).html( "<div id=message class='notice notice-success updated' style=margin-left: 0px;><p>" + output['message'] + "</p></div>" );
						} else {
							$( "body #wdm-pm-results" ).html( "<div id=message class='notice notice-error error' style=margin-left: 0px;><p>" + output['message'] + "</p></div>" );
	                	}
	                } else {
	                	$( "body #wdm-pm-results" ).html( "<div id=message class='notice notice-error error' style=margin-left: 0px;><p>" + output.toString() + "</p></div>" );
	                }
	                $( "html,body" ).scrollTop( $( "html,body" ).offset().top );
				}
			});
		});
		
//Timeline Preview Functionality
		$("#atl-preview-button").on('click',function(e){
			e.preventDefault();
			var values = {};
			var read_more = {};
			values['title']= $("#wdm_timeline_name").val();
			values['timeframe']= $("#wdm_timeline_time_frame").val();
			values['display_order']= $("#wdm_timeline_display_order").val();
			values['animation']= $("#wdm_timeline_animation").val();
			values['heading_tag']= $("#wdm_timeline_heading_tag").val();
			values['heading_alignment']= $("#wdm_timeline_heading_alignment").val();
			values['date_font_color']= $("#wdm_timeline_date_font_color").val();
			values['icon_circle_color']= $("#wdm_timeline_circle_color").val();
			values['date_display_type']= $("#wdm_timeline_date_display_type").val();
			values['post_title_font']= $("#wdm_timeline_post_title_font").val();
			values['post_content_font']= $("#wdm_timeline_post_content_font").val();
			values['display_date']= $("input:radio[name='wdm_timeline_display_date']:checked").val();
			values['container_border_color']= $("#wdm_timeline_container_border").val();
			values['container_background_color']= $("#wdm_timeline_container_background").val();
			values['post_border_color']= $("#wdm_timeline_post_border").val();
			values['post_background_color']= $("#wdm_timeline_post_background").val();
			values['post_content']= $("#wdm_timeline_post_content").val();
			read_more['type']= $("input:radio[name='wdm_timeline_read_more']:checked").val();
			read_more['character_limit']= $("#wdm_timeline_character_limit").val();
			read_more['button_type']= $("#wdm_timeline_button_type").val();
			read_more['button_text']= $("#wdm_timeline_readmore_button_text").val();
			read_more['button_color']= $("#wdm_timeline_readmore_button_color").val();
			read_more['button_hover_color']= $("#wdm_timeline_readmore_button_hover").val();
			values['read_more']= read_more;

			var atl_get_param = $.param( values );
			var atl_preview_old_href = $(this).attr('href');
			var atl_preview_new_href = atl_preview_old_href+"?is_atl_preview=true&"+atl_get_param;
			// $(this).attr('href',atl_preview_new_href);
			window.open(atl_preview_new_href);

		});
	});
	//SCREEN OPTIONS FIX	
		$("#contextual-help-link").click(function () {
			$("#contextual-help-wrap").css("cssText", "display: block !important;");
		});
		$("#show-settings-link").click(function () {
			$("#screen-options-wrap").css("cssText", "display: block !important;");
		});
		//JQUERY UI PICKER
		$("#atl-date-picker").datepicker({
			changeYear: true,
			changeMonth: true,
			dateFormat: 'yy-mm-dd',
			altFormat:'yy-mm-dd',
			defaultDate: 0
		});

		//GOOGLE FONT INTEGRATION
		$("#wdm_timeline_post_title_font").fontselect();
		$("#wdm_timeline_post_content_font").fontselect();


		//COLOR PICKER
		$("#wdm_timeline_date_font_color,#wdm_timeline_circle_color,#wdm_timeline_container_border,#wdm_timeline_container_background").wpColorPicker();
		$("#wdm_timeline_post_border,#wdm_timeline_post_background,#wdm_timeline_readmore_button_color,#wdm_timeline_readmore_button_hover,#wdm_announcement_background_color,#wdm_announcement_icon_color").wpColorPicker();
	});
}(jQuery));