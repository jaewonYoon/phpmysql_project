<?php
include('config/db_connect.php');
$errors = array('name'=> '', 'price' => '');
$name = $price = '';
if(isset($_POST['submit'])){
    
    //check price
    if(empty($_POST['price'])){
        $errors['price']= 'A price is required! <br/>';
    } else{
        $price = $_POST['price'];
        // if(!preg_match('/^([a-zA-z]+)(,\$*[a-zA-Z\s]*)*$/', $price)){
        //     $errors['price']= 'price must be a comma seperated list';
        //     }
        echo htmlspecialchars($_POST['price']);
    }

    //check name
    if(empty($_POST['name'])){
        $errors['name']= 'An name is required! <br/>';
    } else{
        $name = $_POST['name']; 
        // if(!preg_match('/^[a-zA-z]+$/', $name)){
        //     $errors['name']= 'name must be letters and spaces only';
        // }
        echo htmlspecialchars($_POST['name']);
    }
    //not empty? it returns true
    if(array_filter($errors)){
        echo 'errors in the form';
    }else{
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $name= mysqli_real_escape_string($conn, $_POST['name']);
        $price = mysqli_real_escape_string($conn, $_POST['price']); 
        //create sql 
        $sqli = "INSERT INTO product(name,price) VALUES ('$name',
        '$price')"; 
        //save and check 
        if(mysqli_query($conn,$sqli)){
            //success 
            header('Location: index.php');
        }else {
            echo 'query error: ' . mysqli_error($conn); 
        }
        

    }
}
?> 


<!DOCTYPE html> 
<html>

<?php include('templates/header.php'); ?>

<section class = "container grey-text">
    <h4 class="center">Add a item</h4>
    <form class = "white" action="add.php" method="POST">
        <label>Item name: </label>
        <input type="text" name="name" value="<?php echo $name ?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>
        <label>Price (comma separated): </label>
        <input type="text" name="price" value="<?php echo $price ?>">
        <div class="red-text"><?php echo $errors['price']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand
            z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php'); ?>