<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
    {
        parent:: __construct();
        $userdataArr = $this->session->userdata('user');
        if (!empty($userdataArr)) {
            $this->session->set_flashdata('msgLogin','Welcome Back Again');
            redirect(base_url());
            die();
        }
        $this->load->model('Signup_model');
    }
	public function index()
	{
		$this->load->view('signup');
    }
	public function authenticate()
	{
        $this->form_validation->set_rules('userName','Username','trim|required');
        $this->form_validation->set_rules('mob','Mobile','trim|required');
		$this->form_validation->set_rules('pws','Password','trim|required');
		$this->form_validation->set_rules('cpws','Password Confirmation','trim|required');
		$this->form_validation->set_rules('firstName','Firstname','trim|required');
        $this->form_validation->set_rules('lastName','Lastname','trim|required');
        if ($this->form_validation->run()== true) {
            $userdata['userName'] = $this->security->sanitize_filename($this->security->xss_clean(html_escape($this->input->post('userName'))));
            $userdata['mobile'] = $this->security->sanitize_filename($this->security->xss_clean(html_escape($this->input->post('mob'))));
            $userdata['password'] = $this->security->xss_clean(html_escape($this->input->post('pws')));
            $userdata['c_password'] = $this->security->xss_clean(html_escape($this->input->post('cpws')));
            $userdata['firstName'] = $this->security->sanitize_filename($this->security->xss_clean(html_escape($this->input->post('firstName'))));
            $userdata['lastName'] = $this->security->sanitize_filename($this->security->xss_clean(html_escape($this->input->post('lastName'))));
            // print_r($userdata);
            // exit;
            $userdata = $this->Signup_model->registerUser($userdata);
            if (!empty($userdata['data']['user_id'])) {
                // print_r($userdata);
                $userdataArr['uid'] = $userdata['data']['user_id'];
				$userdataArr['username'] = $userdata['data']['userName'];
				$userdataArr['firstname'] = $userdata['data']['firsName'];
				$userdataArr['lastname'] = $userdata['data']['lastName'];
				$userdataArr['mob'] = $userdata['data']['mob'];
				$userdataArr['profile_img'] = $userdata['data']['profile_pic'];
				$userdataArr['status'] = $userdata['data']['status'];
				$userdataArr['created_at'] = $userdata['data']['Profile_created_at'];
				// print_r($userdataArr);
			    // exit;
				$this->session->set_userdata('user',$userdataArr);
				$this->session->set_flashdata('msgLogin','Signup Successfully');
				redirect(base_url());
				die();
                
            }else{
                $this->session->set_flashdata('msg','Username or Password Incorrect');
                redirect(base_url().'signup');
                die();
            }

            
        }else{
			//fail
			$this->load->view('signup');
		}
    }
    
}

?>