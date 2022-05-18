<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loginsopwpg extends CI_Controller {
	function index() {
		if (isset($_POST['submit'])) {
			$lcuserkode = $this->input->post('txtuserkode');
			$lcpassword = md5($this->input->post('txtuserpwd'));
			//losqlrec = $this->libprocms->ifuserakseslogin($lcuserkode, $lcpassword, 'tbl_ifmuser');
			$losqlrec = $this->libprocms->ifuserjoinakses($lcuserkode, $lcpassword);
		    $larow = $losqlrec->row_array();
		    $lnnumrows = $losqlrec->num_rows();

			//echo "<script>alert($losqlrec);</script>";			
			//echo "<script>alert($lcuserkode);</script>";

			if ($lnnumrows > 0) {
				$this->session->set_userdata(array('user_kode'=>$larow['user_kode'],
						'user_nama'=>$larow['user_nama'], 'dep_kode'=>$larow['dep_kode'],
						'div_kode'=>$larow['div_kode'], 'user_level'=>$larow['user_level']));
				redirect('loginsopwpg/ifhomebpo');
				
			} else {

				$data['title'] = 'Users &rsaquo; Sign In';
				$this->load->view('app/modul_login/view_ifmloginbpo', $data);
			}

		} else {

			if ($this->session->user_level != '') {
				redirect('loginsopwpg/ifhomebpo');
			} else {
				$data['title'] = 'Users &rsaquo; Sign In';
				$this->load->view('app/modul_login/view_ifmloginbpo', $data);
			}
		}
	}

	function ifhomebpo() {
		ifceksessionuser();
		if ($this->session->user_level <> '') {
	        $this->template->load('app/templatebpo','app/modul_login/view_ifmhomebpo');

		} else {
			
			$lcuserkode = $this->input->post('txtuserkode');
			$lcpassword = md5($this->input->post('txtuserpwd'));
			$losqlrec = $this->libprocms->ifuserakseslogin($lcuserkode, $lcpassword, 'tbl_ifmuser');
		    $larow = $losqlrec->row_array();
		    $lnnumrows = $losqlrec->num_rows();

			if ($lnnumrows > 0) {
				$this->session->set_userdata(array('user_kode'=>$larow['user_kode'],
						'user_nama'=>$larow['user_nama'], 'dep_kode'=>$larow['dep_kode'], 
						'div_kode'=>$larow['div_kode'], 'user_level'=>$larow['user_level']));
				redirect('Loginwpg/home');
				
			} else {

                echo "<script>alert('Akses ditolak, user tidak memiliki otoritas membuka modul ini');</script>";

				$data['title'] = 'Users &rsaquo; Sign In';
				$this->load->view('app/modul_login/view_ifmloginbpo', $data);
			}
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('loginsopwpg');
	}
}
