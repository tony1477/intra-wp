<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpo_ifmdokumensopcs extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('libprocms');
		$this->load->database();
    }

	// *---- Fungsi Untuk Menampilkan Data -----* //
	function ifshowbpodokumensop() {
		ifceksessionuser();
		$data = $this->libprocms->ifsqlselectjoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
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

				$arr = $this->libprocms->ifsqlselect('dep_kode, dep_nama','tbl_ifmdepartemen','dep_kode','ASC');
				$arr = array('ardatatemp' => $arr);
		
				$this->template->load('app/template','app/modul_bpo/ifmdokumensopvw/bpo_ifmdokumensop_insertvw', $arr);
			}

            $this->load->library("upload");
            $config["upload_path"] = ".datasop/file";
            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
            $config['overwrite'] = FALSE;
            $config['max_size'] = '25000';
			$media = $this->upload->data();
			$lcinputFileName = ".datasop/file/".$media['file_name'];
            //$config['encrypt_name'] = TRUE;
            $this->load->library("upload", $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload("txtfile")) {
                $err = $this->upload->display_errors();
                print_r($err);
                redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop');
            } else {
                if (!$this->upload->do_upload("txtfile2")) {
                    $config["upload_path"] = ".datasop/form";
                    $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
                    $config['overwrite'] = FALSE;
                    $config['max_size'] = '30000';
                    //$config['encrypt_name'] = TRUE;
                    $media2 = $this->upload->data();  
                    $lcinputFileName = ".datasop/form/".$media2['file_name'];
                    $this->load->library("upload", $config);
                    $this->upload->initialize($config);
                } else {
                    $media3 = $this->upload->data();
                    $lcinputFileName = ".datasop/form/".$media3['file_name'];

                }
            }
			
			$arr = array('dok_nosop' => $this->input->post('txtnosop'),
			'dok_nmsop' => $this->input->post('txtnama'),
			'dok_nmsop2'=> $this->input->post('txtnama2'),
			'dep_kode' => $this->input->post('cmbgroup'),
			'dok_nmfile' => $media['file_name'],
			'dok_nmfile2' => $media2['file_name'],
			'user_m' => $this->session->user_kode,
			'tgl_m'=>date('Y-m-d'),
			'time_m'=>date("h:i:s a"));

			$this->libprocms->ifsqlinsert('sop_ifmdokumen', $arr);
			redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop');

			//$loreturnsql = $this->libprocms->ifsqlinsert('sop_ifmdokumen', $arr);
			//if ($loreturnsql > 0) {
			//    redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop');
			//} else {
			//    echo "<script>alert('Gagal menyimpan data');</script>"; 
			//}    
	

		} else {

			    $arr = $this->libprocms->ifsqlselect('dep_kode, dep_nama','tbl_ifmdepartemen','dep_kode','ASC');
			    $arr = array('ardatatemp' => $arr);

				$this->template->load('app/template','app/modul_bpo/ifmdokumensopvw/bpo_ifmdokumensop_insertvw', $arr);
		}
	}

    // *---- Fungsi Untuk Update Data Record -----* //
	function ifupdaterecord() {
		ifceksessionuser();
		$idkode = $this->uri->segment(5);
		if (isset($_POST['submit'])) {
            $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';            
			$config['upload_path'] = './datasop/file';				
			$config['max_size'] = '25000'; // kb			
            $this->load->library('upload', $config);
            $this->upload->do_upload('txtfile');
			$lccekdokumensop = $this->upload->data();
            
			if ($lccekdokumensop['file_name']=='') { 
				$arr = array('dok_nmsop' => $this->input->post('txtnama'),
							'dok_nmsop2' => $this->input->post('txtnama2'),
							'dep_kode' => $this->input->post('cmbgroup'),
							'user_m' => $this->session->user_kode,
							'tgl_m'=>date('Y-m-d'),
							'time_m'=>date("h:i:s a"));
			} else {
				if ($lccekdokumensop['file_name']!='') {
					$arr = array('dok_nmsop' => $this->input->post('txtnama'),
								'dok_nmsop2' => $this->input->post('txtnama2'),
								'dep_kode' => $this->input->post('cmbgroup'),
								'dok_nmfile' => $lccekdokumensop['file_name'],
								'user_m' => $this->session->user_kode,
								'tgl_m'=>date('Y-m-d'),
								'time_m'=>date("h:i:s a"));
				} else {
					$arr = array('dok_nmsop' => $this->input->post('txtnama'),
								'dok_nmsop2' => $this->input->post('txtnama2'),
								'dep_kode' => $this->input->post('cmbgroup'),
								'dok_nmfile' => ' ',
								'user_m' => $this->session->user_kode,
								'tgl_m'=>date('Y-m-d'),
								'time_m'=>date("h:i:s a"));
				}
			}
	    	$lcwhere = array('dok_nosop' => $this->input->post('idkode'));
            
			$this->libprocms->ifsqlupdate('sop_ifmdokumen', $arr, $lcwhere);
		
			redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop');

		} else {

			$arr = $this->libprocms->ifsqlselect('dep_kode, dep_nama','tbl_ifmdepartemen','dep_kode','ASC');
			$arr = array('ardatatemp' => $arr);
			$arr['row'] = $this->libprocms->ifsqledit('sop_ifmdokumen', array('dok_nosop' => $idkode))->row_array();
			$this->template->load('app/template','app/modul_bpo/ifmdokumensopvw/bpo_ifmdokumensop_updatevw', $arr);
		}
	}
	
 	function ifdeleterecord() {
		$lcsegment = $this->uri->segment(5);
		$lcwhere = array('dok_nosop' => $lcsegment);
		//$_id = $this->db->get_where('sop_ifmdokumen',['dok_nosop' => $lcwhere])->row();
	    
		$this->libprocms->ifsqldelete('sop_ifmdokumen', $lcwhere);
		//$tsql = $this->libprocms->ifsqldelete('sop_ifmdokumen', $lcwhere);        
		//if($tsql) {
		    //$datapath = "./datasop/file/".$row["dok_nmfile"];
        	// cek jika file ada
		    //if(file_exists($datapath)) {
			//    echo "<script>alert('xxxxxx');</script>";
			//    unlink("datasop/file/".$_id->dok_nmfile);
		    //}
	    //}

		redirect('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop');
	}

	// *---- Fungsi Untuk Menampilkan Data -----* //
	function ifdisplaybpodokumensop() {
		ifceksessionuser();
		//$lcusergroup = $this->session->guser_kode;
		if ($this->session->user_level <> '1') {
		    $data = $this->libprocms->ifsqlselectjoinwhere('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', array('sop_ifmdokumen.dep_kode'=>$this->session->dep_kode), 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
		} else {
			$data = $this->libprocms->ifsqlselectjoin('sop_ifmdokumen.dok_nosop, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_cover, tbl_ifmdepartemen.dep_nama', 'sop_ifmdokumen', 'tbl_ifmdepartemen', 'dep_kode', 'tbl_ifmdepartemen.dep_nama, sop_ifmdokumen.dok_nosop', 'ASC');
		}
		$data = array('ardatatemp' => $data);
		$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_displayvw', $data);
	}

	function download() {
		//cek_session_akses('download',$this->session->id_session);
		$data['record'] = $this->libprocms->ifviewordering('sop_ifmdokumen', 'dok_nosop', 'DESC');
		$this->template->load('app/templatebpo','app/modul_bpo/ifmdokumensopvw/bpo_ifshowdokumensop_displayvw',$data);
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
