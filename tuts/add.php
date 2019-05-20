<?php
$errors = array('email'=> '', 'title'=> '', 'ingredients' => '');
$title = $email = $ingredients = '';
if(isset($_POST['submit'])){
    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['title']);
    // echo htmlspecialchars($_POST['ingredients']);
    
    //check email
    if(empty($_POST['email'])){
        $errors['email']= 'email must be a valid email address <br/>';
    } else{
        $email = $_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
           $errors['email']= 'email must be a valid email address';
        }
        echo htmlspecialchars($_POST['email']) . '<br/>';
    }

    //check ingredients
    if(empty($_POST['ingredients'])){
        $errors['ingredients']= 'An ingredients is required! <br/>';
    } else{
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-z]+)(,\$*[a-zA-Z\s]*)*$/', $ingredients)){
            $errors['ingredients']= 'Ingredient must be a comma seperated list';
            }
        echo htmlspecialchars($_POST['ingredients']);
    }

    //check title
    if(empty($_POST['title'])){
        $errors['title']= 'An title is required! <br/>';
    } else{
        $title = $_POST['title']; 
        if(!preg_match('/^[a-zA-z]+$/', $title)){
            $errors['title']= 'Title must be letters and spaces only';
        }
        echo htmlspecialchars($_POST['email']);
    }
    //not empty? it returns true
    if(array_filter($errors)){
        echo 'errors in the form';
    }else{
        header('Location: index.php');
    }
}
?> 


<!DOCTYPE html> 
<html>

<?php include('templates/header.php'); ?>

<section class = "container grey-text">
    <h4 class="center">Add a item</h4>
    <form class = "white" action="add.php" method="POST">
        <label>Your Email: </label>
        <input type="text" name="email" value="<?php echo $email ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <label>Item title: </label>
        <input type="text" name="title" value="<?php echo $title ?>">
        <div class="red-text"><?php echo $errors['title']; ?></div>
        <label>Ingredients (comma separated): </label>
        <input type="text" name="ingredients" value="<?php echo $ingredients ?>">
        <div class="red-text"><?php echo $errors['ingredients']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand
            z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php'); ?>