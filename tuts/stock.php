<?php 
include('config/db_connect.php');
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
include('templates/customer_header.php');
if(mysqli_num_rows($result) >0){
    echo "<table class='striped'> <tr> <th>name</th><th>price</th>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["price"]."</td>";
        echo "</tr>";     
    }
    echo "</table>";
} else {
    echo "0 results"; 
}
include('templates/footer.php');
?>
