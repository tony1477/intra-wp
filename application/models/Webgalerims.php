<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webgalerims extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function ifsqlselectlisting() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri <>','Pop up');
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectslider() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, tbl_ifmuser.user_nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('tbl_ifmuser','tbl_ifmuser.user_kode = galeri.user_kode','LEFT');
		// End join
		$this->db->where('jenis_galeri','Homepage');
		$this->db->order_by('urutan','ASC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectgalerihome() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, kategori_galeri.slug_kategori_galeri, , tbl_ifmuser.user_nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('tbl_ifmuser','tbl_ifmuser.user_kode = galeri.user_kode','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		// $this->db->group_by('galeri.id_kategori_galeri');
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit(6);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectpopup() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Pop up');
		$this->db->order_by('popup_status','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlpopupaktif() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, tbl_ifmuser.user_nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('tbl_ifmuser','tbl_ifmuser.user_kode = galeri.user_kode','LEFT');
		// End join
		$this->db->where(array(	'jenis_galeri' 	=> 'Pop up',
								'popup_status'	=> 'Publish'));
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function ifsqlselectgaleri($limit, $start) {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama, 
						kategori_galeri.slug_kategori_galeri');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectgaleritotal() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectkategori() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, tbl_ifmuser.user_nama, 
						kategori_galeri.slug_kategori_galeri');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri');
		$this->db->join('tbl_ifmuser','tbl_ifmuser.user_kode = galeri.user_kode','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		$this->db->group_by('galeri.id_kategori_galeri');
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectgalerikategori($id_kategori_galeri, $limit, $start) {
		$this->db->select('galeri.*, users.nama, kategori_galeri.nama_kategori_galeri, kategori_galeri.slug_kategori_galeri');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where(array(	'galeri.id_kategori_galeri'	=> $id_kategori_galeri,
								'galeri.jenis_galeri'	=> 'Galeri'));
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectkategoriall($id_kategori_galeri) {
		$this->db->select('galeri.*, users.nama, kategori_galeri.nama_kategori_galeri, kategori_galeri.slug_kategori_galeri');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where(array(	'galeri.id_kategori_galeri'	=> $id_kategori_galeri,
								'galeri.jenis_galeri'	=> 'Galeri'));
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectdetail($id_galeri) {
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where('id_galeri',$id_galeri);
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function ifsqlinsert($data) {
		$this->db->insert('galeri',$data);
	}

	public function ifsqlupdate($data) {
		$this->db->where('id_galeri',$data['id_galeri']);
		$this->db->update('galeri',$data);
	}

	public function ifsqlupdate2($data2) {
		$this->db->where('jenis_galeri','Pop up');
		$this->db->update('galeri',$data2);
	}

	public function ifsqlupdatehit($hit) {
		$this->db->where('id_galeri',$hit['id_galeri']);
		$this->db->update('galeri',$hit);
	}

	public function ifsqldelete($data) {
		$this->db->where('id_galeri',$data['id_galeri']);
		$this->db->delete('galeri',$data);
	}
}