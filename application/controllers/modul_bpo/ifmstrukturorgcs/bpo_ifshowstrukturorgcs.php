<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpo_ifshowstrukturorgcs extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('libprocms');
		$this->load->database();
    }
	
	// *---- Fungsi Untuk Menampilkan Data Struktur Organisasi Group -----* //
	function ifshowviewstrukturorgdefault() {
		$lnsqlnumrows = $this->libprocms->ifsqldbgetwhere('stg_kode, stg_nama, stg_nama2, dep_kode, stg_nmfile, stg_cover, stg_default, ', 'sop_ifmstrukturorg', 'stg_default', 'Y');
		if ($lnsqlnumrows->num_rows() <= 0 ) {
			redirect('modul_bpo/ifmstrukturorgcs/bpo_ifshowstrukturorgcs/ifshowviewstrukturorgdefault');
		} else {
			$row = $lnsqlnumrows->row_array();
			$data['arstg_kode'] = ifstriptags($row['stg_kode']);			
			$data['arstg_nama'] = ifstriptags(str_replace(' ',', ',$row['stg_nama']));
			$data['arstg_nama2'] = ifstriptags($row['stg_nama2']);
			$data['ardep_kode'] = ifstriptags($row['dep_kode']);
			$data['arstg_nmfile'] = ifstriptags($row['stg_nmfile']);
			$data['arstg_cover'] = ifstriptags($row['stg_cover']);
			$data['arstg_default'] = ifstriptags($row['stg_default']);
			$data['rows'] = $row;
			$this->template->load('app/templatebpo','app/modul_bpo/ifmstrukturorgvw/bpo_ifshowstrukturorg_displayvw', $data);
		}
	}

	// *---- Fungsi Untuk Menampilkan Data Struktur Organisasi Management -----* //
	function ifshowviewstrukturorgmgm() {
		$lnsqlnumrows = $this->libprocms->ifsqldbgetwhere2key('stg_kode, stg_nama, stg_nama2, dep_kode, stg_nmfile, stg_cover, stg_default, ', 'sop_ifmstrukturorg', 'dep_kode', '01', 'stg_default', 'N');
		if ($lnsqlnumrows->num_rows() <= 0 ) {
			redirect('modul_bpo/ifmstrukturorgcs/bpo_ifshowstrukturorgcs/ifshowviewstrukturorgmgm');
		} else {
			$row = $lnsqlnumrows->row_array();
			$data['arstg_kode'] = ifstriptags($row['stg_kode']);			
			$data['arstg_nama'] = ifstriptags(str_replace(' ',', ',$row['stg_nama']));
			$data['arstg_nama2'] = ifstriptags($row['stg_nama2']);
			$data['ardep_kode'] = ifstriptags($row['dep_kode']);
			$data['arstg_nmfile'] = ifstriptags($row['stg_nmfile']);
			$data['arstg_cover'] = ifstriptags($row['stg_cover']);
			$data['arstg_default'] = ifstriptags($row['stg_default']);
			$data['rows'] = $row;
			$this->template->load('app/templatebpo','app/modul_bpo/ifmstrukturorgvw/bpo_ifshowstrukturorg_displayvw', $data);
		}
	}	

	// *---- Fungsi Untuk Menampilkan Data Struktur Organisasi IA & CC -----* //
	function ifshowviewstrukturorgiacc() {
		$lnsqlnumrows = $this->libprocms->ifsqldbgetwhere2key('stg_kode, stg_nama, stg_nama2, dep_kode, stg_nmfile, stg_cover, stg_default, ', 'sop_ifmstrukturorg', 'dep_kode', '02', 'stg_default', 'N');
		if ($lnsqlnumrows->num_rows() <= 0 ) {
			redirect('modul_bpo/ifmstrukturorgcs/bpo_ifshowstrukturorgcs/ifshowviewstrukturorgmgm');
		} else {
			$row = $lnsqlnumrows->row_array();
			$data['arstg_kode'] = ifstriptags($row['stg_kode']);			
			$data['arstg_nama'] = ifstriptags(str_replace(' ',', ',$row['stg_nama']));
			$data['arstg_nama2'] = ifstriptags($row['stg_nama2']);
			$data['ardep_kode'] = ifstriptags($row['dep_kode']);
			$data['arstg_nmfile'] = ifstriptags($row['stg_nmfile']);
			$data['arstg_cover'] = ifstriptags($row['stg_cover']);
			$data['arstg_default'] = ifstriptags($row['stg_default']);
			$data['rows'] = $row;
			$this->template->load('app/templatebpo','app/modul_bpo/ifmstrukturorgvw/bpo_ifshowstrukturorg_displayvw', $data);
		}
	}	

	// *---- Fungsi Untuk Menampilkan Data Struktur Organisasi HRGA -----* //
	function ifshowviewstrukturorghrga() {
		$lnsqlnumrows = $this->libprocms->ifsqldbgetwhere2key('stg_kode, stg_nama, stg_nama2, dep_kode, stg_nmfile, stg_cover, stg_default, ', 'sop_ifmstrukturorg', 'dep_kode', '03', 'stg_default', 'N');
		if ($lnsqlnumrows->num_rows() <= 0 ) {
			redirect('modul_bpo/ifmstrukturorgcs/bpo_ifshowstrukturorgcs/ifshowviewstrukturorgmgm');
		} else {
			$row = $lnsqlnumrows->row_array();
			$data['arstg_kode'] = ifstriptags($row['stg_kode']);			
			$data['arstg_nama'] = ifstriptags(str_replace(' ',', ',$row['stg_nama']));
			$data['arstg_nama2'] = ifstriptags($row['stg_nama2']);
			$data['ardep_kode'] = ifstriptags($row['dep_kode']);
			$data['arstg_nmfile'] = ifstriptags($row['stg_nmfile']);
			$data['arstg_cover'] = ifstriptags($row['stg_cover']);
			$data['arstg_default'] = ifstriptags($row['stg_default']);
			$data['rows'] = $row;
			$this->template->load('app/templatebpo','app/modul_bpo/ifmstrukturorgvw/bpo_ifshowstrukturorg_displayvw', $data);
		}
	}	

	// *---- Fungsi Untuk Menampilkan Data Struktur Organisasi Finance & Accounting -----* //
	function ifshowviewstrukturorgfinacc() {
		$lnsqlnumrows = $this->libprocms->ifsqldbgetwhere2key('stg_kode, stg_nama, stg_nama2, dep_kode, stg_nmfile, stg_cover, stg_default, ', 'sop_ifmstrukturorg', 'dep_kode', '04', 'stg_default', 'N');
		if ($lnsqlnumrows->num_rows() <= 0 ) {
			redirect('modul_bpo/ifmstrukturorgcs/bpo_ifshowstrukturorgcs/ifshowviewstrukturorgmgm');
		} else {
			$row = $lnsqlnumrows->row_array();
			$data['arstg_kode'] = ifstriptags($row['stg_kode']);			
			$data['arstg_nama'] = ifstriptags(str_replace(' ',', ',$row['stg_nama']));
			$data['arstg_nama2'] = ifstriptags($row['stg_nama2']);
			$data['ardep_kode'] = ifstriptags($row['dep_kode']);
			$data['arstg_nmfile'] = ifstriptags($row['stg_nmfile']);
			$data['arstg_cover'] = ifstriptags($row['stg_cover']);
			$data['arstg_default'] = ifstriptags($row['stg_default']);
			$data['rows'] = $row;
			$this->template->load('app/templatebpo','app/modul_bpo/ifmstrukturorgvw/bpo_ifshowstrukturorg_displayvw', $data);
		}
	}	

	// *---- Fungsi Untuk Menampilkan Data Struktur Organisasi Legal -----* //
	function ifshowviewstrukturorglegal() {
		$lnsqlnumrows = $this->libprocms->ifsqldbgetwhere2key('stg_kode, stg_nama, stg_nama2, dep_kode, stg_nmfile, stg_cover, stg_default, ', 'sop_ifmstrukturorg', 'dep_kode', '05', 'stg_default', 'N');
		if ($lnsqlnumrows->num_rows() <= 0 ) {
			redirect('modul_bpo/ifmstrukturorgcs/bpo_ifshowstrukturorgcs/ifshowviewstrukturorgmgm');
		} else {
			$row = $lnsqlnumrows->row_array();
			$data['arstg_kode'] = ifstriptags($row['stg_kode']);			
			$data['arstg_nama'] = ifstriptags(str_replace(' ',', ',$row['stg_nama']));
			$data['arstg_nama2'] = ifstriptags($row['stg_nama2']);
			$data['ardep_kode'] = ifstriptags($row['dep_kode']);
			$data['arstg_nmfile'] = ifstriptags($row['stg_nmfile']);
			$data['arstg_cover'] = ifstriptags($row['stg_cover']);
			$data['arstg_default'] = ifstriptags($row['stg_default']);
			$data['rows'] = $row;
			$this->template->load('app/templatebpo','app/modul_bpo/ifmstrukturorgvw/bpo_ifshowstrukturorg_displayvw', $data);
		}
	}	

	// *---- Fungsi Untuk Menampilkan Data Struktur Organisasi Commercial -----* //
	function ifshowviewstrukturorgcomercial() {
		$lnsqlnumrows = $this->libprocms->ifsqldbgetwhere2key('stg_kode, stg_nama, stg_nama2, dep_kode, stg_nmfile, stg_cover, stg_default, ', 'sop_ifmstrukturorg', 'dep_kode', '06', 'stg_default', 'N');
		if ($lnsqlnumrows->num_rows() <= 0 ) {
			redirect('modul_bpo/ifmstrukturorgcs/bpo_ifshowstrukturorgcs/ifshowviewstrukturorgmgm');
		} else {
			$row = $lnsqlnumrows->row_array();
			$data['arstg_kode'] = ifstriptags($row['stg_kode']);			
			$data['arstg_nama'] = ifstriptags(str_replace(' ',', ',$row['stg_nama']));
			$data['arstg_nama2'] = ifstriptags($row['stg_nama2']);
			$data['ardep_kode'] = ifstriptags($row['dep_kode']);
			$data['arstg_nmfile'] = ifstriptags($row['stg_nmfile']);
			$data['arstg_cover'] = ifstriptags($row['stg_cover']);
			$data['arstg_default'] = ifstriptags($row['stg_default']);
			$data['rows'] = $row;
			$this->template->load('app/templatebpo','app/modul_bpo/ifmstrukturorgvw/bpo_ifshowstrukturorg_displayvw', $data);
		}
	}	

	// *---- Fungsi Untuk Menampilkan Data Struktur Organisasi IT -----* //
	function ifshowviewstrukturorgit() {
		$lnsqlnumrows = $this->libprocms->ifsqldbgetwhere2key('stg_kode, stg_nama, stg_nama2, dep_kode, stg_nmfile, stg_cover, stg_default, ', 'sop_ifmstrukturorg', 'dep_kode', '07', 'stg_default', 'N');
		if ($lnsqlnumrows->num_rows() <= 0 ) {
			redirect('modul_bpo/ifmstrukturorgcs/bpo_ifshowstrukturorgcs/ifshowviewstrukturorgmgm');
		} else {
			$row = $lnsqlnumrows->row_array();
			$data['arstg_kode'] = ifstriptags($row['stg_kode']);			
			$data['arstg_nama'] = ifstriptags(str_replace(' ',', ',$row['stg_nama']));
			$data['arstg_nama2'] = ifstriptags($row['stg_nama2']);
			$data['ardep_kode'] = ifstriptags($row['dep_kode']);
			$data['arstg_nmfile'] = ifstriptags($row['stg_nmfile']);
			$data['arstg_cover'] = ifstriptags($row['stg_cover']);
			$data['arstg_default'] = ifstriptags($row['stg_default']);
			$data['rows'] = $row;
			$this->template->load('app/templatebpo','app/modul_bpo/ifmstrukturorgvw/bpo_ifshowstrukturorg_displayvw', $data);
		}
	}	

	// *---- Fungsi Untuk Menampilkan Data Struktur Organisasi Quality Control Administration -----* //
	function ifshowviewstrukturorgqc() {
		$lnsqlnumrows = $this->libprocms->ifsqldbgetwhere2key('stg_kode, stg_nama, stg_nama2, dep_kode, stg_nmfile, stg_cover, stg_default, ', 'sop_ifmstrukturorg', 'dep_kode', '08', 'stg_default', 'N');
		if ($lnsqlnumrows->num_rows() <= 0 ) {
			redirect('modul_bpo/ifmstrukturorgcs/bpo_ifshowstrukturorgcs/ifshowviewstrukturorgmgm');
		} else {
			$row = $lnsqlnumrows->row_array();
			$data['arstg_kode'] = ifstriptags($row['stg_kode']);			
			$data['arstg_nama'] = ifstriptags(str_replace(' ',', ',$row['stg_nama']));
			$data['arstg_nama2'] = ifstriptags($row['stg_nama2']);
			$data['ardep_kode'] = ifstriptags($row['dep_kode']);
			$data['arstg_nmfile'] = ifstriptags($row['stg_nmfile']);
			$data['arstg_cover'] = ifstriptags($row['stg_cover']);
			$data['arstg_default'] = ifstriptags($row['stg_default']);
			$data['rows'] = $row;
			$this->template->load('app/templatebpo','app/modul_bpo/ifmstrukturorgvw/bpo_ifshowstrukturorg_displayvw', $data);
		}
	}	

	// *---- Fungsi Untuk Menampilkan Data Struktur Organisasi Mill / PKS -----* //
	function ifshowviewstrukturorgmill() {
		$lnsqlnumrows = $this->libprocms->ifsqldbgetwhere2key('stg_kode, stg_nama, stg_nama2, dep_kode, stg_nmfile, stg_cover, stg_default, ', 'sop_ifmstrukturorg', 'dep_kode', '09', 'stg_default', 'N');
		if ($lnsqlnumrows->num_rows() <= 0 ) {
			redirect('modul_bpo/ifmstrukturorgcs/bpo_ifshowstrukturorgcs/ifshowviewstrukturorgmgm');
		} else {
			$row = $lnsqlnumrows->row_array();
			$data['arstg_kode'] = ifstriptags($row['stg_kode']);			
			$data['arstg_nama'] = ifstriptags(str_replace(' ',', ',$row['stg_nama']));
			$data['arstg_nama2'] = ifstriptags($row['stg_nama2']);
			$data['ardep_kode'] = ifstriptags($row['dep_kode']);
			$data['arstg_nmfile'] = ifstriptags($row['stg_nmfile']);
			$data['arstg_cover'] = ifstriptags($row['stg_cover']);
			$data['arstg_default'] = ifstriptags($row['stg_default']);
			$data['rows'] = $row;
			$this->template->load('app/templatebpo','app/modul_bpo/ifmstrukturorgvw/bpo_ifshowstrukturorg_displayvw', $data);
		}
	}	

	// *---- Fungsi Untuk Menampilkan Data Struktur Organisasi Estate -----* //
	function ifshowviewstrukturorgestate() {
		$lnsqlnumrows = $this->libprocms->ifsqldbgetwhere2key('stg_kode, stg_nama, stg_nama2, dep_kode, stg_nmfile, stg_cover, stg_default, ', 'sop_ifmstrukturorg', 'dep_kode', '10', 'stg_default', 'N');
		if ($lnsqlnumrows->num_rows() <= 0 ) {
			redirect('modul_bpo/ifmstrukturorgcs/bpo_ifshowstrukturorgcs/ifshowviewstrukturorgmgm');
		} else {
			$row = $lnsqlnumrows->row_array();
			$data['arstg_kode'] = ifstriptags($row['stg_kode']);			
			$data['arstg_nama'] = ifstriptags(str_replace(' ',', ',$row['stg_nama']));
			$data['arstg_nama2'] = ifstriptags($row['stg_nama2']);
			$data['ardep_kode'] = ifstriptags($row['dep_kode']);
			$data['arstg_nmfile'] = ifstriptags($row['stg_nmfile']);
			$data['arstg_cover'] = ifstriptags($row['stg_cover']);
			$data['arstg_default'] = ifstriptags($row['stg_default']);
			$data['rows'] = $row;
			$this->template->load('app/templatebpo','app/modul_bpo/ifmstrukturorgvw/bpo_ifshowstrukturorg_displayvw', $data);
		}
	}
	
}
