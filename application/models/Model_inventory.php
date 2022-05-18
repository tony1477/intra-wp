<?php 
class Model_inventory extends CI_model{
    // *---- Menu Inventory : Master Area Salesman -----* //
    public function view_join_marea($order){
        $this->db->select('area_kode, area_nama');
        $this->db->from('inv_ifmarea');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Inventory : Master Group Salesman -----* //
    public function view_join_msalesgroup($order){
        $this->db->select('slg_kode, slg_nama');
        $this->db->from('inv_ifmsalesgroup');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Inventory : Master Lokasi Stock -----* //
    public function view_join_mlokasi($order){
        $this->db->select('lok_kode, lok_nama');
        $this->db->from('inv_ifmlokasi');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Inventory : Master Rak -----* //
    public function view_join_mrak($order){
        $this->db->select('rak_kode, rak_nama');
        $this->db->from('inv_ifmrak');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Inventory : Master Kelompok -----* //
    public function view_join_mkelompok($order){
        $this->db->select('kel_kode, kel_nama');
        $this->db->from('inv_ifmkelompok');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Inventory : Master Golongan -----* //
    public function view_join_mgolongan($order){
        $this->db->select('gol_kode, gol_nama');
        $this->db->from('inv_ifmgolongan');        
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Inventory : Master Merk -----* //
    public function view_join_mmerk($order){
        $this->db->select('merk_kode, merk_nama');
        $this->db->from('inv_ifmmerk');        
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Inventory : Master Produk -----* //
    public function view_join_mproduk($order){
        $this->db->select('pro_kode, pro_nama');
        $this->db->from('inv_ifmproduk');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Inventory : Master Type -----* //
    public function view_join_mtype($order){
        $this->db->select('type_kode, type_nama');
        $this->db->from('inv_ifmtype');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    // *---- Menu Inventory : Master Varian -----* //
    public function view_join_mvarian($order){
        $this->db->select('var_kode, var_nama');
        $this->db->from('inv_ifmvarian');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }




}