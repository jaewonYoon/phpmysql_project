<?php
include('config/db_connect.php');

//check GET request id param
if(isset($_GET['id'])){
$id = mysqli_real_escape_string($conn, $_GET['id']);

//make sql
$sql = "SELECT * FROM product WHERE product_id = $id";

//get the query result
$result = mysqli_query($conn,$sql);

//fetch result in arrayformat
$item = mysqli_fetch_assoc($result);
 
mysqli_free_result($result);
mysqli_close($conn);

print_r($item);
}
?> 

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php');?> 

<div class="container center">
    <?php if($item): ?>
        <h4><?php echo htmlspecialchars($item['name']);?> </h4>
        <p> Price <?php echo htmlspecialchars($item['price']); ?>$</p>
 
    <?php else: ?> 
<?php endif;?>
</div>

<?php include('templates/footer.php');?>
</html>