<?php
$random = rand(4000,10000);
include('config/db_connect.php');
include('config/dummy.php');
$dummy_array = random_address();
$errors = ["name"=> "", "password" => "" ,"passwordcheck"=>"","radio"=>""];
$name = $password =$passwordcheck=$radio="";
if(isset($_POST['submit'])){
    
    //check password
    if(empty($_POST['password'])){
        $errors['password']= 'Did you forget to bring password? <br/>';
    } else{
        $password = $_POST['password'];
        // if(!preg_match('/^([a-zA-z]+)(,\$*[a-zA-Z\s]*)*$/', $price)){
        //     $errors['price']= 'price must be a comma seperated list';
        //     }
        //echo htmlspecialchars($_POST['password']);
    }
    //check passwordcheck
    if(empty($_POST['passwordcheck'])){
        $errors['passwordcheck'] ='please rewrite your password <br/>';
    } else if($_POST['passwordcheck']!=$_POST['password']){
        $errors['passwordcheck'] ='check your password are same!';
    } else{ 
        $password = $_POST['password'];
        //echo htmlspecialchars($_POST['passwordcheck']);
    }
    //check name
    if(empty($_POST['name'])){
        $errors['name']= 'An name is required! <br/>';
    } else{
        $name = $_POST['name']; 
        // if(!preg_match('/^[a-zA-z]+$/', $name)){
        //     $errors['name']= 'name must be letters and spaces only';
        // }
        //echo htmlspecialchars($_POST['name']);
    }
    //check name
    if(empty($_POST['group'])){
        $errors['radio']= 'check one of above <br/>';
    } else{
        $radio = $_POST['group']; 
        // if(!preg_match('/^[a-zA-z]+$/', $name)){
        //     $errors['name']= 'name must be letters and spaces only';
        // }
        //echo htmlspecialchars($_POST['name']);
    }
    //go to login page 
    if(array_filter($errors)){
        echo 'errors in the form';
    } else{
        $name= mysqli_real_escape_string($conn, $_POST['name']);
        $radio = mysqli_real_escape_string($conn, $_POST['group']); 
        //create sql 
        $sqli = "INSERT INTO person(name) VALUES('$name')"; 
        $query_array = array($sqli); 
        if($_POST['group'] =='admin'){
            $sqli2 = "INSERT INTO admin(id,salary) VALUES((SELECT id FROM person WHERE name = '$name'),'$random')";
            
            
            $query_array=array($sqli,$sqli2);
            // array_push($query_array,"INSERT INTO admin(id,salary) VALUES((SELECT id FROM person WHERE name = $name),rand(4000,10000))"); 
        } else if($_POST['group'] =='customer'){
            $sqli2 = "INSERT INTO customer(id, address) VALUES((SELECT id FROM person WHERE name = '$name'),'$dummy_array')";
            $query_array=array($sqli,$sqli2);
            //$_POST['group] == 'customer'
            // array_push($query_array,"INSERT INTO customer(id, address) VALUES((SELECT id FROM person WHERE name = $name),'$address')"); 
        }
        //save and check 
        foreach($query_array as $query){
            $stmt = $conn ->prepare($query);
            $stmt->execute();
            
        }
        header('Location: ./login.php');
        
        
    }  
}
?> 

<!DOCTYPE html>
<html lang="en">
<?php include('templates/signup_header.php');?> 
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
        
        <div style="padding: 10px">
        <label>
            <input type="radio" name="group" 
            value="admin"
            />
            <span style="padding-right: 10px">admin</span>
        </label>
        <label>
            <input type="radio" name="group"
            value="customer"
            />
            <span>customer</span>
        </label>
        </div>
        <div class="red-text"><?php echo $errors['radio']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand
            z-depth-0" onclick="<?php ?> ">
        </div>
    </form>
</section>
<?php include('templates/footer.php');?>
</html>