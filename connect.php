<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];
	$idea = $_POST['idea'];
	$ateam = $_POST['ateam'];
	$hacbefore = $_POST['hacbefore'];
	$here = $_POST['here'];


	// Database connection
	$conn = new mysqli('localhost','root','','mydatabase');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number, idea, ateam, hacbefore, here) values(?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
		$stmt->bind_param("sssssissss", $firstName, $lastName, $gender, $email, $password, $number, $idea, $ateam, $hacbefore, $here);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>