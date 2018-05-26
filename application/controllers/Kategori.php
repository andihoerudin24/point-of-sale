<?php

class Kategori extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_kategori');
        //$this->load->library('pagination');
        chek_seesion();
        chek_akses_modul();
    }

    function index() {
        $this->template->load('template', 'kategori/list');
      
    }

    function add() {
       $nama_kategori     =$_GET['nama_kategori'];
       $data=array(
           'nama_kategori'=>$nama_kategori
       );
       $this->db->insert('tbl_kategori',$data);
    }

    function edit() {
        if (isset($_POST['submit'])) {
            $this->Model_kategori->edit();
            redirect('Kategori');
        }else {
            $id           = $this->uri->segment(3);
            $data['edit'] = $this->db->get_where('tbl_kategori', array('id_kategori' => $id))->row_Array();
            $this->template->load('template', 'kategori/edit', $data);
        }
    }

    function Hapus() {
        $id_kategori     = $this->uri->segment(3);
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('tbl_kategori');
        echo $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus...!!!');
        redirect('Kategori');
    }
    
    function keyword(){
        $cari=$_GET['cari'];
        $data=$this->db->query("SELECT nama_kategori,id_kategori FROM `tbl_kategori` WHERE   nama_kategori like '%$cari%' ");
        echo"<div class='table-overflow table-responsive border-warning'>
                <table class='table table-responsive'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>NO</th>
                            <th>NAMA KATEGORI</th>
                            <th colspan='2' width='50'>AKSI</th>
                        </tr>
                    </thead>";
        $no=1;
        foreach ($data->result() as $row){
        echo "<tr>"
            . "<td>$no</td>"
            . "<td>$row->nama_kategori</td>"
            . "<td>".anchor('Kategori/edit/' . $row->id_kategori, 'Edit', array('class' => 'btn btn-info btn-rounded'))."</td>"
            . "<td>".anchor('Kategori/Hapus/'.$row->id_kategori, 'Hapus', array('class' => 'btn btn-danger btn-rounded')). "</td>"           
            . "</tr>";
         $no++;
        }
     echo  "</table>
           </div>";
                 
    }

}

?>