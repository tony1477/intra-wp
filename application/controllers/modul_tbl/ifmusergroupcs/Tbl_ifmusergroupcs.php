<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_ifmusergroupcs extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('libprocms');
		$this->load->database();
		//$this->load->library('form_validation');
        //$this->load->helper('form');
		//$this->load->library('pdf');		
		//$this->load->model('modul_tbl/ifmdivisi/tbl_ifmdivisims');
    }

	// *---- Fungsi Untuk Menampilkan Data -----* //
	function ifshowtblusergroup() {
		ifceksessionuser();
		$data = $this->libprocms->ifsqlselect('guser_kode, guser_nama, guser_nama2', 'tbl_ifmusergroup','guser_kode','ASC');
		$data = array('ardatatemp' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmusergroupvw/tbl_ifmusergroup_tablevw', $data);
	}

	// *---- Fungsi Untuk Insert Data Record -----* //
	function ifinsertrecord() {
		ifceksessionuser();
		
		$ldtanggal = date('Y-m-d'); 
		$lchostname = gethostname();  // gethostbyaddr($_SERVER['REMOTE_ADDR']);

		if (isset($_POST['submit'])) {
			$losql = $this->db->query("SELECT guser_kode FROM tbl_ifmusergroup where guser_kode='".$this->input->post('txtkode')."'");
			if ($losql->num_rows() > 0) {
				echo "<script>alert('Kode Group User sudah ada, mohon periksa kembali');</script>";
				//echo "<script>alert('Kode Group Divisi sudah ada, mohon periksa kembali'); window.location='app/modul_tbl/ifmprovinsi/view_ifmprovinsi_insert.php';</script>";
				$this->template->load('app/template','app/modul_tbl/ifmusergroupvw/tbl_ifmusergroup_insertvw');
            } else {
			    $arr = array('guser_kode' => $this->input->post('txtkode'),
						     'guser_nama' => $this->input->post('txtnama'),
							 'guser_nama2' => $this->input->post('txtnama2'),
						     'user_c' => $this->session->user_kode,
						     'tgl_c' => date('Y-m-d'),
							 'time_c' => date("h:i:s a"),
							 'user_m' => $this->session->user_kode,
							 'tgl_m' => date('Y-m-d'),
							 'time_m' => date("h:i:s a"));
				
			    $this->libprocms->ifsqlinsert('tbl_ifmusergroup', $arr);

				redirect('modul_tbl/ifmusergroupcs/tbl_ifmusergroupcs/ifshowtblusergroup');
			}

		} else {

				$this->template->load('app/template','app/modul_tbl/ifmusergroupvw/tbl_ifmusergroup_insertvw');
		}
	}

    // *---- Fungsi Untuk Update Data Record -----* //
	function ifupdaterecord() {
		ifceksessionuser();
		$idkode = rawurldecode($this->uri->segment(5));
		//$idkode = ifstriptags(str_replace(' ',', ', $this->uri->segment(5)));

		echo "<script>alert($idkode);</script>";
		if (isset($_POST['submit'])) {
			$data = array('guser_nama' => $this->input->post('txtnama'),
			              'guser_nama2' => $this->input->post('txtnama2'),
						  'user_m' => $this->session->user_kode,
						  'tgl_m'=>date('Y-m-d'),
						  'time_m'=>date("h:i:s a"));
	    	$lcwhere = array('guser_kode' => $this->input->post('idkode'));
            
			$this->libprocms->ifsqlupdate('tbl_ifmusergroup', $data, $lcwhere);
		
			redirect('modul_tbl/ifmusergroupcs/tbl_ifmusergroupcs/ifshowtblusergroup');

		} else {

			$data['row'] = $this->libprocms->ifsqledit('tbl_ifmusergroup', array('guser_kode' => $idkode))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmusergroupvw/tbl_ifmusergroup_updatevw', $data);
		}
	}
	
 	function ifdeleterecord() {
		$lcsegment = rawurldecode($this->uri->segment(5));		
		$lcwhere = array('guser_kode' => $lcsegment);
		$kode = $this->input->post('kode');

		$this->libprocms->ifsqldelete('tbl_ifmusergroup', $lcwhere);

		redirect('modul_tbl/ifmusergroupcs/tbl_ifmusergroupcs/ifshowtblusergroup');
	}

}
