<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tabelcnt extends CI_Controller {

	// *---- Menu Tabel : Master Divisi -----* //
	function ifshowtblmdivisi(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmdivisi','div_kode');
		$data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmdivisi/view_ifmdivisi',$data);
	}

	function ifinsertmdivisi(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('div_kode' => $this->input->post('a'),
						  'div_nama' => $this->input->post('b'),
						  'user_c' => $this->session->id_users);
			$this->model_app->insert('tbl_ifmdivisi',$data);
			redirect('tabelcnt/ifloadmdivisi');
		}else{
			$this->template->load('app/template','app/modul_tbl/ifmdivisi/view_ifmdivisi_insert');
		}
	}

	function ifupdatemdivisi(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('div_kode' => $this->input->post('a'),
						  'div_nama' => $this->input->post('b'));
	    	$where = array('div_kode' => $this->input->post('id'));
			$this->model_app->update('tbl_ifmdivisi', $data, $where);
			redirect('tabelcnt/ifloadmdivisi');
		}else{
			$data['row'] = $this->model_app->edit('tbl_ifmdivisi', array('div_kode' => $id))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmdivisi/view_ifmdivisi_update',$data);
		}
	}

	function ifdeletemdivisi(){
		$id = $this->uri->segment(3);
		$idd = array('div_kode' => $id);
		$this->model_app->delete('tbl_ifmdivisi',$idd);
		redirect('tabelcnt/ifloadmdivisi');
	}

	function ifloadmdivisi(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmdivisi','div_kode');
        $data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmdivisi/view_ifmdivisi',$data);
	}	
	// *---- End Script Function Master Divisi -----* //

	// *---- Menu Tabel : Master Departemen -----* //
	function ifshowtblmdepartemen(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmdepartemen','dep_kode');
		$data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmdepartemen/view_ifmdepartemen',$data);
	}

	function ifinsertmdepartemen(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('dep_kode' => $this->input->post('a'),
						  'dep_nama' => $this->input->post('b'),
						  'user_c' => $this->session->id_users);
			$this->model_app->insert('tbl_ifmdepartemen',$data);
			redirect('tabelcnt/ifloadmdepartemen');
		}else{
			$this->template->load('app/template','app/modul_tbl/ifmdepartemen/view_ifmdepartemen_insert');
		}
	}

	function ifupdatemdepartemen(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('dep_kode' => $this->input->post('a'),
						  'dep_nama' => $this->input->post('b'));
	    	$where = array('dep_kode' => $this->input->post('id'));
			$this->model_app->update('tbl_ifmdepartemen', $data, $where);
			redirect('tabelcnt/ifloadmdepartemen');
		}else{
			$data['row'] = $this->model_app->edit('tbl_ifmdepartemen', array('dep_kode' => $id))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmdepartemen/view_ifmdepartemen_update',$data);
		}
	}

	function ifdeletemdepartemen(){
		$id = $this->uri->segment(3);
		$idd = array('dep_kode' => $id);
		$this->model_app->delete('tbl_ifmdepartemen',$idd);
		redirect('tabelcnt/ifloadmdepartemen');
	}

	function ifloadmdepartemen(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmdepartemen','dep_kode');
        $data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmdepartemen/view_ifmdepartemen',$data);
	}	
	// *---- End Script Function Master Departemen -----* //

	// *---- Menu Tabel : Master Jabatan -----* //
	function ifshowtblmjabatan(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmjabatan','jab_kode');
		$data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmjabatan/view_ifmjabatan',$data);
	}

	function ifinsertmjabatan(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('jab_kode' => $this->input->post('a'),
						  'jab_nama' => $this->input->post('b'),
						  'user_c' => $this->session->id_users);
			$this->model_app->insert('tbl_ifmjabatan',$data);
			redirect('tabelcnt/ifloadmjabatan');
		}else{
			$this->template->load('app/template','app/modul_tbl/ifmjabatan/view_ifmjabatan_insert');
		}
	}

	function ifupdatemjabatan(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('jab_kode' => $this->input->post('a'),
						  'jab_nama' => $this->input->post('b'));
	    	$where = array('jab_kode' => $this->input->post('id'));
			$this->model_app->update('tbl_ifmjabatan', $data, $where);
			redirect('tabelcnt/ifloadmjabatan');
		}else{
			$data['row'] = $this->model_app->edit('tbl_ifmjabatan', array('jab_kode' => $id))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmjabatan/view_ifmjabatan_update',$data);
		}
	}

	function ifdeletemjabatan(){
		$id = $this->uri->segment(3);
		$idd = array('jab_kode' => $id);
		$this->model_app->delete('tbl_ifmjabatan',$idd);
		redirect('tabelcnt/ifloadmjabatan');
	}

	function ifloadmjabatan(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmjabatan','jab_kode');
        $data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmjabatan/view_ifmjabatan',$data);
	}	
	// *---- End Script Function Master Jabatan -----* //

	// *---- Menu Tabel : Master Proyek -----* //
	function ifshowtblmproyek(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmproyek','pyk_kode');
		$data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmproyek/view_ifmproyek',$data);
	}

	function ifinsertmproyek(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('pyk_kode' => $this->input->post('a'),
						  'pyk_nama' => $this->input->post('b'),
						  'user_c' => $this->session->id_users);
			$this->model_app->insert('tbl_ifmproyek',$data);
			redirect('tabelcnt/ifloadmproyek');
		}else{
			$this->template->load('app/template','app/modul_tbl/ifmproyek/view_ifmproyek_insert');
		}
	}

	function ifupdatemproyek(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('pyk_kode' => $this->input->post('a'),
						  'pyk_nama' => $this->input->post('b'));
	    	$where = array('pyk_kode' => $this->input->post('id'));
			$this->model_app->update('tbl_ifmproyek', $data, $where);
			redirect('tabelcnt/ifloadmproyek');
		}else{
			$data['row'] = $this->model_app->edit('tbl_ifmproyek', array('pyk_kode' => $id))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmproyek/view_ifmproyek_update',$data);
		}
	}

	function ifdeletemproyek(){
		$id = $this->uri->segment(3);
		$idd = array('pyk_kode' => $id);
		$this->model_app->delete('tbl_ifmproyek',$idd);
		redirect('tabelcnt/ifloadmproyek');
	}

	function ifloadmproyek(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmproyek','pyk_kode');
        $data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmproyek/view_ifmproyek',$data);
	}	
	// *---- End Script Function Master Proyek -----* //
	
	// *---- Menu Tabel : Master Negara (Country) -----* //
	function ifshowtblmcountry(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmcountry','cnt_kode');
		$data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmcountry/view_ifmcountry',$data);
	}

	function ifinsertmcountry(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('cnt_kode' => $this->input->post('a'),
						  'cnt_nama' => $this->input->post('b'),
						  'user_c' => $this->session->id_users);
			$this->model_app->insert('tbl_ifmcountry',$data);
			redirect('tabelcnt/ifloadmcountry');
		}else{
			$this->template->load('app/template','app/modul_tbl/ifmcountry/view_ifmcountry_insert');
		}
	}

	function ifupdatemcountry(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('cnt_kode' => $this->input->post('a'),
						  'cnt_nama' => $this->input->post('b'));
	    	$where = array('cnt_kode' => $this->input->post('id'));
			$this->model_app->update('tbl_ifmcountry', $data, $where);
			redirect('tabelcnt/ifloadmcountry');
		}else{
			$data['row'] = $this->model_app->edit('tbl_ifmcountry', array('cnt_kode' => $id))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmcountry/view_ifmcountry_update',$data);
		}
	}

	function ifdeletemcountry(){
		$id = $this->uri->segment(3);
		$idd = array('cnt_kode' => $id);
		$this->model_app->delete('tbl_ifmcountry',$idd);
		redirect('tabelcnt/ifloadmcountry');
	}

	function ifloadmcountry(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmcountry','cnt_kode');
        $data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmcountry/view_ifmcountry',$data);
	}	
	// *---- End Script Function Master Negara (Country) -----* //

	// *---- Menu Tabel : Master Provinsi -----* //
	function ifshowtblmprovinsi(){
		cek_session_admin();
		$data = $this->model_tabel->ifsqlviewjoinmprovinsi();
		$data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmprovinsi/view_ifmprovinsi',$data);
	}

	function ifinsertmprovinsi() {
		cek_session_admin();

		        if (isset($_POST['submit'])) {

			        $losql = $this->db->query("SELECT prov_kode FROM tbl_ifmprovinsi where prov_kode='".$this->input->post('a')."'");
			        if ($losql->num_rows()>0){
						echo "<script>alert('Kode Provinsi sudah ada, mohon periksa kembali');</script>";
						//echo "<script>alert('Kode Provinsi sudah ada, mohon periksa kembali'); window.location='app/modul_tbl/ifmprovinsi/view_ifmprovinsi_insert.php';</script>";
				        $data = $this->model_app->view_all_desc('tbl_ifmcountry','cnt_kode');
				        $data = array('record' => $data);
						$this->template->load('app/template','app/modul_tbl/ifmprovinsi/view_ifmprovinsi_insert',$data);
						
                    }else{

			            $data = array('prov_kode' => $this->input->post('a'),
						    'prov_nama' => $this->input->post('b'),
						    'cnt_kode' => $this->input->post('c'),
						    'user_c' => $this->session->id_users,
						    'tgl_c'=>date('Y-m-d'),
						    'time_c'=>date("h:i:s a"));

			            $this->model_app->insert('tbl_ifmprovinsi',$data);
					    redirect('tabelcnt/ifshowtblmprovinsi','refresh');
				    }		   

		        }else{

			        $data = $this->model_app->view_all_desc('tbl_ifmcountry','cnt_kode');
			        $data = array('record' => $data);
					$this->template->load('app/template','app/modul_tbl/ifmprovinsi/view_ifmprovinsi_insert',$data);
				}
	}


	function ifupdatemprovinsi(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('prov_kode' => $this->input->post('a'),
						  'prov_nama' => $this->input->post('b'),
						  'cnt_kode' => $this->input->post('c'),
						  'user_m' => $this->session->id_users);

	    	$where = array('prov_kode' => $this->input->post('id'));
			$this->model_app->update('tbl_ifmprovinsi', $data, $where);
			redirect('tabelcnt/ifshowtblmprovinsi');

		}else{

			$data = $this->model_app->view_all_desc('tbl_ifmcountry','cnt_kode');
			$data = array('record' => $data);
			$data['row'] = $this->model_app->edit('tbl_ifmprovinsi', array('prov_kode' => $id))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmprovinsi/view_ifmprovinsi_update',$data);
		}
	}

	function ifdeletemprovinsi(){
		$id = $this->uri->segment(3);
		$idd = array('prov_kode' => $id);
		$this->model_app->delete('tbl_ifmprovinsi',$idd);
		redirect('tabelcnt/ifshowtblmprovinsi');
	}


	function ifceksqlvalkdprovinsi(){
		$this->load->model('tabelcnt');
		$lckdprovinsi = $this->input->post("txtkdprovinsi");
		$cekrecord = $this->tabelcnt->cekdatakdprov($lckdprovinsi);
		if ($cekrecord > 0){
		  echo "ok";
		}
	  }


	public function ifsqlvalkdprovinsi(){
		if($this->model_tabel->ifSqlvalkdprovinsi()){
			alert('Kode Provinsi sudah ada mohon periksa kembali!');
			$this->form_validation->set_message("ifsqlvalkdprovinsi","Kode Provinsi sudah ada!");
			return false;
		}else{
			return true;
		}
	}
	// *---- End Script Function Master Provinsi -----* //


	// *---- Menu Tabel : Master Bank -----* //
	function ifshowtblmbank(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmbank','bank_kode');
		$data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmbank/view_ifmbank',$data);
	}

	function ifinsertmbank(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('bank_kode' => $this->input->post('a'),
						  'bank_nama' => $this->input->post('b'),
						  'user_c' => $this->session->id_users);
			$this->model_app->insert('tbl_ifmbank',$data);
			redirect('tabelcnt/ifloadmbank');
		}else{
			$this->template->load('app/template','app/modul_tbl/ifmbank/view_ifmbank_insert');
		}
	}

	function ifupdatembank(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('bank_kode' => $this->input->post('a'),
						  'bank_nama' => $this->input->post('b'));
	    	$where = array('bank_kode' => $this->input->post('id'));
			$this->model_app->update('tbl_ifmbank', $data, $where);
			redirect('tabelcnt/ifloadmbank');
		}else{
			$data['row'] = $this->model_app->edit('tbl_ifmbank', array('bank_kode' => $id))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmbank/view_ifmbank_update',$data);
		}
	}

	function ifdeletembank(){
		$id = $this->uri->segment(3);
		$idd = array('bank_kode' => $id);
		$this->model_app->delete('tbl_ifmbank',$idd);
		redirect('tabelcnt/ifloadmbank');
	}

	function ifloadmbank(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmbank','bank_kode');
        $data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmbank/view_ifmbank',$data);
	}	
	// *---- End Script Function Master Bank -----* //


	// *---- Menu Tabel : Master Kelompok Suplier -----* //
	function ifshowtblmsuplierkelompok(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmsuplierkelompok','sug_kode');
		$data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmsuplierkelompok/view_ifmsuplierkelompok',$data);
	}

	function ifinsertmsuplierkelompok(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('sug_kode' => $this->input->post('a'),
						  'sug_nama' => $this->input->post('b'),
						  'user_c' => $this->session->id_users);
			$this->model_app->insert('tbl_ifmsuplierkelompok',$data);
			redirect('tabelcnt/ifloadmsuplierkelompok');
		}else{
			$this->template->load('app/template','app/modul_tbl/ifmsuplierkelompok/view_ifmsuplierkelompok_insert');
		}
	}

	function ifupdatemsuplierkelompok(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('sug_kode' => $this->input->post('a'),
						  'sug_nama' => $this->input->post('b'));
	    	$where = array('sug_kode' => $this->input->post('id'));
			$this->model_app->update('tbl_ifmsuplierkelompok', $data, $where);
			redirect('tabelcnt/ifloadmsuplierkelompok');
		}else{
			$data['row'] = $this->model_app->edit('tbl_ifmsuplierkelompok', array('sug_kode' => $id))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmsuplierkelompok/view_ifmsuplierkelompok_update',$data);
		}
	}

	function ifdeletemsuplierkelompok(){
		$id = $this->uri->segment(3);
		$idd = array('sug_kode' => $id);
		$this->model_app->delete('tbl_ifmsuplierkelompok',$idd);
		redirect('tabelcnt/ifloadmsuplierkelompok');
	}

	function ifloadmsuplierkelompok(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmsuplierkelompok','sug_kode');
        $data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmsuplierkelompok/view_ifmsuplierkelompok',$data);
	}	
	// *---- End Script Function Master Kelompok Suplier -----* //

	// *---- Menu Tabel : Master Group Customer -----* //
	function ifshowtblmcustomergroup(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmcustomergroup','csg_kode');
		$data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmcustomergroup/view_ifmcustomergroup',$data);
	}

	function ifinsertmcustomergroup(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('csg_kode' => $this->input->post('a'),
						  'csg_nama' => $this->input->post('b'),
						  'user_c' => $this->session->id_users);
			$this->model_app->insert('tbl_ifmcustomergroup',$data);
			redirect('tabelcnt/ifloadmcustomergroup');
		}else{
			$this->template->load('app/template','app/modul_tbl/ifmcustomergroup/view_ifmcustomergroup_insert');
		}
	}

	function ifupdatemcustomergroup(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('csg_kode' => $this->input->post('a'),
						  'csg_nama' => $this->input->post('b'));
	    	$where = array('csg_kode' => $this->input->post('id'));
			$this->model_app->update('tbl_ifmcustomergroup', $data, $where);
			redirect('tabelcnt/ifloadmcustomergroup');
		}else{
			$data['row'] = $this->model_app->edit('tbl_ifmcustomergroup', array('csg_kode' => $id))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmcustomergroup/view_ifmcustomergroup_update',$data);
		}
	}

	function ifdeletemcustomergroup(){
		$id = $this->uri->segment(3);
		$idd = array('csg_kode' => $id);
		$this->model_app->delete('tbl_ifmcustomergroup',$idd);
		redirect('tabelcnt/ifloadmcustomergroup');
	}

	function ifloadmcustomergroup(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmcustomergroup','csg_kode');
        $data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmcustomergroup/view_ifmcustomergroup',$data);
	}	
	// *---- End Script Function Master Group Customer -----* //




	// *---- Menu Tabel : Master Warna -----* //
	function ifshowtblmwarna(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmwarna','war_kode');
		$data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmwarna/view_ifmwarna',$data);
	}

	function ifinsertmwarna(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('war_kode' => $this->input->post('a'),
						  'war_nama' => $this->input->post('b'),
						  'user_c' => $this->session->id_users);
			$this->model_app->insert('tbl_ifmwarna',$data);
			redirect('tabelcnt/ifloadmwarna');
		}else{
			$this->template->load('app/template','app/modul_tbl/ifmwarna/view_ifmwarna_insert');
		}
	}

	function ifupdatemwarna(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('war_kode' => $this->input->post('a'),
						  'war_nama' => $this->input->post('b'));
	    	$where = array('war_kode' => $this->input->post('id'));
			$this->model_app->update('tbl_ifmwarna', $data, $where);
			redirect('tabelcnt/ifloadmwarna');
		}else{
			$data['row'] = $this->model_app->edit('tbl_ifmwarna', array('war_kode' => $id))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmwarna/view_ifmwarna_update',$data);
		}
	}

	function ifdeletemwarna(){
		$id = $this->uri->segment(3);
		$idd = array('war_kode' => $id);
		$this->model_app->delete('tbl_ifmwarna',$idd);
		redirect('tabelcnt/ifloadmwarna');
	}

	function ifloadmwarna(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmwarna','war_kode');
        $data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmwarna/view_ifmwarna',$data);
	}	
	// *---- End Script Function Master Warna -----* //

	// *---- Menu Tabel : Master Group User -----* //
	function ifshowtblmusergroup(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmusergroup','usg_kode');
		$data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmusergroup/view_ifmusergroup',$data);
	}

	function ifinsertmusergroup(){
		cek_session_admin();
		if (isset($_POST['submit'])){
			$data = array('usg_kode' => $this->input->post('a'),
						  'usg_nama' => $this->input->post('b'),
						  'user_c' => $this->session->id_users);
			$this->model_app->insert('tbl_ifmusergroup',$data);
			redirect('tabelcnt/ifloadmusergroup');
		}else{
			$this->template->load('app/template','app/modul_tbl/ifmusergroup/view_ifmusergroup_insert');
		}
	}

	function ifupdatemusergroup(){
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('usg_kode' => $this->input->post('a'),
						  'usg_nama' => $this->input->post('b'));
	    	$where = array('usg_kode' => $this->input->post('id'));
			$this->model_app->update('tbl_ifmusergroup', $data, $where);
			redirect('tabelcnt/ifloadmusergroup');
		}else{
			$data['row'] = $this->model_app->edit('tbl_ifmusergroup', array('usg_kode' => $id))->row_array();
			$this->template->load('app/template','app/modul_tbl/ifmusergroup/view_ifmusergroup_update',$data);
		}
	}

	function ifdeletemusergroup(){
		$id = $this->uri->segment(3);
		$idd = array('usg_kode' => $id);
		$this->model_app->delete('tbl_ifmusergroup',$idd);
		redirect('tabelcnt/ifloadmusergroup');
	}

	function ifloadmusergroup(){
		cek_session_admin();
		$data = $this->model_app->view_all_desc('tbl_ifmusergroup','usg_kode');
        $data = array('record' => $data);
		$this->template->load('app/template','app/modul_tbl/ifmusergroup/view_ifmusergroup',$data);
	}	
	// *---- End Script Function Master Group User -----* //

}
