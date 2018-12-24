<?php
/**
 * @link              http://webnus.biz
 * @since             1.0.0
 * @package           time table
 */
	/**
	 * Time and day sequence and options meta
	 */
	add_action( 'add_meta_boxes', 'wb_meta_day_format' );
	function wb_meta_day_format() {
	
		add_meta_box(
			'day_format',            
			'Day and Time setup',                
			'wb_day_field',  
			'wb-tt',                   
			'normal',                  
			'core'               
		);
	}
	function wb_day_field( $post ){
		global $post;
		wp_nonce_field( 'wb_time_day', 'wb_time_day_nonce' );
		//Day Option
		$wb_day_color           = array();
		$wb_class_options_day   =  get_post_meta( $post->ID, 'day_setup'    , true  );
		$wb_day_color 	        =  get_post_meta( $post->ID, 'wb_day_color' , true  );
		//Time Option
		$wb_time_color          = array();
		$wb_class_options_time  =  get_post_meta( $post->ID, 'time_setup'   , true  );
		$wb_class_option_icon	=  get_post_meta( $post->ID, 'wb_icon_tt_tt'   , true  );
		$wb_time_color 		    =  get_post_meta( $post->ID, 'wb_time_color', true  );
		
		?>
	 		<div class="wb_div_sec">
		        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-9 wb-tab-contain">
		            <div id="wb-tab-menu" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 wb-tab-menu">
		              <div id="list-group" class="list-group">
		                <a href="#" class="list-group-item active text-center">
		                  <h4 class="fa fa-calendar-check-o fa-3x"></h4><br/>Day Setup
		                </a>
		                <a href="#" class="list-group-item text-center">
		                  <h4 class="fa fa-user-times fa-3x"></h4><br/>Time Setup
		                </a>
		              </div>
		            </div>
		            <div id="wb-option-tab" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 wb-option-tab">
		                <!-- Day section -->
		                <div class="wb-tab-content wb-tab-contentm active">
					        <div class="wb-tt-metabox" id="wb-td">
							    <div id="wbday-form" class="wb-tt-metabox-form">
							    	<form>
							        <p class="validateTips"><?php _e( 'Please insert day. ', 'wb_tt' ) ; ?></p>       
								        <fieldset>
								            <label for="wb-day"><?php _e( 'Day ', 'wb_tt' ) ; ?></label>
								            <input type="text" name="wb-day" id="wb-day" value="" class="text ui-widget-content ui-corner-all" />
								        </fieldset>
							        </form>
							    </div>
							    <div id="day-contain" class="ui-widget">
							        <table id="wb-days" class="wb-tt-metabox-table ui-widget ui-widget-content">
							            <thead>
							                <tr class="ui-widget-header">
							                    <th><?php _e( 'Day'   , 'wb_tt' ) ; ?></th>
							                    <th><?php _e( 'Edit'  , 'wb_tt' ) ; ?></th>
							                    <th><?php _e( 'Delete', 'wb_tt' ) ; ?></th>
							                    <th><?php _e( 'Color' , 'wb_tt' ) ; ?></th>
							                </tr>
							            </thead>
							            <tbody>
							            <?php
							            if ( !empty( $wb_class_options_day ) && isset( $wb_class_options_day ) ) :
							            	foreach ( $wb_class_options_day as $wb_days => $wb_day ) :
							             ?>
								                <tr>
								                	<td><input type="hidden" name="day_setup[]" value="<?php if($wb_day != '') echo  $wb_day ; ?>" /> <?php if($wb_day != '') echo  $wb_day ; ?> </td>
								                    <td><a id="edit_day" href=""><?php _e( 'Edit' , 'wb_tt' ) ; ?></a> </td>
								                    <td><span class="wb_delete"><a href=""><?php _e( 'Delete' , 'wb_tt' ) ; ?></a></span></td>
								       				<?php list( $dcolors, $dcolor )  = each( $wb_day_color ); ?>
								                   	<td><input type="text" class="wp-color-picker-day" name="wb_day_color[]" value="<?php if( $dcolor != '') echo esc_attr( $dcolor ); ?>" /></td>
								                </tr>
							            <?php 
							        		endforeach;
							        	endif; 
							        	?>
							            </tbody>
							        </table>
							    </div>
							    <a id="add-day"><?php _e( 'Add Day' , 'wb_tt' ) ; ?></a>  
							</div>    
		                </div>
		                <!-- Time section -->
		                <div class="wb-tab-content wb-tab-contentm">
							<div class="wb-tt-metabox" id="wb-tf"> 
							    <div id="wbtime-form">
							    	<form id="file_form" class="wb-tt-metabox-form">
							        <p class="validateTips"><?php _e( 'Please insert your time.','wb_tt' ) ; ?></p>       
								        <fieldset>
								            <label for="wb-time"><?php _e( 'Time','wb_tt' ) ; ?></label>
								            <input type="text" name="wb-time" id="wb-time" value="" class="text ui-widget-content ui-corner-all" />
											<input type="text"  id="wb_img_url_ico" name="wb_img_url_ico" value="" class="wb_img_url_ico_class">
											<input id="wb_iconic_but" class="wb_iconic_but_class" type="button" value="Upload">
								        </fieldset>
							        </form>
							    </div>
							    <div id="time-contain" class="ui-widget">
							        <table id="wb-times" class="wb-tt-metabox-table ui-widget ui-widget-content">
							            <thead>
							                <tr class="ui-widget-header ">
							                    <th><?php _e( 'Time ' , 'wb_tt' ) ; ?></th>
							                    <th><?php _e( 'Edit ' , 'wb_tt' ) ; ?></th>
							                    <th><?php _e( 'Delete', 'wb_tt' ) ; ?></th>
							                    <th><?php _e( 'Icon ' , 'wb_tt' ) ; ?></th>
							                    <th><?php _e( 'Color' , 'wb_tt' ) ; ?></th>
							                </tr>
							            </thead>
							            <tbody>
							            <?php 
							            if ( !empty( $wb_class_options_time ) && isset( $wb_class_options_time ) ) :
							            	foreach ( $wb_class_options_time as $wb_times => $wb_time ) :
							            ?>
								                <tr>
								                	<td><input type="hidden" name="time_setup[]" value="<?php if($wb_time != '') echo  $wb_time ; ?>" /> <?php if($wb_time != '') echo  $wb_time ; ?> </td>
								                    <td><a id="wb_edit_time" href=""><?php _e( 'Edit ', 'wb_tt' ) ; ?></a> </td>
								                    <td><span class="wb_delete"><a href=""><?php _e( 'Delete ', 'wb_tt' ) ; ?></a></span></td>
								                    <?php 
								                    if ( $wb_class_option_icon ) :								 
								                          //var_dump($wb_class_option_icon); 
													list( $icon, $icons )  = each( $wb_class_option_icon );
													if ( !empty( $icons) &&  $icons != '/' ) :
								                    ?> 
								                   	<td><input type='hidden' name='wb_img_src[]' id='wb_img_src[]' value="<?php if($icons != '') echo $icons ; ?>" /><img  height="45" width="90" class="wb_img_src_c" src="<?php if($icons != '') echo   $icons  ; ?>" /></td>
								                	<?php else : ?>	
								                	<td> </td>
								                   <?php endif ;
								                   else :
								                   ?>
								               		<td></td>
								                   <?php 
								                   endif ;
								                   ?>
								                   <?php  list( $tcolors, $tcolor )  = each( $wb_time_color );  ?>
								                   	<td><input type="text" class="wp-color-picker-time" name="wb_time_color[]" value="<?php if( $tcolor != '') echo esc_attr( $tcolor ); ?>" /></td>  	 
								                </tr>
							            <?php 
							            	endforeach;
							            endif; 
							            ?>
							            </tbody>
							        </table>
							    </div>
							    <a id="add-time"><?php _e( 'Add Time ', 'wb_tt' ) ; ?></a>  
							</div>
		                </div>
		            </div>
		        </div>
		  </div>

	<?php
	}

	/**
	 * Adds a option box in side for hide or show the content.
	 */
	add_action( 'add_meta_boxes', 'wb_meta_options', 1 ); 
	function wb_meta_options() {

		add_meta_box( 
			'options-col', 
			__(' Time Table Options','wb_tt'), 
			'wb_meta_options_back', 
			'wb-tt', 
			'side', 
			'default'
		);	
	}

	function wb_meta_options_back( $post ) {
        $wb_option_time_col = get_post_meta( $post->ID, 'wb_show_time_col', true ); 
        $wb_filter_box      = get_post_meta( $post->ID, 'wb_active_filter', true ); 
        $wb_filter_name     = get_post_meta( $post->ID, 'filter_label'    , true );
        ?>
        <label for="is_checked_time"><?php _e( "Show or hide time column:", 'wb_tt' ); ?></label>
        <br/>  
        <input type="radio" name="is_checked_time" value="Show" <?php checked( $wb_option_time_col, 'Show' ); ?> >Show<br>
        <input type="radio" name="is_checked_time" value="hide" <?php checked( $wb_option_time_col, 'hide' ); ?> >hide<br>
        <br/> 
        <label for="wb_active_filter"><?php _e( "Show or hide filter box:", 'wb_tt' ); ?></label>
        <br/>
        <input type="radio" name="wb_active_filter" value="Show" <?php checked( $wb_filter_box, 'Show' ); ?> >Show<br>
        <input type="radio" name="wb_active_filter" value="hide" <?php checked( $wb_filter_box, 'hide' ); ?> >hide<br>
        <br/> 
        <label for="filter_label"><?php _e( "Enter filter name:", 'wb_tt' ); ?></label>
        <br/>  
        <input type="text" name="filter_label" value="<?php if( $wb_filter_name != '' ) echo  $wb_filter_name ; ?>" ><br>

	<?php
	}



	/**
	 * [wb_time_option_content get time setup option value]
	 */
	function wb_time_option_content() {
		global $post;
		$time_setup = get_post_meta ( $post->ID, 'time_setup', true  );
		$options = array();
		if ( $time_setup ) {
			foreach ( $time_setup as $key => $value ) {
				$options += array(
					$value => $key ,
				);
			}	
			return $options;
		}else{
			return ;
		}
	}

	/**
	 * Create metaboxes for days
	 */
	add_action( 'add_meta_boxes', 'wb_meta_add_class', 1 ); 
	function wb_meta_add_class($post) {
		global $post;
		$day_format = get_post_meta( $post->ID, 'day_setup', true );
		if ( !empty( $day_format ) && isset( $day_format ) ) {
			foreach ( $day_format as $days=>$day ) {
				$count = 0 ;
				count($count);
				if ( $count < 4 ) {
					add_meta_box( 
					$day.'insert-event', 
					$day.__(' Column','wb_tt'), 
					'wb_meta_add_class_content'.$days, 
					'wb-tt', 
					'normal', 
					'default');
				}
			}
		}	
	}
	function wb_meta_add_class_content0() {
		global $post;
		$wb_add_class = get_post_meta($post->ID, 'wb_add_class0', true);
		$options = wb_time_option_content();
	
?>		
			<div class="wb_div_sec">
		        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-5 wb-tab-contain">
		            <div id="wb_meta0" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 wb-tab-menu">
		              <div id="wb_list_g" class="list-group wb_lis_g">
		                <?php
		                if ( $wb_add_class ) :
		                	$counta = 0 ;
						foreach ( $wb_add_class as $field ) : 
							$counta += 1 ;
						?>
		             	<a href="#" data-count="<?php  echo $counta; ?>" class="list-group-item text-center" >
		                 <span class="wb_a_span" ><?php if($field['course_na0'] != '') echo esc_attr( $field['course_na0'] ); ?></span>
		                </a>
		                <?php endforeach;
		                else: ?>
		                <a href="#" class="list-group-item text-center active">Insert Entry</a> 
		               <?php endif; ?>
		              </div>
		            </div>
		            <div  id="wb_meta_tab0" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 wb-option-tab">
		                <!-- Filled section -->
						<?php
						if ( $wb_add_class ) :
						$count = 0 ; 
						foreach ( $wb_add_class as $field ) :
							$count += 1 ;
						?>
						<div class="wb-tab-content wb_tab_content_0">

							<label class="wb_label" for="course_na0[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i course_na0" name="course_na0[]" data-count="<?php echo $count; ?>" value="<?php if($field['course_na0'] != '') echo esc_attr( $field['course_na0'] ); ?>" />
							<p>	
							<label class="wb_label" for="teacher_na0[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
							<textarea rows="8" class="wb_text_i" name="teacher_na0[]"><?php if($field['teacher_na0'] != '') echo esc_attr( $field['teacher_na0'] ); ?></textarea>
							<p>	
							<label class="wb_label" for="bg_color0[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field " name="bg_color0[]"  value="<?php if($field['bg_color0'] != '') echo esc_attr( $field['bg_color0'] ); ?>" />
							<p>	
							<label class="wb_label" for="bg_hover0[]"><?php _e( 'Bg Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="bg_hover0[]" value="<?php if($field['bg_hover0'] != '') echo esc_attr( $field['bg_hover0'] ); ?>" />	
							<p>	
							<label  class="wb_label"for="text_color0[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_color0[]" value="<?php if($field['text_color0'] != '') echo esc_attr( $field['text_color0'] ); ?>" />
							<p>	
							<label class="wb_label" for="text_hover0[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_hover0[]" value="<?php if($field['text_hover0'] != '') echo esc_attr( $field['text_hover0'] ); ?>" />
							<p>	
							<label class="wb_label" for="image_url_0[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
							<input type="text" class="image_url_0" id="image_url_0[]" name="image_url_0[]" value="<?php if($field['image_url_0'] != '') echo  $field['image_url_0'] ; ?>" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>" class="wb_iconic_but_class" type="button" value="Upload">	 
						    <p>	
							<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>	
						</div>
						<?php
						endforeach;
						else : ?>
						<!-- Empty section -->
		                <div class="wb-tab-content wb_tab_content_0 active">
		                	<label class="wb_label" for="course_na0[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i " name="course_na0[]"/>
							<p>							
							<label class="wb_label" for="teacher_na0[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i " name="teacher_na0[]"/>
							<p>
							<label class="wb_label" for="bg_color0[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>				<input type="text" class="wp-color-picker-field " name="bg_color0[]"/>
							<p>
							<label  class="wb_label"for="bg_hover0[]"><?php _e( 'Bg Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field " name="bg_hover0[]"/>
							<p>
							<label class="wb_label" for="text_color0[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field " name="text_color0[]"/>	
							<p>
							<label class="wb_label" for="text_hover0[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field " name="text_hover0[]"/>	
							<p>
							<label class="wb_label" for="image_url_0[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
							<input type="text"  id="image_url_0[]" name="image_url_0[]" value="" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>" class="wb_iconic_but_class" type="button" value="Upload">	
							<p>
							<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>

		                </div>
						<?php endif; ?>
		            </div>
		        </div>
		    </div>

			<!-- empty hidden one for jQuery -->
			<div class="wb-tab-content wb_tab_content_0 wb_row_field wb_hidden">
				<label class="wb_label" for="course_na0[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
				<input type="text" class="wb_text_i " name="course_na0[]"/>
				<p>
				<label class="wb_label" for="teacher_na0[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
				<input type="text" class="wb_text_i " name="teacher_na0[]"/>
				<p>
				<label class="wb_label" for="bg_color0[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field " name="bg_color0[]"/>
				<p>
				<label class="wb_label" for="bg_hover0[]"><?php _e( 'Bg hover'   , 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field " name="bg_hover0[]"/>
				<p>
				<label class="wb_label" for="text_color0[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field " name="text_color0[]"/>
				<p>
				<label class="wb_label" for="text_hover0[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field " name="text_hover0[]"/>
				<p>
				<label class="wb_label" for="image_url_0[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
				<input type="text"  id="image_url_0[]" name="image_url_0[]" value="" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>" class="wb_iconic_but_class" type="button" value="Upload">
				<p>
				<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>

			</div>
		<p><a id="wb_tt_0_add" class="wb_tt_button" href="#"><?php _e( 'Add Class', 'wb_tt' ) ; ?></a></p>
		<?php	
	}

	function wb_meta_add_class_content1() {
		global $post;
		$wb_add_class = get_post_meta($post->ID, 'wb_add_class1', true);
		$options = wb_time_option_content();
		?>
			<div class="wb_div_sec">
		        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-5 wb-tab-contain">
		            <div id="wb_meta1" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 wb-tab-menu">
		              <div id="wb_list_g1" class="list-group wb_lis_g">
		                <?php
		                if ( $wb_add_class ) :
		                	$counta = 0 ;
						foreach ( $wb_add_class as $field ) : 
							$counta += 1 ;
						?>
		             	<a href="#" data-count="<?php  echo $counta; ?>1" class="list-group-item text-center">
		                 <span class="wb_a_span" ><?php if($field['course_na1'] != '') echo esc_attr( $field['course_na1'] ); ?></span>
		                </a>
		                <?php endforeach;
		                else: ?>
		                <a href="#" class="list-group-item text-center">
		                Insert Entry
		                </a> 
		               <?php endif; ?>
		              </div>
		            </div>
		            <div  id="wb_meta_tab1" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 wb-option-tab">
		                <!-- Filled section -->
						<?php
						if ( $wb_add_class ) :
						$count = 0 ; 
						foreach ( $wb_add_class as $field ) :
							$count += 1 ;
							//var_dump();
						?>
						<div class="wb-tab-content wb_tab_content_1">

							<label class="wb_label" for="course_na1[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i course_na1" name="course_na1[]" data-count="<?php echo $count; ?>1" value="<?php if($field['course_na1'] != '') echo esc_attr( $field['course_na1'] ); ?>" />
							<p>	
							<label class="wb_label" for="teacher_na1[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
							<input type="text"  class="wb_text_i" name="teacher_na1[]" value="<?php if($field['teacher_na1'] != '') echo esc_attr( $field['teacher_na1'] ); ?>" />	
							<p>	
							<label class="wb_label" for="bg_color1[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="bg_color1[]"  value="<?php if($field['bg_color1'] != '') echo esc_attr( $field['bg_color1'] ); ?>" />
							<p>	
							<label class="wb_label" for="bg_hover1[]"><?php _e( 'Bg Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="bg_hover1[]" value="<?php if($field['bg_hover1'] != '') echo esc_attr( $field['bg_hover1'] ); ?>" />	
							<p>	
							<label class="wb_label" for="text_color1[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_color1[]" value="<?php if($field['text_color1'] != '') echo esc_attr( $field['text_color1'] ); ?>" />
							<p>	
							<label class="wb_label" for="text_hover1[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_hover1[]" value="<?php if($field['text_hover1'] != '') echo esc_attr( $field['text_hover1'] ); ?>" />
							<p>	
							<label class="wb_label" for="image_url_1[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
							<input type="text" class="image_url_1" id="image_url_1[]" name="image_url_1[]" value="<?php if($field['image_url_1'] != '') echo  $field['image_url_1'] ; ?>" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>1" class="wb_iconic_but_class1" type="button" value="Upload">	 
						    <p>	
							<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>	
						</div>
						<?php
						endforeach;
						else : ?>
						<!-- Empty section -->
		                <div class="wb-tab-content wb_tab_content_1">
		                	<label class="wb_label" for="course_na1[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i" name="course_na1[]"/>
							<p>							
							<label class="wb_label" for="teacher_na1[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i" name="teacher_na1[]"/>
							<p>
							<label class="wb_label" for="bg_color1[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>							<input type="text" class="wp-color-picker-field" name="bg_color1[]"/>
							<p>
							<label class="wb_label" for="bg_hover1[]"><?php _e( 'Bg Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="bg_hover1[]"/>
							<p>
							<label class="wb_label" for="text_color1[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_color1[]"/>	
							<p>
							<label class="wb_label" for="text_hover1[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_hover1[]"/>	
							<p>
							<label class="wb_label" for="image_url_1[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
							<input type="text"  id="image_url_1[]" name="image_url_1[]" value="" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>1" class="wb_iconic_but_class1" type="button" value="Upload">	
							<p>
							<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>

		                </div>
						<?php endif; ?>
		            </div>
		        </div>
		    </div>

			<!-- empty hidden one for jQuery -->
			<div id="wb_a_copy1" class="wb_hidden" >
			<a href="#" class="list-group-item text-center">
              <i class="fa fa fa-columns fa-3x"></i><br/>Insert Entry
            </a> 
        </div>
			<div class="wb-tab-content wb_tab_content_1 wb_row_field wb_hidden">
				<label class="wb_label" for="course_na1[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
				<input type="text" class="wb_text_i" name="course_na1[]"/>
				<p>
				<label class="wb_label" for="teacher_na1[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
				<input type="text" class="wb_text_i" name="teacher_na1[]"/>
				<p>
				<label class="wb_label" for="bg_color1[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="bg_color1[]"/>
				<p>
				<label class="wb_label" for="bg_hover1[]"><?php _e( 'Bg hover', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="bg_hover1[]"/>
				<p>
				<label class="wb_label" for="text_color1[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="text_color1[]"/>
				<p>
				<label class="wb_label" for="text_hover1[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="text_hover1[]"/>
				<p>
				<label class="wb_label" for="image_url_1[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
				<input type="text"  id="image_url_1[]" name="image_url_1[]" value="" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>1" class="wb_iconic_but_class1" type="button" value="Upload">
				<p>
				<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>

			</div>
		<p><a id="wb_tt_1_add" class="wb_tt_button" href="#"><?php _e( 'Add Class', 'wb_tt' ) ; ?></a></p>		
	<?php	
	}
	function wb_meta_add_class_content2() {
		global $post;
		$wb_add_class = get_post_meta($post->ID, 'wb_add_class2', true);
		$options = wb_time_option_content();
		?>
			<div class="wb_div_sec">
		        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-5 wb-tab-contain">
		            <div id="wb_meta2" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 wb-tab-menu">
		              <div id="wb_list_g2" class="list-group wb_lis_g">
		                <?php
		                if ( $wb_add_class ) :
		                	$counta = 0 ;
						foreach ( $wb_add_class as $field ) : 
							$counta += 1 ;
						?>
		             	<a href="#" data-count="<?php  echo $counta; ?>2" class="list-group-item text-center">
		                 <span class="wb_a_span" ><?php if($field['course_na2'] != '') echo esc_attr( $field['course_na2'] ); ?></span>
		                </a>
		                <?php endforeach;
		                else: ?>
		                <a href="#" class="list-group-item text-center">
		                Insert Entry
		                </a> 
		               <?php endif; ?>
		              </div>
		            </div>
		            <div  id="wb_meta_tab2" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 wb-option-tab">
		                <!-- Filled section -->
						<?php
						if ( $wb_add_class ) :
						$count = 0 ; 
						foreach ( $wb_add_class as $field ) :
							$count += 1 ;
							//var_dump();
						?>
						<div class="wb-tab-content wb_tab_content_2">

							<label class="wb_label" for="course_na2[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i course_na2" name="course_na2[]" data-count="<?php echo $count; ?>2" value="<?php if($field['course_na2'] != '') echo esc_attr( $field['course_na2'] ); ?>" />
							<p>	
							<label class="wb_label" for="teacher_na2[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
							<input type="text"  class="wb_text_i" name="teacher_na2[]" value="<?php if($field['teacher_na2'] != '') echo esc_attr( $field['teacher_na2'] ); ?>" />	
							<p>	
							<label class="wb_label" for="bg_color2[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="bg_color2[]"  value="<?php if($field['bg_color2'] != '') echo esc_attr( $field['bg_color2'] ); ?>" />
							<p>	
							<label class="wb_label" for="bg_hover2[]"><?php _e( 'Bg Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="bg_hover2[]" value="<?php if($field['bg_hover2'] != '') echo esc_attr( $field['bg_hover2'] ); ?>" />	
							<p>	
							<label class="wb_label" for="text_color2[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_color2[]" value="<?php if($field['text_color2'] != '') echo esc_attr( $field['text_color2'] ); ?>" />
							<p>	
							<label class="wb_label" for="text_hover2[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_hover2[]" value="<?php if($field['text_hover2'] != '') echo esc_attr( $field['text_hover2'] ); ?>" />
							<p>	
							<label class="wb_label" for="image_url_2[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
							<input type="text" class="image_url_2" id="image_url_2[]" name="image_url_2[]" value="<?php if($field['image_url_2'] != '') echo  $field['image_url_2'] ; ?>" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>2" class="wb_iconic_but_class" type="button" value="Upload">	 
						    <p>	
							<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>	
						</div>
						<?php
						endforeach;
						else : ?>
						<!-- Empty section -->
		                <div class="wb-tab-content wb_tab_content_2">
		                	<label class="wb_label" for="course_na2[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i" name="course_na2[]"/>
							<p>							
							<label class="wb_label" for="teacher_na2[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i" name="teacher_na2[]"/>
							<p>
							<label class="wb_label" for="bg_color2[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>							<input type="text" class="wp-color-picker-field" name="bg_color2[]"/>
							<p>
							<label class="wb_label" for="bg_hover2[]"><?php _e( 'Bg Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="bg_hover2[]"/>
							<p>
							<label class="wb_label" for="text_color2[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_color2[]"/>	
							<p>
							<label class="wb_label" for="text_hover2[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_hover2[]"/>	
							<p>
							<label class="wb_label" for="image_url_2[]"><?php _e( 'Bg Image'   , 'wb_tt' ) ; ?></label>
							<input type="text"  id="image_url_2[]" name="image_url_2[]" value="" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>2" class="wb_iconic_but_class" type="button" value="Upload">	
							<p>
							<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>

		                </div>
						<?php endif; ?>
		            </div>
		        </div>
		    </div>

			<!-- empty hidden one for jQuery -->
			<div id="wb_a_copy2" class="wb_hidden" >
			<a href="#" class="list-group-item text-center">
              <i class="fa fa fa-columns fa-3x"></i><br/>Insert Entry
            </a> 
        </div>
			<div class="wb-tab-content wb_tab_content_2 wb_row_field wb_hidden">
				<label class="wb_label" for="course_na2[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
				<input type="text" class="wb_text_i" name="course_na2[]"/>
				<p>
				<label class="wb_label" for="teacher_na2[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
				<input type="text" class="wb_text_i" name="teacher_na2[]"/>
				<p>
				<label class="wb_label" for="bg_color2[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="bg_color2[]"/>
				<p>
				<label class="wb_label" for="bg_hover2[]"><?php _e( 'Bg hover', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="bg_hover2[]"/>
				<p>
				<label class="wb_label" for="text_color2[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="text_color2[]"/>
				<p>
				<label class="wb_label" for="text_hover2[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="text_hover2[]"/>
				<p>
				<label class="wb_label" for="image_url_2[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
				<input type="text"  id="image_url_2[]" name="image_url_2[]" value="" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>2" class="wb_iconic_but_class" type="button" value="Upload">
				<p>
				<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>

			</div>
		<p><a id="wb_tt_2_add" class="wb_tt_button" href="#"><?php _e( 'Add Class', 'wb_tt' ) ; ?></a></p>		
	<?php	
	}

	function wb_meta_add_class_content3() {
		global $post;
		$wb_add_class = get_post_meta($post->ID, 'wb_add_class3', true);
		$options = wb_time_option_content();
		?>			
		<div class="wb_div_sec">
		        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-5 wb-tab-contain">
		            <div id="wb_meta3" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 wb-tab-menu">
		              <div id="wb_list_g3" class="list-group wb_lis_g">
		                <?php
		                if ( $wb_add_class ) :
		                	$counta = 0 ;
						foreach ( $wb_add_class as $field ) : 
							$counta += 1 ;
						?>
		             	<a href="#" data-count="<?php  echo $counta; ?>3" class="list-group-item text-center">
		                 <span class="wb_a_span" ><?php if($field['course_na3'] != '') echo esc_attr( $field['course_na3'] ); ?></span>
		                </a>
		                <?php endforeach;
		                else: ?>
		                <a href="#" class="list-group-item text-center">
		                Insert Entry
		                </a> 
		               <?php endif; ?>
		              </div>
		            </div>
		            <div  id="wb_meta_tab3" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 wb-option-tab">
		                <!-- Filled section -->
						<?php
						if ( $wb_add_class ) :
						$count = 0 ; 
						foreach ( $wb_add_class as $field ) :
							$count += 1 ;
							//var_dump();
						?>
						<div class="wb-tab-content wb_tab_content_3">

							<label class="wb_label" for="course_na3[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i course_na3" name="course_na3[]" data-count="<?php echo $count; ?>3" value="<?php if($field['course_na3'] != '') echo esc_attr( $field['course_na3'] ); ?>" />
							<p>	
							<label class="wb_label" for="teacher_na3[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
							<input type="text"  class="wb_text_i" name="teacher_na3[]" value="<?php if($field['teacher_na3'] != '') echo esc_attr( $field['teacher_na3'] ); ?>" />	
							<p>	
							<label class="wb_label" for="bg_color3[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="bg_color3[]"  value="<?php if($field['bg_color3'] != '') echo esc_attr( $field['bg_color3'] ); ?>" />
							<p>	
							<label class="wb_label" for="bg_hover3[]"><?php _e( 'Bg Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="bg_hover3[]" value="<?php if($field['bg_hover3'] != '') echo esc_attr( $field['bg_hover3'] ); ?>" />	
							<p>	
							<label class="wb_label" for="text_color3[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_color3[]" value="<?php if($field['text_color3'] != '') echo esc_attr( $field['text_color3'] ); ?>" />
							<p>	
							<label class="wb_label" for="text_hover3[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_hover3[]" value="<?php if($field['text_hover3'] != '') echo esc_attr( $field['text_hover3'] ); ?>" />
							<p>	
							<label class="wb_label" for="image_url_3[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
							<input type="text" class="image_url_3" id="image_url_3[]" name="image_url_3[]" value="<?php if($field['image_url_3'] != '') echo  $field['image_url_3'] ; ?>" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>3" class="wb_iconic_but_class" type="button" value="Upload">	 
						    <p>	
							<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>	
						</div>
						<?php
						endforeach;
						else : ?>
						<!-- Empty section -->
		                <div class="wb-tab-content wb_tab_content_3">
		                	<label class="wb_label" for="course_na3[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i" name="course_na3[]"/>
							<p>							
							<label class="wb_label" for="teacher_na3[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i" name="teacher_na3[]"/>
							<p>
							<label class="wb_label" for="bg_color3[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>							<input type="text" class="wp-color-picker-field" name="bg_color3[]"/>
							<p>
							<label class="wb_label" for="bg_hover3[]"><?php _e( 'Bg Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="bg_hover3[]"/>
							<p>
							<label class="wb_label" for="text_color3[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_color3[]"/>	
							<p>
							<label class="wb_label" for="text_hover3[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_hover3[]"/>	
							<p>
							<label class="wb_label" for="image_url_3[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
							<input type="text"  id="image_url_3[]" name="image_url_3[]" value="" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>3" class="wb_iconic_but_class" type="button" value="Upload">	
							<p>
							<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>

		                </div>
						<?php endif; ?>
		            </div>
		        </div>
		    </div>

			<!-- empty hidden one for jQuery -->
			<div id="wb_a_copy3" class="wb_hidden" >
			<a href="#" class="list-group-item text-center">
              <i class="fa fa fa-columns fa-3x"></i><br/>Insert Entry
            </a> 
        </div>
			<div class="wb-tab-content wb_tab_content_3 wb_row_field wb_hidden">
				<label class="wb_label" for="course_na3[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
				<input type="text" class="wb_text_i" name="course_na3[]"/>
				<p>
				<label class="wb_label" for="teacher_na3[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
				<input type="text" class="wb_text_i" name="teacher_na3[]"/>
				<p>
				<label class="wb_label" for="bg_color3[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="bg_color3[]"/>
				<p>
				<label  class="wb_label"for="bg_hover3[]"><?php _e( 'Bg hover', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="bg_hover3[]"/>
				<p>
				<label class="wb_label" for="text_color3[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="text_color3[]"/>
				<p>
				<label class="wb_label" for="text_hover3[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="text_hover3[]"/>
				<p>
				<label class="wb_label" for="image_url_3[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
				<input type="text"  id="image_url_3[]" name="image_url_3[]" value="" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>3" class="wb_iconic_but_class" type="button" value="Upload">
				<p>
				<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>

			</div>
		<p><a id="wb_tt_3_add" class="wb_tt_button" href="#"><?php _e( 'Add Class', 'wb_tt' ) ; ?></a></p>		

		<?php	
	}
	function wb_meta_add_class_content4() {
		global $post;
		$wb_add_class = get_post_meta($post->ID, 'wb_add_class4', true);
		$options = wb_time_option_content();
		?>
			<div class="wb_div_sec">
		        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-5 wb-tab-contain">
		            <div id="wb_meta4" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 wb-tab-menu">
		              <div id="wb_list_g4" class="list-group wb_lis_g">
		                <?php
		                if ( $wb_add_class ) :
		                	$counta = 0 ;
						foreach ( $wb_add_class as $field ) : 
							$counta += 1 ;
						?>
		             	<a href="#" data-count="<?php  echo $counta; ?>4" class="list-group-item text-center">
		                 <span class="wb_a_span" ><?php if($field['course_na4'] != '') echo esc_attr( $field['course_na4'] ); ?></span>
		                </a>
		                <?php endforeach;
		                else: ?>
		                <a href="#" class="list-group-item text-center">
		                Insert Entry
		                </a> 
		               <?php endif; ?>
		              </div>
		            </div>
		            <div  id="wb_meta_tab4" class="col-lg-9 col-md-9 col-sm-9 col-xs-9 wb-option-tab">
		                <!-- Filled section -->
						<?php
						if ( $wb_add_class ) :
						$count = 0 ; 
						foreach ( $wb_add_class as $field ) :
							$count += 1 ;
							//var_dump();
						?>
						<div class="wb-tab-content wb_tab_content_4">

							<label class="wb_label" for="course_na4[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i course_na4" name="course_na4[]" data-count="<?php echo $count; ?>4" value="<?php if($field['course_na4'] != '') echo esc_attr( $field['course_na4'] ); ?>" />
							<p>	
							<label class="wb_label" for="teacher_na4[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
							<input type="text"  class="wb_text_i" name="teacher_na4[]" value="<?php if($field['teacher_na4'] != '') echo esc_attr( $field['teacher_na4'] ); ?>" />	
							<p>	
							<label class="wb_label" for="bg_color4[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="bg_color4[]"  value="<?php if($field['bg_color4'] != '') echo esc_attr( $field['bg_color4'] ); ?>" />
							<p>	
							<label class="wb_label" for="bg_hover4[]"><?php _e( 'Bg Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="bg_hover4[]" value="<?php if($field['bg_hover4'] != '') echo esc_attr( $field['bg_hover4'] ); ?>" />	
							<p>	
							<label class="wb_label" for="text_color4[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_color4[]" value="<?php if($field['text_color4'] != '') echo esc_attr( $field['text_color4'] ); ?>" />
							<p>	
							<label class="wb_label" for="text_hover4[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_hover4[]" value="<?php if($field['text_hover4'] != '') echo esc_attr( $field['text_hover4'] ); ?>" />
							<p>	
							<label class="wb_label" for="image_url_4[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
							<input type="text" class="image_url_4" id="image_url_4[]" name="image_url_4[]" value="<?php if($field['image_url_4'] != '') echo  $field['image_url_4'] ; ?>" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>4" class="wb_iconic_but_class" type="button" value="Upload">	 
						    <p>	
							<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>	
						</div>
						<?php
						endforeach;
						else : ?>
						<!-- Empty section -->
		                <div class="wb-tab-content wb_tab_content_4">
		                	<label class="wb_label" for="course_na4[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i" name="course_na4[]"/>
							<p>							
							<label class="wb_label" for="teacher_na4[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
							<input type="text" class="wb_text_i" name="teacher_na4[]"/>
							<p>
							<label class="wb_label" for="bg_color4[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>							<input type="text" class="wp-color-picker-field" name="bg_color4[]"/>
							<p>
							<label class="wb_label" for="bg_hover4[]"><?php _e( 'Bg Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="bg_hover4[]"/>
							<p>
							<label class="wb_label" for="text_color4[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_color4[]"/>	
							<p>
							<label class="wb_label" for="text_hover4[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
							<input type="text" class="wp-color-picker-field" name="text_hover4[]"/>	
							<p>
							<label class="wb_label" for="image_url_4[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
							<input type="text"  id="image_url_4[]" name="image_url_4[]" value="" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>4" class="wb_iconic_but_class" type="button" value="Upload">	
							<p>
							<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>

		                </div>
						<?php endif; ?>
		            </div>
		        </div>
		    </div>

			<!-- empty hidden one for jQuery -->
			<div id="wb_a_copy4" class="wb_hidden" >
			<a href="#" class="list-group-item text-center">
              <i class="fa fa fa-columns fa-3x"></i><br/>Insert Entry
            </a> 
        </div>
			<div class="wb-tab-content wb_tab_content_4 wb_row_field wb_hidden">
				<label class="wb_label" for="course_na4[]"><?php _e( 'Title', 'wb_tt' ) ; ?></label>
				<input type="text" class="wb_text_i" name="course_na4[]"/>
				<p>
				<label class="wb_label" for="teacher_na4[]"><?php _e( 'Discribtion', 'wb_tt' ) ; ?></label>
				<input type="text" class="wb_text_i" name="teacher_na4[]"/>
				<p>
				<label class="wb_label" for="bg_color4[]"><?php _e( 'Bg Color', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="bg_color4[]"/>
				<p>
				<label class="wb_label" for="bg_hover4[]"><?php _e( 'Bg hover', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="bg_hover4[]"/>
				<p>
				<label class="wb_label" for="text_color4[]"><?php _e( 'Text Color', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="text_color4[]"/>
				<p>
				<label class="wb_label" for="text_hover4[]"><?php _e( 'Text Hover', 'wb_tt' ) ; ?></label>
				<input type="text" class="wp-color-picker-field" name="text_hover4[]"/>
				<p>
				<label class="wb_label" for="image_url_4[]"><?php _e( 'Bg Image', 'wb_tt' ) ; ?></label>
				<input type="text"  id="image_url_4[]" name="image_url_4[]" value="" class="wb_text_i wb_img_url_ico_class"><input id="wb_iconic_but<?php echo $count ; ?>4" class="wb_iconic_but_class" type="button" value="Upload">
				<p>
				<a class="wb_tt_button remove-row" href="#"><?php _e( 'Remove', 'wb_tt' ) ; ?></a>

			</div>
		<p><a id="wb_tt_4_add" class="wb_tt_button" href="#"><?php _e( 'Add Class', 'wb_tt' ) ; ?></a></p>		
		<?php	
	}
	add_action('save_post', 'wb_meta_add_class_save');
	function wb_meta_add_class_save($post_id) {

        if ( !isset( $_POST['wb_time_day_nonce'] ) ) {
            return;
        }

        if ( !wp_verify_nonce( $_POST['wb_time_day_nonce'], 'wb_time_day' ) ) {
            return;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

		if (!current_user_can('edit_post', $post_id))
			return;

		$wb_show_hide_time = ( isset( $_POST['is_checked_time'] )  ? sanitize_html_class( $_POST['is_checked_time']  ) : ''  );
        $wb_active_filter  = ( isset( $_POST['wb_active_filter'] ) ? sanitize_html_class( $_POST['wb_active_filter'] ) : ''  );
        $wb_filter_label   = ( isset( $_POST['filter_label'] )     ? $_POST['filter_label'] 						   : ''  );

        update_post_meta( $post_id, 'wb_show_time_col', $wb_show_hide_time );
        update_post_meta( $post_id, 'wb_active_filter', $wb_active_filter  );
        update_post_meta( $post_id, 'filter_label'    , $wb_filter_label   );

        $time_setup = ( isset( $_POST['time_setup']     )  ? $_POST['time_setup']     : ''  );
        $day_setup  = ( isset( $_POST['day_setup']      )  ? $_POST['day_setup']      : ''  );
		$wb_icon    = ( isset( $_POST['wb_img_src']     )  ? $_POST['wb_img_src']     : ''  );
		$time_color = ( isset( $_POST['wb_time_color']  )  ? $_POST['wb_time_color']  : ''  );
		$day_color  = ( isset( $_POST['wb_day_color']   )  ? $_POST['wb_day_color']   : ''  );

		update_post_meta( $post_id, 'time_setup'   , $time_setup  );
		update_post_meta( $post_id, 'day_setup'    , $day_setup   );
		update_post_meta( $post_id, 'wb_icon_tt_tt', $wb_icon     );
		update_post_meta( $post_id, 'wb_time_color', $time_color  );
		update_post_meta( $post_id, 'wb_day_color' , $day_color   );

		$old0 = get_post_meta($post_id, 'wb_add_class0', true);
		$old1 = get_post_meta($post_id, 'wb_add_class1', true);
		$old2 = get_post_meta($post_id, 'wb_add_class2', true);
		$old3 = get_post_meta($post_id, 'wb_add_class3', true);
		$old4 = get_post_meta($post_id, 'wb_add_class4', true);
		$new0 = array();
		$new1 = array();
		$new2 = array();
		$new3 = array();
		$new4 = array();
		$options = wb_time_option_content();
		
		$names0      =( isset( $_POST['course_na0']  )  ? $_POST['course_na0']      : ''  ); 
		$teacher0    =( isset( $_POST['teacher_na0'] )  ? $_POST['teacher_na0']     : ''  ); 
		$bg_color0   =( isset( $_POST['bg_color0']   )  ? $_POST['bg_color0']       : ''  );  
		$bg_hover0   =( isset( $_POST['bg_hover0']   )  ? $_POST['bg_hover0']       : ''  );  
		$text_color0 =( isset( $_POST['text_color0'] )  ? $_POST['text_color0']     : ''  ); 
		$text_hover0 =( isset( $_POST['text_hover0'] )  ? $_POST['text_hover0']     : ''  ); 
		$image_url_0 =( isset( $_POST['image_url_0'] )  ? $_POST['image_url_0']     : ''  );
		//$selects0 = $_POST['select0'];

		$names1      =( isset( $_POST['course_na1']  )  ? $_POST['course_na1']      : ''  ); 
		$teacher1    =( isset( $_POST['teacher_na1'] )  ? $_POST['teacher_na1']     : ''  ); 
		$bg_color1   =( isset( $_POST['bg_color1']   )  ? $_POST['bg_color1']       : ''  );  
		$bg_hover1   =( isset( $_POST['bg_hover1']   )  ? $_POST['bg_hover1']       : ''  );  
		$text_color1 =( isset( $_POST['text_color1'] )  ? $_POST['text_color1']     : ''  ); 
		$text_hover1 =( isset( $_POST['text_hover1'] )  ? $_POST['text_hover1']     : ''  ); 
		$image_url_1 =( isset( $_POST['image_url_1'] )  ? $_POST['image_url_1']     : ''  );
		//$selects1 = $_POST['select1'];

		$names2      =( isset( $_POST['course_na2']  )  ? $_POST['course_na2']      : ''  ); 
		$teacher2    =( isset( $_POST['teacher_na2'] )  ? $_POST['teacher_na2']     : ''  ); 
		$bg_color2   =( isset( $_POST['bg_color2']   )  ? $_POST['bg_color2']       : ''  );  
		$bg_hover2   =( isset( $_POST['bg_hover2']   )  ? $_POST['bg_hover2']       : ''  );  
		$text_color2 =( isset( $_POST['text_color2'] )  ? $_POST['text_color2']     : ''  ); 
		$text_hover2 =( isset( $_POST['text_hover2'] )  ? $_POST['text_hover2']     : ''  ); 
		$image_url_2 =( isset( $_POST['image_url_2'] )  ? $_POST['image_url_2']     : ''  );
		//$selects2 = $_POST['select2'];

		$names3      =( isset( $_POST['course_na3']  )  ? $_POST['course_na3']      : ''  ); 
		$teacher3    =( isset( $_POST['teacher_na3'] )  ? $_POST['teacher_na3']     : ''  ); 
		$bg_color3   =( isset( $_POST['bg_color3']   )  ? $_POST['bg_color3']       : ''  );  
		$bg_hover3   =( isset( $_POST['bg_hover3']   )  ? $_POST['bg_hover3']       : ''  );  
		$text_color3 =( isset( $_POST['text_color3'] )  ? $_POST['text_color3']     : ''  ); 
		$text_hover3 =( isset( $_POST['text_hover3'] )  ? $_POST['text_hover3']     : ''  ); 
		$image_url_3 =( isset( $_POST['image_url_3'] )  ? $_POST['image_url_3']     : ''  );
		//$selects3 = $_POST['select3'];

		$names4      =( isset( $_POST['course_na4']  )  ? $_POST['course_na4']      : ''  ); 
		$teacher4    =( isset( $_POST['teacher_na4'] )  ? $_POST['teacher_na4']     : ''  ); 
		$bg_color4   =( isset( $_POST['bg_color4']   )  ? $_POST['bg_color4']       : ''  );  
		$bg_hover4   =( isset( $_POST['bg_hover4']   )  ? $_POST['bg_hover4']       : ''  );  
		$text_color4 =( isset( $_POST['text_color4'] )  ? $_POST['text_color4']     : ''  ); 
		$text_hover4 =( isset( $_POST['text_hover4'] )  ? $_POST['text_hover4']     : ''  ); 
		$image_url_4 =( isset( $_POST['image_url_4'] )  ? $_POST['image_url_4']     : ''  );
		//$selects4 = $_POST['select4'];

		$count0 = count( $names0 );
		$count1 = count( $names1 );
		$count2 = count( $names2 );
		$count3 = count( $names3 );
		$count4 = count( $names4 );
		
		for ( $i = 0; $i < $count0; $i++ ) {
			if ( $names0[$i] != '' || $teacher0[$i] != ''  ) :
				$new0[$i]['course_na0'] =  $names0[$i] ;
				$new0[$i]['teacher_na0'] = $teacher0[$i] ;
				$new0[$i]['bg_color0'] =  $bg_color0[$i] ;
				$new0[$i]['bg_hover0'] =  $bg_hover0[$i] ;
				$new0[$i]['text_color0'] =  $text_color0[$i] ;
				$new0[$i]['text_hover0'] =  $text_hover0[$i] ;
				$new0[$i]['image_url_0'] =  $image_url_0[$i] ;
				// if ( in_array( $selects0[$i], $options ) )
				// 	$new0[$i]['select0'] = $selects0[$i];
				// else
				// 	$new0[$i]['select0'] = '';
			endif;
		}
		if ( !empty( $new0 ) && $new0 != $old0 )
			update_post_meta( $post_id, 'wb_add_class0', $new0 );
		elseif ( empty($new0) && $old0 )
			delete_post_meta( $post_id, 'wb_add_class0', $old0 );

		for ( $i = 0; $i < $count1; $i++ ) {
			if ( $names1[$i] != '' || $teacher1[$i] != '' ) :
				$new1[$i]['course_na1'] =  $names1[$i] ;
				$new1[$i]['teacher_na1'] = $teacher1[$i] ;
				$new1[$i]['bg_color1'] =  $bg_color1[$i] ;
				$new1[$i]['bg_hover1'] =  $bg_hover1[$i] ;
				$new1[$i]['text_color1'] =  $text_color1[$i] ;
				$new1[$i]['text_hover1'] =  $text_hover1[$i] ;
				$new1[$i]['image_url_1'] =  $image_url_1[$i] ;
			// 	if ( in_array( $selects1[$i], $options ) )
			// 		$new1[$i]['select1'] = $selects1[$i];
			// 	else
			// 		$new1[$i]['select1'] = '';
			endif;
		}
		if ( !empty( $new1 ) && $new1 != $old1 )
			update_post_meta( $post_id, 'wb_add_class1', $new1 );
		elseif ( empty($new1) && $old1 )
			delete_post_meta( $post_id, 'wb_add_class1', $old1 );

		for ( $i = 0; $i < $count2; $i++ ) {
			if ( $names2[$i] != '' || $teacher2[$i] != '' ) :
				$new2[$i]['course_na2'] =  $names2[$i] ;
				$new2[$i]['teacher_na2'] = $teacher2[$i] ;
				$new2[$i]['bg_color2'] =  $bg_color2[$i] ;
				$new2[$i]['bg_hover2'] =  $bg_hover2[$i] ;
				$new2[$i]['text_color2'] =  $text_color2[$i] ;
				$new2[$i]['text_hover2'] =  $text_hover2[$i] ;
				$new2[$i]['image_url_2'] =  $image_url_2[$i] ;
			// 	if ( in_array( $selects2[$i], $options ) )
			// 		$new2[$i]['select2'] = $selects2[$i];
			// 	else
			// 		$new2[$i]['select2'] = '';
			endif;
		}
		if ( !empty( $new2 ) && $new2 != $old2 )
			update_post_meta( $post_id, 'wb_add_class2', $new2 );
		elseif ( empty($new2) && $old2 )
			delete_post_meta( $post_id, 'wb_add_class2', $old2 );

		for ( $i = 0; $i < $count3; $i++ ) {
			if ( $names3[$i] != '' || $teacher3[$i] != '' ) :
				$new3[$i]['course_na3'] =  $names3[$i] ;
				$new3[$i]['teacher_na3'] = $teacher3[$i] ;
				$new3[$i]['bg_color3'] =  $bg_color3[$i] ;
				$new3[$i]['bg_hover3'] =  $bg_hover3[$i] ;
				$new3[$i]['text_color3'] =  $text_color3[$i] ;
				$new3[$i]['text_hover3'] =  $text_hover3[$i] ;
				$new3[$i]['image_url_3'] =  $image_url_3[$i] ;
			// 	if ( in_array( $selects3[$i], $options ) )
			// 		$new3[$i]['select3'] = $selects3[$i];
			// 	else
			// 		$new3[$i]['select3'] = '';
			endif;
		}
		if ( !empty( $new3 ) && $new3 != $old3 )
			update_post_meta( $post_id, 'wb_add_class3', $new3 );
		elseif ( empty($new3) && $old3 )
			delete_post_meta( $post_id, 'wb_add_class3', $old3 );

				for ( $i = 0; $i < $count4; $i++ ) {
			if ( $names4[$i] != '' || $teacher4[$i] != ''  ) :
				$new4[$i]['course_na4'] =  $names4[$i] ;
				$new4[$i]['teacher_na4'] = $teacher4[$i] ;
				$new4[$i]['bg_color4'] =  $bg_color4[$i] ;
				$new4[$i]['bg_hover4'] =  $bg_hover4[$i] ;
				$new4[$i]['text_color4'] =  $text_color4[$i] ;
				$new4[$i]['text_hover4'] =  $text_hover4[$i] ;
				$new4[$i]['image_url_4'] =  $image_url_4[$i] ;
			// 	if ( in_array( $selects4[$i], $options ) )
			// 		$new4[$i]['select4'] = $selects4[$i];
			// 	else
			// 		$new4[$i]['select4'] = '';
			endif;
		}
		if ( !empty( $new4 ) && $new4 != $old4 )
			update_post_meta( $post_id, 'wb_add_class4', $new4 );
		elseif ( empty($new4) && $old4 )
			delete_post_meta( $post_id, 'wb_add_class4', $old4 );

			include_once( WB_DIR .'public/content/table1.php');
			$wb_table = wb_table_content($post_id);
			$ul = wb_ul_content($post_id);
			$wb_post = array();
	        $wb_post['ID'] = $post_id;
	        $wb_post['post_content'] .=  $wb_table;
	        $wb_post['post_content'] .=  $ul;
		    remove_action( 'save_post', 'wb_meta_add_class_save' );		
		 	wp_update_post( $wb_post );
	}



