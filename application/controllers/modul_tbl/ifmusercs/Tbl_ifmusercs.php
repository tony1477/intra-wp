<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_ifmusercs extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('libprocms');
		$this->load->model('libmodelsopms');
		$this->load->database();
    }

	// *---- Fungsi Untuk Menampilkan Data -----* //
	function ifshowtbluser() {
		ifceksessionuser();
		$data = $this->libprocms->ifsqlselectjoin('tbl_ifmuser.user_kode, tbl_ifmuser.user_nama, tbl_ifmusergroup.guser_nama, tbl_ifmuser.dep_kode, tbl_ifmuser.user_email, tbl_ifmuser.user_level, tbl_ifmuser.user_stts, tbl_ifmuser.user_blokir', 'tbl_ifmuser', 'tbl_ifmusergroup', 'guser_kode', 'tbl_ifmusergroup.guser_nama, tbl_ifmuser.user_kode', 'ASC');
		$data = array('ardatatemp' => $data);

		$this->template->load('app/template','app/modul_tbl/ifmuservw/tbl_ifmuser_tablevw', $data);
	}

	// *---- Fungsi Untuk Insert Data Record -----* //
	function ifinsertrecord() {
		ifceksessionuser();

		if (isset($_POST['submit'])) {
			$losql = $this->db->query("SELECT user_kode FROM tbl_ifmuser where user_kode ='".$this->input->post('txtkode')."'");
			if ($losql->num_rows() > 0) {
				echo "<script>alert('Kode user sudah ada, mohon periksa kembali');</script>";
				//echo "<script>alert('Kode Group Divisi sudah ada, mohon periksa kembali'); window.location='app/modul_tbl/ifmprovinsi/view_ifmprovinsi_insert.php';</script>";

				$arr['argroupuser'] = $this->libprocms->ifsqlselect('guser_kode, guser_nama','tbl_ifmusergroup','guser_kode','ASC');
				$arr['ardepartemen'] = $this->libprocms->ifsqlselect('dep_kode, dep_nama','tbl_ifmdepartemen','dep_kode','ASC');
				
				$this->template->load('app/template','app/modul_tbl/ifmuservw/tbl_ifmuser_insertvw', $arr);

			} else {

				//-------* Load Library Upload Bawaan Default CI *--------//
				$this->load->library("upload");
            
				//-------* File Gambar User *--------//
				$config = array(
					'upload_path' => FCPATH . 'ifassetadm/imguser/',
					'allowed_types' => 'gif|jpg|jpeg|bmp|ico|png',
					'max_size' => '20000');
					//$config['encrypt_name'] = TRUE;
					//$config['overwrite'] = FALSE;
				$this->upload->initialize($config);
				$this->upload->do_upload("txtgambar");
				$fileimguser = $this->upload->data();
				$fileimg = $fileimguser['file_name'];

				$arr = array('user_kode' => $this->db->escape_str($this->input->post('txtkode')),
	 						 'user_nama' => $this->db->escape_str($this->input->post('txtnama')),
							 'user_pwd' => $this->db->escape_str(md5($this->input->post('txtpasword'))),
							 'guser_kode' => $this->db->escape_str($this->input->post('cmbgroup')),
							 'dep_kode' => $this->db->escape_str($this->input->post('cmbdepartemen')),
							 'user_email' =>  $this->db->escape_str($this->input->post('txtemail')),
							 'user_level' =>  $this->db->escape_str($this->input->post('optlevel')),
							 'user_stts' =>  $this->db->escape_str($this->input->post('optstatus')),
							 'user_blokir' =>  $this->db->escape_str($this->input->post('optblokir')),
							 'user_fhoto' => $fileimg,
							 'user_c' => $this->session->user_kode,
							 'user_m' => $this->session->user_kode,
							 'tgl_c'=>date('Y-m-d'),
							 'tgl_m'=>date('Y-m-d'),
							 'time_c'=>date("h:i:s a"),
							 'time_m'=>date("h:i:s a"));

			    $this->libprocms->ifsqlinsert('tbl_ifmuser', $arr);

				$lncountmodul = count($this->input->post('chkmodul'));
				$lcmodul = $this->input->post('chkmodul');

				$lcsessid = md5($this->input->post('txtkode')).'-'.date('YmdHis');
				$lckds = $this->db->escape_str($this->input->post('txtkode'));
				$lcdept = $this->db->escape_str($this->input->post('cmbdepartemen'));
				$lcusercr = $this->session->user_kode;
				$lcusermd = $lcusercr;
				$ldtglcr = date('Y-m-d');
				$ldtglmd = $ldtglcr;
				$lctimecr = date("h:i:s a");
				$lctimemd = $lctimecr;

				for ($i = 0; $i < $lncountmodul; $i++) {
				    $ardtmodul = array('id_session' => $lcsessid,					    
								    'dok_nosop' => $lcmodul[$i],
									'dep_kode' => $lcdept,
									'user_kode' => $lckds,
									'user_c' => $lcusercr,
									'user_m' => $lcusermd,
									'tgl_c' => $ldtglcr,
									'tgl_m' => $ldtglmd,
									'time_c' => $lctimecr,
									'time_m' => $lctimemd);
				
					$this->libprocms->ifsqlinsert('sop_ifmdokumenuser', $ardtmodul);
				}

				redirect('modul_tbl/ifmusercs/tbl_ifmusercs/ifshowtbluser');
			}

		} else {

				$arr['argroupuser'] = $this->libprocms->ifsqlselect('guser_kode, guser_nama','tbl_ifmusergroup','guser_kode','ASC');
				$arr['ardepartemen'] = $this->libprocms->ifsqlselect('dep_kode, dep_nama','tbl_ifmdepartemen','dep_kode','ASC');
			
				$arr['armodul'] = $this->libprocms->ifvieworderingwhere('sop_ifmdokumen', array('dok_publish' => 'Y', 'dok_aktif' => 'Y'), 'dok_nosop', 'ASC');

				$this->template->load('app/template','app/modul_tbl/ifmuservw/tbl_ifmuser_insertvw', $arr);
		}
	}

    // *---- Fungsi Untuk Update Data Record -----* //
	function ifupdaterecord() {
		ifceksessionuser();
		$idkode = rawurldecode($this->uri->segment(5));

		if (isset($_POST['submit'])) {
			//-------* Load Library Upload Bawaan Default CI *--------//
			$this->load->library("upload");
		
			//-------* File Gambar User *--------//
			$config = array(
					'upload_path' => FCPATH . 'ifassetadm/imguser/',
					'allowed_types' => 'gif|jpg|jpeg|bmp|ico|png',
					'max_size' => '20000');
					//$config['encrypt_name'] = TRUE;
					//$config['overwrite'] = FALSE;
			$this->upload->initialize($config);
			$this->upload->do_upload("txtgambar");
			$fileimguser = $this->upload->data();
			$fileimg = $fileimguser['file_name'];

			if (($fileimg == '')) {
                
				//if (empty($this->input->post('txtpasword'))) {
				if ($this->input->post('txtpasword') =='') {
					$arr = array('user_kode' => $this->db->escape_str($this->input->post('txtkode')),
								'user_nama' => $this->db->escape_str($this->input->post('txtnama')),
								'guser_kode' => $this->db->escape_str($this->input->post('cmbgroup')),
								'dep_kode' => $this->db->escape_str($this->input->post('cmbdepartemen')),
								'user_email' =>  $this->db->escape_str($this->input->post('txtemail')),
								'user_level' =>  $this->db->escape_str($this->input->post('optlevel')),
								'user_stts' =>  $this->db->escape_str($this->input->post('optstatus')),
								'user_blokir' =>  $this->db->escape_str($this->input->post('optblokir')),
								'user_c' => $this->session->user_kode,
								'user_m' => $this->session->user_kode,
								'tgl_c'=>date('Y-m-d'),
								'tgl_m'=>date('Y-m-d'),
								'time_c'=>date("h:i:s a"),
								'time_m'=>date("h:i:s a"));
				} else {
					$arr = array('user_kode' => $this->db->escape_str($this->input->post('txtkode')),
								'user_nama' => $this->db->escape_str($this->input->post('txtnama')),
								'user_pwd' => $this->db->escape_str(md5($this->input->post('txtpasword'))),
								'guser_kode' => $this->db->escape_str($this->input->post('cmbgroup')),
								'dep_kode' => $this->db->escape_str($this->input->post('cmbdepartemen')),
								'user_email' =>  $this->db->escape_str($this->input->post('txtemail')),
								'user_level' =>  $this->db->escape_str($this->input->post('optlevel')),
								'user_stts' =>  $this->db->escape_str($this->input->post('optstatus')),
								'user_blokir' =>  $this->db->escape_str($this->input->post('optblokir')),
								'user_c' => $this->session->user_kode,
								'user_m' => $this->session->user_kode,
								'tgl_c'=>date('Y-m-d'),
								'tgl_m'=>date('Y-m-d'),
								'time_c'=>date("h:i:s a"),
								'time_m'=>date("h:i:s a"));
				}

			} elseif (($fileimg !== '')) { 	 

				//if (empty($this->input->post('txtpasword'))) {
				if ($this->input->post('txtpasword') =='') {	
					$arr = array('user_kode' => $this->db->escape_str($this->input->post('txtkode')),
								'user_nama' => $this->db->escape_str($this->input->post('txtnama')),
								'guser_kode' => $this->db->escape_str($this->input->post('cmbgroup')),
								'dep_kode' => $this->db->escape_str($this->input->post('cmbdepartemen')),
								'user_email' =>  $this->db->escape_str($this->input->post('txtemail')),
								'user_level' =>  $this->db->escape_str($this->input->post('optlevel')),
								'user_stts' =>  $this->db->escape_str($this->input->post('optstatus')),
								'user_blokir' =>  $this->db->escape_str($this->input->post('optblokir')),
								'user_fhoto' => $fileimg,
								'user_c' => $this->session->user_kode,
								'user_m' => $this->session->user_kode,
								'tgl_c'=>date('Y-m-d'),
								'tgl_m'=>date('Y-m-d'),
								'time_c'=>date("h:i:s a"),
								'time_m'=>date("h:i:s a"));
				} else {
					$arr = array('user_kode' => $this->db->escape_str($this->input->post('txtkode')),
								'user_nama' => $this->db->escape_str($this->input->post('txtnama')),
								'user_pwd' => $this->db->escape_str(md5($this->input->post('txtpasword'))),
								'guser_kode' => $this->db->escape_str($this->input->post('cmbgroup')),
								'dep_kode' => $this->db->escape_str($this->input->post('cmbdepartemen')),
								'user_email' =>  $this->db->escape_str($this->input->post('txtemail')),
								'user_level' =>  $this->db->escape_str($this->input->post('optlevel')),
								'user_stts' =>  $this->db->escape_str($this->input->post('optstatus')),
								'user_blokir' =>  $this->db->escape_str($this->input->post('optblokir')),
								'user_fhoto' => $fileimg,
								'user_c' => $this->session->user_kode,
								'user_m' => $this->session->user_kode,
								'tgl_c'=>date('Y-m-d'),
								'tgl_m'=>date('Y-m-d'),
								'time_c'=>date("h:i:s a"),
								'time_m'=>date("h:i:s a"));
				}			
			} else {
                
				//if (empty($this->input->post('txtpasword'))) {
				if ($this->input->post('txtpasword') =='') {	
					$arr = array('user_kode' => $this->db->escape_str($this->input->post('txtkode')),
								'user_nama' => $this->db->escape_str($this->input->post('txtnama')),
								'guser_kode' => $this->db->escape_str($this->input->post('cmbgroup')),
								'dep_kode' => $this->db->escape_str($this->input->post('cmbdepartemen')),
								'user_email' =>  $this->db->escape_str($this->input->post('txtemail')),
								'user_level' =>  $this->db->escape_str($this->input->post('optlevel')),
								'user_stts' =>  $this->db->escape_str($this->input->post('optstatus')),
								'user_blokir' =>  $this->db->escape_str($this->input->post('optblokir')),
								'user_c' => $this->session->user_kode,
								'user_m' => $this->session->user_kode,
								'tgl_c'=>date('Y-m-d'),
								'tgl_m'=>date('Y-m-d'),
								'time_c'=>date("h:i:s a"),
								'time_m'=>date("h:i:s a"));
				} else {
					$arr = array('user_kode' => $this->db->escape_str($this->input->post('txtkode')),
								'user_nama' => $this->db->escape_str($this->input->post('txtnama')),
								'user_pwd' => $this->db->escape_str(md5($this->input->post('txtpasword'))),
								'guser_kode' => $this->db->escape_str($this->input->post('cmbgroup')),
								'dep_kode' => $this->db->escape_str($this->input->post('cmbdepartemen')),
								'user_email' =>  $this->db->escape_str($this->input->post('txtemail')),
								'user_level' =>  $this->db->escape_str($this->input->post('optlevel')),
								'user_stts' =>  $this->db->escape_str($this->input->post('optstatus')),
								'user_blokir' =>  $this->db->escape_str($this->input->post('optblokir')),
								'user_c' => $this->session->user_kode,
								'user_m' => $this->session->user_kode,
								'tgl_c'=>date('Y-m-d'),
								'tgl_m'=>date('Y-m-d'),
								'time_c'=>date("h:i:s a"),
								'time_m'=>date("h:i:s a"));
				}
			}
            
			$this->libprocms->ifsqlupdate('tbl_ifmuser', $arr, $idkode);

		    //redirect('modul_tbl/ifmusercs/tbl_ifmusercs/ifupdaterecord/'.$this->input->post('txtkode'));
			redirect('modul_tbl/ifmusercs/tbl_ifmusercs/ifshowtbluser');

		} else {

			$arr['argroupuser'] = $this->libprocms->ifsqlselect('guser_kode, guser_nama','tbl_ifmusergroup','guser_kode','ASC');
			$arr['ardepartemen'] = $this->libprocms->ifsqlselect('dep_kode, dep_nama','tbl_ifmdepartemen','dep_kode','ASC');

			$arr['row'] = $this->libprocms->ifsqledit('tbl_ifmuser', array('user_kode' => $idkode))->row_array();

			$arr['arusermodul'] = $this->libprocms->ifsqlselectalljoinwhere('sop_ifmdokumenuser', 'sop_ifmdokumen', 'dok_nosop', array('user_kode' => $idkode), 'dok_id', 'ASC');

			$arr['armodul'] = $this->libprocms->ifvieworderingwhere('sop_ifmdokumen', array('dok_publish' => 'Y', 'dok_aktif' => 'Y'), 'dep_kode, kat_kode, dok_nosop', 'ASC');

			$arr['rowaksesmodul'] = $this->libprocms->ifsqledit('sop_ifmdokumenuser', array('user_kode' => $idkode))->row_array();

			$this->template->load('app/template', 'app/modul_tbl/ifmuservw/tbl_ifmuser_updatevw', $arr);
		}
	}

 	function ifdeleterecord() {
		$lcsegment = rawurldecode($this->uri->segment(5));
		$lcwhere = array('user_kode' => $lcsegment);

		$this->libprocms->ifsqldelete('tbl_ifmuser', $lcwhere);
		
		$this->libprocms->ifsqldelete('sop_ifmdokumenuser', $lcwhere);
		
		redirect('modul_tbl/ifmusercs/tbl_ifmusercs/ifshowtbluser');
	}

	function ifdeleteaksesmodul(){
        ifceksessionuser();
        //$lcdokid = array('dok_id' => $this->uri->segment(5));
        //$this->libprocms->ifsqldelete('sop_ifmdokumenuser', $lcdokid);
		$lckduser = array('user_kode' => $this->uri->segment(5));
		$this->libprocms->ifsqldelete('sop_ifmdokumenuser', $lckduser);
        redirect('modul_tbl/ifmusercs/tbl_ifmusercs/ifupdaterecord/'.$this->uri->segment(5));
    }

	function ifbukahaksesmodul() {
		if (isset($_POST['submit'])) {
			$lcmodul = $this->input->post('id_moduldok[]');
			$lncountmodul = $this->input->post('id_moduldok[]');
	
			$lcsessid = md5($this->input->post('myidkode')).'-'.date('YmdHis');
			$lckds = $this->db->escape_str($this->input->post('myidkode'));
			$lcdept = $this->db->escape_str($this->input->post('myiddept'));
			$lcusercr = $this->session->user_kode;
			$lcusermd = $lcusercr;
			$ldtglcr = date('Y-m-d');
			$ldtglmd = $ldtglcr;
			$lctimecr = date("h:i:s a");
			$lctimemd = $lctimecr;
            
			//echo "<pre>";
			//    print_r($lckds);
			//    print_r($lncountmodul);
			//echo "</pre>";

			for ($i = 0; $i < count($lncountmodul); $i++) {
				$lcidmoduldok = $lncountmodul[$i];

				$ardtmodul = array('id_session' => $lcsessid,					    
					'dok_nosop' => $lcidmoduldok,
					'dep_kode' => $lcdept,
					'user_kode' => $lckds,
					'user_c' => $lcusercr,
					'user_m' => $lcusermd,
					'tgl_c' => $ldtglcr,
					'tgl_m' => $ldtglmd,
					'time_c' => $lctimecr,
					'time_m' => $lctimemd);

				$losql = $this->db->query("SELECT user_kode, dok_nosop FROM sop_ifmdokumenuser where user_kode ='".rawurldecode($lckds)."' and dok_nosop = '".rawurldecode($lcidmoduldok)."'");
				if ($losql->num_rows() == 0) {
				    $this->libprocms->ifsqlinsert('sop_ifmdokumenuser', $ardtmodul);

				} else {

					//$arredtmodul = array('id_session' => $lcsessid,					    
					//	'dep_kode' => $lcdept,
					//	'user_c' => $lcusercr,
					//	'user_m' => $lcusermd,
					//	'tgl_c' => $ldtglcr,
					//	'tgl_m' => $ldtglmd,
					//	'time_c' => $lctimecr,
					//	'time_m' => $lctimemd);
					//$lcwhere = array('user_kode' => rawurldecode($lckds), 'dok_nosop' => rawurldecode($lcidmoduldok));
					//$this->libprocms->ifsqlupdate('sop_ifmdokumenuser', $arredtmodul, $lcwhere);
                    
					//$lcwhere = array('user_kode' => rawurldecode($lckds));
					//$this->libprocms->ifsqldelete('sop_ifmdokumenuser', $lcwhere);
					//$this->libprocms->ifsqlinsert('sop_ifmdokumenuser', $ardtmodul);

				}
			}

			redirect('modul_tbl/ifmusercs/tbl_ifmusercs/ifshowtbluser');

		} else {
			
            $lckds = rawurldecode($this->uri->segment(5));
			$arr['arrusertemp'] = $this->db->get_where('tbl_ifmuser', array('user_kode'=>$lckds))->row_array();
			$arr['armodultemp'] = $this->libprocms->ifsqlgetselectresult('select a.dok_nosop, a.dok_nmsop, a.dep_kode, b.dep_nama from sop_ifmdokumen a left outer join tbl_ifmdepartemen b on a.dep_kode = b.dep_kode order by a.dok_nosop');
			$this->template->load('app/template', 'app/modul_tbl/ifmuservw/tbl_ifmuser_haksesmodulvw', $arr);
		}
    }

    function ifhaksesmodulajax() {
        $id_modul       = $_GET['idnosop'];  // idnosop -> diambil dari fungsi javascript di view (tbl_ifmuser_haksesmodulvw.php)
        $id_user_modul  = $_GET['iduser'];   // iduser ->  diambil dari fungsi javascript di view (tbl_ifmuser_haksesmodulvw.php)
		$id_dept        = $_GET['iddept'];
		$lcsessid       = md5($_GET['iduser']).'-'.date('YmdHis');
		$lcusercr       = $this->session->user_kode;
		$lcusermd 		= $this->session->user_kode;
		$ldtglcr 		= date('Y-m-d');
		$ldtglmd 		= date('Y-m-d');
		$lctimecr 		= date("h:i:s a");
		$lctimemd 		= date("h:i:s a");
	
		//echo "<pre>";
		//	print_r($id_modul);
		//	print_r($id_user_modul);
		//echo "</pre>";
		//echo "<script>alert($id_modul);</script>";
		//echo "<script>alert($id_user_modul);</script>";

        // chek data array
		$lcwhere = array('user_kode' => rawurldecode($id_user_modul), 'dok_nosop' => rawurldecode($id_modul));
        $params = array('dok_nosop'=>$id_modul, 'user_kode'=>$id_user_modul, 'dep_kode'=>$id_dept, 'id_session'=>$lcsessid, 'user_c'=>$lcusercr, 
		                'user_m'=>$lcusermd, 'tgl_c'=>$ldtglcr, 'tgl_m'=>$ldtglmd, 'time_c'=>$lctimecr, 'time_m'=>$lctimemd);

        $aksesmdl = $this->db->get_where('sop_ifmdokumenuser', $lcwhere);
        if ($aksesmdl->num_rows() < 1) {
            // insert record dokumen baru
            $this->db->insert('sop_ifmdokumenuser', $params);
        } else {
            //$this->db->where('dok_nosop', $id_modul);
            //$this->db->where('user_kode', $id_user_modul);
            //$this->db->delete('sop_ifmdokumenuser');
			$this->libprocms->ifsqldelete('sop_ifmdokumenuser', $lcwhere);
        }
    }

	public function ifgetdokumensop() {
		$getmst = $this->db->get_where('sop_ifmdokumen', array('dok_aktif'=>'Y'));
		$data['mst'] = $getmst->result();
		echo json_encode($data);
	}


}
