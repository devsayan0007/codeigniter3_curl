<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
		parent:: __construct();
		$userdataArr = $this->session->userdata('user');
        if (!empty($userdataArr)) {
            $this->session->set_flashdata('msgLogin','Welcome Back Again');
            redirect(base_url());
            die();
		}
		// $this->load->library('is_login');
		// $this->is_login->checkSession();
		$this->load->model('Login_model');
    }
	public function index()
	{
		$this->load->view('login');
	}
	public function authenticate()
	{	
		$this->form_validation->set_rules('userName','Username','trim|required');
		$this->form_validation->set_rules('pws','Password','trim|required');
		if ($this->form_validation->run()== true) {
			//success
			$userdata['userName'] = $this->security->sanitize_filename($this->security->xss_clean(html_escape($this->input->post('userName'))));
			$userdata['password'] = $this->security->xss_clean(html_escape($this->input->post('pws')));
			
			$userdata = $this->Login_model->vefifyUser($userdata);
			// print_r($userdata);
			// exit;
			if (!empty($userdata['data']['user_id'])) {
				// success
				// echo "Login";
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
				$this->session->set_flashdata('msgLogin','Login Successfully');
				redirect(base_url());
				die();
			}else {
				// fail
				// echo "incorrect Username or Password";
				$this->session->set_flashdata('msg','Username or Password Incorrect');
                redirect(base_url().'login');
                die();
			}
		}else{
			//fail
			$this->load->view('login');
		}



		
	   
	   	
	}

}

?>