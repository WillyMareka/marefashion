<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_products extends MY_Model{
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function get_all_products(){
		
		$results = $this->db->get('products')->result();
		
		foreach ($results as &$result) {
			
			if ($result->option_values) {
				
				$result->option_values = explode(',', $result->option_values);
			} 	
		}
		return $results;
	}
	
	
}
