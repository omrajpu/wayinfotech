<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_model extends CI_Model{
	
	function login11($email,$password){
		    $this -> db -> select(' * ');
            $this -> db -> from('user_detail');
            $this -> db -> where('email', $email);
            $this -> db -> where('password', md5($password));
            $this -> db -> limit(1);
			$query = $this -> db -> get();
			return $query;  		   
		 }
	
	function user_list_data(){
         $this->db->select("*");
         $this->db->from("system_admin");
         $this->db->order_by("system_admin.id","desc");
         $this->db->join('system_role', 'system_role.id = system_admin.user_role');
         //$this->db->where('status','1');
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   } 
   function user_role_list_data(){
         $this->db->select("*");
         $this->db->from("system_role");
         $this->db->order_by("system_role.id","asc");
        // $this->db->join('system_role', 'system_role.id = system_admin.user_role');
         //$this->db->where('status','1');
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   } 

     // Code added by Vinod Kumar Pal on 27062020
    public function getAdminTypeRecord()
    {
        $result = array();
        $this->db->where("is_deleted",'0');
        $this->db->select('role_name,id');
        $query=$this->db->get('system_role');

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return false;
        }
    }

     // Code added by Vinod Kumar Pal on 27062020
    public function checkPermissionRecord($admin_id,$menu_id,$type)
    {
        $result = array();
        $this->db->select($type);
        $this->db->where('menu_id',$menu_id);
        $this->db->where('role_id',$admin_id);
        $query=$this->db->get('system_prmission');

        if($query->num_rows()>0)
        {
            $arr= $query->result_array();
            return $arr[0][$type];
        }else{
            return false;
        }
    }
     // Code added by Vinod Kumar Pal on 27062020
    public function getMenuRecord()
    {
        $result = array();

        $this->db->select('id,menu_name');
        $this->db->where('is_status','0');
        $query=$this->db->get('system_menu');
        
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return false;
        }
    }// end function here

      // Code added by Vinod Kumar Pal on 27062020
    function deleteMenuPermission($id){
        $this->db->where('role_id',$id);
        $this->db->delete('system_prmission');
    }
    // Code added by Vinod Kumar Pal on 27062020

    function insertMenuPermission($post,$admin_id){

        $meuu = $this->getMenuRecord();
        foreach($meuu as $value){
            if(@$_POST['add_'.$value['id']]){
                $add_record = '1';
            }else{
                $add_record = '0';
            }
            if(@$_POST['edit_'.$value['id']]){
                $edit_record = '1';
            }else{
                $edit_record = '0';
            }
            if(@$_POST['delete_'.$value['id']]){
                $delete_record = '1';
            }else{
                $delete_record = '0';
            }

            if(@$_POST['view_'.$value['id']]){
                $view_record = '1';
            }else{
                $view_record = '0';
            }

            $insertData = array(
                'role_id' => $admin_id,
                'menu_id'   => $value['id'],
                'view_record' => $view_record,
                'add_record' => $add_record,
                'edit_record' => $edit_record,
                'delete_record' => $delete_record
            );
            $this->db->insert('system_prmission',$insertData);

        }

    }
   public  function single_staff_data($cat_id){
         $this->db->select("*");
         $this->db->from("system_admin");
         $this->db->where('id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;
        }
  public function delete_data($table, $field, $delete_id) {
        $this->db->trans_start();
        $this->db->delete($table, array($field => $delete_id));
        $this->db->trans_complete();
        return ($this->db->trans_status() === FALSE) ? FALSE : TRUE;
    }  

     //Code added by Vinod Kumar Pal on 29062020
    public function common_save_data($data,$validation_array,$table_name,$where_column,$file_upload='',$folder_path='',$file_preffix='',$save_and_continue_id='')
    {
        $data_validate = array('success' => false, 'message' => array());
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        //$this->CrudModel->add_update_validation_common($validation_array);
        $this->add_update_validation_common($validation_array);
        if ($this->form_validation->run()) {
            //$save_data_id = $this->CrudModel->add_update_common($data, $table_name, $where_column,$file_upload);
            $save_data_id = $this->add_update_common($data, $table_name, $where_column,$file_upload,$folder_path,$file_preffix);
            $result['success'] = true;
            $result['save_data_id'] = $save_data_id;
            if($save_and_continue_id!='')
            {
                return $save_data_id;
            }else {
            echo json_encode($result);
        }
        }
        else  {
            $pageData[]="";
            foreach($_POST as $key =>$value){
                $data_validate['messages'][$key] = form_error($key);
            }
            echo json_encode($data_validate);
        }
    }
   //Code added by Vinod Kumar Pal on 29062020
    public function add_update_validation_common($validation_array='')
    {
        if(!empty($validation_array)) {
            foreach($validation_array as $key)
            {
               $this->form_validation->set_rules($key['field_name'], '', $key['validate_type'],
                    array('required' => $key['message']));
            }
        }
    }
      // Code added by Vinod Kumar Pal on 29062020 Common insert/ update module functions
    public function add_update_common($data,$table_name,$where_column,$file_upload='',$folder_path='',$file_preffix='')
    {
        if ($data[$where_column] != '') {
            $this->db->where($where_column, $data[$where_column]);
            $this->db->update($table_name, $data);
            //echo $this->db->last_query();
          //  return $data[$where_column];
            $id = $data[$where_column];
        } else {
            $this->db->insert($table_name, $data);
            //echo $this->db->last_query();
            //return $this->db->insert_id();
            $id = $this->db->insert_id();
        }

        if(($file_upload!='') && ($id !=''))
        {
            $where_value = $id;
           $file_upload_array=explode('||',$file_upload);

           foreach($file_upload_array as $key)
           {
               $key_str_array=explode(',',$key);

               $this->fileUploadCommonProvider($key_str_array[0], $table_name, $where_column, $where_value, $folder_path, $file_preffix, $update_column_name = $key_str_array[1]);

           }

        }
        return $id;
    }

     //Code added by Vinod Kumar Pal on 29062020
    public function fileUploadCommonProvider($file_input_name, $table_name, $where_column, $where_value, $folder_path = '/assets/uploads/provider', $file_preffix = 'provider_', $update_column_name = '')
    {

        if (!empty($_FILES[$file_input_name]['name'])) {
            $filePath = getcwd() . '' . $folder_path;
            if (!file_exists($filePath)) {
                mkdir($filePath, 0777, true);
            }

            $uploadPath = $filePath . '/';
            $fileName = $file_preffix . time();
            $Photo_attData = $this->fileUploadProvider($uploadPath, $fileName, $file_input_name);

            if ($Photo_attData['file_name'] != '') {
                if ($update_column_name != '') {
                    $file_input_name = $update_column_name;
                }
                $post_file_data = array(
                    $file_input_name => $Photo_attData['file_name']
                );

                $this->db->where($where_column, $where_value);
                $this->db->update($table_name, $post_file_data);

            }
            return $Photo_attData['file_name'];
            //return '';
        }
        return '';
    }

     public function fileUploadProvider($uploadPath, $fileName, $postfile)
    {

        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = '*';
        $config['file_name'] = $fileName;

        $this->load->library('upload', $config, $fileName);
        $this->$fileName->initialize($config);
        $upload_catalog = $this->$fileName->do_upload($postfile);
        return $return_data = $this->$fileName->data();

    }// end function here


}