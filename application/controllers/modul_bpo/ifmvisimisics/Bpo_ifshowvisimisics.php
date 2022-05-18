<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpo_ifshowvisimisics extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('libprocms');
		$this->load->database();
    }

	// *---- Fungsi Untuk Menampilkan Data Visi & Misi -----* //
	function ifshowvisimisi() {
		$lnsqlnumrows = $this->libprocms->ifsqldbget('vsm_kode, vsm_judul, vsm_judul2', 'sop_ifmvisimisi', 'vsm_kode', 'ASC');
		if ($lnsqlnumrows->num_rows() <= 0 ) {
			redirect('modul_bpo/ifmvisimisics/bpo_ifshowvisimisics/ifshowvisimisi');
		} else {
			$row = $lnsqlnumrows->row_array();
			//$data['title'] = ifstriptags($row['judul']);			
			//$data['keywords'] = ifstriptags(str_replace(' ',', ',$row['judul']));
			$data['description'] = ifstriptags($row['vsm_judul']);
			$data['rows'] = $row;
			$this->template->load('app/templatebpo','app/modul_bpo/ifmvisimisivw/bpo_ifshowvisimisi_displayvw', $data);
			//$this->template->load(template().'/template',template().'/detailhalaman',$data);
		}
	}
}
