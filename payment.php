<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./css/pay.css">
</head>
<body>

<h2>Responsive Checkout Form</h2>
<p>Resize the browser window to see the effect. When the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other.</p>
<div class="row">
  <div class="col-50">
    <div class="container">
      <form method="POST">
      
        <div class="row">
            <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="name" placeholder="John M. Doe" require>
            <label for="Phone"><i class="fa fa-phone"></i> Phone</label>
            <input type="text" id="Phone" name="Phone" placeholder="+84" require>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com" require>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" require>                        
            </div>
            
        </div>        
        <input type="submit" value="Continue to checkout" class="btn" name="checkout">
      </form>       
    </div>
  </div>  
  </div>
</div>
<?php  
 include("connect.php");
  if(isset($_POST['checkout'])){ 
 
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];    
	$address = $_POST['address'];	
	$query=mysqli_query($connect,"INSERT into order (NULL,'name','phone','email','address')VALUES(NULL,'$name','$phone','email','address')");
if($query){
    $oder_id = mysql_insert_id($connect);
  foreach($cart as $value){
      mysqli_query($connect,"INSERT INTO order_detail(order_id,item_id) VALUES('$order_id','$item_id)");
  } 
  header("location: cart.php");
}
echo("fail");

}

  ?>
</body>
</html>
