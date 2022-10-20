<?php
//connect to database class
require_once("../settings/db_class.php");

/**
*Customer class to handle all customer functions 
*/
/**
 *@author Gerald Darko
 *
 */

class customerclass extends db_connection
{
	//--INSERT--//

	function insertcustomer($cus_name, $cus_email, $cus_pass, $cus_country, $cus_city, $cus_contact)
	{
		$sql = "INSERT INTO `customer`(`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `user_role`) VALUES ('$cus_name','$cus_email','$cus_pass','$cus_country','$cus_city', '$cus_contact', '2')";

		return $this->db_query($sql);
	}

	//--SELECT--//
	function logincustomer($cus_email){

		$sql = "SELECT * FROM `customer` WHERE `customer_email` = '$cus_email'";

		return $this -> db_fetch_one($sql);
	}

	function user_email($c_id){
		$sql = "SELECT customer_email FROM customer WHERE customer_id = '$c_id'";

		return $this -> db_fetch_one($sql);
	}



	//--UPDATE--//



	//--DELETE--//
	

}

?>