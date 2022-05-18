<?php 
class Model_tabel extends CI_model{
    // *---- Menu Tabel : Master Divisi -----* //
    public function view_join_mdivisi($order){
        $this->db->select('div_kode, div_nama');
        $this->db->from('tbl_ifmdivisi');        
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Tabel : Master Departemen -----* //
    public function view_join_mdepartemen($order){
        $this->db->select('dep_kode, dep_nama');
        $this->db->from('tbl_ifmdepartemen');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Tabel : Master Jabatan -----* //
    public function view_join_mjabatan($order){
        $this->db->select('jab_kode, jab_nama');
        $this->db->from('tbl_ifmjabatan');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Tabel : Master Proyek -----* //
    public function view_join_mproyek($order){
        $this->db->select('pyk_kode, pyk_nama');
        $this->db->from('tbl_ifmproyek');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Tabel : Master Negara (Country) -----* //
    public function view_join_mcountry($order){
        $this->db->select('cnt_kode, cnt_nama');
        $this->db->from('tbl_ifmcountry');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Tabel : Master Provinsi -----* //
    public function view_join_mprovinsi($order){
        $this->db->select('prov_kode, prov_nama');
        $this->db->from('tbl_ifmprovinsi');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Sql Query Provinsi Join Country -----* //
    public function ifsqlviewjoinmprovinsi() {
        $this->db->select('a.prov_kode, a.prov_nama, a.cnt_kode, b.cnt_nama');
        $this->db->from('tbl_ifmprovinsi a');
        $this->db->join('tbl_ifmcountry b','a.cnt_kode=b.cnt_kode');
        $this->db->order_by('b.cnt_nama, a.prov_kode',"ASC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Tabel : Cek Master Provinsi Pada Field Kode Provinsi -----* //
    public function ifsqlvalkdprovinsi(){
		$this->db->where(array(
		'prov_kode'	=>$this->input->post('txtkdprovinsi')));
            
        $query = $this->db->get("tbl_ifmprovinsi");
		if($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
    }
    
    function cekdatakdprov($txtkdprovinsi) {
        $this->db->where('prov_kode',$txtkdprovinsi);
        $query = $this->db->get('tbl_ifmprovinsi');
        return $query->num_rows();
      }


    // *---- Menu Tabel : Master Bank -----* //
    public function view_join_mbank($order){
        $this->db->select('bank_kode, bank_nama');
        $this->db->from('tbl_ifmbank');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }



    // *---- Menu Tabel : Master Kelompok Suplier -----* //
    public function view_join_msuplierkelompok($order){
        $this->db->select('sug_kode, sug_nama');
        $this->db->from('tbl_ifmsuplierkelompok');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }






    // *---- Menu Tabel : Master Group Customer -----* //
    public function view_join_mcustomergroup($order){
        $this->db->select('csg_kode, csg_nama');
        $this->db->from('tbl_ifmcustomergroup');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }




    // *---- Menu Tabel : Master Warna -----* //
    public function view_join_mwarna($order){
        $this->db->select('war_kode, war_nama');
        $this->db->from('tbl_ifmwarna');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }






    // *---- Menu Tabel : Master Group User -----* //
    public function view_join_musergroup($order){
        $this->db->select('usg_kode, usg_nama');
        $this->db->from('tbl_ifmusergroup');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }




}