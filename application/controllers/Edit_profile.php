<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_Profile extends CI_Controller {

    public function __construct()
    {
		parent:: __construct();
		$userdataArr = $this->session->userdata('user');
        if (empty($userdataArr)) {
            $this->session->set_flashdata('msg','Please Login, No Session Found');
            redirect(base_url().'login');
            die();
        }
		$this->load->model('Edit_profile_model');
    }
    public function index()
    {
        $userdataArr['user'] = $this->session->userdata('user');
        $this->load->view('edit-profile',$userdataArr);
    }
    public function authenticate()
    {   
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('mob','Mobile','trim|required');
        $this->form_validation->set_rules('firstname','Firstname','trim|required');
        $this->form_validation->set_rules('lastname','Lastname','trim|required');

        $userdataArr['userid'] = $this->session->userdata('user');

		if ($this->form_validation->run()== true) {
            $userdata['userID'] = $userdataArr['userid']['uid'];
            if (!empty($_FILES['profile_img']['name'])){
                // print_r($_FILES);
                // exit;
                $userdata['profile_img'] = $_FILES['profile_img'];
            }
            $userdata['userName'] = $this->security->sanitize_filename($this->security->xss_clean(html_escape($this->input->post('username'))));

            $userdata['mobile'] = $this->security->sanitize_filename($this->security->xss_clean(html_escape($this->input->post('mob'))));

            $userdata['firstName'] = $this->security->sanitize_filename($this->security->xss_clean(html_escape($this->input->post('firstname'))));

            $userdata['lastName'] = $this->security->sanitize_filename($this->security->xss_clean(html_escape($this->input->post('lastname'))));
            
            // print_r($userdata);
            // exit;
            $userdata = $this->Edit_profile_model->userEdit($userdata);
            if (!empty($userdata['data']['user_id'])) {
                
                $userdataArr['uid'] = $userdata['data']['user_id'];
				$userdataArr['username'] = $userdata['data']['userName'];
				$userdataArr['firstname'] = $userdata['data']['firsName'];
				$userdataArr['lastname'] = $userdata['data']['lastName'];
				$userdataArr['mob'] = $userdata['data']['mob'];
				$userdataArr['profile_img'] = $userdata['data']['profile_pic'];
				$userdataArr['status'] = $userdata['data']['status'];
				$userdataArr['created_at'] = $userdata['data']['Profile_created_at'];
				
				$this->session->set_userdata('user',$userdataArr);
				$this->session->set_flashdata('msgLogin','Upadate Successful');
				redirect(base_url().'edit_profile');
				die();
                
            }else{
                $this->session->set_flashdata('msg','Failed to update Profile');
                redirect(base_url().'edit_profile');
                die();
            }
        }else {
            
            $this->load->view('edit-profile');
        }
    }


}


?>