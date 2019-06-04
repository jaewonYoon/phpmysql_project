<?php
session_start();
include('config/db_connect.php');
// $sql = "SELECT a.product_name, b.price, a.quantity from cartproduct a inner join 
// product b on a.product_name = b.name where a.cart_id = ( 
// select cart_id from cart 
// where person_id = (
// select id from person
// where person.name = '$_SESSION[name]')
//     )";
$sql ="SELECT a.product_name, b.price, a.quantity from cartproduct a inner join 
product b on a.product_name = b.name where a.cart_id = any( 
select cart_id from cart 
where person_id = (
select id from person
where person.name = '$_SESSION[name]')
) and a.person_id = (select id from person where name = '$_SESSION[name]')

";
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array 
$items = mysqli_fetch_all($result, MYSQLI_ASSOC); 

?>

<!DOCTYPE html>
<html>
    <?php include('templates/customer_header2.php'); ?>
    <?php 
    if(mysqli_num_rows($result) >0){
    echo "<table class='striped'><tr><th>name</th><th>price</th><th>quantity</th>";
    foreach($items as $item){
        echo "<tr>";
        echo "<td>".$item["product_name"]."</td>";
        echo "<td>".$item["price"]."</td>";
        echo "<td>".$item["quantity"]."</td>";
        echo "</tr>";     
    }
    echo "</table>";
    }else{
        echo "0 results"; 
    }
    ?>
    <?php include('templates/footer.php'); ?>
</html>