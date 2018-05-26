<?php

class Model_kategori extends CI_Model {

    function save() {
        $nama_kategori = $this->input->post('nama_kategori');
        $data = array('nama_kategori' => $nama_kategori);
        $this->db->insert('tbl_kategori', $data);
    }

    function edit() {
        
        $data=array(
            'nama_kategori'   =>$this->input->post('nama_kategori'),
        );
        $id_kategori= $this->input->post('id_kategori');
        $this->db->where('id_kategori',$id_kategori);
        $this->db->update('tbl_kategori',$data);
    }
    
    function tampilkan_data_paging($limit,$start){
        $query= $this->db->get('tbl_kategori',$limit,$start);
        return $query;
    }

}

?>