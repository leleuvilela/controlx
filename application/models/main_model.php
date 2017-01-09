<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main_Model extends CI_Model {
 
    public function get($table) {
        $this->db->select('*');
        $this->db->from($table);
        return $this->db->get()->result();
    }
     
    public function post($data, $table){
        if(!isset($data->{'id'}))
            $res = $this->db->insert($table, $data);
        else {
            $this->db->where('id', $data->{'id'});
            $res = $this->db->update($table, $data);
        }
        if($res){
           return $this->get($table);
        }else{
           return FALSE;
        }
    }

    public function delete($id, $table){
        $this->db->where('id', $id);
        $res = $this->db->delete($table);
        if($res){
           return $this->get($table);
        }else{
           return FALSE;
        }
    }

    public function edit($id, $table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id', $id);
        return $this->db->get()->result();
    }

    public function lastId(){
        $this->db->select_max('id');
        $result= $this->db->get('files')->row_array();
        return $result['id'];
    }

}