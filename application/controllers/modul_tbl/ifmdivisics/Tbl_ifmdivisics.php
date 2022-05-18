<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_ifmdivisics extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('libprocms');
		$this->load->database();
    }

	// *---- Fungsi Untuk Menampilkan Data -----* //
	function ifshowtbldivisi() {
		ifceksessionuser();
		$data = $this->libprocms->ifsqlselectjoin('tbl_ifmdivisi.div_kode, tbl_ifmdivisi.div_nama, tbl_ifmdivisi.div_nama2, tbl_ifmdivisigroup.gdiv_nama', 'tbl_ifmdivisi', 'tbl_ifmdivisigroup', 'gdiv_kode', 'tbl_ifmdivisigroup.gdiv_nama, tbl_ifmdivisi.div_kode', 'ASC');
		$data = array('ardatatemp' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmdivisivw/tbl_ifmdivisi_tablevw', $data);
	}

	// *---- Fungsi Untuk Insert Data Record -----* //
	function ifinsertrecord() {
		ifceksessionuser();

		if (isset($_POST['submit'])) {
			$losql = $this->db->query("SELECT div_kode FROM tbl_ifmdivisi where div_kode='".$this->input->post('txtkode')."'");
			if ($losql->num_rows() > 0) {
				echo "<script>alert('Kode Divisi sudah ada, mohon periksa kembali');</script>";
				//echo "<script>alert('Kode Group Divisi sudah ada, mohon periksa kembali'); window.location='app/modul_tbl/ifmprovinsi/view_ifmprovinsi_insert.php';</script>";

				$arr = $this->libprocms->ifsqlselect('gdiv_kode, gdiv_nama','tbl_ifmdivisigroup','gdiv_kode','ASC');
				$arr = array('ardatatemp' => $arr);
		
				$this->template->load('app/template','app/modul_tbl/ifmdivisivw/tbl_ifmdivisi_insertvw', $arr);
            } else {
			    $arr = array('div_kode' => $this->input->post('txtkode'),
						     'div_nama' => $this->input->post('txtnama'),
							 'div_nama2' => $this->input->post('txtnama2'),
							 'gdiv_kode' => $this->input->post('cmbgroup'),
						     'user_c' => $this->session->user_kode,
						     'tgl_c' => date('Y-m-d'),
							 'time_c' => date("h:i:s a"),
							 'user_m' => $this->session->user_kode,
							 'tgl_m' => date('Y-m-d'),
							 'time_m' => date("h:i:s a"));

			    $this->libprocms->ifsqlinsert('tbl_ifmdivisi', $arr);
				  
				redirect('modul_tbl/ifmdivisics/tbl_ifmdivisics/ifshowtbldivisi');
			}

		} else {

			    $arr = $this->libprocms->ifsqlselect('gdiv_kode, gdiv_nama','tbl_ifmdivisigroup','gdiv_kode','ASC');
			    $arr = array('ardatatemp' => $arr);

				$this->template->load('app/template','app/modul_tbl/ifmdivisivw/tbl_ifmdivisi_insertvw', $arr);
		}
	}

    // *---- Fungsi Untuk Update Data Record -----* //
	function ifupdaterecord() {
		ifceksessionuser();
		$idkode = $this->uri->segment(5);
		if (isset($_POST['submit'])) {
			$arr = array('div_nama' => $this->input->post('txtnama'),
			              'div_nama2' => $this->input->post('txtnama2'),
						  'gdiv_kode' => $this->input->post('cmbgroup'),
						  'user_m' => $this->session->user_kode,
						  'tgl_m'=>date('Y-m-d'),
						  'time_m'=>date("h:i:s a"));
	    	$lcwhere = array('div_kode' => $this->input->post('idkode'));
            
			$this->libprocms->ifsqlupdate('tbl_ifmdivisi', $arr, $lcwhere);

			redirect('modul_tbl/ifmdivisics/tbl_ifmdivisics/ifshowtbldivisi');

		} else {

			$arr = $this->libprocms->ifsqlselect('gdiv_kode, gdiv_nama','tbl_ifmdivisigroup','gdiv_kode','ASC');
			$arr = array('ardatatemp' => $arr);
			$arr['row'] = $this->libprocms->ifsqledit('tbl_ifmdivisi', array('div_kode' => $idkode))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmdivisivw/tbl_ifmdivisi_updatevw', $arr);
		}
	}
	
 	function ifdeleterecord() {
		$lcsegment = $this->uri->segment(5);
		$lcwhere = array('div_kode' => $lcsegment);
		$kode = $this->input->post('txtkode');

		$this->libprocms->ifsqldelete('tbl_ifmdivisi', $lcwhere);

		redirect('modul_tbl/ifmdivisics/tbl_ifmdivisics/ifshowtbldivisi');
	}

}
