<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpo_ifmdokumensopcs extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('libprocms');
		$this->load->model('libmodelsopms');
		$this->load->database();
    }

	// *---- Fungsi Untuk Menampilkan Data -----* //
	function ifshowbpodokumensop() {
		ifceksessionuser();
		$data = $this->libprocms->ifsqlselectjoin2tabel('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_nmfile3, sop_ifmdokumen.dok_nmfile4, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumen.hitsdwnl, tbl_ifmdepartemen.dep_nama, sop_ifmkategori.kat_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'sop_ifmkategori', 'dep_kode', 'kat_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmkategori.kat_nama, sop_ifmdokumen.dok_nosop', 'ASC');
		$data = array('ardatatemp' => $data);
		$this->template->load('app/template','app/modul_bpo/ifmdokumensopvw/bpo_ifmdokumensop_tablevw', $data);
	}

	// *---- Fungsi Untuk Insert Data Record -----* //
	function ifinsertrecord() {
		ifceksessionuser();

		if (isset($_POST['submit'])) {

			$losql = $this->db->query("SELECT dok_nosop FROM sop_ifmdokumen where dok_nosop='".$this->input->post('txtnosop')."'");
			if ($losql->num_rows() > 0) {
				echo "<script>alert('Nomor SOP dokumen sudah ada, mohon periksa kembali');</script>";
				//echo "<script>alert('Kode Group Divisi sudah ada, mohon periksa kembali'); window.location='app/modul_tbl/ifmprovinsi/view_ifmprovinsi_insert.php';</script>";

				$arr['ardatatemp'] = $this->libprocms->ifsqlselect('dep_kode, dep_nama','tbl_ifmdepartemen','dep_kode','ASC');

				$arr['arkategori'] = $this->libprocms->ifsqlselect('kat_kode, kat_nama','sop_ifmkategori','kat_kode','ASC');
		
				$this->template->load('app/template','app/modul_bpo/ifmdokumensopvw/bpo_ifmdokumensop_insertvw', $arr);

			} else {
                
				//-------* Load Library Upload Bawaan Default CI *--------//
				$this->load->library("upload");
            
				//-------* File Dokumen SOP *--------//
				$config = array(
						'upload_path' => FCPATH . 'datasop/file/',
						'allowed_types' => 'gif|jpg|png|zip|rar|pdf|doc|docx|rtf|ppt|pptx|xls|xlsx|txt',
						'max_size' => '26200');
						//$config['encrypt_name'] = TRUE;
						//$config['overwrite'] = FALSE;
				$this->upload->initialize($config);
				$this->upload->do_upload("txtfile");
				$filedatasop = $this->upload->data();
				$filesop = $filedatasop['file_name'];
	
				//-------* File Dokumen Form *--------//
				$config = array(
						'upload_path' => FCPATH . 'datasop/form/',
						'allowed_types' => 'pdf|doc|docx|rtf|ppt|pptx|xls|xlsx|txt',
						'max_size' => '30000');
						//$config['encrypt_name'] = TRUE;
						//$config['overwrite'] = FALSE;
				$this->upload->initialize($config);
				$this->upload->do_upload("txtfile2");
				$filedataform = $this->upload->data();
				$fileform = $filedataform['file_name'];
	
				//-------* File Dokumen Form2 *--------//
				$config = array(
						'upload_path' => FCPATH . 'datasop/form2/',
						'allowed_types' => 'pdf|doc|docx|rtf|ppt|pptx|xls|xlsx|txt',
						'max_size' => '30000');
						//$config['encrypt_name'] = TRUE;
						//$config['overwrite'] = FALSE;
				$this->upload->initialize($config);
				$this->upload->do_upload("txtfile3");
				$filedataform2 = $this->upload->data();
				$fileform2 = $filedataform2['file_name'];

				//-------* File Dokumen Form3 *--------//
				$config = array(
						'upload_path' => FCPATH . 'datasop/form3/',
						'allowed_types' => 'pdf|doc|docx|rtf|ppt|pptx|xls|xlsx|txt',
						'max_size' => '30000');
						//$config['encrypt_name'] = TRUE;
						//$config['overwrite'] = FALSE;
				$this->upload->initialize($config);
				$this->upload->do_upload("txtfile4");
				$filedataform3 = $this->upload->data();
				$fileform3 = $filedataform3['file_name'];

				//-------* File Cover Image SOP *--------//
				$config = array(
					'upload_path' => FCPATH . 'coversop/cover/',
					'allowed_types' => 'gif|jpg|jpeg|bmp|ico|png',
					'max_size' => '20000');
					//$config['encrypt_name'] = TRUE;
					//$config['overwrite'] = FALSE;
				$this->upload->initialize($config);
				$this->upload->do_upload("txtcoversop");
				$filecoversop = $this->upload->data();
				$filecoverimage = $filecoversop['file_name'];
				
				//-------* Simpan sementara di variabel array *--------//
                $arr = array('dok_nosop' => $this->input->post('txtnosop'),
                             'dok_nmsop' => $this->input->post('txtnama'),
                             'dok_nmsop2'=> $this->input->post('txtnama2'),
                             'dep_kode' => $this->input->post('cmbgroup'),
							 'kat_kode' => $this->input->post('cmbkategori'),
                             'dok_nmfile' => $filesop,
                             'dok_nmfile2' => $fileform,
							 'dok_nmfile3' => $fileform2,
							 'dok_nmfile4' => $fileform3,
							 'dok_cover' => $filecoverimage,
							 'dok_publish' => $this->input->post('optpublish'),
							 'dok_aktif' => $this->input->post('optstatus'),
                             'user_c' => $this->session->user_kode,
                             'tgl_c'=>date('Y-m-d'),
                             'time_c'=>date("h:i:s a"));

			    $llresult = $this->libprocms->ifsqlinsert('sop_ifmdokumen', $arr);
                if ($llresult) {
                    echo "<script>alert('Sukses insert data');</script>";
				    redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop');
                } else {
                    echo "<script>alert('Gagal insert data');</script>";
                    redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop');
					//print_r($llresult);
                }

			}

		} else {

				$arr['ardatatemp'] = $this->libprocms->ifsqlselect('dep_kode, dep_nama','tbl_ifmdepartemen','dep_kode','ASC');

				$arr['arkategori'] = $this->libprocms->ifsqlselect('kat_kode, kat_nama','sop_ifmkategori','kat_kode','ASC');

				$this->template->load('app/template','app/modul_bpo/ifmdokumensopvw/bpo_ifmdokumensop_insertvw', $arr);
		}
	}

    // *---- Fungsi Untuk Update Data Record -----* //
	function ifupdaterecord() {
		ifceksessionuser();
		//$idkode = $this->uri->segment(5);
		$idkode = rawurldecode($this->uri->segment(5));

		if (isset($_POST['submit'])) {

			//-------* Load Library Upload Bawaan Default CI *--------//
			$this->load->library("upload");
		
			//-------* File Dokumen SOP *--------//
			$config = array(
					'upload_path' => FCPATH . 'datasop/file/',
					'allowed_types' => 'gif|jpg|png|zip|rar|pdf|doc|docx|rtf|ppt|pptx|xls|xlsx|txt',
					'max_size' => '26200');
					//$config['encrypt_name'] = TRUE;
					//$config['overwrite'] = FALSE;
			$this->upload->initialize($config);
			$this->upload->do_upload("txtfile");
			$filedatasop = $this->upload->data();
			$filesop = $filedatasop['file_name'];

			//-------* File Dokumen Form *--------//
			$config = array(
					'upload_path' => FCPATH . 'datasop/form/',
					'allowed_types' => 'gif|jpg|png|zip|rar|pdf|doc|docx|rtf|ppt|pptx|xls|xlsx|txt',
					'max_size' => '30000');
					//$config['encrypt_name'] = TRUE;
					//$config['overwrite'] = FALSE;
			$this->upload->initialize($config);
			$this->upload->do_upload("txtfile2");
			$filedataform = $this->upload->data();
			$fileform = $filedataform['file_name'];

			//-------* File Dokumen Form2 *--------//
			$config = array(
					'upload_path' => FCPATH . 'datasop/form2/',
					'allowed_types' => 'pdf|doc|docx|rtf|ppt|pptx|xls|xlsx|txt',
					'max_size' => '30000');
					//$config['encrypt_name'] = TRUE;
					//$config['overwrite'] = FALSE;
			$this->upload->initialize($config);
			$this->upload->do_upload("txtfile3");
			$filedataform2 = $this->upload->data();
			$fileform2 = $filedataform2['file_name'];

			//-------* File Dokumen Form3 *--------//
			$config = array(
					'upload_path' => FCPATH . 'datasop/form3/',
					'allowed_types' => 'pdf|doc|docx|rtf|ppt|pptx|xls|xlsx|txt',
					'max_size' => '30000');
					//$config['encrypt_name'] = TRUE;
					//$config['overwrite'] = FALSE;
			$this->upload->initialize($config);
			$this->upload->do_upload("txtfile4");
			$filedataform3 = $this->upload->data();
			$fileform3 = $filedataform3['file_name'];
			
			//-------* File Cover Image SOP *--------//
			$config = array(
					'upload_path' => FCPATH . 'coversop/cover/',
					'allowed_types' => 'gif|jpg|jpeg|bmp|ico|png',
					'max_size' => '20000');
					//$config['encrypt_name'] = TRUE;
					//$config['overwrite'] = FALSE;
			$this->upload->initialize($config);
			$this->upload->do_upload("txtcoversop");
			$filecoversop = $this->upload->data();
			$filecoverimage = $filecoversop['file_name'];

			if (($filesop == '') AND ($fileform == '') AND ($fileform2 == '') AND ($fileform3 == '') AND ($filecoverimage == '')) {
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
							 'dok_nmsop2'=> $this->input->post('txtnama2'),
							 'dep_kode' => $this->input->post('cmbgroup'),
							 'kat_kode' => $this->input->post('cmbkategori'),
							 'dok_publish' => $this->input->post('optpublish'),
							 'dok_aktif' => $this->input->post('optstatus'),
							 'user_m' => $this->session->user_kode,
							 'tgl_m'=>date('Y-m-d'),
							 'time_m'=>date("h:i:s a"));

			} elseif (($filesop !== '') AND ($fileform == '') AND ($fileform2 == '') AND ($fileform3 == '') AND ($filecoverimage == '')) { 	 
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
						 	 'dok_nmsop2'=> $this->input->post('txtnama2'),
							 'dep_kode' => $this->input->post('cmbgroup'),
							 'kat_kode' => $this->input->post('cmbkategori'),
							 'dok_nmfile' => $filesop,
							 'dok_publish' => $this->input->post('optpublish'),
							 'dok_aktif' => $this->input->post('optstatus'),
							 'user_m' => $this->session->user_kode,
							 'tgl_m'=>date('Y-m-d'),
							 'time_m'=>date("h:i:s a"));

			} elseif (($filesop == '') AND ($fileform !== '') AND ($fileform2 == '') AND ($fileform3 == '') AND ($filecoverimage == '')) { 	 
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
							 'dok_nmsop2'=> $this->input->post('txtnama2'),
							 'dep_kode' => $this->input->post('cmbgroup'),
							 'kat_kode' => $this->input->post('cmbkategori'),
							 'dok_nmfile2' => $fileform,
							 'dok_publish' => $this->input->post('optpublish'),
							 'dok_aktif' => $this->input->post('optstatus'),
							 'user_m' => $this->session->user_kode,
							 'tgl_m'=>date('Y-m-d'),
							 'time_m'=>date("h:i:s a"));

			} elseif (($filesop == '') AND ($fileform == '') AND ($fileform2 !== '') AND ($fileform3 == '') AND ($filecoverimage == '')) { 	 
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
								'dok_nmsop2'=> $this->input->post('txtnama2'),
								'dep_kode' => $this->input->post('cmbgroup'),
								'kat_kode' => $this->input->post('cmbkategori'),
								'dok_nmfile3' => $fileform2,
								'dok_publish' => $this->input->post('optpublish'),
								'dok_aktif' => $this->input->post('optstatus'),
								'user_m' => $this->session->user_kode,
								'tgl_m'=>date('Y-m-d'),
								'time_m'=>date("h:i:s a"));

			} elseif (($filesop == '') AND ($fileform == '') AND ($fileform2 == '') AND ($fileform3 !== '') AND ($filecoverimage == '')) { 	 
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
								'dok_nmsop2'=> $this->input->post('txtnama2'),
								'dep_kode' => $this->input->post('cmbgroup'),
								'kat_kode' => $this->input->post('cmbkategori'),
								'dok_nmfile4' => $fileform3,
								'dok_publish' => $this->input->post('optpublish'),
								'dok_aktif' => $this->input->post('optstatus'),
								'user_m' => $this->session->user_kode,
								'tgl_m'=>date('Y-m-d'),
								'time_m'=>date("h:i:s a"));												

			} elseif (($filesop == '') AND ($fileform == '') AND ($fileform2 == '') AND ($fileform3 == '') AND ($filecoverimage !== '')) {
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
							 'dok_nmsop2'=> $this->input->post('txtnama2'),
							 'dep_kode' => $this->input->post('cmbgroup'),
							 'kat_kode' => $this->input->post('cmbkategori'),
							 'dok_cover' => $filecoverimage,
							 'dok_publish' => $this->input->post('optpublish'),
							 'dok_aktif' => $this->input->post('optstatus'),
							 'user_m' => $this->session->user_kode,
							 'tgl_m'=>date('Y-m-d'),
							 'time_m'=>date("h:i:s a"));

			} elseif (($filesop !== '') AND ($fileform !== '') AND ($fileform2 !== '') AND ($fileform3 !== '') AND ($filecoverimage == '')) {
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
							 'dok_nmsop2'=> $this->input->post('txtnama2'),
							 'dep_kode' => $this->input->post('cmbgroup'),
							 'kat_kode' => $this->input->post('cmbkategori'),
							 'dok_nmfile' => $filesop,
							 'dok_nmfile2' => $fileform,
							 'dok_nmfile3' => $fileform2,
							 'dok_nmfile4' => $fileform3,
							 'dok_publish' => $this->input->post('optpublish'),
							 'dok_aktif' => $this->input->post('optstatus'),
							 'user_m' => $this->session->user_kode,
							 'tgl_m'=>date('Y-m-d'),
							 'time_m'=>date("h:i:s a"));

			} elseif (($filesop !== '') AND ($fileform !== '') AND ($fileform2 !== '') AND ($fileform3 == '') AND ($filecoverimage == '')) {
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
								'dok_nmsop2'=> $this->input->post('txtnama2'),
								'dep_kode' => $this->input->post('cmbgroup'),
								'kat_kode' => $this->input->post('cmbkategori'),
								'dok_nmfile' => $filesop,
								'dok_nmfile2' => $fileform,
								'dok_nmfile3' => $fileform2,
								'dok_publish' => $this->input->post('optpublish'),
								'dok_aktif' => $this->input->post('optstatus'),
								'user_m' => $this->session->user_kode,
								'tgl_m'=>date('Y-m-d'),
								'time_m'=>date("h:i:s a"));

			} elseif (($filesop !== '') AND ($fileform !== '') AND ($fileform2 == '') AND ($fileform3 == '') AND ($filecoverimage == '')) {
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
								'dok_nmsop2'=> $this->input->post('txtnama2'),
								'dep_kode' => $this->input->post('cmbgroup'),
								'kat_kode' => $this->input->post('cmbkategori'),
								'dok_nmfile' => $filesop,
								'dok_nmfile2' => $fileform,
								'dok_publish' => $this->input->post('optpublish'),
								'dok_aktif' => $this->input->post('optstatus'),
								'user_m' => $this->session->user_kode,
								'tgl_m'=>date('Y-m-d'),
								'time_m'=>date("h:i:s a"));
				

			} elseif (($filesop !== '') AND ($fileform == '') AND ($fileform2 !== '') AND ($fileform3 !== '') AND ($filecoverimage !== '')) {
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
							 'dok_nmsop2'=> $this->input->post('txtnama2'),
							 'dep_kode' => $this->input->post('cmbgroup'),
							 'kat_kode' => $this->input->post('cmbkategori'),
							 'dok_nmfile' => $filesop,
							 'dok_nmfile3' => $fileform2,
							 'dok_nmfile4' => $fileform3,
							 'dok_cover' => $filecoverimage,
							 'dok_publish' => $this->input->post('optpublish'),
							 'dok_aktif' => $this->input->post('optstatus'),
							 'user_m' => $this->session->user_kode,
							 'tgl_m'=>date('Y-m-d'),
							 'time_m'=>date("h:i:s a"));

			} elseif (($filesop !== '') AND ($fileform !== '') AND ($fileform2 == '') AND ($fileform3 !== '') AND ($filecoverimage !== '')) {
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
								'dok_nmsop2'=> $this->input->post('txtnama2'),
								'dep_kode' => $this->input->post('cmbgroup'),
								'kat_kode' => $this->input->post('cmbkategori'),
								'dok_nmfile' => $filesop,
								'dok_nmfile2' => $fileform,
								'dok_nmfile4' => $fileform3,
								'dok_cover' => $filecoverimage,
								'dok_publish' => $this->input->post('optpublish'),
								'dok_aktif' => $this->input->post('optstatus'),
								'user_m' => $this->session->user_kode,
								'tgl_m'=>date('Y-m-d'),
								'time_m'=>date("h:i:s a"));
				
			} elseif (($filesop !== '') AND ($fileform !== '') AND ($fileform2 !== '') AND ($fileform3 == '') AND ($filecoverimage !== '')) {
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
								'dok_nmsop2'=> $this->input->post('txtnama2'),
								'dep_kode' => $this->input->post('cmbgroup'),
								'kat_kode' => $this->input->post('cmbkategori'),
								'dok_nmfile' => $filesop,
								'dok_nmfile2' => $fileform,
								'dok_nmfile3' => $fileform2,
								'dok_cover' => $filecoverimage,
								'dok_publish' => $this->input->post('optpublish'),
								'dok_aktif' => $this->input->post('optstatus'),
								'user_m' => $this->session->user_kode,
								'tgl_m'=>date('Y-m-d'),
								'time_m'=>date("h:i:s a"));

			} elseif (($filesop == '') AND ($fileform !== '') AND ($fileform2 !== '') AND ($fileform3 !== '') AND ($filecoverimage !== '')) {							
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
							 'dok_nmsop2'=> $this->input->post('txtnama2'),
							 'dep_kode' => $this->input->post('cmbgroup'),
							 'kat_kode' => $this->input->post('cmbkategori'),
							 'dok_nmfile2' => $fileform,
							 'dok_nmfile3' => $fileform2,
							 'dok_nmfile4' => $fileform3,
							 'dok_cover' => $filecoverimage,
							 'dok_publish' => $this->input->post('optpublish'),
							 'dok_aktif' => $this->input->post('optstatus'),
							 'user_m' => $this->session->user_kode,
							 'tgl_m'=>date('Y-m-d'),
							 'time_m'=>date("h:i:s a"));
										
			} elseif (($filesop !== '') AND ($fileform !== '') AND ($fileform2 !== '') AND ($fileform3 !== '') AND ($filecoverimage !== '')) {
				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
							 'dok_nmsop2'=> $this->input->post('txtnama2'),
							 'dep_kode' => $this->input->post('cmbgroup'),
							 'kat_kode' => $this->input->post('cmbkategori'),
							 'dok_nmfile' => $filesop,
							 'dok_nmfile2' => $fileform,
							 'dok_nmfile3' => $fileform2,
							 'dok_nmfile4' => $fileform3,
							 'dok_cover' => $filecoverimage,
							 'dok_publish' => $this->input->post('optpublish'),
							 'dok_aktif' => $this->input->post('optstatus'),
							 'user_m' => $this->session->user_kode,
							 'tgl_m'=>date('Y-m-d'),
							 'time_m'=>date("h:i:s a"));			

			} else {

				//-------* Simpan sementara di variabel array *--------//
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
							 'dok_nmsop2'=> $this->input->post('txtnama2'),
							 'dep_kode' => $this->input->post('cmbgroup'),
							 'kat_kode' => $this->input->post('cmbkategori'),
							 'dok_publish' => $this->input->post('optpublish'),
							 'dok_aktif' => $this->input->post('optstatus'),
							 'user_m' => $this->session->user_kode,
							 'tgl_m'=>date('Y-m-d'),
							 'time_m'=>date("h:i:s a"));
			}

			$lcwhere = array('dok_nosop' => $this->input->post('idkode'));
 
			$llresult = $this->libprocms->ifsqlupdate('sop_ifmdokumen', $arr, $lcwhere);
			if ($llresult) {
				echo "<script>alert('Sukses update data');</script>";
				redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop');
			} else {
				echo "<script>alert('Gagal insert data');</script>";
				redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop');
				//print_r($llresult);
			}

		} else {

			$arr['ardatatemp'] = $this->libprocms->ifsqlselect('dep_kode, dep_nama','tbl_ifmdepartemen','dep_kode','ASC');

			$arr['arkategori'] = $this->libprocms->ifsqlselect('kat_kode, kat_nama','sop_ifmkategori','kat_kode','ASC');

			$arr['row'] = $this->libprocms->ifsqledit('sop_ifmdokumen', array('dok_nosop' => $idkode))->row_array();
			
			$this->template->load('app/template','app/modul_bpo/ifmdokumensopvw/bpo_ifmdokumensop_updatevw', $arr);
		}
	}
	
 	function ifdeleterecord() {
		$lcsegment = rawurldecode($this->uri->segment(5));
		$lcwhere = array('dok_nosop' => $lcsegment);
		//$_id = $this->db->get_where('sop_ifmdokumen',['dok_nosop' => $lcwhere])->row();
	    
		$llresult = $this->libprocms->ifsqldelete('sop_ifmdokumen', $lcwhere);
        if ($llresult) {
			echo "<script>alert('Sukses hapus data');</script>";
			redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop');
		} else {
			echo "<script>alert('Gagal hapus data');</script>";
			redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop');
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

	// *---- Fungsi Untuk Menampilkan Data Di SOP Dokumen Display (loginsopwpg) -----* //
	function ifdisplaybpodokumensopho01() {
		ifceksessionuser();
		//$lcusergroup = $this->session->guser_kode;
		if ($this->session->user_level <> '1') {
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopuser($this->session->user_kode, '01', 'HO');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		} else {
			//$data = $this->libprocms->ifsqlselectjoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data['ardatatemp'] = $this->libprocms->ifsqlselectjoinwhere('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', array('sop_ifmdokumen.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
            //$data['ardatatemp'] = $this->libprocms->ifsqlgetwherejoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'sop_ifmdokumenuser.user_kode', $this->session->user_kode, 'sop_ifmdokumen.kat_kode', '03', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC')->row_array();
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopadmin('01', 'HO');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		}
		//$data = array('ardatatemp' => $data);
		$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_displayvw', $data);
	}

	// *---- Fungsi Untuk Menampilkan Data Di SOP Dokumen Display (loginsopwpg) -----* //
	function ifdisplaybpodokumensopho02() {
		ifceksessionuser();
		//$lcusergroup = $this->session->guser_kode;
		if ($this->session->user_level <> '1') {
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopuser($this->session->user_kode, '02', 'HO');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		} else {
			//$data = $this->libprocms->ifsqlselectjoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data['ardatatemp'] = $this->libprocms->ifsqlselectjoinwhere('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', array('sop_ifmdokumen.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
            //$data['ardatatemp'] = $this->libprocms->ifsqlgetwherejoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'sop_ifmdokumenuser.user_kode', $this->session->user_kode, 'sop_ifmdokumen.kat_kode', '03', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC')->row_array();
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopadmin('02', 'HO');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		}
		//$data = array('ardatatemp' => $data);
		$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_displayvw', $data);
	}

	// *---- Fungsi Untuk Menampilkan Data Di SOP Dokumen Display (loginsopwpg) -----* //
	function ifdisplaybpodokumensopho03() {
		ifceksessionuser();
		//$lcusergroup = $this->session->guser_kode;
		if ($this->session->user_level <> '1') {
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopuser($this->session->user_kode, '03', 'HO');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		} else {
			//$data = $this->libprocms->ifsqlselectjoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data['ardatatemp'] = $this->libprocms->ifsqlselectjoinwhere('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', array('sop_ifmdokumen.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
            //$data['ardatatemp'] = $this->libprocms->ifsqlgetwherejoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'sop_ifmdokumenuser.user_kode', $this->session->user_kode, 'sop_ifmdokumen.kat_kode', '03', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC')->row_array();
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopadmin('03', 'HO');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		}
		//$data = array('ardatatemp' => $data);
		$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_displayvw', $data);
	}

	function ifdisplaybpodokumensopho04() {
		ifceksessionuser();
		//$lcusergroup = $this->session->guser_kode;
		if ($this->session->user_level <> '1') {
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopuser($this->session->user_kode, '04', 'HO');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		} else {
			//$data = $this->libprocms->ifsqlselectjoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data['ardatatemp'] = $this->libprocms->ifsqlselectjoinwhere('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', array('sop_ifmdokumen.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
            //$data['ardatatemp'] = $this->libprocms->ifsqlgetwherejoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'sop_ifmdokumenuser.user_kode', $this->session->user_kode, 'sop_ifmdokumen.kat_kode', '03', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC')->row_array();
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopadmin('04', 'HO');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		}
		//$data = array('ardatatemp' => $data);
		$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_displayvw', $data);
	}

	function ifdisplaybpodokumensopho05() {
		ifceksessionuser();
		//$lcusergroup = $this->session->guser_kode;
		if ($this->session->user_level <> '1') {
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopuser($this->session->user_kode, '05', 'HO');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		} else {
			//$data = $this->libprocms->ifsqlselectjoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data['ardatatemp'] = $this->libprocms->ifsqlselectjoinwhere('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', array('sop_ifmdokumen.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
            //$data['ardatatemp'] = $this->libprocms->ifsqlgetwherejoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'sop_ifmdokumenuser.user_kode', $this->session->user_kode, 'sop_ifmdokumen.kat_kode', '03', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC')->row_array();
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopadmin('05', 'HO');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		}
		//$data = array('ardatatemp' => $data);
		$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_displayvw', $data);
	}

	// *---- Fungsi Untuk Menampilkan Data Di SOP Dokumen Display (PKS) (loginsopwpg) -----* //
	function ifdisplaybpodokumensoppks01() {
		ifceksessionuser();
		//$lcusergroup = $this->session->guser_kode;
		if ($this->session->user_level <> '1') {
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopuser($this->session->user_kode, '03', 'PKS');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		} else {
			//$data = $this->libprocms->ifsqlselectjoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data['ardatatemp'] = $this->libprocms->ifsqlselectjoinwhere('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', array('sop_ifmdokumen.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
            //$data['ardatatemp'] = $this->libprocms->ifsqlgetwherejoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'sop_ifmdokumenuser.user_kode', $this->session->user_kode, 'sop_ifmdokumen.kat_kode', '03', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC')->row_array();
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopadmin('03', 'PKS');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		}
		//$data = array('ardatatemp' => $data);
		$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_displayvw', $data);
	}

	// *---- Fungsi Untuk Menampilkan Data Di SOP Dokumen Display (PKS) (loginsopwpg) -----* //
	function ifdisplaybpodokumensoppks02() {
		ifceksessionuser();
		//$lcusergroup = $this->session->guser_kode;
		if ($this->session->user_level <> '1') {
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopuser($this->session->user_kode, '04', 'PKS');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		} else {
			//$data = $this->libprocms->ifsqlselectjoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data['ardatatemp'] = $this->libprocms->ifsqlselectjoinwhere('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', array('sop_ifmdokumen.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
            //$data['ardatatemp'] = $this->libprocms->ifsqlgetwherejoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'sop_ifmdokumenuser.user_kode', $this->session->user_kode, 'sop_ifmdokumen.kat_kode', '03', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC')->row_array();
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopadmin('04', 'PKS');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		}
		//$data = array('ardatatemp' => $data);
		$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_displayvw', $data);
	}

	// *---- Fungsi Untuk Menampilkan Data Di SOP Dokumen Display (PKS) (loginsopwpg) -----* //
	function ifdisplaybpodokumensopest01() {
		ifceksessionuser();
		//$lcusergroup = $this->session->guser_kode;
		if ($this->session->user_level <> '1') {
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopuser($this->session->user_kode, '03', 'EST');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		} else {
			//$data = $this->libprocms->ifsqlselectjoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data['ardatatemp'] = $this->libprocms->ifsqlselectjoinwhere('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', array('sop_ifmdokumen.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
            //$data['ardatatemp'] = $this->libprocms->ifsqlgetwherejoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'sop_ifmdokumenuser.user_kode', $this->session->user_kode, 'sop_ifmdokumen.kat_kode', '03', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC')->row_array();
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopadmin('03', 'EST');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		}
		//$data = array('ardatatemp' => $data);
		$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_displayvw', $data);
	}

	// *---- Fungsi Untuk Menampilkan Data Di SOP Dokumen Display (PKS) (loginsopwpg) -----* //
	function ifdisplaybpodokumensopest02() {
		ifceksessionuser();
		//$lcusergroup = $this->session->guser_kode;
		if ($this->session->user_level <> '1') {
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data = $this->libprocms->ifsqlselectjoin2tabelwhere('sop_ifmdokumenuser.user_kode, sop_ifmdokumenuser.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, sop_ifmdokumen.dok_publish, sop_ifmdokumen.dok_aktif, sop_ifmdokumenuser.hitsdwnl, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumenuser', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dok_nosop', 'dep_kode', array('sop_ifmdokumenuser.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopuser($this->session->user_kode, '04', 'EST');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		} else {
			//$data = $this->libprocms->ifsqlselectjoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
			//$data['ardatatemp'] = $this->libprocms->ifsqlselectjoinwhere('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', array('sop_ifmdokumen.user_kode'=>$this->session->user_kode, 'sop_ifmdokumen.kat_kode'=>'03'), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
            //$data['ardatatemp'] = $this->libprocms->ifsqlgetwherejoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'sop_ifmdokumenuser.user_kode', $this->session->user_kode, 'sop_ifmdokumen.kat_kode', '03', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC')->row_array();
			$data['ardatatemp'] = $this->libmodelsopms->ifsqlgetsopadmin('04', 'EST');
			//$data['arkategori_kode'] = $tckategorikode;
			//$data['ardivisi_kode'] = $tcdivisikode;
		}
		//$data = array('ardatatemp' => $data);
		$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_displayvw', $data);
	}

	function ifdownloadfile() {
		//cek_session_akses('download', $this->session->id_session);
		$loceknamafile = $this->libprocms->ifviewgetwhere('sop_ifmdokumen', array('dok_nmfile2' => $this->uri->segment(5)));
		
		if ($loceknamafile->num_rows() <= 0) {
			redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensopho01');
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

	function ifdownloadfile2() {
		//cek_session_akses('download', $this->session->id_session);
		$loceknamafile = $this->libprocms->ifviewgetwhere('sop_ifmdokumen', array('dok_nmfile3' => $this->uri->segment(5)));
		
		if ($loceknamafile->num_rows() <= 0) {
			redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensopho01');
		} else {
			$row = $loceknamafile->row_array();
			$lnjumhitsdownload = array('hitsdwnl'=>$row['hitsdwnl']+1);
			$lcwhere = array('dok_nosop' => $row['dok_nosop']);
			$this->libprocms->ifsqlupdate('sop_ifmdokumen', $lnjumhitsdownload, $lcwhere);

			$lcsegment = $this->uri->segment(5);
			$lofiledata = file_get_contents("datasop/form2/".$lcsegment);
			force_download($lcsegment, $lofiledata);
			//@readfile($lofiledata);
		}
	}

	function ifdownloadfile3() {
		//cek_session_akses('download', $this->session->id_session);
		$loceknamafile = $this->libprocms->ifviewgetwhere('sop_ifmdokumen', array('dok_nmfile4' => $this->uri->segment(5)));
		
		if ($loceknamafile->num_rows() <= 0) {
			redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensopho01');
		} else {
			$row = $loceknamafile->row_array();
			$lnjumhitsdownload = array('hitsdwnl'=>$row['hitsdwnl']+1);
			$lcwhere = array('dok_nosop' => $row['dok_nosop']);
			$this->libprocms->ifsqlupdate('sop_ifmdokumen', $lnjumhitsdownload, $lcwhere);

			$lcsegment = $this->uri->segment(5);
			$lofiledata = file_get_contents("datasop/form3/".$lcsegment);
			force_download($lcsegment, $lofiledata);
			//@readfile($lofiledata);
		}
	}

	function viewpdf($tcnosop) {
        $lnsqlnumrows = $this->libprocms->ifsqldetaildata('sop_ifmdokumen', 'dok_nosop', rawurldecode($tcnosop), 'tbl_ifmdepartemen', 'dep_kode'); 
		$rowarr = $lnsqlnumrows->row_array();
		$data['row'] = $rowarr;
		if ($this->session->user_level == '2') {
            $this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop2_viewpdfvw', $data);		    
		} else {
			$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_viewpdfvw', $data);
		}
	}

	function viewpdfbucopy($tcnosop) {
        $lnsqlnumrows = $this->libprocms->ifsqldetaildata('sop_ifmdokumen', 'dok_nosop', $tcnosop, 'tbl_ifmdepartemen', 'dep_kode'); 
		$rowarr = $lnsqlnumrows->row_array();
		$data['row'] = $rowarr;

		$lcuserkode = $this->input->post('txtuserkode');
		$losqldata = $this->libprocms->ifcekuserlevel($lcuserkode, 'tbl_ifmuser');
		$lnrowarr = $losqldata->row_array();  

		echo "<script>alert($losqldata);</script>";

        if (isset($lnrowarr)) {
			if ($lnrowarr = '2') {
			    $this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop2_viewpdfvw', $data);

			//if ($lcuserlevel->user_level == '2') {
            //    $this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop2_viewpdfvw', $data);  
			//} else {
            //    $this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_viewpdfvw', $data);
			//}
		    } else {
			    $this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_viewpdfvw', $data);
			}	
				
		}

		// if ($this->session->user_level == '2') {
		    // $this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop2_viewpdfvw', $data);
		// } else {
			// $this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_viewpdfvw', $data);            
		//}
	}

}
