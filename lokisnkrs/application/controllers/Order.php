<?php
class Order extends MY_Controller {
	function __construct() {
		parent::__construct();
		//goi thu vien gio hang
		$this->load->library('cart');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	function checkout() {
		//thong tin gio hang
		$cart = $this->cart->contents();
		if(empty($cart)) {
			$this->session->set_flashdata('message', 'Không có sản phẩm nào trong giỏ hàng!');
			redirect(base_url());
		}
		$total_cost = 0;
		foreach($cart as $row) {
			$total_cost += $row['subtotal']; 
		}
		
		//kiem tra thong tin dang nhap
		$member_id = $this->session->userdata('login_member');
		$member = '';
		if(isset($member_id)) {
			$this->load->model('member_model');
			$member = $this->member_model->get_info($member_id);
		}
		
		$this->data['member'] = $member;
		
		if($this->input->post()) {
			$this->form_validation->set_rules('txt_name', 'Tên khách hàng', 'min_length[3]|max_length[40]');
			$this->form_validation->set_rules('num_phone', 'Số điện thoại', 'min_length[10]|max_length[15]');
			$this->form_validation->set_rules('txt_address', 'Địa chỉ', 'min_length[5]|max_length[70]');		
		
			if($this->form_validation->run()) {
				$name = $this->input->post('txt_name');
				$phone = $this->input->post('num_phone');
				$email = $this->input->post('im_email');
				$address = $this->input->post('txt_address');
				$note = $this->input->post('txt_note');
				$payment = $this->input->post('slt_payment');

				$data = array (
					'name' => $name,
					'phone' => $phone,
					'email' => $email,
					'address' => $address,
					'cost' => $total_cost,
					'payment' => $payment,
					'status_payment' => 0,
					'status_shipment' => 0
				);
				
				if($note != '') {
					$data['note'] = $note;
				}
				
				if(isset($member_id)) {
					$data['member_id'] = $member_id;
				}
				
				//them vao bang don hang
				$this->load->model('order_model');
				if($this->order_model->create($data)) {
					$orders_id = $this->db->insert_id();//lay id cua don hang vua them vao 
					//them vao bang chi tiet don hang
					$this->load->model('order_detail_model');
					foreach ($cart as $row) {						
						$data = array(
							'orders_id' => $orders_id,
							'product_id' => $row['id'],
							'product_size' => $row['size'],
							'price' => $row['price'],
							'quantity' => $row['qty']
						);
						$this->order_detail_model->create($data);
					}
					
				}
				
				//xoa gio hang
				$this->cart->destroy();
				if($payment == 'tienmat') {
					$this->session->set_flashdata('message', 'Bạn đã đặt hàng thành công! LokiSneaker sẽ liên hệ bạn trong thời gian sớm nhất!');
					redirect(base_url());
				} else {
					
				}
			} 
		}
		
		$this->data['temp'] = 'site/order/checkout';
		$this->load->view('site/layout', $this->data);
	}
	
	//thong tin don hang o trang khach hang
	function info() {
	
	}
	
	
	//huy don hang
	function cancel() {
		
	}
}
