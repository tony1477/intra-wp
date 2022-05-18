<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webberitams extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function ifsqlselectlisting() {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectdasbor() {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectbulanan($bulan) {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where('DATE_FORMAT(berita.tanggal,"%Y-%m")',$bulan);
		$this->db->order_by('hits','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselecttahunan($tahun) {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where('DATE_FORMAT(berita.tanggal,"%Y")',$tahun);
		$this->db->order_by('hits','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectpopuler() {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array(	'berita.status_berita'	=> 'Publish'));
		$this->db->order_by('hits','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselecthits() {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->order_by('hits','DESC');
		$this->db->limit(100);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectkategoriadmin($id_kategori) {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.id_kategori'	=> $id_kategori));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectstatusadmin($status_berita) {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> $status_berita));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectjenisadmin($jenis_berita) {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.jenis_berita'	=> $jenis_berita));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlauthor_admin($id_user) {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.id_user'	=> $id_user));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectkategori($id_kategori,$limit,$start) {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.id_kategori'	=> $id_kategori,
								'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectkategoriall($id_kategori) {
		$this->db->select('berita.*, users.nama, kategori.nama_kategori, kategori.slug_kategori');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.id_kategori'	=> $id_kategori,
								'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectberita($limit,$start) {
		$this->db->select('berita.*, 
					tbl_ifmuser.user_nama, 
					kategori.nama_kategori, kategori.slug_kategori,
					kategori.slug_kategori
					');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('tbl_ifmuser','tbl_ifmuser.user_kode = berita.user_kode','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('berita.tanggal_publish','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselecttotal() {
		$this->db->select('berita.*, tbl_ifmuser.user_nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('tbl_ifmuser','tbl_ifmuser.user_kode = berita.user_kode','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectsearch($keywords,$limit,$start) {
		$this->db->select('berita.*, 
					users.nama, 
					kategori.nama_kategori, kategori.slug_kategori,
					kategori.slug_kategori
					');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->like('berita.judul_berita',$keywords);
		$this->db->or_like('berita.isi',$keywords);
		$this->db->group_by('id_berita');
		$this->db->order_by('id_berita','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselecttotalsearch($keywords) {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->like('berita.judul_berita',$keywords);
		$this->db->or_like('berita.isi',$keywords);
		$this->db->group_by('id_berita');
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectlistingread() {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectlistingprofil() {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Profil'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectlistinglayanan() {
		$this->db->select('berita.*, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Layanan'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing headline
	public function ifsqlselectlistingheadline() {
		$this->db->select('berita.*, 
					tbl_ifmuser.user_nama, 
					kategori.nama_kategori, kategori.slug_kategori,
					kategori.slug_kategori
					');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('tbl_ifmuser','tbl_ifmuser.user_kode = berita.user_kode','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Headline'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(9);
		$query = $this->db->get();
		return $query->result();
	}

	public function ifsqlselectread($slug_berita) {
		$this->db->select('berita.*, 
					users.nama, 
					kategori.nama_kategori, kategori.slug_kategori,
					kategori.slug_kategori
					');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		$this->db->where('slug_berita',$slug_berita);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function ifsqlselectdetail($id_berita) {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita',$id_berita);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function ifsqlselectinsert($data) {
		$this->db->insert('berita',$data);
	}

	public function ifsqlselectupdate($data) {
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->update('berita',$data);
	}

	public function ifsqlselectupdatehit($hit) {
		$this->db->where('id_berita',$hit['id_berita']);
		$this->db->update('berita',$hit);
	}

	public function ifsqlselectdelete($data) {
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->delete('berita',$data);
	}
}
