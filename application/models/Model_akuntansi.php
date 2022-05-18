<?php 
class Model_akuntansi extends CI_model{
    // *---- Menu Akuntansi : Master Kelompok Rekening -----* //
    public function view_join_accmkelompok($order){
        $this->db->select('acklp_kode, acklp_nama');
        $this->db->from('acc_ifmkelompok');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }



    



}