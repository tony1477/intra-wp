<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpo_ifmstrukturorgcs extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('libprocms');
		$this->load->database();
    }

	// *---- Fungsi Untuk Menampilkan Data -----* //
	function ifshowstrukturorg() {
		ifceksessionuser();
		$data = $this->libprocms->ifsqlselectjoin('sop_ifmstrukturorg.stg_kode, sop_ifmstrukturorg.stg_nama, sop_ifmstrukturorg.stg_nama2, tbl_ifmdepartemen.dep_nama, sop_ifmstrukturorg.stg_nmfile, sop_ifmstrukturorg.stg_cover, sop_ifmstrukturorg.stg_publish, sop_ifmstrukturorg.stg_aktif, sop_ifmstrukturorg.stg_default', 'sop_ifmstrukturorg', 'tbl_ifmdepartemen', 'dep_kode', 'sop_ifmstrukturorg.stg_kode', 'ASC');
		$data = array('ardatastruktur' => $data);
		$this->template->load('app/template','app/modul_bpo/ifmstrukturorgvw/bpo_ifmstrukturorg_tablevw', $data);
	}

	// *---- Fungsi Untuk Insert Data Record -----* //
	function ifinsertrecord() {
		ifceksessionuser();

		if (isset($_POST['submit'])) {

			$losql = $this->db->query("SELECT stg_kode FROM sop_ifmstrukturorg where stg_kode='".$this->input->post('txtkode')."'");
			if ($losql->num_rows() > 0) {
				echo "<script>alert('Kode struktur organisasi sudah ada, mohon periksa kembali');</script>";
				//echo "<script>alert('Kode Group Divisi sudah ada, mohon periksa kembali'); window.location='app/modul_tbl/ifmprovinsi/view_ifmprovinsi_insert.php';</script>";

				$arr['ardatatemp'] = $this->libprocms->ifsqlselect('dep_kode, dep_nama','tbl_ifmdepartemen','dep_kode','ASC');
		
				$this->template->load('app/template','app/modul_bpo/ifmstrukturorgvw/bpo_ifmstrukturorg_insertvw', $arr);

			} else {
                
				//-------* Load Library Upload Bawaan Default CI *--------//
				$this->load->library("upload");
            
				//-------* File Struktur Organisasi *--------//
				$config = array(
						'upload_path' => FCPATH . 'datastruktur/file/',
						'allowed_types' => 'pdf|doc|docx|rtf|ppt|pptx|xls|xlsx|txt',
						'max_size' => '35000');
						//$config['encrypt_name'] = TRUE;
						//$config['overwrite'] = FALSE;
				$this->upload->initialize($config);
				$this->upload->do_upload("txtfile");
				$filedatasop = $this->upload->data();
				$filesop = $filedatasop['file_name'];
	
				//-------* File Cover Image Struktur *--------//
				$config = array(
					'upload_path' => FCPATH . 'datastruktur/cover/',
					'allowed_types' => 'gif|jpg|jpeg|bmp|ico|png',
					'max_size' => '30000');
					//$config['encrypt_name'] = TRUE;
					//$config['overwrite'] = FALSE;
				$this->upload->initialize($config);
				$this->upload->do_upload("txtcoversop");
				$filecoversop = $this->upload->data();
				$filecoverimage = $filecoversop['file_name'];
				
				//-------* Simpan sementara di variabel array *--------//
                $arr = array('stg_kode' => $this->input->post('txtkode'),
                             'stg_nama' => $this->input->post('txtnama'),
                             'stg_nama2'=> $this->input->post('txtnama2'),
                             'dep_kode' => $this->input->post('cmbgroup'),
                             'stg_nmfile' => $filesop,
							 'stg_cover' => $filecoverimage,
							 'stg_publish' => $this->input->post('optpublish'),
							 'stg_aktif' => $this->input->post('optstatus'),
							 'stg_default' => $this->input->post('optdefault'),
                             'user_c' => $this->session->user_kode,
                             'tgl_c'=>date('Y-m-d'),
                             'time_c'=>date("h:i:s a"));

			    $llresult = $this->libprocms->ifsqlinsert('sop_ifmstrukturorg', $arr);
                if ($llresult) {
                    echo "<script>alert('Sukses insert data');</script>";
				    redirect('modul_bpo/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifshowstrukturorg');
                } else {
                    echo "<script>alert('Gagal insert data');</script>";
                    redirect('modul_bpo/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifshowstrukturorg');
					//print_r($llresult);
                }

			}

		} else {

				$arr['ardatatemp'] = $this->libprocms->ifsqlselect('dep_kode, dep_nama','tbl_ifmdepartemen','dep_kode','ASC');

				$this->template->load('app/template','app/modul_bpo/ifmstrukturorgvw/bpo_ifmstrukturorg_insertvw', $arr);
		}
	}

    // *---- Fungsi Untuk Update Data Record -----* //
	function ifupdaterecord() {
		ifceksessionuser();
		$idkode = rawurldecode($this->uri->segment(5));
		if (isset($_POST['submit'])) {

			//-------* Load Library Upload Bawaan Default CI *--------//
			$this->load->library("upload");
		
			//-------* File Dokumen SOP *--------//
			$config = array(
					'upload_path' => FCPATH . 'datastruktur/file/',
					'allowed_types' => 'pdf|doc|docx|rtf|ppt|pptx|xls|xlsx|txt',
					'max_size' => '35000');
					//$config['encrypt_name'] = TRUE;
					//$config['overwrite'] = FALSE;
			$this->upload->initialize($config);
			$this->upload->do_upload("txtfile");
			$filedatasop = $this->upload->data();
			$filesop = $filedatasop['file_name'];

			//-------* File Cover Image SOP *--------//
			$config = array(
				'upload_path' => FCPATH . 'datastruktur/cover/',
				'allowed_types' => 'gif|jpg|jpeg|bmp|ico|png',
				'max_size' => '30000');
				//$config['encrypt_name'] = TRUE;
				//$config['overwrite'] = FALSE;
			$this->upload->initialize($config);
			$this->upload->do_upload("txtcoversop");
			$filecoversop = $this->upload->data();
			$filecoverimage = $filecoversop['file_name'];

			if (($filesop == '') AND ($filecoverimage == '')) {
				//-------* Simpan sementara di variabel array *--------//
                $arr = array('stg_nama' => $this->input->post('txtnama'),
                             'stg_nama2'=> $this->input->post('txtnama2'),
                             'dep_kode' => $this->input->post('cmbgroup'),
							 'stg_publish' => $this->input->post('optpublish'),
							 'stg_aktif' => $this->input->post('optstatus'),
							 'stg_default' => $this->input->post('optdefault'),
                             'user_m' => $this->session->user_kode,
                             'tgl_m'=>date('Y-m-d'),
                             'time_m'=>date("h:i:s a"));

			} elseif (($filesop !== '') AND ($filecoverimage == '')) { 	 
				//-------* Simpan sementara di variabel array *--------//
                $arr = array('stg_nama' => $this->input->post('txtnama'),
                             'stg_nama2'=> $this->input->post('txtnama2'),
                             'dep_kode' => $this->input->post('cmbgroup'),
                             'stg_nmfile' => $filesop,
							 'stg_publish' => $this->input->post('optpublish'),
							 'stg_aktif' => $this->input->post('optstatus'),
							 'stg_default' => $this->input->post('optdefault'),
                             'user_m' => $this->session->user_kode,
                             'tgl_m'=>date('Y-m-d'),
                             'time_m'=>date("h:i:s a"));

			} elseif (($filesop == '') AND ($filecoverimage !== '')) {
				//-------* Simpan sementara di variabel array *--------//
                $arr = array('stg_nama' => $this->input->post('txtnama'),
                             'stg_nama2'=> $this->input->post('txtnama2'),
                             'dep_kode' => $this->input->post('cmbgroup'),
							 'stg_cover' => $filecoverimage,
							 'stg_publish' => $this->input->post('optpublish'),
							 'stg_aktif' => $this->input->post('optstatus'),
							 'stg_default' => $this->input->post('optdefault'),
                             'user_m' => $this->session->user_kode,
                             'tgl_m'=>date('Y-m-d'),
                             'time_m'=>date("h:i:s a"));
										
			} elseif (($filesop !== '') AND ($filecoverimage !== '')) {							
				//-------* Simpan sementara di variabel array *--------//
                $arr = array('stg_nama' => $this->input->post('txtnama'),
                             'stg_nama2'=> $this->input->post('txtnama2'),
                             'dep_kode' => $this->input->post('cmbgroup'),
                             'stg_nmfile' => $filesop,
							 'stg_cover' => $filecoverimage,
							 'stg_publish' => $this->input->post('optpublish'),
							 'stg_aktif' => $this->input->post('optstatus'),
							 'stg_default' => $this->input->post('optdefault'),
                             'user_m' => $this->session->user_kode,
                             'tgl_m'=>date('Y-m-d'),
                             'time_m'=>date("h:i:s a"));

			} else {

				//-------* Simpan sementara di variabel array *--------//
                $arr = array('stg_nama' => $this->input->post('txtnama'),
                             'stg_nama2'=> $this->input->post('txtnama2'),
                             'dep_kode' => $this->input->post('cmbgroup'),
							 'stg_publish' => $this->input->post('optpublish'),
							 'stg_aktif' => $this->input->post('optstatus'),
							 'stg_default' => $this->input->post('optdefault'),
                             'user_m' => $this->session->user_kode,
                             'tgl_m'=>date('Y-m-d'),
                             'time_m'=>date("h:i:s a"));
			}

			$lcwhere = array('stg_kode' => $this->input->post('idkode'));
 
			$llresult = $this->libprocms->ifsqlupdate('sop_ifmstrukturorg', $arr, $lcwhere);
			if ($llresult) {
				echo "<script>alert('Sukses update data');</script>";
				redirect('modul_bpo/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifshowstrukturorg');
			} else {
				echo "<script>alert('Gagal insert data');</script>";
				redirect('modul_bpo/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifshowstrukturorg');
				//print_r($llresult);
			}

		} else {

			$arr['ardatatemp'] = $this->libprocms->ifsqlselect('dep_kode, dep_nama','tbl_ifmdepartemen','dep_kode','ASC');

			$arr['row'] = $this->libprocms->ifsqledit('sop_ifmstrukturorg', array('stg_kode' => $idkode))->row_array();
			
			$this->template->load('app/template','app/modul_bpo/ifmstrukturorgvw/bpo_ifmstrukturorg_updatevw', $arr);
		}
	}
	
 	function ifdeleterecord() {
		$lcsegment = rawurldecode($this->uri->segment(5));
		$lcwhere = array('stg_kode' => $lcsegment);
	    
		$llresult = $this->libprocms->ifsqldelete('sop_ifmstrukturorg', $lcwhere);
        if ($llresult) {
			echo "<script>alert('Sukses hapus data');</script>";
			redirect('modul_bpo/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifshowstrukturorg');
		} else {
			echo "<script>alert('Gagal hapus data');</script>";
			redirect('modul_bpo/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifshowstrukturorg');
		}

		//$tsql = $this->libprocms->ifsqldelete('sop_ifmdokumen', $lcwhere);        
		//if($tsql) {
		    //$datapath = "./datasop/file/".$row["dok_nmfile"];
        	// cek jika file ada
		    //if(file_exists($datapath)) {
			//    echo "<script>alert('xxxxxx');</script>";
			//    unlink("datasop/file/".$_id->dok_nmfile);
		    //}
	    //}
	}

	// *---- Fungsi Untuk Menampilkan Data Struktur Di SOP Dokumen Display (loginsopwpg) -----* //
	function ifdisplaybpostrukturorg() {
		ifceksessionuser();
		//$lcusergroup = $this->session->guser_kode;
		if ($this->session->user_level <> '1') {
			$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
		    //$data = $this->libprocms->ifsqlselectjoinwhere('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', array('sop_ifmdokumen.dep_kode'=>$this->session->dep_kode), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');			
		} else {
			$data = $this->libprocms->ifsqlselectjoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data = $this->libprocms->ifsqlselectjoin2tabel('sop_ifmdokumenuser.dok_id, sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');			
		}
		$data = array('ardatatemp' => $data);
		$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_displayvw', $data);
	}

	function ifdownloadfile() {
		//cek_session_akses('download', $this->session->id_session);
		$loceknamafile = $this->libprocms->ifviewgetwhere('sop_ifmdokumen', array('dok_nmfile2' => $this->uri->segment(5)));
		
		if ($loceknamafile->num_rows() <= 0) {
			redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensop');
		} else {
			$row = $loceknamafile->row_array();
			$lnjumhitsdownload = array('hitsdwnl'=>$row['hitsdwnl']+1);
			$lcwhere = array('dok_nosop' => $row['dok_nosop']);
			$this->libprocms->ifsqlupdate('sop_ifmdokumen', $lnjumhitsdownload, $lcwhere);

			$lcsegment = $this->uri->segment(5);
			$lofiledata = file_get_contents("datasop/form/".$lcsegment);
			force_download($lcsegment, $lofiledata);
			//@readfile($lofiledata);
		}
	}

	function viewbuttonstrukturorg() {
		ifceksessionuser();
		$this->template->load('app/templatebpo','app/view_homebpo');
	}		
	
	function viewpdf($tcnosop) {
        $lnsqlnumrows = $this->libprocms->ifsqldetaildata('sop_ifmdokumen', 'dok_nosop', $tcnosop, 'tbl_ifmdepartemen', 'dep_kode'); 
		$rowarr = $lnsqlnumrows->row_array();
		$data['row'] = $rowarr;
		if ($this->session->user_level == '2') {
            $this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop2_viewpdfvw', $data);		    
		} else {
			$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_viewpdfvw', $data);
		}
	}

}
