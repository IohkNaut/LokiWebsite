<?php
class member extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('member_model');
		$this->load->model('orders_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	//lay danh sach san pham
	function index() {
		$input = array();		
		$list = $this->member_model->get_list($input);
		$this->data['list'] = $list;

		$total = $this->member_model->get_total();
		$this->data['total'] = $total;
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp'] = 'admin/member/index';
		//$this->data['tmp'] = 'admin/member/insert';
		
		$this->load->view('admin/main', $this->data);
	}

	//them san pham
	function insert() {
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_name', 'Tên thành viên', 'min_length[3]|max_length[40]');
			$this->form_validation->set_rules('num_phone', 'Số điện thoại', 'min_length[11]|max_length[15]');
			$this->form_validation->set_rules('txt_address', 'Địa chỉ', 'min_length[5]|max_length[50]');		
			$this->form_validation->set_rules('pw_password', 'Mật khẩu', 'min_length[3]|max_length[30]');	
			$this->form_validation->set_rules('pw_retype', 'Mật khẩu', 'matches');		
			if($this->form_validation->run()) {
				$member_name = $this->input->post('txt_name');
				$phone = $this->input->post('num_phone');
				$email = $this->input->post('im_email');
				$address = $this->input->post('txt_address');
				$password = $this->input->post('pw_password');
				$retype_pw = $this->input->post('pw_retype');
				$dob = $this->input->post('date_dob');
				$gender = $this->input->post('slt_gender');
				$this->load->library('upload_library');
				$data = array (
					'member_name' => $member_name,
					'phone' => $phone,
					'email' => $email,
					'address' =>$address,
					'password' =>$password,
					'dob' =>$dob,
					'gender' =>$gender				
				);
				if($this->member_model->create($data)) {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
				} else {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
				}
				redirect(admin_url('member'));
			} else {
				$this->index();
			}
		}
	}

	//sua san pham
	function edit() {
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin tin tucc
		$info = $this->member_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('member'));
		}
		
		$input = array();		
		$list = $this->member_model->get_list($input);
		$message = $this->session->flashdata('message');
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_name', 'Tên thành viên', 'min_length[3]|max_length[40]');
			$this->form_validation->set_rules('num_phone', 'Số điện thoại', 'min_length[11]|max_length[15]');
			$this->form_validation->set_rules('txt_address', 'Địa chỉ', 'min_length[5]|max_length[50]');		
			$this->form_validation->set_rules('pw_password', 'Mật khẩu', 'min_length[3]|max_length[30]');	
			$this->form_validation->set_rules('pw_retype', 'Mật khẩu', 'matches');		
			if($this->form_validation->run()) {
				$member_name = $this->input->post('txt_name');
				$phone = $this->input->post('num_phone');
				$email = $this->input->post('im_email');
				$address = $this->input->post('txt_address');
				$password = $this->input->post('pw_password');
				$retype_pw = $this->input->post('pw_retype');
				$dob = $this->input->post('date_dob');
				$gender = $this->input->post('slt_gender');
				$this->load->library('upload_library');
				$data = array (
					'member_name' => $member_name,
					'phone' => $phone,
					'email' => $email,
					'address' =>$address,
					'password' =>$password,
					'dob' =>$dob,
					'gender' =>$gender				
				);
				if($this->member_model->create($data)) {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
				} else {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
				}
				redirect(admin_url('member'));
			}
			else{
				$this->index();
				}
		$data['temp'] = 'admin/member/index';
		$data['tmp'] = 'admin/member/edit';
		$this->load->view('admin/main', $data);
	}
	
	//xoa catalog
	function delete() {
		
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin admin
		$info = $this->member_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('member'));
		}
		
		//kiem tra orders co member_id chưa
		//$this->load->model('orders_model');
		$orders = $this->orders_model->get_info_rule(array('member_id' => $id), 'orders_id');
		//$catalog = $this->catalog_model->get_info_rule(array('parent_id' => $id), 'catalog_id');
		if($orders) {
			$this->session->set_flashdata('message', 'Vui lòng xoá tất cả đơn hàng có khách hàng này trước khi xoá!');
			redirect(admin_url('member'));
		}
		
		/*if($catalog) {
			$this->session->set_flashdata('message', 'Vui lòng xoá tất cả danh mục con thuộc danh mục này trước khi xoá!');
			redirect(admin_url('catalog'));
		}*/
		//Xóa member
		if($this->member_model->delete($id)) {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công!');
		} else {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thất bại!');
		}
		
		redirect(admin_url('member'));
	}
	}
}
