<?php
//clitorizweb login php script
//date created: August 1, 2021
//created by goom 

//this script wouldn't even work
//if it didn't get the functions

//we will do the same thing
//like the register's counter
$counter = 0;

//so if a person clicks the login
//button, this will do this
if (isset($_POST["login"])) {
	
//setup the cool variables
//even though, without them its broken
$username = htmlspecialchars($_POST["username"]); 
$password = $_POST["password"];
$get = NULL;
$result = NULL;

//check it's login details
CheckLogin($username, $conn);

//now that's all of the variables and 
//it's login details checking, we can start the login process
	switch(true) {
		case $get->num_rows == 0;
		$counter = 2;
		break;
		case empty($username):
		$counter = 2;
		break;
		case empty($password);
		$counter = 1;
		break;
		case password_verify($password, $result['password']) == FALSE:
		$counter = 1;
		break;
		default:
        $_SESSION['user'] = $result['username'];
		header('Location: /home.php');
    }
}
?>