<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpo_ifmvisimisics extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('libprocms');
		$this->load->database();
   }

	// *---- Fungsi Untuk Insert Data Record -----* //
	function ifinsupdrecord() {
		ifceksessionuser();
		
		$idkode = $this->uri->segment(5);
		$ldtanggal = date('Y-m-d'); 
		$lchostname = gethostname();  // gethostbyaddr($_SERVER['REMOTE_ADDR']);

		if (isset($_POST['submit'])) {
			$losql = $this->db->query("SELECT vsm_kode FROM sop_ifmvisimisi where vsm_kode='".$this->input->post('idkode')."'");
			if ($losql->num_rows() > 0) {
				$data = array('vsm_kode' => 'VM',
					          'vsm_judul' => $this->input->post('editornama'),
				              'vsm_judul2' => $this->input->post('editornama2'),
				              'user_m' => $this->session->user_kode,
				              'tgl_m'=>date('Y-m-d'),
				              'time_m'=>date("h:i:s a"));
				$lcwhere = array('vsm_kode' => 'VM');			  

				$this->libprocms->ifsqlupdate('sop_ifmvisimisi', $data, $lcwhere);

				redirect('modul_bpo/ifmvisimisics/bpo_ifmvisimisics/ifinsupdrecord');

            } else {

			    $arr = array('vsm_kode' => 'VM',
						     'vsm_judul' => $this->input->post('editornama'),
							 'vsm_judul2' => $this->input->post('editornama2'),
						     'user_c' => $this->session->user_kode,
						     'tgl_c' => date('Y-m-d'),
							 'time_c' => date("h:i:s a"),
							 'user_m' => $this->session->user_kode,
							 'tgl_m' => date('Y-m-d'),
							 'time_m' => date("h:i:s a"));
				
			    $this->libprocms->ifsqlinsert('sop_ifmvisimisi', $arr);

				redirect('modul_bpo/ifmvisimisics/bpo_ifmvisimisics/ifinsupdrecord');
			}

		} else {
			
			    $data['row'] = $this->libprocms->ifsqledit('sop_ifmvisimisi', array('vsm_kode' => 'VM'))->row_array();
				$this->template->load('app/template','app/modul_bpo/ifmvisimisivw/bpo_ifmvisimisi_insupdvw', $data);
		}
	}

}
