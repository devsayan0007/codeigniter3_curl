<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class INDEX extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $userdataArr = $this->session->userdata('user');
        if (empty($userdataArr)) {
            $this->session->set_flashdata('msg','Please Login, No Session Found');
            redirect(base_url().'login');
            die();
        }
    }
    public function index()
    {
        // echo "<h1>Welcome</h1>";
        $userdataArr['user'] = $this->session->userdata('user');
        // print_r($userdataArr);
        // exit;
        $this->load->view('index',$userdataArr);
    }

}






?>