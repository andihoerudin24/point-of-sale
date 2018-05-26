<?php

class Auth extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Model_user_login');
        
    }
   function index() {
        $this->template->load('template_login', 'form_login');
        chek_seesion_login();
   }
   function login() {
        if (isset($_POST['submit'])) {
                    $username= $this->input->post('username');
                    $password= $this->input->post('password');
             $result= $this->Model_user_login->chek_login($username,$password);
             if (!empty($result)) {
                 $this->session->set_userdata($result);
                 $this->session->set_userdata(array('status_login'=>'ok'));
                 redirect('Dokumentasi');
             }else{
                 redirect('Auth');
             }
             print_r($result);
            
        }else{
            redirect('Auth');
        }
    }
    
    
    function logout(){
        $this->session->sess_destroy();
        redirect('Auth');
    }

}

?>