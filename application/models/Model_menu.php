<?php
class Model_menu extends CI_Model{
    
    
    public $table="tbl_menu";
    
    
    function get_all(){
        $query= $this->db->get('tbl_menu');
        return $query->result();
    }
            
    
    function save(){
        $data=array(
            'nama_menu'   =>$this->input->post('nama_menu'),
            'link'        =>$this->input->post('link'),
            'icon'        =>$this->input->post('icon'),
            'is_main_menu'=>$this->input->post('is_main_menu'),
        );
        $this->db->insert($this->table,$data);
    }
    function update(){
        
        $data=array(
            'nama_menu'   =>$this->input->post('nama_menu'),
            'link'        =>$this->input->post('link'),
            'icon'        =>$this->input->post('icon'),
            'is_main_menu'=>$this->input->post('is_main_menu'),
        );
        
        $id= $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->update($this->table,$data);
    }
    
    
    
}



?>