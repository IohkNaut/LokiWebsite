<?php
class Product_detail extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('product_detail_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	//lay danh sach chi tiet san pham
	function index() {
		
		$product_id = $this->uri->rsegment('3');
		$product_id  = intval($product_id);
		$where = array('product_id' => $product_id);
		$info = $this->product_detail_model->get_info_rule(array('product_id' => $product_id), 'pd_detail_id');
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('product'));
		}

		$list = $this->product_detail_model->get_list_($product_id);
		$this->data['list'] = $list;
		
		$input['where'] = array('product_id' => $product_id);
		$total = $this->product_detail_model->get_total($input);
		$this->data['total'] = $total;
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['product_id'] = $product_id;
		
		$this->data['temp'] = 'admin/product_detail/index';
		$this->data['tmp'] = 'admin/product_detail/insert';
		$this->load->view('admin/main', $this->data);
	}
	
	//kiem tra username da ton tai chua
	function check_size() {
		$product_id = $this->uri->rsegment('3');
		$product_id  = intval($segment);
		$size = $this->input->post('num_size');
		$where = array('size' => $size, 'product_id' => $product_id);
		if($this->product_detail_model->check_exists($where)) {
			$this->form_validation->set_message(__FUNCTION__, '* Size vừa nhập đã tồn tại');
			return false;
		}
		return true;
	}
	
	//them admin
	function insert() {
		$product_id = $this->uri->rsegment('3');
		$product_id  = intval($segment);
		$info = $this->product_detail_model->get_info_rule(array('product_id' => $id), 'pd_detail_id');
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('product'));
		}
		
		if($this->input->post()) {
			$this->form_validation->set_rules('num_quantity', 'Số lượng', 'greater_than_equal_to[0]|max_length[10]');
			$this->form_validation->set_rules('num_size', 'Size', 'greater_than_equal_to[0]|less_than_equal_to[50]|callback_check_size');
		}
		
		if($this->form_validation->run()) {
			$size = $this->input->post('num_size');
			$quantity = $this->input->post('num_quantity');

			$data = array (
				'product_id' => $product_id,
				'size' => $size,
				'quantity' => $quantity
			);
			if($this->product_detail_model->create($data)) {
				$this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
			} else {
				$this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
			}
			
			redirect(admin_url('product_detail/'.$product_id));
		} else {
			$this->index();
		}
	}
	
	//sua admin
	function edit() {
		$username = $this->session->userdata('login_admin');
		$where = array('username' => $username);
		$info = $this->admin_model->get_info_rule($where);
		$data = array (
			'admin_name' => $info->admin_name,
			'username' => $info->username,
			'password' => $info->password
		);

		$data['message'] = $this->session->flashdata('message');
		
		$data['temp'] = 'admin/admin/edit';
		$this->load->view('admin/main', $data);
		
		if($this->input->post()) {
			$this->form_validation->set_rules('pw_password', 'Mật khẩu', 'required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('pw_retype', 'Nhập lại mật khẩu', 'required|matches[pw_password]');
		}
		
		if($this->form_validation->run()) {
			$password = $this->input->post('pw_password');
			$data = array (
				'password' => $password
			);
			
			if($this->admin_model->update($info->admin_id, $data)) {
				$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
			} else {
				$this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
			}
			redirect(admin_url('admin/edit'));
		} else {
			$this->index();
		}
	}
	
	//xoa admin
	function delete() {
		
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		
		//lay thong tin admin
		$info = $this->admin_model->get_info($id);
		if(!$info) {
			$this->session->set_flashdata('message', 'Không tồn tại dữ liệu!');
			redirect(admin_url('admin'));
		}
		
		//thuc hien xoa
		if($this->admin_model->delete($id)) {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công!');
		} else {
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công!');
		}
		
		redirect(admin_url('admin'));
	}
	
	//dang xuat
	function logout() {
		if(null !== $this->session->userdata('login_admin')) {
			$this->session->unset_userdata('login_admin');
		}
		redirect(admin_url('login'));
	}
}