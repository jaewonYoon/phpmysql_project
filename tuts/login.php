<?php
include('config/db_connect.php');

$errors = [
    "name"=> "", 
    "password" => "",
    "duplicate" => ""
];
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
    //에러가 있다면 echo, 없으면 add.phps로 이동 
    if(array_filter($errors)){
        echo 'errors in the form';
    } else{
        session_start();
        $_SESSION['name'] = $_POST['name'];
        echo $_SESSION['name']; 
        //다시 쿼리를 짜보자 
        $name= mysqli_real_escape_string($conn, $_POST['name']);
        //create sql 
        $sql = "SELECT id from admin where id = (select id from person where name = '$name')";
        
        $result = mysqli_query($conn, $sql);
        $items = mysqli_fetch_all($result, MYSQLI_ASSOC); 
        
        if(count($items)){
            echo "something"; 
            header('Location: ./index.php');
        }
        else{
            echo "nothing"; 
            header('Location: ./customer_index.php');
        }
        // header('Location: index.php');
    }  
}
?> 
<!DOCTYPE html>
<html lang="en">
<?php include('templates/login_header.php');?> 
<section class = "container grey-text">
    <h4 class="center">Login</h4>
    <form class = "white" action="login.php" method="POST">
        <label>name: </label>
        <input placeholder="Your id is equal with your name" type="text" name="name" value="<?php echo $name ?>">
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