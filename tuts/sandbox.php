<?php

//sessions
if(isset($_POST['submit'])){
    session_start();
    $_SESSION['name'] = $_POST['name'];
    echo $_SESSION['name']; 
    header('Location: index.php');

}
// $_SESSION, $_COOKIE
//ternary operators

?> 

<!DOCTYPE html>
<html>
<?php include('templates/header.php') ?> 
<form action=
"<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> 
    <input type="text" name="name">
    <input type="submit" mame="submit" value="submit"> 

</form>    

<?php include('./templates/footer.php'); ?> 
    
</html>