<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_ifmkaryawancs extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('libprocms');
		$this->load->database();
    }

	// *---- Fungsi Untuk Menampilkan Data -----* //
	function ifshowtblkaryawan() {
		ifceksessionuser();
		$data = $this->libprocms->ifsqlselectjoin2tabel('tbl_ifmkaryawan.kry_nik, tbl_ifmkaryawan.kry_nama, tbl_ifmdepartemen.dep_nama, tbl_ifmjabatan.jab_nama, tbl_ifmkaryawan.user_kode, tbl_ifmkaryawan.kry_status', 'tbl_ifmkaryawan', 'tbl_ifmdepartemen', 'tbl_ifmjabatan', 'dep_kode', 'jab_kode', 'tbl_ifmdepartemen.dep_nama, tbl_ifmkaryawan.kry_nik', 'ASC');
		$data = array('ardatatemp' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmkaryawanvw/tbl_ifmkaryawan_tablevw', $data);
	}

	// *---- Fungsi Untuk Insert Data Record -----* //
	function ifinsertrecord() {
		ifceksessionuser();

		if (isset($_POST['submit'])) {
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['upload_path'] = 'ifassetadm/imgkaryawan/';
			$config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);

			$losql = $this->db->query("SELECT kry_nik FROM tbl_ifmkaryawan where kry_nik ='".$this->input->post('txtkode')."'");
			if ($losql->num_rows() > 0) {
				echo "<script>alert('Nomor induk sudah ada, mohon periksa kembali');</script>";
				//echo "<script>alert('Kode Group Divisi sudah ada, mohon periksa kembali'); window.location='app/modul_tbl/ifmprovinsi/view_ifmprovinsi_insert.php';</script>";

				$arr['arjabatan'] = $this->libprocms->ifsqlselect('jab_kode, jab_nama','tbl_ifmjabatan','jab_kode','ASC');
				$arr['aruser'] = $this->libprocms->ifsqlselect('user_kode, user_nama','tbl_ifmuser','user_kode','ASC');
		
				$this->template->load('app/template','app/modul_tbl/ifmkaryawanvw/tbl_ifmkaryawan_insertvw', $arr);

			} else {

				if ($this->upload->do_upload('txtgambar')) { 
					$lccekgambar = $this->upload->data();

					$arr = array('kry_nik' => $this->db->escape_str($this->input->post('txtkode')),
						         'kry_nama' => $this->db->escape_str($this->input->post('txtnama')),
								 'jab_kode' =>  $this->db->escape_str($this->input->post('cmbjabatan')),
								 'user_kode' =>  $this->db->escape_str($this->input->post('cmbuser')),
								 'kry_status' =>  $this->db->escape_str($this->input->post('optstatus')),
								 'kry_fhoto' => $lccekgambar['file_name'],
								 'user_c' => $this->session->user_kode,
								 'user_m' => $this->session->user_kode,
								 'tgl_c'=>date('Y-m-d'),
								 'tgl_m'=>date('Y-m-d'),
								 'time_c'=>date("h:i:s a"),
								 'time_m'=>date("h:i:s a"));
				} else {

					$arr = array('kry_nik' => $this->db->escape_str($this->input->post('txtkode')),
						         'kry_nama' => $this->db->escape_str($this->input->post('txtnama')),
								 'jab_kode' =>  $this->db->escape_str($this->input->post('cmbjabatan')),
								 'user_kode' =>  $this->db->escape_str($this->input->post('cmbuser')),
								 'kry_status' =>  $this->db->escape_str($this->input->post('optstatus')),
								 'kry_fhoto' => ' ',
								 'user_c' => $this->session->user_kode,
								 'user_m' => $this->session->user_kode,
								 'tgl_c'=>date('Y-m-d'),
								 'tgl_m'=>date('Y-m-d'),
								 'time_c'=>date("h:i:s a"),
								 'time_m'=>date("h:i:s a"));
				}

			    $this->libprocms->ifsqlinsert('tbl_ifmkaryawan', $arr);

				redirect('modul_tbl/ifmkaryawancs/tbl_ifmkaryawancs/ifshowtblkaryawan');
			}

		} else {

				$arr['arjabatan'] = $this->libprocms->ifsqlselect('jab_kode, jab_nama','tbl_ifmjabatan','jab_kode','ASC');
				$arr['aruser'] = $this->libprocms->ifsqlselect('user_kode, user_nama','tbl_ifmuser','user_kode','ASC');

				$this->template->load('app/template','app/modul_tbl/ifmkaryawanvw/tbl_ifmkaryawan_insertvw', $arr);
		}
	}

    // *---- Fungsi Untuk Update Data Record -----* //
	function ifupdaterecord() {
		ifceksessionuser();
		$idkode = $this->uri->segment(5);
		if (isset($_POST['submit'])) {
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';            
			$config['upload_path'] = './ifassetadm/imgkaryawan/';				
			$config['max_size'] = '1000'; // kb			
            $this->load->library('upload', $config);
            $this->upload->do_upload('txtfile');
			$lccekgambar = $this->upload->data();

			if ($lccekgambar['file_name']=='') {

				$arr = array('kry_nik' => $this->db->escape_str($this->input->post('txtkode')),
							 'kry_nama' => $this->db->escape_str($this->input->post('txtnama')),
							 'jab_kode' =>  $this->db->escape_str($this->input->post('cmbjabatan')),
							 'user_kode' =>  $this->db->escape_str($this->input->post('cmbuser')),
							 'kry_status' =>  $this->db->escape_str($this->input->post('optstatus')),
							 'kry_fhoto' => $lccekgambar['file_name'],
						     'user_c' => $this->session->user_kode,
							 'user_m' => $this->session->user_kode,
							 'tgl_c'=>date('Y-m-d'),
							 'tgl_m'=>date('Y-m-d'),
							 'time_c'=>date("h:i:s a"),
							 'time_m'=>date("h:i:s a"));

			} else {
                
				if ($lccekgambar['file_name']!='') {

					$arr = array('kry_nik' => $this->db->escape_str($this->input->post('txtkode')),
								 'kry_nama' => $this->db->escape_str($this->input->post('txtnama')),
								 'jab_kode' =>  $this->db->escape_str($this->input->post('cmbjabatan')),
								 'user_kode' =>  $this->db->escape_str($this->input->post('cmbuser')),
								 'kry_status' =>  $this->db->escape_str($this->input->post('optstatus')),
								 'kry_fhoto' => $lccekgambar['file_name'],
								 'user_c' => $this->session->user_kode,
								 'user_m' => $this->session->user_kode,
								 'tgl_c'=>date('Y-m-d'),
								 'tgl_m'=>date('Y-m-d'),
								 'time_c'=>date("h:i:s a"),
								 'time_m'=>date("h:i:s a"));

				} else {

					$arr = array('kry_nik' => $this->db->escape_str($this->input->post('txtkode')),
								 'kry_nama' => $this->db->escape_str($this->input->post('txtnama')),
								 'jab_kode' =>  $this->db->escape_str($this->input->post('cmbjabatan')),
								 'user_kode' =>  $this->db->escape_str($this->input->post('cmbuser')),
								 'kry_status' =>  $this->db->escape_str($this->input->post('optstatus')),
								 'kry_fhoto' => $lccekgambar['file_name'],
								 'user_c' => $this->session->user_kode,
								 'user_m' => $this->session->user_kode,
								 'tgl_c'=>date('Y-m-d'),
								 'tgl_m'=>date('Y-m-d'),
								 'time_c'=>date("h:i:s a"),
								 'time_m'=>date("h:i:s a"));
				}
			}

	    	$lcwhere = array('kry_nik' => $this->input->post('idkode'));
            
			$this->libprocms->ifsqlupdate('tbl_ifmkaryawan', $arr, $lcwhere);
		
			redirect('modul_tbl/ifmkaryawancs/tbl_ifmkaryawancs/ifshowtblkaryawan');

		} else {

			$arr['arjabatan'] = $this->libprocms->ifsqlselect('jab_kode, jab_nama','tbl_ifmjabatan','jab_kode','ASC');
			$arr['aruser'] = $this->libprocms->ifsqlselect('user_kode, user_nama','tbl_ifmuser','user_kode','ASC');

			$arr['row'] = $this->libprocms->ifsqledit('tbl_ifmkaryawan', array('kry_nik' => $idkode))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmkaryawanvw/tbl_ifmkaryawan_updatevw', $arr);
		}
	}
	
 	function ifdeleterecord() {
		$lcsegment = $this->uri->segment(5);
		$lcwhere = array('kry_nik' => $lcsegment);

		$this->libprocms->ifsqldelete('tbl_ifmkaryawan', $lcwhere);
		
		redirect('modul_tbl/ifmkaryawancs/tbl_ifmkaryawancs/ifshowtblkaryawan');
	}


}
