<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loginwpg extends CI_Controller {
	function index() {
		if (isset($_POST['submit'])) {
			$lcuserkode = $this->input->post('txtuserkode');
			$lcpassword = md5($this->input->post('txtuserpwd'));
			$losqlrec = $this->libprocms->ifuserakseslogin($lcuserkode, $lcpassword, 'tbl_ifmuser');
		    $larow = $losqlrec->row_array();
		    $lnnumrows = $losqlrec->num_rows();

			//echo "<script>alert($losqlrec);</script>";			
			//echo "<script>alert($lcuserkode);</script>";

			if ($lnnumrows > 0) {
				$this->session->set_userdata(array('user_kode'=>$larow['user_kode'],
						'user_nama'=>$larow['user_nama'], 'user_level'=>$larow['user_level']));
				redirect('Loginwpg/home');
				
			} else {

				$data['title'] = 'Users &rsaquo; Log In';
				$this->load->view('app/modul_login/view_ifmlogin', $data);
			}

		} else {

			if ($this->session->user_level != '') {
				redirect('Loginwpg/home');
			} else {
				$data['title'] = 'Users &rsaquo; Log In';
				$this->load->view('app/modul_login/view_ifmlogin', $data);
			}
		}
	}

	function home() {
		ifceksessionuser();
		if ($this->session->user_level == '1') {
		    $this->template->load('app/template','app/modul_login/view_ifmhome');
 	    } else {
			$lcuserkode = $this->input->post('txtuserkode');
			$lcpassword = md5($this->input->post('txtuserpwd'));
			$losqlrec = $this->libprocms->ifuserakseslogin($lcuserkode, $lcpassword, 'tbl_ifmuser');
		    $larow = $losqlrec->row_array();
		    $lnnumrows = $losqlrec->num_rows();

			if ($lnnumrows > 0) {
				$this->session->set_userdata(array('user_kode'=>$larow['user_kode'],
						'user_nama'=>$larow['user_nama'], 'user_level'=>$larow['user_level']));
				redirect('Loginwpg/home');
				
			} else {

                echo "<script>alert('Akses ditolak, user tidak memiliki otoritas membuka modul ini');</script>";

				$data['title'] = 'Users &rsaquo; Log In';
				$this->load->view('app/modul_login/view_ifmlogin', $data);
			}
	    }
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('loginwpg');
	}

	function conf_perusahaan(){
		ifceksessionuser();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'ifassetadm/images/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '10000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('l');
	        $hasil=$this->upload->data();
	        if ($hasil['file_name']==''){      	
				$data = array('nama_perusahaan' => $this->input->post('a'),
							  'npwp_perusahaan' => $this->input->post('b'),
							  'alamat_perusahaan' => $this->input->post('c'),
							  'city_id' => $this->input->post('d'),
							  'state_id' => $this->input->post('e'),
							  'country_id' => $this->input->post('f'),
							  'telepon' => $this->input->post('g'),
							  'email' => $this->input->post('h'),
							  'fax' => $this->input->post('i'),
							  'website' => $this->input->post('j'),
							  'kode_pos' => $this->input->post('k'));
			}else{
				$data = array('nama_perusahaan' => $this->input->post('a'),
							  'npwp_perusahaan' => $this->input->post('b'),
							  'alamat_perusahaan' => $this->input->post('c'),
							  'city_id' => $this->input->post('d'),
							  'state_id' => $this->input->post('e'),
							  'country_id' => $this->input->post('f'),
							  'telepon' => $this->input->post('g'),
							  'email' => $this->input->post('h'),
							  'fax' => $this->input->post('i'),
							  'website' => $this->input->post('j'),
							  'kode_pos' => $this->input->post('k'),
							  'logo' => $hasil['file_name']);
			}
	    	$where = array('id_perusahaan' => $this->input->post('id'));
			$this->model_app->update('mu_conf_perusahaan', $data, $where);
			redirect('app/conf_perusahaan');
		}else{
			$proses = $this->model_app->view_one_address('mu_conf_perusahaan', array('id_perusahaan' => 1),'id_perusahaan')->row_array();
			$data = array('row' => $proses);
			$data['kota'] = $this->model_app->view_where_desc('mu_city',array('state_id' => $proses['state_id']),'city_id');
			$data['provinsi'] = $this->model_app->view_where_desc('mu_state',array('country_id' => $proses['country_id']),'state_id');
			$data['negara'] = $this->model_app->view_all_desc('mu_country','country_id');
			$this->template->load('app/template','app/configurasi/edit_perusahaan',$data);
		}
	}


}
