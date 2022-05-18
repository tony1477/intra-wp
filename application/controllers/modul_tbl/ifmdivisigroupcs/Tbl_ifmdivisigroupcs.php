<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_ifmdivisigroupcs extends CI_Controller {
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
	function ifshowtbldivisigroup() {
		ifceksessionuser();
		$data = $this->libprocms->ifsqlselect('gdiv_kode, gdiv_nama, gdiv_nama2', 'tbl_ifmdivisigroup','gdiv_kode','ASC');
		$data = array('ardatatemp' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmdivisigroupvw/tbl_ifmdivisigroup_tablevw', $data);
	}

	// *---- Fungsi Untuk Insert Data Record -----* //
	function ifinsertrecord() {
		ifceksessionuser();
		
		$ldtanggal = date('Y-m-d'); 
		$lchostname = gethostname();  // gethostbyaddr($_SERVER['REMOTE_ADDR']);

		if (isset($_POST['submit'])) {
			$losql = $this->db->query("SELECT gdiv_kode FROM tbl_ifmdivisigroup where gdiv_kode='".$this->input->post('txtkode')."'");
			if ($losql->num_rows() > 0) {
				echo "<script>alert('Kode Group Divisi sudah ada, mohon periksa kembali');</script>";
				//echo "<script>alert('Kode Group Divisi sudah ada, mohon periksa kembali'); window.location='app/modul_tbl/ifmprovinsi/view_ifmprovinsi_insert.php';</script>";
				$this->template->load('app/template','app/modul_tbl/ifmdivisigroupvw/tbl_ifmdivisigroup_insertvw');
            } else {
			    $arr = array('gdiv_kode' => $this->input->post('txtkode'),
						     'gdiv_nama' => $this->input->post('txtnama'),
							 'gdiv_nama2' => $this->input->post('txtnama2'),
						     'user_c' => $this->session->user_kode,
						     'tgl_c' => date('Y-m-d'),
							 'time_c' => date("h:i:s a"),
							 'user_m' => $this->session->user_kode,
							 'tgl_m' => date('Y-m-d'),
							 'time_m' => date("h:i:s a"));
				

			    $this->libprocms->ifsqlinsert('tbl_ifmdivisigroup', $arr);
				  
				redirect('modul_tbl/ifmdivisigroupcs/tbl_ifmdivisigroupcs/ifshowtbldivisigroup');
			}

		} else {

				$this->template->load('app/template','app/modul_tbl/ifmdivisigroupvw/tbl_ifmdivisigroup_insertvw');
		}
	}

    // *---- Fungsi Untuk Update Data Record -----* //
	function ifupdaterecord() {
		ifceksessionuser();
		$idkode = $this->uri->segment(5);
		if (isset($_POST['submit'])) {
			$data = array('gdiv_nama' => $this->input->post('txtnama'),
			              'gdiv_nama2' => $this->input->post('txtnama2'),
						  'user_m' => $this->session->user_kode,
						  'tgl_m'=>date('Y-m-d'),
						  'time_m'=>date("h:i:s a"));
	    	$lcwhere = array('gdiv_kode' => $this->input->post('idkode'));
            
			$this->libprocms->ifsqlupdate('tbl_ifmdivisigroup', $data, $lcwhere);
		
			redirect('modul_tbl/ifmdivisigroupcs/tbl_ifmdivisigroupcs/ifshowtbldivisigroup');

		} else {

			$data['row'] = $this->libprocms->ifsqledit('tbl_ifmdivisigroup', array('gdiv_kode' => $idkode))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmdivisigroupvw/tbl_ifmdivisigroup_updatevw', $data);
		}
	}
	
 	function ifdeleterecord() {
		$lcsegment = $this->uri->segment(5);
		$lcwhere = array('gdiv_kode' => $lcsegment);
		$kode = $this->input->post('kode');

		$this->libprocms->ifsqldelete('tbl_ifmdivisigroup', $lcwhere);

		redirect('modul_tbl/ifmdivisigroupcs/tbl_ifmdivisigroupcs/ifshowtbldivisigroup');
	}

}
