<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_ifmdepartemencs extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('libprocms');
		$this->load->database();
    }

	// *---- Fungsi Untuk Menampilkan Data -----* //
	function ifshowtbldepartemen() {
		ifceksessionuser();
		$data = $this->libprocms->ifsqlselectjoin('tbl_ifmdepartemen.dep_kode, tbl_ifmdepartemen.dep_nama, tbl_ifmdepartemen.dep_nama2, tbl_ifmdivisi.div_nama', 'tbl_ifmdepartemen', 'tbl_ifmdivisi', 'div_kode', 'tbl_ifmdepartemen.dep_kode', 'ASC');
		$data = array('ardatatemp' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmdepartemenvw/tbl_ifmdepartemen_tablevw', $data);
	}

	// *---- Fungsi Untuk Insert Data Record -----* //
	function ifinsertrecord() {
		ifceksessionuser();

		if (isset($_POST['submit'])) {
			$losql = $this->db->query("SELECT dep_kode FROM tbl_ifmdepartemen where dep_kode='".$this->input->post('txtkode')."'");
			if ($losql->num_rows() > 0) {
				echo "<script>alert('Kode Departemen sudah ada, mohon periksa kembali');</script>";
				//echo "<script>alert('Kode Group Divisi sudah ada, mohon periksa kembali'); window.location='app/modul_tbl/ifmprovinsi/view_ifmprovinsi_insert.php';</script>";

				$arr = $this->libprocms->ifsqlselect('div_kode, div_nama','tbl_ifmdivisi','div_kode','ASC');
				$arr = array('ardatatemp' => $arr);
		
				$this->template->load('app/template','app/modul_tbl/ifmdepartemenvw/tbl_ifmdepartemen_insertvw', $arr);
            } else {
			    $arr = array('dep_kode' => $this->input->post('txtkode'),
						     'dep_nama' => $this->input->post('txtnama'),
							 'dep_nama2' => $this->input->post('txtnama2'),
							 'div_kode' => $this->input->post('cmbgroup'),
						     'user_c' => $this->session->user_kode,
						     'tgl_c' => date('Y-m-d'),
							 'time_c' => date("h:i:s a"),
							 'user_m' => $this->session->user_kode,
							 'tgl_m' => date('Y-m-d'),
							 'time_m' => date("h:i:s a"));
				
			    $this->libprocms->ifsqlinsert('tbl_ifmdepartemen', $arr);

				redirect('modul_tbl/ifmdepartemencs/tbl_ifmdepartemencs/ifshowtbldepartemen');
			}

		} else {

			    $arr = $this->libprocms->ifsqlselect('div_kode, div_nama','tbl_ifmdivisi','div_kode','ASC');
			    $arr = array('ardatatemp' => $arr);

				$this->template->load('app/template','app/modul_tbl/ifmdepartemenvw/tbl_ifmdepartemen_insertvw', $arr);
		}
	}

    // *---- Fungsi Untuk Update Data Record -----* //
	function ifupdaterecord() {
		ifceksessionuser();
		$idkode = $this->uri->segment(5);
		if (isset($_POST['submit'])) {
			$arr = array('dep_nama' => $this->input->post('txtnama'),
			              'dep_nama2' => $this->input->post('txtnama2'),
						  'div_kode' => $this->input->post('cmbgroup'),
						  'user_m' => $this->session->user_kode,
						  'tgl_m'=>date('Y-m-d'),
						  'time_m'=>date("h:i:s a"));
	    	$lcwhere = array('dep_kode' => $this->input->post('idkode'));

			$this->libprocms->ifsqlupdate('tbl_ifmdepartemen', $arr, $lcwhere);
		
			redirect('modul_tbl/ifmdepartemencs/tbl_ifmdepartemencs/ifshowtbldepartemen');

		} else {

			$arr = $this->libprocms->ifsqlselect('div_kode, div_nama','tbl_ifmdivisi','div_kode','ASC');
			$arr = array('ardatatemp' => $arr);
			$arr['row'] = $this->libprocms->ifsqledit('tbl_ifmdepartemen', array('dep_kode' => $idkode))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmdepartemenvw/tbl_ifmdepartemen_updatevw', $arr);
		}
	}
	
 	function ifdeleterecord() {
		$lcsegment = $this->uri->segment(5);
		$lcwhere = array('dep_kode' => $lcsegment);
		$kode = $this->input->post('txtkode');

		$this->libprocms->ifsqldelete('tbl_ifmdepartemen', $lcwhere);
        
		redirect('modul_tbl/ifmdepartemencs/tbl_ifmdepartemencs/ifshowtbldepartemen');
	}

}
