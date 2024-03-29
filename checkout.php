<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: foodLogin.php");
    exit;

}

require_once "connect.php";
$mysqli = $link;
        if (!$mysqli){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
		
require_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $cardname = filter_input(INPUT_POST, 'cardname', FILTER_SANITIZE_STRING);
    $cardnum = filter_input(INPUT_POST, 'cardnumber', FILTER_SANITIZE_STRING);
    $expmn = filter_input(INPUT_POST, 'expmonth', FILTER_SANITIZE_STRING);
    $expyr = filter_input(INPUT_POST, 'expyear', FILTER_SANITIZE_STRING);
    $cvv = filter_input(INPUT_POST, 'cvv', FILTER_SANITIZE_STRING);
    $fname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);

    $hashedCardnum = hash('sha256', $cardnum);

    $sql1 = "INSERT INTO card_det(Name, Card_num, Exp_month, CVV, Exp_year) VALUES (?, ?, ?, ?, ?)";
    $stmt1 = mysqli_prepare($mysqli, $sql1);
    mysqli_stmt_bind_param($stmt1, "sssss", $cardname, $hashedCardnum, $expmn, $cvv, $expyr);
    $res1 = mysqli_stmt_execute($stmt1);

    $sql2 = "INSERT INTO billadd(Full_name, Email, Address, City) VALUES (?, ?, ?, ?)";
    $stmt2 = mysqli_prepare($mysqli, $sql2);
    mysqli_stmt_bind_param($stmt2, "ssss", $fname, $email, $address, $city);
    $res2 = mysqli_stmt_execute($stmt2);

    if ($res1 && $res2) {
        echo "Your payment is now being processed";
        echo "<br>";
        echo "<a href='thankyou.html'>Click here to Continue</a>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }

    mysqli_stmt_close($stmt1);
    mysqli_stmt_close($stmt2);
}

mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Checkout</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="row">
            <div class="col-75">
              <div class="container">    
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">     
                  <div class="row">
                    <div class="col-50">
                      <h3>Billing Address</h3>
                      <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                      <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                      <label for="email"><i class="fa fa-envelope"></i> Email</label>
                      <input type="text" id="email" name="email" placeholder="john@example.com">
                      <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                      <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                      <label for="city"><i class="fa fa-institution"></i> City</label>
                      <input type="text" id="city" name="city" placeholder="New York">
          
                      <div class="row">
                        <div class="col-50">
                          <label for="state">State</label>
                          <input type="text" id="state" name="state" placeholder="NY">
                        </div>
                        <div class="col-50">
                          <label for="zip">Zip</label>
                          <input type="text" id="zip" name="zip" placeholder="10001">
                        </div>
                      </div>
                    </div>
          
                    <div class="col-50">
                      <h3>Payment</h3>
                      <label for="fname">Accepted Cards</label>
                      <div class="icon-container">
                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                      </div>
                      <label for="cname">Name on Card</label>
                      <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                      <label for="ccnum">Credit card number</label>
                      <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                      <label for="expmonth">Exp Month</label>
                      <input type="text" id="expmonth" name="expmonth" placeholder="September">
          
                      <div class="row">
                        <div class="col-50">
                          <label for="expyear">Exp Year</label>
                          <input type="text" id="expyear" name="expyear" placeholder="2018">
                        </div>
                        <div class="col-50">
                          <label for="cvv">CVV</label>
                          <input type="text" id="cvv" name="cvv" placeholder="352">
                        </div>
                      </div>
                    </div>
          
                  </div>
                  <label>
                    <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                  </label>
                  <input type="submit" value="Continue to checkout" class="btn">
                  <a href='/basket.html'>
                    <button class="cancel-btn">Cancel & Return to Basket (You will not be charged)</button>
                </a>
                </form>
              </div>
            </div>
          </div>
    <script src="assets/js/script.js"></script>
  </body>
</html>

