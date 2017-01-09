<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main_Model extends CI_Model {
 
    public function get() {
        $this->db->select('*');
        $this->db->from('items');
        return $this->db->get()->result();
    }
     
    public function post($itens){
        if(!isset($itens->{'id'}))
            $res = $this->db->insert('items', $itens);
        else {
            $this->db->where('id', $itens->{'id'});
            $res = $this->db->update('items', $itens);
        }
        if($res){
           return $this->get();
        }else{
           return FALSE;
        }
    }

    public function delete($id){
        $this->db->where('id', $id);
        $res = $this->db->delete('items');
        if($res){
           return $this->get();
        }else{
           return FALSE;
        }
    }

    public function edit($id){
        $this->db->select('*');
        $this->db->from('items');
        $this->db->where('id', $id);
        return $this->db->get()->result();
    }

}