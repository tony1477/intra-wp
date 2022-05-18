<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpo_ifmkategorics extends CI_Controller {
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
	function ifshowbpokategori() {
		ifceksessionuser();
		$data = $this->libprocms->ifsqlselect('kat_kode, kat_nama, kat_nama2', 'sop_ifmkategori','kat_kode','ASC');
		$data = array('ardatatemp' => $data);
		$this->template->load('app/template','app/modul_bpo/ifmdokumensopvw/bpo_ifmkategori_tablevw', $data);
	}

	// *---- Fungsi Untuk Insert Data Record -----* //
	function ifinsertrecord() {
		ifceksessionuser();
		
		$ldtanggal = date('Y-m-d'); 
		$lchostname = gethostname();  // gethostbyaddr($_SERVER['REMOTE_ADDR']);

		if (isset($_POST['submit'])) {
			$losql = $this->db->query("SELECT kat_kode FROM sop_ifmkategori where kat_kode='".$this->input->post('txtkode')."'");
			if ($losql->num_rows() > 0) {
				echo "<script>alert('Kode Kategori sudah ada, mohon periksa kembali');</script>";
				//echo "<script>alert('Kode Group Divisi sudah ada, mohon periksa kembali'); window.location='app/modul_tbl/ifmprovinsi/view_ifmprovinsi_insert.php';</script>";
				$this->template->load('app/template','app/modul_bpo/ifmdokumensopvw/bpo_ifmkategori_insertvw');
            } else {
			    $arr = array('kat_kode' => $this->input->post('txtkode'),
						     'kat_nama' => $this->input->post('txtnama'),
							 'kat_nama2' => $this->input->post('txtnama2'),
						     'user_c' => $this->session->user_kode,
						     'tgl_c' => date('Y-m-d'),
							 'time_c' => date("h:i:s a"),
							 'user_m' => $this->session->user_kode,
							 'tgl_m' => date('Y-m-d'),
							 'time_m' => date("h:i:s a"));
				
			    $this->libprocms->ifsqlinsert('sop_ifmkategori', $arr);
				  
				redirect('modul_bpo/ifmdokumensopcs/bpo_ifmkategorics/ifshowbpokategori');
			}

		} else {

				$this->template->load('app/template','app/modul_bpo/ifmdokumensopvw/bpo_ifmkategori_insertvw');
		}
	}

    // *---- Fungsi Untuk Update Data Record -----* //
	function ifupdaterecord() {
		ifceksessionuser();
		$idkode = $this->uri->segment(5);
		if (isset($_POST['submit'])) {
			$data = array('kat_nama' => $this->input->post('txtnama'),
			              'kat_nama2' => $this->input->post('txtnama2'),
						  'user_m' => $this->session->user_kode,
						  'tgl_m'=>date('Y-m-d'),
						  'time_m'=>date("h:i:s a"));
	    	$lcwhere = array('kat_kode' => $this->input->post('idkode'));
            
			$this->libprocms->ifsqlupdate('sop_ifmkategori', $data, $lcwhere);
		
			redirect('modul_bpo/ifmdokumensopcs/bpo_ifmkategorics/ifshowbpokategori');

		} else {

			$data['row'] = $this->libprocms->ifsqledit('sop_ifmkategori', array('kat_kode' => $idkode))->row_array();
			$this->template->load('app/template','app/modul_bpo/ifmdokumensopvw/bpo_ifmkategori_updatevw', $data);
		}
	}
	
 	function ifdeleterecord() {
		$lcsegment = $this->uri->segment(5);
		$lcwhere = array('kat_kode' => $lcsegment);

        $llresult = $this->libprocms->ifsqldelete('sop_ifmkategori', $lcwhere);
        if ($llresult) {
            echo "<script>alert('Sukses hapus data');</script>";
            redirect('modul_bpo/ifmdokumensopcs/bpo_ifmkategorics/ifshowbpokategori');
        } else {
            echo "<script>alert('Gagal hapus data');</script>";
            redirect('modul_bpo/ifmdokumensopcs/bpo_ifmkategorics/ifshowbpokategori');
            //print_r($llresult);
        }
	}

}
