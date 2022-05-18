<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bpo_ifdownloadsopcs extends CI_Controller {
	public function index(){
		$jumlah= $this->libprocms->ifgetviewtable('sop_ifmdokumen')->num_rows();
		$config['base_url'] = base_url().'bpo_ifdownloadsopcs/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 20; 	
		if ($this->uri->segment('3')=='') {
			$dari = 0;
		} else {
			$dari = $this->uri->segment('3');
		}
		$data['title'] = "Buka Data SOP";
		$data['description'] = description();
		$data['keywords'] = keywords();
		if (is_numeric($dari)) {
			$data['download'] = $this->libprocms->ifvieworderinglimit('sop_ifmdokumen', 'dok_nosop', 'DESC', $dari, $config['per_page']);
		} else {
			redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensop');
		}
		$this->pagination->initialize($config);
		//$this->template->load(template().'/template',template().'/download', $data);
		$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_displayvw', $data);
	}

	function file() {
		$cek = $this->libprocms->ifviewgetwhere('sop_ifmdokumen', array('dok_nmfile' => $this->uri->segment(3)));
		if ($cek->num_rows() <= 0) {
			//redirect('download');
			redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensop');

		} else {

			$lcnamafile = $this->uri->segment(2);
			$data = file_get_contents("datasop/file/".$lcnamafile);
			force_download($lcnamafile, $data);
		}
	}
}
