<?php 
include 'database_connect.php';
include 'security_token.php';



if (isset($_POST['DraftallTeacher'])) {
	if ($allPack=$con->query("SELECT * FROM teacher  ")) {
		while ($rows=$allPack->fetch_array()) {
			
			 echo '<tr>
            <td>'.$rows['id'].'</td>
            <td>'.$rows['fullname'].'</td>
            <td>'.$rows['email'].'</td>
            <td>'.$rows['address'].'</td>
            
            <td >
            
            <a data-id='.$rows['id'].' class="btn-sm btn btn-success deleteBtn" >Active</a>
            
            </td>

            </tr>';
		}
	}
}
if (isset($_POST['allTeacher'])) {
	if ($allPack=$con->query("SELECT * FROM teacher   ")) {
		while ($rows=$allPack->fetch_array()) {
			
			echo '<tr>
            <td>'.$rows['id'].'</td>
            <td>'.$rows['fullname'].'</td>
            <td>'.$rows['email'].'</td>
            <td>'.$rows['address'].'</td>
            
            
            <td >
            
            <a data-id='.$rows['id'].' class="btn-sm btn btn-primary editBtn" ><i class="fas fa-edit"></i></a>
            
            </td>
            <td >
            
            <a data-id='.$rows['id'].' class="btn-sm btn btn-danger deleteBtn" ><i class="fas fa-trash"></i></a>
            
            </td>

            </tr>';
		}
	}
}

//delete script 

if (isset($_POST['deleteData'])) {
	$id=$_POST['id'];
	if ($result=$con->query("DELETE  FROM teacher  WHERE id='$id' ")) {
		if ($result==true) {
			echo 1;
		}else{
			echo 0;
		}
	}
}

if (isset($_POST['teacherActive'])) {
	$id=$_POST['id'];
	if ($result=$con->query("UPDATE  teacher SET status='1' WHERE id='$id' ")) {
		if ($result==true) {
			echo 1;
		}else{
			echo 0;
		}
	}
}

//get one data in customer 
if (isset($_POST['getTeacherDetails'])) {
	$id=$_POST['id'];
	if ($allTeacher=$con->query("SELECT * FROM teacher WHERE id='$id' ")) {
		while ($rows=$allTeacher->fetch_array()) {
			echo json_encode($rows);
		}
	}
	
}

if (isset($_POST['updateTeacherData'])) {
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	if ($result=$con->query("UPDATE teacher SET fullname='$name' ,email='$email',address='$address' WHERE id='$id'  ")) {
		if ($result==true) {
			echo 1;
		}else{
			echo 0;
		}
	}
	
}
if (isset($_POST['addTeacherData'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	if ($result=$con->query("INSERT INTO teacher(fullname,email,address)VALUES('$name','$email','$address')")) {
		if ($result==true) {
			echo 1;
		}else{
			echo 0;
		}
	}
}


 ?>