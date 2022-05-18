<?php 
class Tbl_ifdivisims extends CI_model{

    // *---- Sql Query Provinsi Join Country -----* //
    public function ifsqlselectjoinprovinsi() {
        $this->db->select('a.prov_kode, a.prov_nama, a.cnt_kode, b.cnt_nama');
        $this->db->from('tbl_ifmprovinsi a');
        $this->db->join('tbl_ifmcountry b','a.cnt_kode=b.cnt_kode');
        $this->db->order_by('b.cnt_nama, a.prov_kode',"ASC");
        return $this->db->get()->result_array();
    }
    
    // *---- Sql Query Preview Provinsi Join Country -----* //
	function ifsqlselectgetprovinsi() {		
		$losql = $this->db->query("SELECT a.prov_kode, a.prov_nama, a.cnt_kode, b.cnt_nama FROM tbl_ifmprovinsi a LEFT OUTER JOIN tbl_ifmcountry b ON a.cnt_kode = b.cnt_kode ORDER BY b.cnt_nama, a.prov_kode");
		return $losql;
	}

    // *---- Sql Query Data Provinsi -----* //
    public function ifsqlselectgetprovinsi2sql() {
        $losql = "SELECT a.prov_kode, a.prov_nama, a.cnt_kode, b.cnt_nama FROM tbl_ifmprovinsi a LEFT OUTER JOIN tbl_ifmcountry b ON a.cnt_kode = b.cnt_kode ORDER BY b.cnt_nama, a.prov_kode";
        return $this->db->query($losql);
    }

    // *---- Sql Query Untuk Export Data Provinsi Ke Excel -----* //
    public function ifsqlgetexcelwordprovinsi() {
        $losql = "SELECT a.prov_kode, a.prov_nama, a.cnt_kode, b.cnt_nama FROM tbl_ifmprovinsi a LEFT OUTER JOIN tbl_ifmcountry b ON a.cnt_kode = b.cnt_kode ORDER BY b.cnt_nama, a.prov_kode";
        return $this->db->query($losql);
    }

    // *---- Sql Query Untuk Export Data Provinsi Ke File PDF -----* //
    public function ifsqlgetpdfprovinsi() {
        //$losql = $this->db->get('tbl_produk');
        //return $losql->result_array();
        $losql = "SELECT a.prov_kode, a.prov_nama, a.cnt_kode, b.cnt_nama FROM tbl_ifmprovinsi a LEFT OUTER JOIN tbl_ifmcountry b ON a.cnt_kode = b.cnt_kode ORDER BY b.cnt_nama, a.prov_kode";        
        return $this->db->query($losql);
    }

    function ifsqlgetresultprovinsi() {
        return $this->db->get('tbl_ifmprovinsi')->result(); // Tampilkan semua data yang ada di tabel provinsi
    }

	// Fungsi untuk melakukan proses upload file
	public function upload_filexl($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}    

	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './csv/';
		$config['allowed_types'] = 'csv';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	
	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data){
		$this->db->insert_batch('tbl_ifmprovinsi', $data);
	}

    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

}