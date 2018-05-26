<?php

class Suplier extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_suplier');
        chek_akses_modul();
        chek_seesion();
    }

    function index() {
        $data['suplier'] = $this->db->get('tbl_suplier')->result();
        $this->template->load('template', 'suplier/list', $data);
    }

    function add() {
        $this->form_validation->set_rules('nama_suplier'   ,'nama_suplier','required');
        $this->form_validation->set_rules('alamat'         ,'alamat'      ,'required');
        $this->form_validation->set_rules('no_telpon'      ,'no_telpon'   ,'required');
        $this->form_validation->set_rules('keterangan'     ,'keterangan'  ,'required');
        if(isset($_POST['submit'])){
            if($this->form_validation->run()!=FALSE) {
                $this->Model_suplier->save();
                $this->session->set_flashdata('message','Berhasil Menambahkan Suplier');
            }else{
                $this->session->set_flashdata('pesan','Mohon Isi Data Dengan Benar');
            }
              redirect('Suplier'); 
           
        } else {

            $data['suplier'] = $this->db->get('tbl_suplier')->result();
            $this->template->load('template', 'suplier/list', $data);
        }
    }

    function edit() {
        if (isset($_POST['submit'])) {
            $this->Model_suplier->edit();
            redirect('Suplier');
        } else {
            $id= $this->uri->segment(3);
            $data['edit']=$this->db->get_where('tbl_suplier',array('id_suplier'=>$id))->row_Array();
            $this->template->load('template', 'suplier/edit',$data);
        }
    }
    
    function hapus(){
        $id_suplier= $this->uri->segment(3);
        $this->db->where('id_suplier',$id_suplier);
        $this->db->delete('tbl_suplier');
        redirect('Suplier');
    }

}

?>