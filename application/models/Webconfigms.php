<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webconfigms extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
		
	public function ifsqlselectlisting() {
		$this->db->select('*');
		$this->db->from('uti_configweb');
		$this->db->order_by('id_config', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}
		
	public function ifsqlselectdetail($id_config) {
		$this->db->select('*');
		$this->db->from('uti_configweb');
		$this->db->where('id_config', $id_config);
		$this->db->order_by('id_config', 'DESC');
		$query = $this->db->get();
		return $query->row_array();
	}
		
	public function ifsqlinsertconfig($data) {
		$this->db->insert('uti_configweb', $data);
	}
		
	public function ifsqlupdateconfig($data) {
		$this->db->where('id_config', $data['id_config']);
		$this->db->update('uti_configweb', $data);
	}
		
	public function ifcheckrecord($id_config) {
		$query = $this->db->get_where('produk', array('id_config' => $id_config));
		return $query->num_rows();
	}
		
	public function ifsqldeleteconfig($data) {
		$this->db->where('id_config', $data['id_config']);
		$this->db->delete('uti_configweb', $data);
	}
}