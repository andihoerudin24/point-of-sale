<?php

class Menu extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_menu');
        chek_akses_modul();
        chek_seesion();
    }

    function index() {
        $data['menu'] = $this->Model_menu->get_all();
        $this->template->load('template', 'menu/list', $data);
    }

    function add() {
        $this->form_validation->set_rules('nama_menu', 'nama_menu', 'required');
        $this->form_validation->set_rules('link', 'link', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        if (isset($_POST['submit'])) {
            if ($this->form_validation->run() != FALSE) {
                echo $this->session->set_flashdata('message', 'Menu Berhasil Ditambahkan...');
                $this->Model_menu->save();
            }else{
                echo $this->session->set_flashdata('pesan','Data Yang Anda Masukan Tidak Benar...!!!!');
            }
            redirect('Menu');
        }else{
            $data['menu'] = $this->db->get('tbl_menu');
            $this->template->load('template', 'menu/list', $data);
        }
    }

    function edit() {
        $this->form_validation->set_rules('nama_menu', 'nama_menu', 'required');
        $this->form_validation->set_rules('link',      'link'     , 'required');
        $this->form_validation->set_rules('icon',      'icon'     , 'required');
        if (isset($_POST['submit'])) {
            if ($this->form_validation->run() !=FALSE) {
               echo $this->session->set_flashdata('message', 'Menu Berhasil Di Update...');
               $this->Model_menu->update();
            }else{
              echo $this->session->set_flashdata('pesan','Data Yang Anda Masukan Tidak Benar...!!!!');
            }
             redirect('Menu');
        } else {
            $id = $this->uri->segment(3);
            $data['edit'] = $this->db->get_where('tbl_menu', array('id' => $id))->row_Array();
            $this->template->load('template', 'menu/edit', $data);
        }
    }

    function Hapus() {
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        $this->db->delete('tbl_menu');
        redirect('Menu');
    }

}

?>
