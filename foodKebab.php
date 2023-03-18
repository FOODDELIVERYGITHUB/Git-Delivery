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
		<h1>Kebab Menu</h1>
	</header>
	<nav>
		<a href="/index.html">Home</a>
		<a href="/foodPizza.html">Pizza</a>
		<a href="/foodKebab.html">Kebab</a>
		<a href="/foodBurg.html">Burgers</a>
		<a href="/foodFish.html">Fish & Chips</a>
	</nav>
	<main class="main">
		<div class="kebab">
			<img src="assets/img/ChickenKebab.jpg" alt="Chicken Kebab">
			<div>
				<h2>Chicken Kebab</h2>
				<p>A delicious kebab made with marinated chicken, salad, and garlic sauce.</p>
				<span>£6.99</span>
				<button class="add-button">Add</button>
			</div>
		</div>
		<div class="kebab">
			<img src="assets/img/LambKebab.jpg" alt="Lamb Kebab">
			<div>
				<h2>Lamb Kebab</h2>
				<p>A tasty kebab made with seasoned lamb, salad, and mayo sauce.</p>
				<span>£6.99</span>
				<button class="add-button">Add</button>
			</div>
		</div>
</body>