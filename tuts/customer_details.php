<?php
include('config/db_connect.php');
//delete from database 
if(isset($_POST['delete'])){
    // $name_to_delete =
    // mysqli_real_escape_string($conn,$_POST['name_to_delete']);
    $name_to_delete = $_POST['name_to_delete'];
    $sql = "DELETE FROM product WHERE name = 
    '$name_to_delete'";
    
    if(mysqli_query($conn, $sql)){
        header('Location: customer_index.php');
    }else{
        //failure
        echo 'query error :'. mysqli_error($conn);
    }
}   
//check GET request id param
echo $_GET['id'];
if(isset($_GET['id'])){
// $id = mysqli_real_escape_string($conn, $_GET['id']);
$id = $_GET['id'];
//make sql
$sql = "SELECT * FROM product WHERE name = '$id'";

//get the query result
$result = mysqli_query($conn,$sql);
//fetch result in arrayformat
$item = mysqli_fetch_assoc($result);
 
mysqli_free_result($result);
mysqli_close($conn);

print_r($item);
}

//add to cart 
if(isset($_POST['addcart'])){
    $addcart = mysqli_real_escape_string($conn,$_POST['addcart']);
    $sql = "ALTER FROM product WHERE name = $name_to_delete";
    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
    }else{
        //failure
        echo 'query error :'. mysqli_error($conn);
    }
}   
?> 

<!DOCTYPE html>
<html lang="en">
<?php include('templates/customer_header.php');?> 

<div class="container center grey-text">
    <?php if($item): ?>
        <h4><?php echo htmlspecialchars($item['name']);?> </h4>
        <p> Price <?php echo htmlspecialchars($item['price']); ?>$</p>
    <form action="details.php" method="POST">
        <input type="hidden" name="name_to_delete" value="<?php echo $item['name']?>">
        <input placeholder="How many do you want?" id="howmany" type="text" class="validate">
        <label for="first_name">How many</label>
        <input type="submit" name="addcart" value="addcart" class="btn brand z-depth-0">
        <input type="submit" name="delete" value="delete" class="btn brand z-depth-0">
    <?php else: ?> 
        <h5>No such item exists. </h5>
<?php endif;?>
</div>

<?php include('templates/footer.php');?>
</html>