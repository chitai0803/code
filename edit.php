<?php 
    
	$connect = mysqli_connect('localhost','root','mysql','shopee');
	if(!$connect){
		echo("Kết nối thất bại");
	}
        
    $item_id= $_GET['item_id']; 

    $sql="SELECT * FROM product WHERE item_id = $item_id";
    $result = mysqli_query($connect,$sql);
    $item = mysqli_fetch_assoc($result);
        
    if(isset($_POST['sbm'])){
        $item_brand = $_POST['item_brand'];
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $item_register = $_POST['item_register'];
// Getting the image from the field
        if ($_FILES['item_image']['name']==''){
            $item_image = $row_up['item_name'];
        }else{
            $item_image=$row_up['item_name'];
        }
        $sql = "INSERT INTO product VALUES (null,'$item_brand','$item_name','$item_price','$item_image','$item_register')";

   $insert_pro = mysqli_query($connect, $sql);
   header('location:category.php');
     }
    
?>
<div class="container-fulid">
    <div clas="card">
        <div class="card-header">
            <h2> Edit Product</h2>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Product Brand</label>
                    <input type="text" name="item_brand" class="form-control" require value="<?php echo $row_up ['item_brand'];?>">
                </div>  

                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" name="item_name" class="form-control" require value="<?php echo $row_up ['item_name'];?>">
                </div>

                <div class="form-group">
                    <label for="">Product Price</label>
                    <input type="number" name="item_price" class="form-control" require value="<?php echo $row_up ['item_price'];?>">
                </div>

                <div class="form-group">
                    <label for="">Product Img</label>
                    <input type="file" name="item_image" class="form-control" require>
                </div>

                <div class="form-group">
                    <label for="">Product Date</label>
                    <input type="text" name="item_register" class="form-control" require value="<?php echo $row_up ['item_register'];?>">
                </div>

                <button name="sbm" class="btn btn-success" type="submit">Edit</button>
            </form>
        </div>
    </div>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>