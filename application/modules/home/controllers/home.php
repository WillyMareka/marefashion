<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public $logged_in;

	function __construct()
    {

        
        $this->load->model('home/model_home');
        
        $this->load->library('form_validation');

        parent::__construct();

        if ($this->session->userdata('logged_in')) {
          $this->logged_in = TRUE;
         } else {
          //$this->logged_in = FASLE;
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

        $this->load->view('header', array('logged_in' => $this->logged_in));
        $this->load->view('update',$data);
        $this->load->view('home_footer');
    }

	public function index()
	{
		$data['shirts'] = $this->getshirts();
		$data['suits'] = $this->getsuits();
		$data['skirts'] = $this->getskirts();
		$data['accessories'] = $this->getaccessories();

		$this->load->view('header', array('logged_in' => $this->logged_in));
		$this->load->view('v_home',$data);
		$this->load->view('home_footer');
	}

  public function profile()
    {
        $oid = $this->session->userdata('ac_id');
        $results = $this->model_home->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
        
        $this->load->view('header', array('logged_in' => $this->logged_in, $data));
        $this->load->view('profile', $data);
        $this->load->view('home_footer');
    }

	public function about()
	{
		$this->load->view('header', array('logged_in' => $this->logged_in));
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function contact($name=NULL)
	{
    $data['error'] = '';

   $data['reply'] = $name;

		$this->load->view('header', array('logged_in' => $this->logged_in));
		$this->load->view('contact',$data);
		$this->load->view('footer');
	}


  public function sendmessage()
  {
         $this->load->library('form_validation');
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
        

    if($this->form_validation->run() == FALSE){
       echo 'Wrong validation';die();
      redirect(base_url() .'home/contact');
        
    }else{
 
          $name = $this->model_home->enter_comment();
               //print_r($result);die();

        if($name){
                redirect(base_url() .'home/contact/'.$name);

          }else{
                 echo 'There was a problem with the website.<br/>Please contact the administrator';
        }
        }
  }

	 public function add_to_cart_check($prod_id)

	 {
      if($this->session->userdata('logged_in')){
			redirect('shop/add_products/'.$prod_id);
      }
      else{
        redirect('user/log');

      }
    }

    function getshirts()
	{
		$shirts = array();
       $results = $this->model_home->get_shirts();

       foreach ($results as $key => $values) {
       	 
       	 	
           $shirts['shirts'][] = $values;
         
       }

       // echo '<pre>';print_r($proddet);echo '</pre>';die;

        return $shirts;
	}

	function getskirts()
	{
		$skirts = array();
       $results = $this->model_home->get_skirts();

       foreach ($results as $key => $values) {
       	 
       	 	
           $skirts['skirts'][] = $values;
         
       }

       // echo '<pre>';print_r($proddet);echo '</pre>';die;

        return $skirts;
	}

	function getsuits()
	{
		$suits = array();
       $results = $this->model_home->get_suits();

       foreach ($results as $key => $values) {
       	 
       	 	
           $suits['suits'][] = $values;
         
       }

       // echo '<pre>';print_r($proddet);echo '</pre>';die;

        return $suits;
	}

	function getaccessories()
	{
		$accessories = array();
       $results = $this->model_home->get_accessories();

       foreach ($results as $key => $values) {
       	 
       	 	
           $accessories['accessories'][] = $values;
         
       }

       // echo '<pre>';print_r($proddet);echo '</pre>';die;

        return $accessories;
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

                $result = $this->model_home->update_member();

              if($result){
                 redirect(base_url() .'home/profile');

              }else{
                 echo 'There was a problem with the website.<br/>Please contact the administrator';
              }


         }
    }






	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */