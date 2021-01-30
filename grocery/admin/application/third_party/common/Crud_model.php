<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudModel extends CI_Model{
	
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
 public function getCommonData($table_name = 'provider_locations', $column_id_name = 'location_id', $id = null)
    {
        $this->db->select()->from($table_name);
        if ($id != null) {
            $this->db->where($column_id_name, $id);
            // $this->db->where('assign_is_deleted', 0);
        } else {
            $this->db->order_by($column_id_name);
        }
        //echo $this->db->last_query();
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

}