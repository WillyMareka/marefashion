<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop_model extends MY_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function get($prod_id){
			
		$query = $this->db->get_where('products', array('prod_id' => $prod_id));
		
		$result = $query->result_array();
		
  		// Detect the number of returned rows
  		
  			//if($query->num_rows() == 1) {
   					// Return the first row:
   			//return $result[0];
  		//}
  		return $result[0];
		
 }
	
	
}	