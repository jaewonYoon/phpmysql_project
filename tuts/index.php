<?php 
    //connect to database
    $conn = mysqli_connect('localhost', 'jaewon', '1234','jaewon_items');
    //check connection 
    if(!$conn){
        echo 'Connection error:' . mysqli_connect_error();
    }
    
    // write query for all items
    $sql = 'SELECT name, product_id, price FROM product ORDER BY product_id';

    $result = mysqli_query($conn, $sql);
    
    // fetch the resulting rows as an array 
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC); 

    //free result from memory
    mysqli_free_result($result); 
    ///close connection
    mysqli_close($conn);

    // print_r($items); 

?>


<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>
    <h4 class="center grey-text">Product</h4>
    <div class="container"> 
        <div class="row">
            <?php foreach($items as $item){ ?> 
                <div class="col s6 md3"> 
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($item['name']);?></h6>
                            <div><?php echo htmlspecialchars($item['price']);?></div>
                        </div> 
                        <div class="card-action right-align">
                            <a class="brand-text" href="#">more info </a> 
                        </div> 
                     </div>
                </div>
            <?php } ?> 
        </div>
    </div>
    <?php include('templates/footer.php'); ?>

</html>