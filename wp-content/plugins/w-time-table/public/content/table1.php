<?php
/**
 * @link              http://webnus.biz
 * @since             1.0.0
 * @package           time table
 */

/**
 * Found array value
 */
function wb_found_value($key, array $arr){
    if ( !isset( $arr ) || empty( $arr ) || is_null( $arr ) ) {
      return;
    }
    $val = array();
    array_walk_recursive($arr, function($v, $k) use($key, &$val){
        if($k == $key) array_push($val, $v);
    });
    return count($val) > 1 ? $val : array_pop($val);
}

function wb_table_content($post_id){ 
    $wb_days       = get_post_meta( $post_id, 'day_setup'       , true ); 
    $time_setup    = get_post_meta( $post_id, 'time_setup'      , true );
    $wb_icon       = get_post_meta( $post_id, 'wb_icon_tt_tt'   , true );
    $wb_time_colorr= get_post_meta( $post_id, 'wb_time_color'   , true );
    $wb_filter_box = get_post_meta( $post_id, 'wb_active_filter', true ); 
    $wb_day_color  = get_post_meta( $post_id, 'wb_day_color'    , true );
    $wb_add_class0 = get_post_meta( $post_id, 'wb_add_class0'   , true );
    $wb_add_class1 = get_post_meta( $post_id, 'wb_add_class1'   , true );
    $wb_add_class2 = get_post_meta( $post_id, 'wb_add_class2'   , true );
    $wb_add_class3 = get_post_meta( $post_id, 'wb_add_class3'   , true );
    $wb_add_class4 = get_post_meta( $post_id, 'wb_add_class4'   , true ); 

    //option 0
    $course_na0    = !empty( $wb_add_class0 ) ? wb_found_value( 'course_na0'   , $wb_add_class0 ) : false;
    $teacher_na0   = !empty( $wb_add_class0 ) ? wb_found_value( 'teacher_na0'  , $wb_add_class0 ) : false;
    $bg_color0     = !empty( $wb_add_class0 ) ? wb_found_value( 'bg_color0'    , $wb_add_class0 ) : false;
    $bg_hover0     = !empty( $wb_add_class0 ) ? wb_found_value( 'bg_hover0'    , $wb_add_class0 ) : false;
    $text_color0   = !empty( $wb_add_class0 ) ? wb_found_value( 'text_color0'  , $wb_add_class0 ) : false;
    $text_hover0   = !empty( $wb_add_class0 ) ? wb_found_value( 'text_hover0'  , $wb_add_class0 ) : false;
    $image_url_0   = !empty( $wb_add_class0 ) ? wb_found_value( 'image_url_0'  , $wb_add_class0 ) : false;
    //$select0[]       = !empty( $wb_add_class0 ) ? wb_found_value( 'select0'      , $wb_add_class0 ) : false;

    //option 1
    $course_na1    = !empty( $wb_add_class1 ) ? wb_found_value( 'course_na1'   , $wb_add_class1 ) : false;
    $teacher_na1   = !empty( $wb_add_class1 ) ? wb_found_value( 'teacher_na1'  , $wb_add_class1 ) : false;
    $bg_color1     = !empty( $wb_add_class1 ) ? wb_found_value( 'bg_color1'    , $wb_add_class1 ) : false;
    $bg_hover1     = !empty( $wb_add_class1 ) ? wb_found_value( 'bg_hover1'    , $wb_add_class1 ) : false;
    $text_color1   = !empty( $wb_add_class1 ) ? wb_found_value( 'text_color1'  , $wb_add_class1 ) : false;
    $text_hover1   = !empty( $wb_add_class1 ) ? wb_found_value( 'text_hover1'  , $wb_add_class1 ) : false;
    $image_url_1   = !empty( $wb_add_class1 ) ? wb_found_value( 'image_url_1'  , $wb_add_class1 ) : false;
    //$select1[]       = !empty( $wb_add_class1 ) ? wb_found_value( 'select1'      , $wb_add_class1 ) : false;

    //option 2
    $course_na2    = !empty( $wb_add_class2 ) ? wb_found_value( 'course_na2'   , $wb_add_class2 ) : false;
    $teacher_na2   = !empty( $wb_add_class2 ) ? wb_found_value( 'teacher_na2'  , $wb_add_class2 ) : false;
    $bg_color2     = !empty( $wb_add_class2 ) ? wb_found_value( 'bg_color2'    , $wb_add_class2 ) : false;
    $bg_hover2     = !empty( $wb_add_class2 ) ? wb_found_value( 'bg_hover2'    , $wb_add_class2 ) : false;
    $text_color2   = !empty( $wb_add_class2 ) ? wb_found_value( 'text_color2'  , $wb_add_class2 ) : false;
    $text_hover2   = !empty( $wb_add_class2 ) ? wb_found_value( 'text_hover2'  , $wb_add_class2 ) : false;
    $image_url_2   = !empty( $wb_add_class2 ) ? wb_found_value( 'image_url_2'  , $wb_add_class2 ) : false;
    //$select2[]       = !empty( $wb_add_class2 ) ? wb_found_value( 'select2'      , $wb_add_class2 ) : false;

    //option 3
    $course_na3    = !empty( $wb_add_class3 ) ? wb_found_value( 'course_na3'   , $wb_add_class3 ) : false;
    $teacher_na3   = !empty( $wb_add_class3 ) ? wb_found_value( 'teacher_na3'  , $wb_add_class3 ) : false;
    $bg_color3     = !empty( $wb_add_class3 ) ? wb_found_value( 'bg_color3'    , $wb_add_class3 ) : false;
    $bg_hover3     = !empty( $wb_add_class3 ) ? wb_found_value( 'bg_hover3'    , $wb_add_class3 ) : false;
    $text_color3   = !empty( $wb_add_class3 ) ? wb_found_value( 'text_color3'  , $wb_add_class3 ) : false;
    $text_hover3   = !empty( $wb_add_class3 ) ? wb_found_value( 'text_hover3'  , $wb_add_class3 ) : false;
    $image_url_3   = !empty( $wb_add_class3 ) ? wb_found_value( 'image_url_3'  , $wb_add_class3 ) : false;
    //$select3[]       = !empty( $wb_add_class3 ) ? wb_found_value( 'select3'      , $wb_add_class3 ) : false;

    //option 4
    $course_na4    = !empty( $wb_add_class4 ) ? wb_found_value( 'course_na4'   , $wb_add_class4 ) : false;
    $teacher_na4   = !empty( $wb_add_class4 ) ? wb_found_value( 'teacher_na4'  , $wb_add_class4 ) : false;
    $bg_color4     = !empty( $wb_add_class4 ) ? wb_found_value( 'bg_color4'    , $wb_add_class4 ) : false;
    $bg_hover4     = !empty( $wb_add_class4 ) ? wb_found_value( 'bg_hover4'    , $wb_add_class4 ) : false;
    $text_color4   = !empty( $wb_add_class4 ) ? wb_found_value( 'text_color4'  , $wb_add_class4 ) : false;
    $text_hover4   = !empty( $wb_add_class4 ) ? wb_found_value( 'text_hover4'  , $wb_add_class4 ) : false;
    $image_url_4   = !empty( $wb_add_class4 ) ? wb_found_value( 'image_url_4'  , $wb_add_class4 ) : false;
    //$select4[]       = !empty( $wb_add_class4 ) ? wb_found_value( 'select4'      , $wb_add_class4 ) : false;


    $filter_inp  = array();
    $filter_list = array();
    $options     = array();
    $filter_inp[] = $course_na0;
    $filter_inp[] = $course_na1;
    $filter_inp[] = $course_na2;
    $filter_inp[] = $course_na3;
    $filter_inp[] = $course_na4;

    //merge all filed course name together for option box
    foreach ( $filter_inp as $arrs=> $arr  ) {
        if ( is_array( $arr ) ) {
            $filter_list = array_unique( array_merge( $filter_list, $arr ) );
        }
    }
    foreach ( $filter_list as $keys_op => $values_op ) { 
            $options += array(
                $keys_op => $values_op ,
            );   
    }
 
    // generate table content 
    $out  = '';     
    $out .= "<div class='tab'>" ;
    if ( $wb_filter_box == 'Show') {
      $out .= "<ul id='wb_fiter_select'>" ; 
      $wb_filter_name     = get_post_meta( $post_id, 'filter_label', true ); 
                  if ( $wb_filter_name ) {
                    $out .= "<li class='wb_all_filter'>".$wb_filter_name." </li>" ;
                  }else{
                    $out .= "<li class='wb_all_filter'>All Filter</li>";
                  }
                    $out .= '<div class="wb_li_content">';
                  if ( $wb_filter_name ) {
                    $out .= "<li class='wb_filter_fi'>".$wb_filter_name."</li>" ;
                  }
                foreach ( $options as $label => $value ) { 
                    $out .= "<li value='$label'>". $value ."</li>" ;
                }
                    $out .= "</div>" ;
               $out .= "</ul>"; 
    }   
      $out .=  "<table class='wb_time_table' border='0' cellpadding='0' cellspacing='0'>" ;
        $out .= "<tr class='days'>";
            $wb_show_hide = get_post_meta( $post_id, 'wb_show_time_col' , true );
            if ( $wb_show_hide == 'Show' ){  
                list( $tcolors, $tcolor )  = each( $wb_day_color ); 
                $out .=  "<th style='background-color: $tcolor ;' ></th>" ;
            } 
           
        foreach ($wb_days as $days ){  
          list( $dcolors, $dcolor )  = each( $wb_day_color ); 
          if ( !empty( $wb_day_color ) ) {
              $out .= "<th style='background-color: $dcolor ; color:#a4a4a4 ;' >".  $days ."</th>" ; 
          }else{
              $out .= "<th>".  $days ."</th>" ; 
          }
        }
        $out .= "</tr>" ;
        if ( $time_setup ) {

            foreach ( $time_setup as $times => $time ) {

                $out .= "<tr class='wb_table' >\n";
                    if ( $wb_show_hide == 'Show' ){
                      if ( $wb_icon ) {
                        list( $icons, $icon )  = each( $wb_icon ); 
                      }else{
                        $icon = 'false';
                      }
                      if ( $wb_time_colorr ) {
                        list( $tcolorss, $tcolorr )  = each( $wb_time_colorr ); 
                      }
                        if ( $icon != 'false' && $icon != '/' && !empty( $icon ) && !empty( $wb_time_colorr )  ) {
                            $out .= "\t<td style='background-color: $tcolorr; color:#a4a4a4 ;' class='time'> <img src=". $icon ." /> </br>". $time . "</td>\n"; 
                        }elseif( $icon != 'false' && $icon != '/' && empty( $wb_time_colorr ) ){ 
                            $out .= "\t<td class='time'>  <img src=". $icon ." /> </br>". $time . "</td>\n"; 
                        }elseif( !empty( $wb_time_colorr ) ){
                            $out .= "\t<td style='background-color: $tcolorr; color:#a4a4a4 ;' class='time'></br>". $time . "</td>\n";
                        }else{ 
                            $out .= "\t<td class='time'>". $time . "</td>\n";
                        }
                    }
                    if ( $course_na0 || $teacher_na0 ) {
                     list( $key00, $course_na00   )  = each( $course_na0    );
                     list( $key10, $teacher_na00  )  = each( $teacher_na0   );
                     list( $key40, $bg_color00    )  = each( $bg_color0     );
                     list( $key50, $bg_hover00    )  = each( $bg_hover0     );
                     list( $key60, $text_color00  )  = each( $text_color0   );
                     list( $key70, $text_hover00  )  = each( $text_hover0   );
                     list( $key80, $image_url_00  )  = each( $image_url_0   );

                    $out .= '
                      <td class="' . $course_na00 . '" data-bgcolor="' . $bg_color00 . '" data-bghover="' . $bg_hover00 . '" style="background-image: url(' . $image_url_00 . '); background-color: ' . $bg_color00 . ';">
                        <span class="wb_filter_find">
                          <span class="wb_course" data-txcolor="' . $text_color00 . '" data-txhover="' . $text_hover00 . '" style="color: ' . $text_color00 . ';">' . $course_na00 . '</span>
                          <span class="wb_desc" style="color: ' . $text_color00 . ';">' . $teacher_na00 . '</span>
                        </span>
                      </td>';
                    }
                    if ( $course_na1 || $teacher_na1 ){ 
                     list( $key01, $course_na11   )  = each( $course_na1    );
                     list( $key11, $teacher_na11  )  = each( $teacher_na1   );
                     list( $key41, $bg_color11    )  = each( $bg_color1     );
                     list( $key51, $bg_hover11    )  = each( $bg_hover1     );
                     list( $key61, $text_color11  )  = each( $text_color1   );
                     list( $key71, $text_hover11  )  = each( $text_hover1   );
                     list( $key81, $image_url_11  )  = each( $image_url_1   );

                     $out .= '
                      <td class="' . $course_na11 . '" data-bgcolor="' . $bg_color11 . '" data-bghover="' . $bg_hover11 . '" style="background-image: url(' . $image_url_11 . '); background-color: ' . $bg_color11 . ';">
                        <span class="wb_filter_find">
                          <span class="wb_course" data-txcolor="' . $text_color11 . '" data-txhover="' . $text_hover11 . '" style="color: ' . $text_color11 . ';">' . $course_na11 . '</span>
                          <span class="wb_desc" style="color: ' . $text_color11 . ';">' . $teacher_na11 . '</span>
                        </span>
                      </td>';
                    }
                    if ( $course_na2 || $teacher_na2 ) {                    
                     list( $key02, $course_na22   )  = each( $course_na2    );
                     list( $key12, $teacher_na22  )  = each( $teacher_na2   );
                     list( $key42, $bg_color22    )  = each( $bg_color2     );
                     list( $key52, $bg_hover22    )  = each( $bg_hover2     );
                     list( $key62, $text_color22  )  = each( $text_color2   );
                     list( $key72, $text_hover22  )  = each( $text_hover2   );
                     list( $key82, $image_url_22  )  = each( $image_url_2   );

                     $out .= '
                      <td class="' . $course_na22 . '" data-bgcolor="' . $bg_color22 . '" data-bghover="' . $bg_hover22 . '" style="background-image: url(' . $image_url_22 . '); background-color: ' . $bg_color22 . ';">
                        <span class="wb_filter_find">
                          <span class="wb_course" data-txcolor="' . $text_color22 . '" data-txhover="' . $text_hover22 . '" style="color: ' . $text_color22 . ';">' . $course_na22 . '</span>
                          <span class="wb_desc" style="color: ' . $text_color22 . ';">' . $teacher_na22 . '</span>
                        </span>
                      </td>';
                    }

                    if ( $course_na3 || $teacher_na3 ) {
                     list( $key03, $course_na33   )  = each( $course_na3    );
                     list( $key13, $teacher_na33  )  = each( $teacher_na3   );
                     list( $key43, $bg_color33    )  = each( $bg_color3     );
                     list( $key53, $bg_hover33    )  = each( $bg_hover3     );
                     list( $key63, $text_color33  )  = each( $text_color3   );
                     list( $key73, $text_hover33  )  = each( $text_hover3   );
                     list( $key83, $image_url_33  )  = each( $image_url_3   );

                     $out .= '
                      <td class="' . $course_na33 . '" data-bgcolor="' . $bg_color33 . '" data-bghover="' . $bg_hover33 . '" style="background-image: url(' . $image_url_33 . '); background-color: ' . $bg_color33 . ';">
                        <span class="wb_filter_find">
                          <span class="wb_course" data-txcolor="' . $text_color33 . '" data-txhover="' . $text_hover33 . '" style="color: ' . $text_color33 . ';">' . $course_na33 . '</span>
                          <span class="wb_desc" style="color: ' . $text_color33 . ';">' . $teacher_na33 . '</span>
                        </span>
                      </td>';
                    }
                    if ( $course_na4 || $teacher_na4 ) {
                     list( $key04, $course_na44   )  = each($course_na4     );
                     list( $key14, $teacher_na44  )  = each($teacher_na4    );
                     list( $key44, $bg_color44    )  = each($bg_color4      );
                     list( $key54, $bg_hover44    )  = each($bg_hover4      );
                     list( $key64, $text_color44  )  = each($text_color4    );
                     list( $key74, $text_hover44  )  = each($text_hover4    );
                     list( $key84, $image_url_44  )  = each($image_url_4    );

                     $out .= '
                      <td class="' . $course_na44 . '" data-bgcolor="' . $bg_color44 . '" data-bghover="' . $bg_hover44 . '" style="background-image: url(' . $image_url_44 . '); background-color: ' . $bg_color44 . ';">
                        <span class="wb_filter_find">
                          <span class="wb_course" data-txcolor="' . $text_color44 . '" data-txhover="' . $text_hover44 . '" style="color: ' . $text_color44 . ';">' . $course_na44 . '</span>
                          <span class="wb_desc" style="color: ' . $text_color44 . ';">' . $teacher_na44 . '</span>
                        </span>
                      </td>';
                    }
                  $out .= "</tr>\n"; 
            } 
        } 


    $out .= "</table>";
    $out .= "</div>";



    return $out ;
}


function wb_ul_content($post_id){ 

    $wb_days       = get_post_meta( $post_id, 'day_setup'       , true ); 
    $time_setup    = get_post_meta( $post_id, 'time_setup'      , true );
    $wb_icon       = get_post_meta( $post_id, 'wb_icon_tt'      , true );
    $wb_time_colorr= get_post_meta( $post_id, 'wb_time_color'   , true );
    $wb_filter_box = get_post_meta( $post_id, 'wb_active_filter', true ); 
    $wb_day_color  = get_post_meta( $post_id, 'wb_day_color'    , true );
    $wb_add_class0 = get_post_meta( $post_id, 'wb_add_class0'   , true );
    $wb_add_class1 = get_post_meta( $post_id, 'wb_add_class1'   , true );
    $wb_add_class2 = get_post_meta( $post_id, 'wb_add_class2'   , true );
    $wb_add_class3 = get_post_meta( $post_id, 'wb_add_class3'   , true );
    $wb_add_class4 = get_post_meta( $post_id, 'wb_add_class4'   , true ); 

    //option 0
    $course_na0    = !empty( $wb_add_class0 ) ? wb_found_value( 'course_na0'   , $wb_add_class0 ) : false;
    $teacher_na0   = !empty( $wb_add_class0 ) ? wb_found_value( 'teacher_na0'  , $wb_add_class0 ) : false;

    //option 1
    $course_na1    = !empty( $wb_add_class1 ) ? wb_found_value( 'course_na1'   , $wb_add_class1 ) : false;
    $teacher_na1   = !empty( $wb_add_class1 ) ? wb_found_value( 'teacher_na1'  , $wb_add_class1 ) : false;

    //option 2
    $course_na2    = !empty( $wb_add_class2 ) ? wb_found_value( 'course_na2'   , $wb_add_class2 ) : false;
    $teacher_na2   = !empty( $wb_add_class2 ) ? wb_found_value( 'teacher_na2'  , $wb_add_class2 ) : false;

    //option 3
    $course_na3    = !empty( $wb_add_class3 ) ? wb_found_value( 'course_na3'   , $wb_add_class3 ) : false;
    $teacher_na3   = !empty( $wb_add_class3 ) ? wb_found_value( 'teacher_na3'  , $wb_add_class3 ) : false;

    //option 4
    $course_na4    = !empty( $wb_add_class4 ) ? wb_found_value( 'course_na4'   , $wb_add_class4 ) : false;
    $teacher_na4   = !empty( $wb_add_class4 ) ? wb_found_value( 'teacher_na4'  , $wb_add_class4 ) : false;

    $filter_inp  = array();
    $filter_list = array();
    $options     = array();
    $filter_inp[] = $course_na0;
    $filter_inp[] = $course_na1;
    $filter_inp[] = $course_na2;
    $filter_inp[] = $course_na3;
    $filter_inp[] = $course_na4;
    //merge all filed course name together for option box
    foreach ( $filter_inp as $arrs=> $arr  ) {
        if ( is_array( $arr ) ) {
            $filter_list = array_unique( array_merge( $filter_list, $arr ) );
        }
    }
    foreach ( $filter_list as $keys_op => $values_op ) { 
            $options += array(
                $keys_op => $values_op ,
            );   
    }
 
    // generate ul content 
    $out  = '';     
    $out .= "<div class='wb_parent_tab_ul'>" ;
    $out .= "<ul class='wb_class_content_ul'>" ; 
    if ( $time_setup ) {
        foreach ( $time_setup as $times => $time ) {
              if ( $course_na0 || $teacher_na0 ) {
                list( $key00, $course_na00   )  = each( $course_na0    );
                list( $key10, $teacher_na00  )  = each( $teacher_na0   );
                list( $day,$days  )  = each( $wb_days );
                $out .= "<hr class='wb_first_hr'>";
                $out .= "<li><h3 class='wb_ul_day'>".  $days ."</h3></li>" ;
                $out .= "<li class='wb_ul_time'>".  $time ."</li>" ;
                $out .= "<li class='$course_na00'>". '<span class="wb_filter_find_ul"><span class="wb_course_ul">'.$course_na00 . '</span></br><span class="wb_desc_ul">' . $teacher_na00 . '</span></span>'."</li>";
              }
              if ( $course_na1 || $teacher_na1 ) {
                list( $key01, $course_na11   )  = each( $course_na1    );
                list( $key11, $teacher_na11  )  = each( $teacher_na1   );
                $out .= "<hr>";
                $out .= "<li class='$course_na11'>". '<span class="wb_filter_find_ul"><span class="wb_course_ul">'. $course_na11 . '</span></br><span class="wb_desc_ul">' . $teacher_na11 . '</span></span>'."</li>";
              }    

              if ( $course_na2 || $teacher_na2 ) {
                list( $key02, $course_na22   )  = each( $course_na2    );
                list( $key12, $teacher_na22  )  = each( $teacher_na2   );
                $out .= "<hr>";
                $out .= "<li class='$course_na22'>". '<span class="wb_filter_find_ul"><span class="wb_course_ul">'. $course_na22 . '</span></br><span class="wb_desc_ul">' . $teacher_na22 .  '</span></span>'."</li>";  
              } 
              if ( $course_na3 ||  $teacher_na3 ) {
                list( $key03, $course_na33   )  = each( $course_na3    );
                list( $key13, $teacher_na33  )  = each( $teacher_na3   );
                $out .= "<hr>";
                $out .= "<li class='$course_na33'>". '<span class="wb_filter_find_ul"><span class="wb_course_ul">'. $course_na33 . '</span></br><span class="wb_desc_ul">' . $teacher_na33 . '</span></span>'."</li>";  
              }  
              if ($course_na4 || $teacher_na4 ) {
                list( $key04, $course_na44   )  = each($course_na4     );
                list( $key14, $teacher_na44  )  = each($teacher_na4    );
                $out .= "<hr>";
                $out .= "<li class='$course_na44'>". '<span class="wb_filter_find_ul"><span class="wb_course_ul">'. $course_na44 . '</span></br><span class="wb_desc_ul">' . $teacher_na44 . '</span></span>'."</li>";  
              }   
                $out .= "</li>\n";
        } 
    } 
    $out .= "</ul>";
    $out .= "</div>";
    return $out ;
}