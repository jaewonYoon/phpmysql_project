<?php

$errors = ["name"=> "", "password" => "" ];
$name = $password ="";

if(isset($_POST['submit'])){
    
    //check price
    if(empty($_POST['password'])){
        $errors['password']= 'Did you forget to bring password? <br/>';
    } else{
        $password = $_POST['password'];
        // if(!preg_match('/^([a-zA-z]+)(,\$*[a-zA-Z\s]*)*$/', $price)){
        //     $errors['price']= 'price must be a comma seperated list';
        //     }
        echo htmlspecialchars($_POST['password']);
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
    if(array_filter($errors)){
        echo 'errors in the form';
    } else{
        header('Location: ./add.php');
    }   
    //not empty? it returns true
    // if(array_filter($errors)){
    //     echo 'errors in the form';
    // }else{
    //     $email = mysqli_real_escape_string($conn, $_POST['email']);
    //     $name= mysqli_real_escape_string($conn, $_POST['name']);
    //     $password = mysqli_real_escape_string($conn, $_POST['password']); 
    //     //create sql 
    //     $sqli = "INSERT INTO product(name,price) VALUES ('$name',
    //     '$price')"; 
    //     //save and check 
    //     if(mysqli_query($conn,$sqli)){
    //         //success 
    //         header('Location: index.php');
    //     }else {
    //         echo 'query error: ' . mysqli_error($conn); 
    //     }
        

    // }
}
?> 
<!DOCTYPE html>
<html lang="en">
<?php include('templates/login_header.php');?> 
<section class = "container grey-text">
    <h4 class="center">Login</h4>
    <form class = "white" action="login.php" method="POST">
        <label>name: </label>
        <input placeholder="Your id is eqult with your name" type="text" name="name" value="<?php echo $name ?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>
        <label>password</label>
        <input placeholder="password" type="password" name="password" value="<?php echo $password ?>">
        <div class="red-text"><?php echo $errors['password']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand
            z-depth-0">
        </div>
    </form>
</section>
<?php include('templates/footer.php');?>
</html>