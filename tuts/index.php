<?php 
    include('config/db_connect.php');
    // write query for all items
    $sql = 'SELECT name, product_id, price FROM product ORDER BY product_id';

    $result = mysqli_query($conn, $sql);
    
    // fetch the resulting rows as an array 
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC); 

    //free result from memory
    mysqli_free_result($result); 
    ///close connection
    mysqli_close($conn);

    // print_r(explode(',', $items[0][price]));

?>


<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>
    <h4 class="center grey-text">Product</h4>
    <div class="container"> 
        <div class="row">
            <?php foreach($items as $item): ?> 
                <div class="col s6 md3"> 
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($item['name']);?></h6>
                            <div><?php echo htmlspecialchars($item['price']);?></div>
                        </div> 
                        <div class="card-action right-align">
                            <a class="brand-text" href="details.php?id=<?php echo $item['id']?>">
                            more info </a> 
                        </div> 
                     </div>
                </div>
            <?php endforeach; ?> 
            <?php if(count($items)>=3): ?>
                <p>there are 3 or more products </p>
            <?php  else :  ?>
                <p> there are less the 3 products </p>
            <?php endif ?>
        </div>
    </div>
    <?php include('templates/footer.php'); ?>

</html>