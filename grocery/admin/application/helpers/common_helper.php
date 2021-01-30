<?php
/* Code added by Vinod Kumar Pal on 27062020
* This file writes common help functions
*/
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Code added by Vinod Kumar Pal on 11112019
function getInsertUpdateDeletePermission($get_current_url_menu_id='')
{
  
        $CI = &get_instance();
        $logged_in_userDetail = $CI->session->userdata('user_detail');
        $role_id_str = $logged_in_userDetail[0]->users_role_id;
        if($get_current_url_menu_id == '') {
            $get_current_url_menu_id = get_current_url_menu_id();
        }
    // $role_id_str = '1';
       // $get_current_url_menu_id = '2';
        $sql = "

SELECT
      *
    FROM
      `system_menu` AS sm
      INNER JOIN `system_prmission` AS sp
        ON sp.`menu_id` = sm.`id`
    WHERE (
      admintype_id = '$role_id_str'
   AND sp.`menu_id` = '$get_current_url_menu_id'
      )
      AND (add_record != '0'
      OR edit_record != '0'
      OR delete_record != '0'
      OR view_record != '0') LIMIT 1";
       $CI->load->database();
        $query = $CI->db->query($sql);
        return $query->result();
}

// Code added by Vinod Kumar Pal on 11112019
function get_current_url_menu_id()
{
    $CI = &get_instance();
    $base_url = base_url(uri_string());
    $final_url_string = str_replace(siteUrl,'',$base_url);
    $final_url = explode('/',$final_url_string);
    $controler_name = @$final_url[0];
    $method_name = @$final_url[1];
    if($method_name == ''){$method_name ='index';}
    $variable_name = @$final_url[3];
    $final_url_string22  =$controler_name.'/'.$method_name;
    $sql = "SELECT id FROM `system_menu` WHERE menu_url = '$final_url_string22'";

    $results = $CI->db->query($sql);
    $result = @$results->result_array()[0]['id'];
  return $result;
}

// Code added by Vinod Kumar Pal on 11112019
function get_current_url_parent_menu_id()
{
    $CI = &get_instance();
    $base_url = base_url(uri_string());
    $final_url_string = str_replace(siteUrl,'',$base_url);
    $final_url = explode('/',$final_url_string);
    $controler_name = @$final_url[0];
    $method_name = @$final_url[1];
    if($method_name == ''){$method_name ='index';}
    $variable_name = @$final_url[3];
    $final_url_string22  =$controler_name.'/'.$method_name;
     $sql = "SELECT parent_id FROM `system_menu` WHERE menu_url = '$final_url_string22' and parent_id!='0'";   
    $results = $CI->db->query($sql);
    $result = @$results->result_array()[0]['parent_id'];
  return $result;
}

// Code added by Vinod Kumar Pal on 11112019
        /*$get_insert_update_permission=getInsertUpdateDeletePermission();
       
        if((@$get_insert_update_permission[0]->add_record =='0'||@$get_insert_update_permission[0]->add_record =='')&&(@$get_insert_update_permission[0]->edit_record =='0'||@$get_insert_update_permission[0]->edit_record =='')&&(@$get_insert_update_permission[0]->delete_record =='0'||@$get_insert_update_permission[0]->delete_record =='')&&(@$get_insert_update_permission[0]->view_record =='0'||@$get_insert_update_permission[0]->view_record =='')){
            $action_status = '';
            }*/

            // Code added by Vinod Kumar Pal on 23-April-2019
function getDateInputField($id, $name, $value = '', $placeholder = "dd-mm-yyyy", $readonly = "", $js = "")
{
    // $data = '<input type="text" name="' . $name . '" id="' . $id . '" class="form-control datepicker" placeholder="' . $placeholder . '" autocomplete="new-password"  value="' . $value . '" maxlength="15" ' . $readonly . '>';
    $data ='<div class="input-group date datepicker" style="padding: 0">
                <input type="text" class="form-control" placeholder="' . $placeholder . '" name="' . $name . '" id="' . $id . '" value="' . dateConvertDBtoUI($value) . '"   maxlength="15" ' . $readonly . '>
                <div class="input-group-addon">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
            </div>';

    if ($js != '') {

        $data .= '<script type="text/javascript">
            $(".datepicker").datepicker({
                format: "dd-M-yyyy",
                autoclose: true,
                todayBtn: false,
                todayHighlight: true,
                clearBtn:  true,
                pickerPosition: "bottom-left"
            });
        </script>';

    }
    return $data;
}
// Code added by Vinod Kumar Pal on 01022019 use global function  full application form dropdown list
    function select_dropdown_html($dropdown_id = '', $dropdown_name = '', $dropdown_css_class = 'form-control selectpicker', $choose_one = 'Choose One', $table_name, $value_field = '', $display_field = '', $select_value = '', $condition = '', $c_match = '', $dropdown_custom_css = '', $extra_option = '',$others='',$attr='',$remove_data="")
    {
        $CI =& get_instance();

        if ($dropdown_css_class == '') {
            $dropdown_css_class = 'form-control selectpicker';
        }

        $return = '<select '.$others.' class="' . $dropdown_css_class . '" id="' . $dropdown_id . '" name="' . $dropdown_name . '"  data-live-search="true">';
        if ($choose_one == '') {
            $choose_one = 'Choose One';
        }
        $return .= '<option value="">' . $choose_one . '</option>';
    
     if ($condition == '') {
       if($remove_data !=''){
         $CI->db->where_not_in($value_field, $remove_data);
       }
            $all = $CI->db->get($table_name)->result_array();
        } else if ($condition !== '') {     
      $CI->db->where($condition,$c_match);
      if($remove_data !=''){
         $CI->db->where_not_in($value_field, $remove_data);
       }
    
      $all = $CI->db->get($table_name)->result_array();
        }
        
        // Code added by Vinod Kumar Pal on 27042019
        $select_value=explode(',',$select_value);
        foreach ($all as $row) {
            $return .= '<option value="' . $row[$value_field] . '" ';
          // if ($row[$value_field] == trim($select_value)) {
            if (in_array($row[$value_field], $select_value)){
                $return .= 'selected=."selected"';
            }
            $return .= '>';
            $return .= @$row[$display_field];
            $return .= '</option>';
        }
        $return .= $extra_option;
        $return .= '</select>';
        return $return;
    }

?>