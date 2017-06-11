<?php
class Member extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('member_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	//dang ky thanh vien
	function register() {
		$this->data['temp'] = 'site/member/register';
		$this->load->view('site/layout', $this->data);
	}
	
	//sua thong tin thanh vien
	function edit() {
		$this->data['temp'] = 'site/member/edit';
		$this->load->view('site/layout', $this->data);
	}
	
	//xoa thanh vien
	function delete() {
	
	}
	
	
	//dang nhap
	function login() {
		
		if($this->input->post()) {
			$this->form_validation->set_rules('login', 'login', 'callback_check_login');
			if($this->form_validation->run()) {
				redirect();
			}
		}
		
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['temp'] = 'site/member/login';
		$this->load->view('site/layout', $this->data);
	}
	
	//kiem tra username va password
	function check_login() {
		$username = $this->input->post('txt_username');
		$password = $this->input->post('pw_password');
		
		$this->load->model('member_model');
		
		$sql = "select * from member where (email = '$username' or phone = '$username') and password = '$password'";
		$member = $this->member_model->query($sql);

		if(empty($member) == false) {
			$this->session->set_flashdata('message', 'Đăng nhập thành công!');
			$this->session->set_userdata('login_member', $member[0]->member_id);
			return true;
		} else {
			$this->session->set_flashdata('message', 'Đăng nhập thất bại!');
			$this->form_validation->set_message(__FUNCTION__, '* Tên đăng nhập hoặc mật khẩu sai!');
			return false;
		}
	}
	
	function logout() {
		if(null !== $this->session->userdata('login_member')) {
			$this->session->unset_userdata('login_member');
			$this->session->set_flashdata('message', 'Đăng xuất thành công!');
		}
		redirect(base_url('member/login'));
	}
}