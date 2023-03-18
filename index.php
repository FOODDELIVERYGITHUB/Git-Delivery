<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
	<header>
			<h1>Circuit Food Delivery</h1>
	</header>
	<nav>
		<a href="/index.php">Home</a>
		<a href="/foodPizza.html">Pizza</a>
		<a href="/foodKebab.html">Kebab</a>
		<a href="/foodBurg.html">Burgers</a>
		<a href="/foodFish.html">Fish & Chips</a>
		<a href="userdetails.php">Update Profile</a>
	</nav>
	<main class="main">
		<div class="category">
			<a href="/foodPizza.html">
				<img src="assets/img/Pizza.jpg" alt="Pizza">
			</a>
				<h2>Pizza</h2>
				<p>Who can say no to Pizza?.</p>
		</div>
		<div class="category">
			<a href="/foodKebab.html">
				<img src="assets/img/Kebab.jpg" alt="Kebab">
			</a>
			<h2>Kebab</h2>
			<p>You can never go wrong with a Kebab.</p>
		</div>
		<div class="category">
			<a href="foodBurg.html">
				<img src="assets/img/Burger.jpg" alt="Burgers">
			</a>
			<h2>Burgers</h2>
			<p>Classic but gold.</p>
		</div>
		<div class="category">
			<a href="foodFish.html">
				<img src="assets/img/Fish&Chips.jpg" alt="Fish & Chips">
			</a>
			<h2>Fish & Chips</h2>
			<p>The traditional taste of England.</p>
		</div>
</body>