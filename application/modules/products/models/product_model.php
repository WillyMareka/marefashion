<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends MY_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }



    public function update_member(){
      $id = $this->input->post('id');
      $firstname = strtoupper($this->input->post('fname'));
      $middlename = strtoupper($this->input->post('mname'));
      $lastname = strtoupper($this->input->post('lname'));
      $filename = $this->input->post('picture');
      $pnumber = $this->input->post('pnumber');
      $gender = strtoupper($this->input->post('gender'));
      $nationality = strtoupper($this->input->post('nationality'));
      $age = $this->input->post('age');
      $religion = strtoupper($this->input->post('religion'));
      $residence = strtoupper($this->input->post('residence'));    
      $email = $this->input->post('email');

      $member_details_data = array(

          'f_name' => $firstname,
          'm_name' => $middlename,
          'l_name' => $lastname,
          'age' => $age,
          'nationality' => $nationality,
          'phone_no' => $pnumber,
          'email' => $email,
          'residence' => $residence,
          'religion' => $religion,
          'gender' => $gender
      );

        $this->db->where('ac_id', $id);
        $this->db->update('accounts', $member_details_data);

       

      if($this->db->affected_rows() === 1){

        return $id;

      }else{

      $subject = 'Member Update';
      $message = 'Problem in registering User ID '.$id.' . Please rectify immediatelly';

      $message_details_data = array();
      $message_details = array(
          'subject' => $subject,
          'message' => $message
      );

        

        array_push($message_details_data, $message_details);

        //echo '<pre>'; print_r($member_details_data); echo '<pre>'; die;

        $this->db->insert_batch('mail',$message_details_data);

        //echo 'Applicant is not able to be registered';
        $this->load->library('email');
        $this->email->from('info@marewill.com','MareWill Fashion');
        $this->email->to('marekawilly@marewill.com','marekawilly@gmail.com');
        $this->email->subject('Failed registeration of a user');

        if(isset($email)){
            $this->email->message('Unable to register and insert user with the email of '.$email.' to the database.');
        }else{
            $this->email->message('Unable to register and insert user to the database.');

        }

        $this->email->send();
        return FALSE;
     }
    }
   

  public function get_details($prod_company, $prod_cat, $prod_type)
  {
    $products = array();
    $prod_company = $this->input->post('prodcompany');
    $prod_cat = $this->input->post('prodcategory');
    $prod_type = $this->input->post('prodtype');

    $criteria = (isset($prod_company)&& ($prod_company!='')) ?" AND prod_company = '$prod_company' " : null;
    $criteria .= (isset($prod_cat) && ($prod_cat!='')) ? " AND prod_cat = '$prod_cat' " : null;
    $criteria .= (isset($prod_type) && ($prod_type!='') ) ? " AND prod_type = '$prod_type' " : null;


    $query = "SELECT * 
              FROM products WHERE
              is_deleted = 0 
              $criteria
              AND approved = 1
              ";

               //echo '<pre>';print_r($query);echo '</pre>';die;


    // $query = $this->db->get_where('products', array('is_deleted' => 0, 'approved'=> 1));
    $this->dataSet = $this->db->query($query);
    $result = $this->dataSet->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $products[$value['prod_id']] = $value;
      }
      //echo '<pre>';print_r($value);echo '</pre>';die();
      
      return $products;
    }
    
    return $products;
  }
	
	public function ownprofile($ac_id)
    {
         $profile = array();
         
         $query = $this->db->get_where('accounts', array('ac_id' => $ac_id));
         $result = $query->result_array();

            if ($result) {
               foreach ($result as $key => $value) {
        $profile[$value['ac_id']] = $value;
      }
      //echo '<pre>';print_r($messages);echo '</pre>';die();
      return $profile;

    }
    
    return $profile;
    }
		



  public function get_all_companies()
  {
    $companies = array();
    $query = $this->db->get_where('company', array('status' => 1));
    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $companies[$value['comp_id']] = $value;
      }
      //echo '<pre>';print_r($companies);echo '</pre>';die();
      return $companies;

    }
    
    return $companies;
  }


    

    public function updatecompany($type, $comp_id)
  {
    $data = array();
    switch ($type) {
      case 'delete':
        $data['is_status'] = 0; 
        
        break;
      
      case 'update':
        $data = $this->input->post();
        break;
      default:
        # code...
        break;
    }
    $this->db->where('comp_id', $comp_id);
    $update = $this->db->update('company', $data);

    if ($update) {
      return true;
    }
    else
    {
      return false;
    }
  }


 

    public function get_product_category()
    {
      $query = "SELECT * FROM category";
            try {
                $this->dataSet = $this->db->query($query);
                $this->dataSet = $this->dataSet->result_array();
            }
            catch(exception $ex) {
            }
            
            return $this->dataSet;
    }

    public function get_product_type()
    {
      $query = "SELECT * FROM type";
            try {
                $this->dataSet = $this->db->query($query);
                $this->dataSet = $this->dataSet->result_array();
            }
            catch(exception $ex) {
            }
            
            return $this->dataSet;
    }

     public function get_product_company()
    {
      $query = "SELECT * FROM company";
            try {
                $this->dataSet = $this->db->query($query);
                $this->dataSet = $this->dataSet->result_array();
            }
            catch(exception $ex) {
            }
            
            return $this->dataSet;
    }




   
}