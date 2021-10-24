<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Login_model');
    }
    public function index()
    {
        $this->session->unset_userdata('user');
        redirect(base_url().'login');
        die();
    }

}

?>