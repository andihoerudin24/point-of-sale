<?php

class Language extends CI_Controller {

    function change($langg) {
    
        $this->session->set_userdata(array('language'=>$langg));
        redirect(base_url());
        
    }

}

?>