<?php

class Model_user extends CI_Model {

    public $table = "tbl_user";

    function save($foto) {
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'id_level_user' => $this->input->post('level'),
            'foto' => $foto,
        );
        $this->db->insert($this->table, $data);
    }

    function update($foto) {
        if (empty($foto)) {
          $data = array(
            'nama_lengkap'   => $this->input->post('nama_lengkap'),
            'username'       => $this->input->post('username'),
            'password'       => $this->input->post('password'),
            'id_level_user'  => $this->input->post('level'),
            'foto' => $foto
        );
        }else{
        $data = array(
            'nama_lengkap'   => $this->input->post('nama_lengkap'),
            'username'       => $this->input->post('username'),
            'password'       => $this->input->post('password'),
            'id_level_user'  => $this->input->post('level'),
            //'foto' => $foto
        );
        }
        $id_user = $this->input->post('id_user');
        $this->db->where('id_user', $id_user);
        $this->db->update($this->table, $data);
    }

}

?>