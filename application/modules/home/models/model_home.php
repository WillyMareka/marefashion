<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_home extends MY_Model {

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

      $subject = 'Member Entry';
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


    public function get_shirts()
  {
    $products = array();
    $this->db->limit(4);
    $this->db->order_by("prod_id", "desc");
    $query = $this->db->get_where('products', array('is_deleted' => 0, 'prod_type' => 'SHIRT', 'approved' => 1));
    $result = $query->result_array();

    if ($result) {
       
      foreach ($result as $key => $value) {

          $products[$value['prod_id']] = $value;
        
     } 

      //echo '<pre>';print_r($products);echo '</pre>';die();
      
      return $products;
    }
    
    return $products;
  }


  public function get_skirts()
  {
    $products = array();
    $this->db->limit(4);
    $this->db->order_by("prod_id", "desc");
    $query = $this->db->get_where('products', array('is_deleted' => 0, 'prod_type' => 'SKIRT', 'approved' => 1));
    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $products[$value['prod_id']] = $value;
      }
      //echo '<pre>';print_r($products);echo '</pre>';die();
      
      return $products;
    }
    
    return $products;
  }

  public function get_suits()
  {
    $products = array();
    $this->db->limit(4);
    $this->db->order_by("prod_id", "desc");
    $query = $this->db->get_where('products', array('is_deleted' => 0, 'prod_type' => 'SUITS', 'approved' => 1));
    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $products[$value['prod_id']] = $value;
      }
      //echo '<pre>';print_r($value);echo '</pre>';die();
      
      return $products;
    }
    
    return $products;
  }

  public function get_accessories()
  {
    $products = array();
    $this->db->limit(4);
    $this->db->order_by("prod_id", "desc");
    $query = $this->db->get_where('products', array('is_deleted' => 0, 'prod_type' => 'ACCESSORIES', 'approved' => 1));
    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $products[$value['prod_id']] = $value;
      }
      //echo '<pre>';print_r($value);echo '</pre>';die();
      
      return $products;
    }
    
    return $products;
  }

    public function enter_comment(){
      $name = $this->input->post('name');
      $email = $this->input->post('email');
      $message = $this->input->post('message');  

      $subject = 'A Comment from '.$name.' with email address '.$email.' ';


      $comment_details_data = array();
      $comment_details = array(
          'mm_subject' => $subject,
          'mm_message' => $message
      );

        

        array_push($comment_details_data, $comment_details);

        //echo '<pre>'; print_r($member_details_data); echo '<pre>'; die;

        $this->db->insert_batch('manager_mail',$comment_details_data);


      if($this->db->affected_rows() === 1){

        return $name;

      }else{

      $subject = 'Comment Entry';
      $message = 'Problem in Commenting from Name '.$name.' . Please rectify immediatelly';

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

   
}