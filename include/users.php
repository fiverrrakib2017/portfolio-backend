<?php 
include 'database_connect.php';

if (isset($_POST['getPackageVAL'])) {
	$id=$_POST['id'];
	 if ($allPack=$con->query("SELECT * FROM package where id='$id' ")) {
	 	while ($rows=$allPack->fetch_array()) {
	 		echo json_encode ($rows);
	 	}
	 }
}


if (isset($_POST['getUserData'])) {
	if ($allPack=$con->query("SELECT * FROM `users`  ")) {
		while ($rows=$allPack->fetch_array()) {
			if ($rows['user_type']==1) {
				$status= '<span class="badge bg-success">Admin</span>';
			}else{
				$status= '<span class="badge bg-info">User</span>';
			}

			 echo '<tr>
            <td>'.$rows['id'].'</td>
            <td>'.$rows['fullname'].'</td>
            <td>'.$rows['username'].'</td>
            <td>'.$rows['email'].'</td>
            
            <td>'.$status.'</td>
            <td>'.$rows['date'].'</td>
            
            <td >
            <a href="user_view.php?id='.$rows['id'].'"  class="btn-sm btn btn-success " ><i class="fas fa-eye"></i></a>

            <a  href="users_update.php?id='.$rows['id'].'"  class="btn-sm btn btn-primary" ><i class="fas fa-edit"></i></a>
            
            <a	 data-id='.$rows['id'].' class="btn-sm btn btn-danger deleteBtn" ><i class="fas fa-trash"></i></a>
            
            </td>

            </tr>';
		}
	}
}

//delete script 

if (isset($_POST['deleteData'])) {
	$id=$_POST['id'];
	if ($result=$con->query("DELETE  FROM `users` WHERE id='$id' ")) {
		if ($result==true) {
			echo 1;
		}else{
			echo 0;
		}
	}
}

//get one data in customer 



if (isset($_POST['addUserData'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	//$reg_date=date('Y-m-d h:i:sa');
	if ($result=$con->query("INSERT INTO users(fullname,username,password,email,user_type)VALUES('$name','$username','$password','$email','2')")) {
			if ($result==true) {
				echo 1;
		}else{
			echo 0;
		}
	}
	
}

if (isset($_POST['UpdateUserData'])) {
	$id=$_POST['id'];
	$fullname=$_POST['name'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	//$reg_date=date('Y-m-d h:i:sa');
	if ($result=$con->query("UPDATE `users` SET fullname='$fullname' , email='$email',username='$username',password='$password' WHERE id='$id'  ")) {
			if ($result==true) {
				echo 1;
		}else{
			echo 0;
		}
	}
	
}


 ?>