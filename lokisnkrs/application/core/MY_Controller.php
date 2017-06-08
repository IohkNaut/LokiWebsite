<?php
class MY_Controller extends CI_Controller {
	
	//bien gui du lieu sang ben view
	public $data = array();
	
	function __construct() {
		//ke thua tu CI_Controller
		parent::__construct();
		
		$controller = $this->uri->segment(1);
		switch ($controller) {
			case 'admin' : {
				//xu ly cac du lieu khi truy cap vao trang admin
				$this->load->helper('admin');
				$this->_check_login();
				break;;
			}
			default: {
				//xu ly du lieu o trang ngoai
			}
		}
	}
	
	//kiem tra trang thai dang nhap cua admin
	private function _check_login() {
		$controller = $this->uri->rsegment('1');
		$controller = strtolower($controller);
		
		$login = $this->session->userdata('login_admin');
		if($login == '' && $controller != 'login') {
			redirect(admin_url('login'));
		}
		if($login != '' && $controller == 'login') {
			redirect(admin_url('home'));
		}
	}
}