<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Is_login
{
    public function __construct()
    {
       
    }
    public function checkSession()
    {
        $CI =& get_instance();
        $userdataArr = $CI->session->userdata('user');
        if (!empty($userdataArr)) {
            $this->session->set_flashdata('msgLogin','Welcome Back Again');
            redirect(base_url());
            die();
        }
    }
}

?>