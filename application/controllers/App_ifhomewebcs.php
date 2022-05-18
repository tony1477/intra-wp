<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_ifhomewebcs extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('webconfigms');
 		$this->load->model('webgalerims');
		$this->load->model('webberitams');		
		$this->load->model('webvideoms');
		$this->load->model('webagendams');
    }

	public function index() {
		$site = $this->webconfigms->ifsqlselectlisting();
 		$slider = $this->webgalerims->ifsqlselectslider();
		$popup = $this->webgalerims->ifsqlpopupaktif();
		$headline = $this->webberitams->ifsqlselectlistingheadline();
		$galeri = $this->webgalerims->ifsqlselectgalerihome();
		$kategori_galeri = $this->webgalerims->ifsqlselectkategori();
		$video = $this->webvideoms->ifsqlselecthome();
		$agenda = $this->webagendams->ifsqlselecthome();
		$layanan = $this->webnavms->ifsqlselectnavlayanan();
		$profil = $this->webnavms->ifsqlselectnavprofil();
 		
		// pengaturan pagination
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'home/index/';
		$config['total_rows'] 		= count($this->webberitams->ifsqlselecttotal());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['full_tag_open'] 	= '<ul class="pagination">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '&laquo; Awal';
        $config['first_tag_open'] 	= '<li class="prev page">';
        $config['first_tag_close'] 	= '</li>';

        $config['last_link'] 		= 'Akhir &raquo;';
        $config['last_tag_open'] 	= '<li class="next page">';
        $config['last_tag_close'] 	= '</li>';

        $config['next_link'] 		= 'Selanjutnya &rarr;';
        $config['next_tag_open'] 	= '<li class="next page">';
        $config['next_tag_close'] 	= '</li>';

        $config['prev_link'] 		= '&larr; Sebelumnya';
        $config['prev_tag_open'] 	= '<li class="prev page">';
        $config['prev_tag_close'] 	= '</li>';

        $config['cur_tag_open'] 	= '<li class="active"><a href="">';
        $config['cur_tag_close'] 	= '</a></li>';

        $config['num_tag_open'] 	= '<li class="page">';
        $config['num_tag_close'] 	= '</li>';
		$config['per_page'] 		= 8;
		$config['first_url'] 		= base_url().'homeweb/';
		$this->pagination->initialize($config); 
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$berita = $this->webberitams->ifsqlselectberita($config['per_page'], $page);

		$data = array(	'title'				=> $site->namaweb.' - '.$site->tagline,
						'deskripsi'			=> $site->deskripsi,
						'keywords'			=> $site->keywords,
						'site'				=> $site,
						'slider'			=> $slider,
						'headline'			=> $headline,
						'pagin' 			=> $this->pagination->create_links(),
						'berita'			=> $berita,
						'popup'				=> $popup,
						'galeri'			=> $galeri,
						'video'				=> $video,
						'kategori_galeri'	=> $kategori_galeri,
						'agenda'			=> $agenda,
						'layanan'			=> $layanan,
						'profil'			=> $profil,
						'isi'				=> 'homeweb/list');
		$this->load->view('layoutweb/wrapper', $data);
	}

	public function oops() {
		$site = $this->webconfigms->ifsqlselectlisting();

		$data = array(	'title' => 'Not found',
						'deskripsi' => $site->deskripsi,
						'keywords' => $site->keywords,
						'site' => $site,
						'isi' => 'homeweb/oops');
		$this->load->view('layoutweb/wrapper', $data);
	}
}
