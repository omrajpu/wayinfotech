<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping_model extends CI_Model{
	
 public function getDirectQueryCommonData($sqlquery)
    {
        if ($sqlquery != '') {
            $results = $this->db->query($sqlquery);
            return $results->result_array();
        } else {
            return false;
        }
    }



}