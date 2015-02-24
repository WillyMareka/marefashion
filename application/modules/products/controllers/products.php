<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller {

	public $logged_in;

	function __construct()
    {
        parent::__construct();


        $this->load->model('products/product_model');

        if ($this->session->userdata('logged_in')) {
         	$this->logged_in = TRUE;
         } else {
         	//$this->logged_in = FASLE;
         }
          
    }

    
	public function index()
	{
		
	}


    function updatemember()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('fname', 'First Name', 'trim|min_length[2]|required|xss_clean');
        $this->form_validation->set_rules('mname', 'Middle Name', 'trim|min_length[2]|xss_clean');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|min_length[2]|required|xss_clean');
        $this->form_validation->set_rules('pnumber', 'Phone Number', 'trim|min_length[9]');
        $this->form_validation->set_rules('age', 'Age', 'trim|min_length[2]');
        $this->form_validation->set_rules('residence', 'Residence', 'trim|min_length[3]|xss_clean');
        $this->form_validation->set_rules('religion', 'Religion', 'trim|min_length[3]|xss_clean');
        $this->form_validation->set_rules('nationality', 'Nationality', 'trim|min_length[3]|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|xss_clean');
        

        if($this->form_validation->run() == FALSE){
           echo 'Not working';die();
            redirect(base_url() .'home/profile');
            
        }else{

                $result = $this->product_model->update_member();

              if($result){
                 redirect(base_url() .'products/profile');

              }else{
                 echo 'There was a problem with the website.<br/>Please contact the administrator';
              }


         }
    }

    public function update(){
      $data['error'] = '';
      $oid = $this->session->userdata('ac_id');
        $results = $this->model_home->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }


        $data['ownprofile'] = $odetails;

        $this->load->view('p_header', array('logged_in' => $this->logged_in));
        $this->load->view('update',$data);
        $this->load->view('p_footer');
    }


    public function profile()
    {
        $oid = $this->session->userdata('ac_id');
        $results = $this->product_model->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
        
        $this->load->view('p_header', array('logged_in' => $this->logged_in, $data));
        $this->load->view('profile', $data);
        $this->load->view('p_footer');
    }


    public function view()
	{
        $this->load->library('pagination');
        $this->load->library('table');

        
       

        $data['total_rows'] = $this->db->get('products')->num_rows();
        $data['per_page'] = 9;
        $data['num_links'] = 3;
        $data['records'] = $this->choosecriteria($data['per_page'], $this->uri->segment(3) );

        $this->pagination->initialize($data); 

        
		$data['product_categories']  = $this->getproductcategories();
        $data['product_types']  = $this->getproducttypes();
        $data['product_companies']  = $this->getproductcompanies();
        $data['criteria'] = $this->choosecriteria();


		$this->load->view('p_header', array('logged_in' => $this->logged_in, $data));
		$this->load->view('v_products', $data);
		$this->load->view('p_footer');
    }

    





    function getproductcategories()
	{
        $results = $this->product_model->get_product_category();
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
            $prodcat ='<option selected="selected" value="">Select the Category</option>';
        foreach ($results as $value) {
            $prodcat .= '<option value="' . $value['cat_name'] . '">' . $value['cat_name'] . '</option>';  
        }
        return $prodcat;
	}

	function getproducttypes()
	{
        $results = $this->product_model->get_product_type();
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
            $prodtype ='<option selected="selected" value="">Select the Type</option>';
        foreach ($results as $value) {
            $prodtype .= '<option value="' . $value['type_name'] . '">' . $value['type_name'] . '</option>';  
        }
        return $prodtype;
	}

	function getproductcompanies()
	{
        $results = $this->product_model->get_product_company();
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
            $prodcomp ='<option selected="selected" value="">Select the Company</option>';
        foreach ($results as $value) {
            $prodcomp .= '<option value="' . $value['company_name'] . '">' . $value['company_name'] . '</option>';  
        }
        return $prodcomp;
	}

	function choosecriteria()
	{
		$proddet = array();
       $results = $this->product_model->get_details();

       foreach ($results as $key => $values) {
       	 
       	 	
           $proddet['proddet'][] = $values;
         
       }

       // echo '<pre>';print_r($proddet);echo '</pre>';die;

        return $proddet;
	}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */