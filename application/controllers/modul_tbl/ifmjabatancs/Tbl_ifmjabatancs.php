<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_ifmjabatancs extends CI_Controller {
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
	function ifshowtbljabatan() {
		ifceksessionuser();
		$data = $this->libprocms->ifsqlselect('jab_kode, jab_nama, jab_nama2', 'tbl_ifmjabatan','jab_kode','ASC');
		$data = array('ardatatemp' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmjabatanvw/tbl_ifmjabatan_tablevw', $data);
	}

	// *---- Fungsi Untuk Insert Data Record -----* //
	function ifinsertrecord() {
		ifceksessionuser();
		
		$ldtanggal = date('Y-m-d'); 
		$lchostname = gethostname();  // gethostbyaddr($_SERVER['REMOTE_ADDR']);

		if (isset($_POST['submit'])) {
			$losql = $this->db->query("SELECT jab_kode FROM tbl_ifmjabatan where jab_kode='".$this->input->post('txtkode')."'");
			if ($losql->num_rows() > 0) {
				echo "<script>alert('Kode Jabatan sudah ada, mohon periksa kembali');</script>";
				//echo "<script>alert('Kode Group Divisi sudah ada, mohon periksa kembali'); window.location='app/modul_tbl/ifmprovinsi/view_ifmprovinsi_insert.php';</script>";
				$this->template->load('app/template','app/modul_tbl/ifmjabatanvw/tbl_ifmjabatan_insertvw');
            } else {
			    $arr = array('jab_kode' => $this->input->post('txtkode'),
						     'jab_nama' => $this->input->post('txtnama'),
							 'jab_nama2' => $this->input->post('txtnama2'),
						     'user_c' => $this->session->user_kode,
						     'tgl_c' => date('Y-m-d'),
							 'time_c' => date("h:i:s a"),
							 'user_m' => $this->session->user_kode,
							 'tgl_m' => date('Y-m-d'),
							 'time_m' => date("h:i:s a"));
				
			    $this->libprocms->ifsqlinsert('tbl_ifmjabatan', $arr);
				  
				redirect('modul_tbl/ifmjabatancs/tbl_ifmjabatancs/ifshowtbljabatan');
			}

		} else {

				$this->template->load('app/template','app/modul_tbl/ifmjabatanvw/tbl_ifmjabatan_insertvw');
		}
	}

    // *---- Fungsi Untuk Update Data Record -----* //
	function ifupdaterecord() {
		ifceksessionuser();
		$idkode = $this->uri->segment(5);
		if (isset($_POST['submit'])) {
			$data = array('jab_nama' => $this->input->post('txtnama'),
			              'jab_nama2' => $this->input->post('txtnama2'),
						  'user_m' => $this->session->user_kode,
						  'tgl_m'=>date('Y-m-d'),
						  'time_m'=>date("h:i:s a"));
	    	$lcwhere = array('jab_kode' => $this->input->post('idkode'));
            
			$this->libprocms->ifsqlupdate('tbl_ifmjabatan', $data, $lcwhere);
		
			redirect('modul_tbl/ifmjabatancs/tbl_ifmjabatancs/ifshowtbljabatan');

		} else {

			$data['row'] = $this->libprocms->ifsqledit('tbl_ifmjabatan', array('jab_kode' => $idkode))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmjabatanvw/tbl_ifmjabatan_updatevw', $data);
		}
	}
	
 	function ifdeleterecord() {
		$lcsegment = $this->uri->segment(5);
		$lcwhere = array('jab_kode' => $lcsegment);
		$kode = $this->input->post('kode');

		$tsql1 = $this->libprocms->ifsqldelete('tbl_ifmjabatan', $lcwhere);

		redirect('modul_tbl/ifmjabatancs/tbl_ifmjabatancs/ifshowtbljabatan');
	}

}
