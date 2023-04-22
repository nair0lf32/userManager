    <?php
include 'config.php';
include 'admin.php';

if(count($_POST)>0){
	if($_POST['type']==1){
		$name=$_POST['name'];
		$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
		$sql = "INSERT INTO `users`( `username`, `password`) 
		VALUES ('$name','$password')";
		if (mysqli_query($link, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
		mysqli_close($link);
	}
}

if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
		if ($id==3 or $id==4)
		{
		throw new Exeption('<script>alert("Hé, ho! tu te prends pour qui là? ")</script>');
		}else{
		$sql = "UPDATE `users` SET `username`='$name',`password`='$password' WHERE id=$id";
		}
		if (mysqli_query($link, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
		mysqli_close($link);
	}
}

if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
			if ($id==3 or $id==4)
		{
	throw new Exeption('<script>alert("Hé, ho! tu te prends pour qui là? ")</script>');
		}else{
		$sql = "DELETE FROM `users` WHERE id=$id ";
		}
		if (mysqli_query($link, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
		mysqli_close($link);
	}
}

if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['id'];
			if ($id==3 or $id==4)
		{
	throw new Exeption('<script>alert("Hé, ho! tu te prends pour qui là? ")</script>',512);
		}else{
		$sql = "DELETE FROM users WHERE id in ($id)";
		}
		if (mysqli_query($link, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
		mysqli_close($link);
	}
}

?>