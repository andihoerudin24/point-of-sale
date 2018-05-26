<?php

class Model_suplier extends CI_Model {

    function save() {
        $data = array(
            'nama_suplier' => $this->input->post('nama_suplier'),
            'alamat' => $this->input->post('alamat'),
            'no_telpon' => $this->input->post('no_telpon'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->db->insert('tbl_suplier', $data);
    }

    function edit() {

        $data = array(
            'nama_suplier' => $this->input->post('nama_suplier'),
            'alamat' => $this->input->post('alamat'),
            'no_telpon' => $this->input->post('no_telpon'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $id_suplier= $this->input->post('id_suplier');
        $this->db->where('id_suplier',$id_suplier);
        $this->db->update('tbl_suplier',$data);
    }

}

?>