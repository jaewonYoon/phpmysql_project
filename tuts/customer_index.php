<?php 
    // //login 확인 
    // session_start();
    // if(!isset($_SESSION['userid']))
    // {
    //     header('Location: ./login.php');
    // }
    // echo "홈 로그인 성공"; 
    // echo '<a href="logout.php">로그아웃</a>';
    
    include('config/db_connect.php');
    include('config/random_img.php');
    // write query for all items
    $sql = 'SELECT name, price FROM product';
    //$sql = 'SELECT name, product_id, price FROM product ORDER BY product_id';
    $result = mysqli_query($conn, $sql);
    
    // fetch the resulting rows as an array 
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC); 

    //free result from memory
    mysqli_free_result($result); 
    ///close connection
    mysqli_close($conn);


?>


<!DOCTYPE html>
<html>
    
    <?php include('templates/customer_header.php'); ?>
    <h4 class="center grey-text">Product</h4>
    <div class="container">
        
        <div class="row">
        <form action="cart.php" method="POST"> 
            <?php foreach($items as $item): ?> 
                <div class="col s6 md3"> 
                    <div class="card small z-depth-0">
                        <img src="img/<?php echo random_img();?>" class="item"/> 
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($item['name']);?></h6>
                            <div><?php echo htmlspecialchars($item['price']);?></div>
                        </div> 
                        <div class="card-action right-align">
                        <p class="range-field">
                        <input type="range" id="test5" min="0" max="100" name="item[]" />
                            <!-- <a class="brand-text" href="customer_details.php?id=<?php echo $item['name']?>">
                            more info </a>  -->
                        </div>  
                     </div>
                </div>
            <?php endforeach; ?> 
            <input type="hidden" name="itemlist" value="<?php echo $items; ?>">
            <input type="submit" name="addcart" value="add cart" class="btn brand z-depth-0 waves-effect waves-light">
			<button class="btn brand z-depth-0 waves-light waves-effect" name="mycart"><a style="color: inherit" href='cart.php'>mycart</a></button>
            <button class="btn brand z-depth-0 waves-light waves-effect" name="signout" ><a style="color: inherit" href='index.php?noname'>logout</a></button>
        </form>
        </div>
       
    </div>
    <?php include('templates/footer.php'); ?>

</html>