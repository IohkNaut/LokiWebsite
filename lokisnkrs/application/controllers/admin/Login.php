<?php
class Login extends MY_Controller {
	
	function index() {
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		if($this->input->post()) {
			$this->form_validation->set_rules('login', 'login', 'callback_check_login');
			if($this->form_validation->run()) {
				$this->session->set_userdata('login_admin', $this->input->post('txt_username'));
				redirect(admin_url('home'));
			}
		}
		
		$this->load->view('admin/login/index');
	}
	
	//kiem tra username va password
	function check_login() {
		$username = $this->input->post('txt_username');
		$password = $this->input->post('pw_password');
		
		$this->load->model('admin_model');
		$where = array('username' => $username, 'password' => $password);
		if($this->admin_model->check_exists($where)) {
			return true;
		}
		$this->form_validation->set_message(__FUNCTION__, '* Tên đăng nhập hoặc mật khẩu sai!');
		return false;
	}
}