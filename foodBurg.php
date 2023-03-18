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
		<h1>Burgers Menu</h1>
	</header>
	<nav>
		<a href="/index.html">Home</a>
		<a href="/foodPizza.html">Pizza</a>
		<a href="/foodKebab.html">Kebab</a>
		<a href="/foodBurg.html">Burgers</a>
		<a href="/foodFish.html">Fish & Chips</a>
	</nav>
	<main class="main">
		<div class="burger">
			<img src="assets/img/ClassicBurger.jpg" alt="Classic Burger">
			<div>
				<h2>Classic Burger</h2>
				<p>A delicious burger made with 100% pure beef patty, lettuce, tomato, onion, pickles, and special sauce.</p>
				<span>£3.99</span>
				<button class="add-button">Add</button>
			</div>
		</div>
		<div class="burger">
			<img src="assets/img/CheeseBurger.jpg" alt="Cheeseburger">
			<div>
				<h2>Cheeseburger</h2>
				<p>Our classic burger with an added slice of melted cheese.</p>
				<span>£2.99</span>
				<button class="add-button">Add</button>
			</div>
		</div>
		<div class="burger">
			<img src="assets/img/BaconBurger.jpg" alt="Bacon Burger">
			<div>
				<h2>Bacon Burger</h2>
				<p>A mouthwatering burger with crispy bacon, lettuce, tomato, and mayo.</p>
				<span>£4.99</span>
				<button class="add-button">Add</button>
			</div>
		</div>
	