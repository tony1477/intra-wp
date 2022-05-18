<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
    class Model_exportexcel extends CI_Model {
 
        public function __construct()
        {
            $this->load->database();
        }
        
        public function exportList() {
            $this->db->select(array('id', 'first_name', 'last_name', 'email', 'dob', 'contact_no'));
            $this->db->from('import');
            $query = $this->db->get();
            return $query->result();
        }
    }
?>