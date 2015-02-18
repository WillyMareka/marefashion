<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends MY_Controller {
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->model('shop_model');

		if ($this->session->userdata('logged_in')) {
         	$this->logged_in = TRUE;
         } else {
         	//$this->logged_in = FASLE;
         }
    }
	
	public function index()
    {
        $this->load->helper('form');
		$this->load->library('cart');
		$data['error'] = '';


		$this->load->view('cart_header', array('logged_in' => $this->logged_in, $data)); 
        $this->load->view('shopview');
        $this->load->view('cart_footer');  
    }
	
	public function show_cart(){
		$cart = $this->cart->contents();
		
		// echo "<pre>";print_r($this->cart->contents());echo"</pre>";die();
		
	}
	
	public function add_products($prod_id){
		
		$product = $this->shop_model->get($prod_id);
		
		//echo "<pre>";print_r($product);echo "</pre>";exit;
		
		$insert = array(
			'id' => $prod_id,
			'qty' => 1,
			'price' => $product['price'],
			'name' => $product['prod_name'],
		);
		
		$this->cart->insert($insert);
		
		//echo "<pre>";print_r($insert);echo "</pre>";exit;
		//$this->cart->show_cart();
		//redirect('products/view');
		
		//echo "add() called";
		redirect('products/view');
		//$this->load->view('shopview'); 
	}
	
	public function remove($rowid){
		$data = array(
			'row_id' => $rowid,
			'qty' => '0',
		);
		$this->cart->update($data);
		redirect('products/view');
		//echo "remove() called";
	}
	
	public function destroy(){
		$this->cart->destroy();
		echo "destroy() called";
		
	}
	
	public function update($row_id){
		$data = array(
			'row_id' => $row_id,
			'qty' => $qty,
		);
		$this->cart->update($data);
		redirect('shopview');
	} 
}	