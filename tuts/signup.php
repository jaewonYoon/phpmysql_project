<?php

$errors = ["name"=> "", "password" => "" ,"passwordcheck"=>""];
$name = $password =$passwordcheck="";

if(isset($_POST['submit'])){
    
    //check password
    if(empty($_POST['password'])){
        $errors['password']= 'Did you forget to bring password? <br/>';
    } else{
        $password = $_POST['password'];
        // if(!preg_match('/^([a-zA-z]+)(,\$*[a-zA-Z\s]*)*$/', $price)){
        //     $errors['price']= 'price must be a comma seperated list';
        //     }
        echo htmlspecialchars($_POST['password']);
    }
    //check passwordcheck
    if(empty($_POST['passwordcheck'])){
        $errors['passwordcheck'] ='please rewrite your password <br/>';
    } else if($_POST['passwordcheck']!=$_POST['password']){
        $errors['passwordcheck'] ='check your password are same!';
    } else{ 
        $password = $_POST['password'];
        echo htmlspecialchars($_POST['passwordcheck']);
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
    //go to login page 
    if(array_filter($errors)){
        echo 'errors in the form';
    } else{
        header('Location: ./login.php');
    }  
}
?> 

<!DOCTYPE html>
<html lang="en">
<?php include('templates/login_header.php');?> 
<section class = "container grey-text">
    <h4 class="center">SignUp</h4>
    <form class = "white" action="signup.php" method="POST">
        <label>name: </label>
        <input placeholder="Your id is eqult with your name" type="text" name="name" value="<?php echo $name ?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>
        <label>password</label>
        <input placeholder="password" type="password" name="password" value="<?php echo $password ?>">
        <div class="red-text"><?php echo $errors['password']; ?></div>
        <label>password check</label>
        <input placeholder="rewrite your password" type="password" name="passwordcheck" value="<?php echo $passwordcheck ?>">
        <div class="red-text"><?php echo $errors['passwordcheck']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand
            z-depth-0" onclick="<?php ?> ">
        </div>
    </form>
</section>
<?php include('templates/footer.php');?>
</html>