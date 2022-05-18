<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class App extends CI_Controller {
	function index() {
		if (isset($_POST['submit'])) {
			$lcuserkode = $this->input->post('txtuserkode');
			$lcpassword = md5($this->input->post('txtuserpwd'));
			//$losqlrec = $this->model_users->ifuserakseslogin($lcuserkode, $lcpassword, 'tbl_ifuser');
			$losqlrec = $this->model_users->ifuserjoinakses($lcuserkode, $lcpassword);			
		    $larow = $losqlrec->row_array();
		    $lntotal = $losqlrec->num_rows();

			echo "<script>alert($losqlrec);</script>";
			
			echo "<script>alert($lcuserkode);</script>";

			if ($lntotal > 0) {
				$this->session->set_userdata(array('user_kode'=>$larow['user_kode'],
											   'user_nama'=>$larow['user_nama'],
											   'div_kode'=>$larow['div_kode'],
							   				   'user_level'=>'1'));
												  
				redirect('app/home');
			} else {
				$data['title'] = 'Users &rsaquo; Log In';
				$this->load->view('app/view_login', $data);
			}

		} else {

			if ($this->session->user_level != '') {
				redirect('app/home');
			} else {
				$data['title'] = 'Users &rsaquo; Log In';
				$this->load->view('app/view_login', $data);
			}
		}
	}

	function home() {
		ifceksessionuser();
		$this->template->load('app/template','app/view_home');
	}

	function homebpomenu() {
		ifceksessionuser();
		$this->template->load('app/templatebpo','app/view_home');
	}	

	function logout(){
		$this->session->sess_destroy();
		redirect('app');
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

	
	function edit_karyawan(){
		ifceksessionuser();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'ifassetadm/images/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '10000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('w');
	        $hasil=$this->upload->data();
	        if ($hasil['file_name']==''){  
	        	if (trim($this->input->post('b'))==''){
					$data = array('username' => $this->input->post('a'),
								  'nik' => $this->input->post('c'),
								  'nama_karyawan' => $this->input->post('d'),
								  'id_jenis_kelamin' => $this->input->post('e'),
								  'tempat_lahir' => $this->input->post('f'),
								  'tanggal_lahir' => $this->input->post('g'),
								  'id_agama' => $this->input->post('h'),
								  'id_status_pernikahan' => $this->input->post('i'),
								  'alamat_karyawan_1' => $this->input->post('j'),
								  'alamat_karyawan_2' => $this->input->post('k'),
								  'city_id' => $this->input->post('l'),
								  'state_id' => $this->input->post('m'),
								  'country_id' => $this->input->post('n'),
								  'telepon_karyawan' => $this->input->post('o'),
								  'hp_karyawan' => $this->input->post('p'),
								  'email_karyawan' => $this->input->post('q'),
								  'website_karyawan' => $this->input->post('r'),
								  'kode_pos_karyawan' => $this->input->post('s'),
								  'fax_karyawan' => $this->input->post('t'),
								  'chat_karyawan' => $this->input->post('u'),
								  'keterangan' => $this->input->post('v'),
								  'id_jabatan' => $this->input->post('x'),
								  'id_departemen' => $this->input->post('y'),
								  'tanggal_masuk' => $this->input->post('z'),
								  'id_status_karyawan' => $this->input->post('aa'),
								  'aktif' => $this->input->post('bb'),
								  'id_users' => $this->session->id_users,
								  'waktu_daftar' => date('Y-m-d H:i:s'));
	        	}else{
					$data = array('username' => $this->input->post('a'),
								  'password' => md5($this->input->post('b')),
								  'nik' => $this->input->post('c'),
								  'nama_karyawan' => $this->input->post('d'),
								  'id_jenis_kelamin' => $this->input->post('e'),
								  'tempat_lahir' => $this->input->post('f'),
								  'tanggal_lahir' => $this->input->post('g'),
								  'id_agama' => $this->input->post('h'),
								  'id_status_pernikahan' => $this->input->post('i'),
								  'alamat_karyawan_1' => $this->input->post('j'),
								  'alamat_karyawan_2' => $this->input->post('k'),
								  'city_id' => $this->input->post('l'),
								  'state_id' => $this->input->post('m'),
								  'country_id' => $this->input->post('n'),
								  'telepon_karyawan' => $this->input->post('o'),
								  'hp_karyawan' => $this->input->post('p'),
								  'email_karyawan' => $this->input->post('q'),
								  'website_karyawan' => $this->input->post('r'),
								  'kode_pos_karyawan' => $this->input->post('s'),
								  'fax_karyawan' => $this->input->post('t'),
								  'chat_karyawan' => $this->input->post('u'),
								  'keterangan' => $this->input->post('v'),
								  'id_jabatan' => $this->input->post('x'),
								  'id_departemen' => $this->input->post('y'),
								  'tanggal_masuk' => $this->input->post('z'),
								  'id_status_karyawan' => $this->input->post('aa'),
								  'aktif' => $this->input->post('bb'),
								  'id_users' => $this->session->id_users,
								  'waktu_daftar' => date('Y-m-d H:i:s'));
				}
			}else{
				if (trim($this->input->post('b'))==''){
					$data = array('username' => $this->input->post('a'),
								  'nik' => $this->input->post('c'),
								  'nama_karyawan' => $this->input->post('d'),
								  'id_jenis_kelamin' => $this->input->post('e'),
								  'tempat_lahir' => $this->input->post('f'),
								  'tanggal_lahir' => $this->input->post('g'),
								  'id_agama' => $this->input->post('h'),
								  'id_status_pernikahan' => $this->input->post('i'),
								  'alamat_karyawan_1' => $this->input->post('j'),
								  'alamat_karyawan_2' => $this->input->post('k'),
								  'city_id' => $this->input->post('l'),
								  'state_id' => $this->input->post('m'),
								  'country_id' => $this->input->post('n'),
								  'telepon_karyawan' => $this->input->post('o'),
								  'hp_karyawan' => $this->input->post('p'),
								  'email_karyawan' => $this->input->post('q'),
								  'website_karyawan' => $this->input->post('r'),
								  'kode_pos_karyawan' => $this->input->post('s'),
								  'fax_karyawan' => $this->input->post('t'),
								  'chat_karyawan' => $this->input->post('u'),
								  'keterangan' => $this->input->post('v'),
								  'foto_karyawan' => $hasil['file_name'],
								  'id_jabatan' => $this->input->post('x'),
								  'id_departemen' => $this->input->post('y'),
								  'tanggal_masuk' => $this->input->post('z'),
								  'id_status_karyawan' => $this->input->post('aa'),
								  'aktif' => $this->input->post('bb'),
								  'id_users' => $this->session->id_users,
								  'waktu_daftar' => date('Y-m-d H:i:s'));
				}else{
					$data = array('username' => $this->input->post('a'),
								  'password' => md5($this->input->post('b')),
								  'nik' => $this->input->post('c'),
								  'nama_karyawan' => $this->input->post('d'),
								  'id_jenis_kelamin' => $this->input->post('e'),
								  'tempat_lahir' => $this->input->post('f'),
								  'tanggal_lahir' => $this->input->post('g'),
								  'id_agama' => $this->input->post('h'),
								  'id_status_pernikahan' => $this->input->post('i'),
								  'alamat_karyawan_1' => $this->input->post('j'),
								  'alamat_karyawan_2' => $this->input->post('k'),
								  'city_id' => $this->input->post('l'),
								  'state_id' => $this->input->post('m'),
								  'country_id' => $this->input->post('n'),
								  'telepon_karyawan' => $this->input->post('o'),
								  'hp_karyawan' => $this->input->post('p'),
								  'email_karyawan' => $this->input->post('q'),
								  'website_karyawan' => $this->input->post('r'),
								  'kode_pos_karyawan' => $this->input->post('s'),
								  'fax_karyawan' => $this->input->post('t'),
								  'chat_karyawan' => $this->input->post('u'),
								  'keterangan' => $this->input->post('v'),
								  'foto_karyawan' => $hasil['file_name'],
								  'id_jabatan' => $this->input->post('x'),
								  'id_departemen' => $this->input->post('y'),
								  'tanggal_masuk' => $this->input->post('z'),
								  'id_status_karyawan' => $this->input->post('aa'),
								  'aktif' => $this->input->post('bb'),
								  'id_users' => $this->session->id_users,
								  'waktu_daftar' => date('Y-m-d H:i:s'));
				}
			}
	    	$where = array('id_karyawan' => $this->input->post('id'));
			$this->model_app->update('mu_karyawan', $data, $where);
			if ($this->session->id_users == $this->input->post('id')){
				redirect('app/edit_karyawan/'.$this->session->id_users);
			}else{
				redirect('app/karyawan');
			}

		}else{
			$proses = $this->model_app->edit('mu_karyawan', array('id_karyawan' => $id))->row_array();
			$data = array('row' => $proses);

			$data['kota'] = $this->model_app->view_where_desc('mu_city',array('state_id' => $proses['state_id']),'city_id');
			$data['provinsi'] = $this->model_app->view_where_desc('mu_state',array('country_id' => $proses['country_id']),'state_id');
			$data['negara'] = $this->model_app->view_all_desc('mu_country','country_id');
			$data['jenis_kelamin'] = $this->model_app->view_all_desc('mu_jenis_kelamin','id_jenis_kelamin');
			$data['agama'] = $this->model_app->view_all_desc('mu_agama','id_agama');
			$data['status_pernikahan'] = $this->model_app->view_all_desc('mu_status_pernikahan','id_status_pernikahan');
			$data['jabatan'] = $this->model_app->view_all_desc('mu_jabatan','id_jabatan');
			$data['departemen'] = $this->model_app->view_all_desc('mu_departemen','id_departemen');
			$data['status_karyawan'] = $this->model_app->view_all_desc('mu_status_karyawan','id_status_karyawan');
			$this->template->load('app/template','app/mod_karyawan/view_karyawan_edit',$data);
		}
	}

}
