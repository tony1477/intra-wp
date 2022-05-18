<?php 
class Model_libproc extends CI_model{

    public function ifsqlselect($lcfield,$lotable,$lcorder,$lcascdesc){
        $this->db->select($lcfield);
        $this->db->from($lotable);
        $this->db->order_by($lcorder,$lcascdesc);
        return $this->db->get()->result_array();
    }

    public function ifsqlinsert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function ifsqlupdate($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }

    public function ifsqledit($table, $data){
        return $this->db->get_where($table, $data);
    }

    public function ifsqldelete($table, $where){
        return $this->db->delete($table, $where);
    }


    public function ifsqlusekey($txtvalue,$table){
        return $this->db->query("SELECT prov_kode FROM $table where prov_kode='".$this->db->escape_str($txtvalue)."'");
    }






    public function view($table){
        return $this->db->get($table);
    }


 

    
    public function view_all_desc($table,$order){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    public function view_all_asc($table,$order){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,"ASC");
        return $this->db->get()->result_array();
    }

    public function view_where_desc($table,$data,$order){
        $this->db->where($data);
        $this->db->order_by($order,"DESC");
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_where_asc($table,$data,$order){
        $this->db->where($data);
        $this->db->order_by($order,"DESC");
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_one($table,$data,$order){
        $this->db->where($data);
        $this->db->order_by($order,"ASC");
        return $this->db->get($table);
    }

    public function view_address($table,$order){
        $this->db->select('*, mu_city.name as city, mu_state.name as state, mu_country.name as country');
        $this->db->from($table);
        $this->db->join('mu_city', $table.'.city_id=mu_city.city_id');
        $this->db->join('mu_state', 'mu_city.state_id=mu_state.state_id');
        $this->db->join('mu_country', 'mu_state.country_id=mu_country.country_id');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    public function view_one_address($table,$data,$order){
        $this->db->select('*, mu_city.name as city, mu_state.name as state, mu_country.name as country');
        $this->db->from($table);
        $this->db->join('mu_city', $table.'.city_id=mu_city.city_id');
        $this->db->join('mu_state', 'mu_city.state_id=mu_state.state_id');
        $this->db->join('mu_country', 'mu_state.country_id=mu_country.country_id');
        $this->db->where($data);
        $this->db->order_by($order,"DESC");
        return $this->db->get();
    }

    public function view_join_provinsi($order){
        $this->db->select('a.state_id, a.name as state, b.name as country');
        $this->db->from('mu_state a');
        $this->db->join('mu_country b', 'a.country_id=b.country_id');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    public function view_join_kota($order){
        $this->db->select('a.city_id, a.name as city, b.name as state, c.name as country');
        $this->db->from('mu_city a');
        $this->db->join('mu_state b', 'a.state_id=b.state_id');
        $this->db->join('mu_country c', 'b.country_id=c.country_id');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    public function edit_kota($data){
        $this->db->select('a.city_id, b.state_id, c.country_id, a.name as city, b.name as state, c.name as country');
        $this->db->from('mu_city a');
        $this->db->join('mu_state b', 'a.state_id=b.state_id');
        $this->db->join('mu_country c', 'b.country_id=c.country_id');
        $this->db->where($data);
        return $this->db->get();
    }

    public function view_join_satu($table1,$table2,$field){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        return $this->db->get();
    }

    public function view_join_dua($table1,$table2,$table3,$field,$field1){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->join($table3, $table1.'.'.$field1.'='.$table3.'.'.$field1);
        return $this->db->get();
    }

    public function view_join($table1,$table2,$field,$order){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    public function view_join_three($table1,$table2,$table3,$field,$field1,$where,$order){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field, 'left');
        $this->db->join($table3, $table1.'.'.$field1.'='.$table3.'.'.$field1, 'left');
        $this->db->where($where);
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1,$table2,$field,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get();
    }

    public function view_join_city($table1,$table2,$field,$order){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->join('mu_city', $table1.'.city_id=mu_city.city_id');
        $this->db->order_by($order,"DESC");
        return $this->db->get()->result_array();
    }


}