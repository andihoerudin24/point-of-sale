<?php

Class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_user');
        chek_akses_modul();
        chek_seesion();
    }

    function index() {
        $data['User'] = $this->db->get('v_user');
        $this->template->load('template', 'user/list', $data);
    }

    function add() {
        $this->form_validation->set_rules('nama_lengkap','nama_lengkap','required');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        if (isset($_POST['submit'])) {
            if ($this->form_validation->run()) {
            $uploadfoto = $this->upload_foto_user();
            $this->Model_user->save($uploadfoto);
            echo $this->session->set_flashdata('message','Berhasil Menambah Pengguna');
         }else{
             echo $this->session->set_flashdata('pesan','Mohon Isi Data Dengan Benar');
         }
            redirect('User');
        } else {
            $this->template->load('template', 'user/list');
        }
    }

    function upload_foto_user() {

        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|png|jpg';
        $config['max_size'] = 5000;
        $this->load->library('upload', $config);
        $this->upload->do_upload('userfile');
        $uploads = $this->upload->data();
        return $uploads['file_name'];
    }

    function edit(){
        if (isset($_POST['submit'])) {
            $uploadfoto = $this->upload_foto_user();
            $this->Model_user->update($uploadfoto);
            redirect('User');
        }else{
            $id = $this->uri->segment(3);
            $data['user'] = $this->db->get_where('tbl_user', array('id_user' => $id))->row_Array();
            $this->template->load('template', 'user/edit', $data);
        }
    }

    function Hapus() {
        $id = $this->uri->segment(3);
        if (empty($id)) {
            redirect('User');
        } else {
            $this->db->where('id_user', $id);
            $this->db->delete('tbl_user');
            redirect('User');
        }
    }

    function rule() {
        $this->template->load('template', 'user/rule');
    }

    function modul() {
        $level_user=$_GET['level_user'];
        echo "  <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NAMA MODULE</th>
                            <th>Link</th>
                            <th>HAK AKSES</th>
                        </tr>";
                  $menu= $this->db->get('tbl_menu');
                  $no=1;
                  foreach ($menu->result() as $row){
                   echo "<tr>
                           <td>$no</td>
                           <td>". strtoupper($row->nama_menu)."</td>
                           <td>$row->link</td>
                           <td><input type='checkbox' ";
                   $this->check_akses($level_user, $row->id);
                  echo " name='akses' onClick='addrule($row->id)'></td>  
                         </tr>";
                   $no++;
                  }
            echo "</thead>
                </table>";
    }
    
    
    function check_akses($level_user,$id_menu){
        $data=array('id_level_user'=>$level_user,
                    'id_menu'=>$id_menu);
        $chek= $this->db->get_where('tbl_user_rule',$data);
           if ($chek->num_rows()>0) {
            echo "Checked";
        }
    }
            
    
    function add_rule(){
        $level_user=$_GET['level_user'];
        $id_menu   =$_GET['id_menu'];
        $data=array('id_level_user'=>$level_user,
                    'id_menu'=>$id_menu
                );
       $chek= $this->db->get_where('tbl_user_rule',$data);
       if ($chek->num_rows()<1) {
           $this->db->insert('tbl_user_rule',$data);
       } else {
           $this->db->where('id_menu',$id_menu);
           $this->db->where('id_level_user',$level_user);
           $this->db->delete('tbl_user_rule');    
       }
        
    }

}

?>