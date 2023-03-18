<?php
// Initialize the session
session_start();
require_once "connect.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$sql = "UPDATE Theusers";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_REQUEST['name'];
	$address = $_REQUEST['address'];
	$postcode = $_REQUEST['code'];
	$number = $_REQUEST["number"];
	$email = $_SESSION["email"];
			
			
	$sql.= " SET Full_name = '".$name. "', Address = '".$address."', Postcode = '".$postcode. "', PhoneNumber = '".$number."' WHERE email = '".$email."';";		
	$res1 = mysqli_query($link, $sql);
	if(!$res1){
		echo "Error: " . $sql . "<br>" . mysqli_error($mysqli). " You are not authorized to make changes to this profile. Try again later or contact support.";
	}else{
		echo "You have successfully updated your details.<br> Thank you<br> for using us!";
		header("location: index.php");
			
	}
		

}	
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Circuit Food Delivery</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Calling the stylesheet -->
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
<body>
    <div class="wrapper">
        <h2>Circuit Delivery Sign Up</h2>
        <p>Please fill this form to finish setting up your account.</p>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Enter your full name</label>
                <input type="text" name="name" class="form-control">
            </div>  
			<div class="form-group">
                <label>Enter your full address</label>
                <input type="text" name="address" class="form-control">
            </div>
			<div class="form-group">
                <label>Enter your post code</label>
                <input type="text" name="code" class="form-control">
            </div>
			<div class="form-group">
                <label>Enter your phone number</label>
                <input type="text" name="number" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <!-- <input type="reset" class="btn btn-secondary ml-2" value="Reset"> -->
            </div>
        </form>
    </div>    
