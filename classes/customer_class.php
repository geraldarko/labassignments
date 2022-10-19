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

class customer_class extends db_connection
{
	//--INSERT--//
	function insert_customer($a, $b, $c, $d, $e, $f)
	{
		$sql = "INSERT INTO `customer`(`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `user_role`) VALUES ('$a','$b','$c','$d','$e', '$f', '2')";

		return $this->db_query($sql);
	}

	//--SELECT--//
	function login_customer($a){

		$sql =" SELECT * FROM `customer` WHERE `customer_email` = '$a'";

		return $this -> db_fetch_one($sql);
	}

	function user_email($cid){
		$sql = "SELECT customer_email FROM customer WHERE customer_id = '$cid'";

		return $this -> db_fetch_one($sql);
	}


	//--UPDATE--//



	//--DELETE--//
	

}

?>