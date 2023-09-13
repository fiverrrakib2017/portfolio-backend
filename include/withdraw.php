<?php 
include 'database_connect.php';




if (isset($_POST['getWithdrawData'])) {
	if ($allPack=$con->query("SELECT * FROM `withdraw`  ")) {
		while ($rows=$allPack->fetch_array()) {

			 echo '<tr>
            <td>'.$rows['id'].'</td>
            <td>'.$rows['title'].'</td>
            <td>'.$rows['description'].'</td>
            <td>'.$rows['amount'].'</td>
            <td>'.$rows['date'].'</td>
            
            <td >
            <a data-id='.$rows['id'].'  class="btn-sm btn btn-success viewBtn" ><i class="fas fa-eye"></i></a>
            </td>

            <td>
            <a  data-id='.$rows['id'].'  class="btn-sm btn btn-primary editBtn" ><i class="fas fa-edit"></i></a>
            </td>

            <td>
            <a	 data-id='.$rows['id'].' class="btn-sm btn btn-danger deleteBtn" ><i class="fas fa-trash"></i></a>
            
            </td>

            </tr>';
		}
	}
}
//get withdraw filter 
if (isset($_POST['WithdrawFilter'])) {
	$fromDate=$_POST['fromDate'];
	$toDate=$_POST['toDate'];
	if ($allPack=$con->query("SELECT * FROM `withdraw` WHERE `date` BETWEEN '$fromDate'AND '$toDate'  ")) {
		while ($rows=$allPack->fetch_array()) {

			 echo '<tr>
            <td>'.$rows['title'].'</td>
            <td>'.$rows['description'].'</td>
            <td>'.$rows['amount'].'</td>
            <td>'.$rows['date'].'</td>
            
            

            </tr>';
		}
	}
}

//delete script 

if (isset($_POST['deleteData'])) {
	$id=$_POST['id'];
	if ($result=$con->query("DELETE FROM withdraw   WHERE id='$id'  ")) {
		if ($result==true) {
			echo 1;
		}else{
			echo 0;
		}
	}
}

//


if (isset($_POST['addWithdrawData'])) {
	$title=$_POST['title'];
	$description=$_POST['description'];
	$exp_amount=$_POST['exp_amount'];
	$exp_date=$_POST['exp_date'];
	//$reg_date=date('Y-m-d h:i:sa');
	if ($result=$con->query("INSERT INTO withdraw(title,description,amount,date)VALUES('$title',	'$description',	'$exp_amount','$exp_date')")) {
			if ($result==true) {
				echo 1;
		}else{
			echo 0;
		}
	}
	
}

if (isset($_POST['getWithdrawDetails'])) {
	 $id=$_POST['id'];
	if ($result=$con->query("SELECT *  FROM withdraw WHERE id='$id' ")) {
		while ($row=$result->fetch_array()) {
			echo  json_encode($row) ;
		}
	}
}
if (isset($_POST['getWithdrawViewDetails'])) {
	 $id=$_POST['id'];
	if ($result=$con->query("SELECT *  FROM withdraw WHERE id='$id' ")) {
		while ($row=$result->fetch_array()) {
			echo  json_encode($row) ;
		}
	}
}

if (isset($_POST['updateWithdrawData'])) {
	$id=$_POST['id'];
	$title=$_POST['title'];
	$description=$_POST['description'];
	$exp_amount=$_POST['amount'];
	$exp_date=$_POST['date'];
	//$reg_date=date('Y-m-d h:i:sa');
	if ($result=$con->query("UPDATE withdraw SET title='$title' , description='$description',amount='$exp_amount',date='$exp_date' WHERE id='$id'  ")) {
			if ($result==true) {
				echo 1;
		}else{
			echo 0;
		}
	}
	
}


 ?>