<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
    <div class="form_box">
	 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
    <div class="form_box">
	 <form  method="POST" enctype="multipart/form-data">	   
	   <table align="center" width="100%">	     
		 <tr>
		   <td colspan="7">
		   <h2>Add Product</h2>
		   <div class="border_bottom"></div><!--/.border_bottom -->
		   </td>
		 </tr>

		 <tr>
		   <td><b> Product id:</b></td>
		   <td><input type="int" name="item_id" class="input"></td>
		 </tr>

		 <tr>
		   <td>
			<b>Product Brand:</b>
			<select id="country" name="item_brand">
			<option value="australia">Samsung</option>
			<option value="canada">Apple</option>
			<option value="usa">Redmi</option>
			</select>
			</td>		  
    
		 </tr>

		 <tr>
		   <td><b>Product Name:</b></td>
		   <td><input type="text" name="item_name" class="input"  ></td>
		 </tr>

        <tr>
		  <td><b>Product Price: </b></td>
		  <td><input type="text" name="item_price" class="input" /></td>
		</tr>
		
		<tr>
		  <td><b>Product Img: </b></td>
		  <td><input type="file" name="item_image" class="input" /></td>
		</tr>
		
		<tr>
		   <td><b>Product Date:</b></td>
		   <td><input type="text" name="item_register" class="input"></td>
		 </tr>		
		
		<tr>
		   <td></td>
		   <td colspan="7"><input type="submit" name="insert_post" class="input" value="Add Product"/></td>
		</tr>
	   </table>
	   
	 </form>
	 
  </div><!-- /.form_box -->

<?php 
	$connect = mysqli_connect('localhost','root','mysql','shopee');
	if(!$connect){
		echo("Kết nối thất bại");
	}
if(isset($_POST['insert_post'])){
	$item_id=$_POST['item_id']&& $_POST['item_id'==''];
   $item_brand = $_POST['item_brand'];
   $item_name = $_POST['item_name'];
   $item_price = $_POST['item_price'];
   $item_register = $_POST['item_register'];  
   
   // Getting the image from the field
 
	$item_image  = $_FILES['item_image']['name'];

   $item_image_tmp = $_FILES['item_image']['tmp_name'];
     
   move_uploaded_file($item_image_tmp,"./assets/products/$item_image");
  
   
   $sql = "INSERT INTO product VALUES (null,'$item_brand','$item_name','$item_price','$item_image','$item_register')";

   $insert_pro = mysqli_query($connect, $sql);
   
   if($insert_pro){
    echo "<script>alert('Product Has Been inserted successfully!')</script>";
	
	echo "<script>window.open('index.php','_self')</script>";
   }
   else echo "<script>alert('fail')</script>";
   }
   
?>

</body>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
</body>
</html>