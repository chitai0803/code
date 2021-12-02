<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php
$connect = mysqli_connect('localhost','root','mysql','shopee');
if(!$connect){
    echo("Kết nối thất bại");
}
    $sql = "SELECT * FROM product";
    $query = mysqli_query($connect,$sql);
?>

<div class="container-fluid">
    <div class="card">
        <a href="index.php"><h2>Category</h2></a>
    </div>
    <div class="card">
        
       
            <table class="table">
               <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Brand</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Date update</th>
                        <th>Edit</th>
                        <th>Delete</th>                   
                    </tr>             
                </thead>
                <tbody>       
                    <?php
                        $i=1;
                        while($row =mysqli_fetch_assoc($query)){?>
                        <tr>
                                <td><?php echo $row['item_id']?></td>
                                <td><?php echo $row ['item_brand'];?></td>
                                <td>
                                    <?php echo $row['item_name'];?>
                                </td>
                                <td><?php echo $row['item_price'];?></td>
                                <td> 
                                    <img style="height:220px; width: 200px;" img src="./assets/products/<?php echo $row['item_image']?>" alt="product" >                         
                                </td>
                                <td><?php echo $row['item_register'];?></td>
                                <td>
                                    <a  href = "edit.php<?php $row['item_id'];?>">Edit</a>
                                </td>
                                <td>
                                    <a onclick="return del('<?php echo $row['item_name'];?>')" href ="delete.php<?php echo $row['item_id'];?>">Delete</a>
                                </td>                   
                        </tr>
                    <?php }?>
    
                </tbody>
            </table>
       
            <a class="btn btn-primary" href="them.php">Add product</a>
    </div>

</div>
<script>
    function del(item_name){
        return confirm("you definitely want to delete the product: "+item_name+"?")
    }
</script>
</body>
</html>