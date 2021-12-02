<?php
    ob_start();   
    include ('header.php');    
?>
<?php
$connect = mysqli_connect('localhost','root','mysql','shopee');
if(!$connect){
    echo("Kết nối thất bại");
}

if(isset($_GET['search'])){
    $key=$_GET['key'];
}else{
    $key='';
}
// SELECT *
// FROM nhanvien
// WHERE price > 3000;
    $sql="SELECT * FROM product WHERE item_price   >=".$key;
    $query_pro = mysqli_query($connect,$sql);
?>
    <h3>Product: <?php $_GET['key']?></h3>
<div>
<?php
        while($row = mysqli_fetch_array($query_pro)){
    ?>
     <div class="grid-item border <?php echo $row['item_brand'] ?? "Brand" ; ?>">
                <div class="item py-2" style="height:350px; width: 200px;">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $row['item_id']); ?>"><img style="height:220px; width: 200px;"  img src ="./assets/products/<?php echo $row['item_image'] ?? "13.png"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo $row['item_name'] ?? "Unknown"; ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span>$<?php echo $row['item_price'] ?? 0 ?></span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $row['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php
                                if (in_array($item['item_id'], $in_cart ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                }else{
                                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <?php        
        }
    ?>
    </div>

<?php
include ('footer.php');
?>
                                
                               

</div>