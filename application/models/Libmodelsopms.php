<?php 
class Libmodelsopms extends CI_model {

    function __construct() {
        /* Call the Model constructor */
        parent::__construct();
        $this->load->database();
    }

    public function ifsqlgetsopadmin($tckategorikode, $tcdivisikode) {
        $this->db->select('`sop_ifmdokumen`.*, tbl_ifmdepartemen.dep_nama, tbl_ifmdepartemen.div_kode');
        $this->db->from('sop_ifmdokumen');
        $this->db->join('tbl_ifmdepartemen', 'tbl_ifmdepartemen.dep_kode = sop_ifmdokumen.dep_kode');
        $this->db->where('sop_ifmdokumen.kat_kode', $tckategorikode);
        $this->db->where('tbl_ifmdepartemen.div_kode', $tcdivisikode);
        return $this->db->get()->result_array();
    }

    public function ifsqlgetsopuser($tcsessionid, $tckategorikode, $tcdivisikode) {
        $this->db->select('`sop_ifmdokumenuser`.*, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_nmfile3, sop_ifmdokumen.dok_nmfile4, sop_ifmdokumen.kat_kode, tbl_ifmdepartemen.dep_nama, tbl_ifmdepartemen.div_kode');
        $this->db->from('sop_ifmdokumenuser');
        $this->db->join('tbl_ifmdepartemen', 'tbl_ifmdepartemen.dep_kode = sop_ifmdokumenuser.dep_kode');
        $this->db->join('sop_ifmdokumen', 'sop_ifmdokumen.dok_nosop = sop_ifmdokumenuser.dok_nosop');
        $this->db->where('sop_ifmdokumenuser.user_kode', $tcsessionid);
        $this->db->where('sop_ifmdokumen.kat_kode', $tckategorikode);
        $this->db->where('tbl_ifmdepartemen.div_kode', $tcdivisikode);
        return $this->db->get()->result_array();
    }

    public function ifsqlgetaksesdokumensop2($tcsessionid) {
        $this->db->select('`sop_ifmdokumenuser`.*, sop_ifmdokumen.dok_nmsop, sop_ifmdokumen.dok_nmsop2, sop_ifmdokumen.dok_nmfile, sop_ifmdokumen.dok_nmfile2, sop_ifmdokumen.dok_nmfile3, sop_ifmdokumen.dok_nmfile4, sop_ifmdokumen.kat_kode, tbl_ifmdepartemen.dep_nama, tbl_ifmdepartemen.div_kode');
        $this->db->from('sop_ifmdokumenuser');
        $this->db->join('tbl_ifmdepartemen', 'tbl_ifmdepartemen.dep_kode = sop_ifmdokumenuser.dep_kode');
        $this->db->join('sop_ifmdokumen', 'sop_ifmdokumen.dok_nosop = sop_ifmdokumenuser.dok_nosop');
        $this->db->where('sop_ifmdokumenuser.user_kode', $tcsessionid);
        return $this->db->get()->result_array();
    }    

    public function ifsqlgetaksesdokumensop($tcsessionid) {
        $this->db->select('`sop_ifmdokumen`.*, sop_ifmdokumenuser.user_kode, tbl_ifmdepartemen.dep_nama, tbl_ifmdepartemen.div_kode');
        $this->db->from('sop_ifmdokumen');
        $this->db->join('tbl_ifmdepartemen', 'tbl_ifmdepartemen.dep_kode = sop_ifmdokumenuser.dep_kode');
        $this->db->join('sop_ifmdokumenuser', 'sop_ifmdokumenuser.dok_nosop = sop_ifmdokumen.dok_nosop');
        $this->db->where('sop_ifmdokumenuser.user_kode', $tcsessionid);
        return $this->db->get()->result_array();
    }    


}