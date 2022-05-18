<?php 
class Libprocms extends CI_model {

    function __construct() {
        /* Call the Model constructor */
        parent::__construct();
        $this->load->database();
    }

    // *---- Fungsi untuk mengakses tabel user ------* //
    function ifuserakseslogin($tcuserkode, $tcpassword, $tctable) {
        return $this->db->query("SELECT * FROM $tctable where user_kode='".$this->db->escape_str($tcuserkode)."' AND user_pwd='".$this->db->escape_str($tcpassword)."'");
    }

    function ifcekuserlevel($tcuserkode, $tctable) {
        return $this->db->query("SELECT user_level FROM $tctable where user_kode='".$this->db->escape_str($tcuserkode)."' ");
    }
    
    //*---- Fungsi untuk query data secara single tabel -----*//
    function ifsqlselect($lcfield, $lotable, $lcorder, $lcascdesc) {
        $this->db->select($lcfield);
        $this->db->from($lotable);
        $this->db->order_by($lcorder,$lcascdesc);
        return $this->db->get()->result_array();
    }

    //*---- Fungsi untuk query data secara single tabel -----*//
    function ifsqlselectwhere($lcfield, $lotable, $lcwhere) {
        $this->db->select($lcfield);
        $this->db->from($lotable);
        $this->db->where($lcwhere);
        return $this->db->get()->result_array();
    }

    //*---- Fungsi untuk query data secara single tabel -----*//
    function ifsqlselectwheregroupby($lcfield, $lotable, $lcwhere, $lcgroupby) {
        $this->db->select($lcfield);
        $this->db->from($lotable);
        $this->db->where($lcwhere);
        $this->db->group_by($lcgroupby);
        return $this->db->get()->result_array();
    }

    
    //*---- Fungsi untuk query data secara join satu tabel -----*//
    public function ifsqlselectjoin($lcfield, $lotableinduk, $lotablejoin, $lcfieldkeyjoin, $lcorder, $lcascdesc) {
        $this->db->select($lcfield);
        $this->db->from($lotableinduk);
        $this->db->join($lotablejoin, $lotableinduk.'.'.$lcfieldkeyjoin.'='.$lotablejoin.'.'.$lcfieldkeyjoin);
        $this->db->order_by($lcorder,$lcascdesc);
        return $this->db->get()->result_array();
    }

    //*---- Fungsi untuk query data join dua tabel -----*//
    public function ifsqlselectjoin2tabel($lcfield, $lotableinduk, $lotablejoin, $lotablejoin2, $lcfieldkeyjoin, $lcfieldkeyjoin2, $lcorder, $lcascdesc) {
        $this->db->select($lcfield);
        $this->db->from($lotableinduk);
        $this->db->join($lotablejoin, $lotableinduk.'.'.$lcfieldkeyjoin.'='.$lotablejoin.'.'.$lcfieldkeyjoin, 'left');
        $this->db->join($lotablejoin2, $lotableinduk.'.'.$lcfieldkeyjoin2.'='.$lotablejoin2.'.'.$lcfieldkeyjoin2, 'left');
        $this->db->order_by($lcorder,$lcascdesc);
        return $this->db->get()->result_array();
    }

    public function ifsqlselectjoinwhere($lcfield, $lotableinduk, $lotablejoin, $lcfieldkeyjoin, $where, $lcorder, $lcascdesc) {
        $this->db->select($lcfield);
        $this->db->from($lotableinduk);
        $this->db->join($lotablejoin, $lotableinduk.'.'.$lcfieldkeyjoin.'='.$lotablejoin.'.'.$lcfieldkeyjoin);
        $this->db->where($where);
        $this->db->order_by($lcorder, $lcascdesc);
        return $this->db->get()->result_array();
    }

    public function ifsqlselectjoin2tabelwhere($lcfield, $lotableinduk, $lotablejoin, $lotablejoin2, $lcfieldkeyjoin, $lcfieldkeyjoin2, $where, $lcorder, $lcascdesc) {
        $this->db->select($lcfield);
        $this->db->from($lotableinduk);
        $this->db->join($lotablejoin, $lotableinduk.'.'.$lcfieldkeyjoin.'='.$lotablejoin.'.'.$lcfieldkeyjoin, 'left');
        $this->db->join($lotablejoin2, $lotableinduk.'.'.$lcfieldkeyjoin2.'='.$lotablejoin2.'.'.$lcfieldkeyjoin2, 'left');
        $this->db->where($where);
        $this->db->order_by($lcorder,$lcascdesc);
        return $this->db->get()->result_array();
    }

    public function ifsqlselectalljoinwhere($lotableinduk, $lotablejoin, $lcfieldkeyjoin, $where, $lcorder, $lcascdesc) {
        $this->db->select('*');
        $this->db->from($lotableinduk);
        $this->db->join($lotablejoin, $lotableinduk.'.'.$lcfieldkeyjoin.'='.$lotablejoin.'.'.$lcfieldkeyjoin);
        $this->db->where($where);
        $this->db->order_by($lcorder, $lcascdesc);
        return $this->db->get()->result_array();
    }

    public function ifsqlgetwherejoin($lcfield, $lotableinduk, $lotablejoin, $lcfieldkeyjoin, $lcwhere, $lcvaluewhere, $lcwhere2, $lcvaluewhere2, $lcorder, $lcascdesc) {
        $this->db->select($lcfield);
        $this->db->from($lotableinduk);
        $this->db->join($lotablejoin, $lotableinduk.'.'.$lcfieldkeyjoin.'='.$lotablejoin.'.'.$lcfieldkeyjoin);
        $this->db->where($lcwhere, $lcvaluewhere);
        $this->db->where($lcwhere2, $lcvaluewhere2);
        $this->db->order_by($lcorder, $lcascdesc);
        return $this->db->get();
    }

    function ifsqlinsert($table,$data) {
        return $this->db->insert($table, $data);
    }

    function ifsqlupdate($table, $data, $where) {
        return $this->db->update($table, $data, $where); 
    }

    function ifsqledit($table, $data) {
        return $this->db->get_where($table, $data);
    }

    function ifsqldelete($table, $where) {
        return $this->db->delete($table, $where);
    }

    function searchForId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['uid'] === $id) {
                return $key;
            }
        }
        return null;
     }

    // *----- Fungsi untuk menampilkan semua data yang ada di tabel -----* //
    function ifsqlgetresult($nmtabel) {
        return $this->db->get($nmtabel)->result();
    }

    function ifgetviewtable($nmtabel){
        return $this->db->get($nmtabel);
    }

    function ifvieworderinglimit($nmtabel, $order, $ordering, $baris, $dari) {
        $this->db->select('*');
        $this->db->order_by($order, $ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($nmtabel);
    }

   function ifviewordering($nmtabel, $order, $ordering) {
        $this->db->select('*');
        $this->db->from($nmtabel);
        $this->db->order_by($order, $ordering);
        return $this->db->get()->result_array();
    }

    function ifvieworderingwhere($nmtabel, $tcdata, $order, $ordering) {
        $this->db->where($tcdata);
        $this->db->order_by($order, $ordering);
        $loquery = $this->db->get($nmtabel);
        return $loquery->result_array();
    }

    function ifviewgetwhere($nmtabel, $data) {
        $this->db->where($data);
        return $this->db->get($nmtabel);
    }    

    // *---- Fungsi untuk query data -----* //
	function ifsqlgetselectresult($tsql) {		
		return $this->db->query($tsql)->result();
	}

    // *---- Fungsi untuk query data -----* //
	function ifsqlgetselect($tsql) {		
		$losql = $this->db->query($tsql);
		return $losql;
	}

    function ifsqldetaildata($tcnmtable, $tcfieldwhere, $tcparam,  $tctablerelasi, $tcfieldkeyjoin) {
        $this->db->select('*');
        $this->db->from($tcnmtable);
        $this->db->join($tctablerelasi, $tcnmtable.'.'.$tcfieldkeyjoin.'='.$tctablerelasi.'.'.$tcfieldkeyjoin);
        $this->db->where($tcfieldwhere, $tcparam);
        return $this->db->get();
    }

	function ifsqldbget($tcsql, $tcnmtabel, $tcorder, $tcascdesc) {	
        $this->db->select($tcsql);
        $this->db->from($tcnmtabel);
        $this->db->order_by($tcorder, $tcascdesc);
		return $this->db->get();
	}

	function ifsqldbgetwhere($tcsql, $tcnmtabel, $tcfieldwhere, $tcparam) {	
        $this->db->select($tcsql);
        $this->db->from($tcnmtabel);
        $this->db->where($tcfieldwhere, $tcparam);
		return $this->db->get();
	}    

	function ifsqldbgetwhere2key($tcsql, $tcnmtabel, $tcfieldwhere, $tcparam, $tcfieldwhere2, $tcparam2) {
        $this->db->select($tcsql);
        $this->db->from($tcnmtabel);
        $this->db->where($tcfieldwhere, $tcparam);
        $this->db->where($tcfieldwhere2, $tcparam2);
		return $this->db->get();
	}    

    function ifsqldbgetjoin($table1, $table2, $field, $where, $order, $ordering, $baris, $dari) {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get();
    }

    function ifuserjoinakses($tcuserkode, $tcpassword) {
        return $this->db->query("SELECT a.user_kode, a.user_nama, a.user_pwd, a.guser_kode, a.dep_kode,
            a.user_email, a.user_level, a.user_modul, a.user_stts, a.user_blokir, a.user_fhoto, a.keterangan, 
                b.div_kode FROM tbl_ifmuser a left outer join tbl_ifmdepartemen b on a.dep_kode = b.dep_kode
                    where a.user_kode='".$this->db->escape_str($tcuserkode)."' AND a.user_pwd='".$this->db->escape_str($tcpassword)."'");
    }


}