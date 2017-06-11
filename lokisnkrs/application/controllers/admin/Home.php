<?php
class Home extends MY_Controller {
	function index() {
		$username = $this->session->userdata('login_admin');
		$this->load->model('admin_model');
		$admin = $this->admin_model->get_info_rule(array('username' => $username));
		$this->data['admin_name'] = $admin->admin_name;
		$this->data['temp'] = 'admin/home/index';
		$this->load->view('admin/main', $this->data);
	}
}