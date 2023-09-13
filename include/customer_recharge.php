<?php 

include 'database_connect.php';


if (isset($_POST['customer_id'])) {
	 $customer_id = $_POST['customer_id'];
  	$chrg_mnths= $_POST['month'];
  	$amount= $_POST['amount'];
  	$tra_type= $_POST['tra_type'];

  	if ($cstmr=$con->query("SELECT * FROM customers WHERE id=$customer_id ")) {
  		while ($rows=$cstmr->fetch_array()) {
  			$lstd=$rows['id'];
  			$expiredDate=$rows['expire_date'];
  		}
  	}

  	/**/
 
	//$exp_date = date('Y-m-d', strtotime('+'.$chrg_mnths.' month', strtotime(date('Y-m-'.date('d',$expiredDate)))));
	$time=strtotime($expiredDate);
	 $exp_date=date("Y-m-d",strtotime('+ '.$chrg_mnths.' month ',$time));
 //  else
 //  {
	// // Increase recharge monthe from current expired date
	// $exp_date = date('Y-m-d', strtotime('+'.$chrg_mnths.' month', strtotime($expiredDate)));	 
 //  }


	// $result=$con->query("INSERT INTO customer_recharge(customer_id,month,amount,recharge_until,type)VALUES('$customer_id','$chrg_mnths','$amount','$exp_date', '$tra_type'");

	// 	if ($result==true) {
	// 		$con -> query("UPDATE customers SET expire_date='$exp_date' WHERE id='$customer_id'");
	// 		echo 1;
	// 	}else{
	// 		echo 0;
	// 	}
	$result=$con->query("INSERT INTO customer_recharge (customer_id,month,amount,recharge_until,type)VALUES('$customer_id','$chrg_mnths','$amount','$exp_date', '$tra_type')");
  	if ($result==true) {
			$con -> query("UPDATE customers SET expire_date='$exp_date' WHERE id='$customer_id'");
			echo 1;
		}else{
			echo 0;
		}
	
 $con -> close();



}










 ?>