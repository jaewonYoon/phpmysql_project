<?php
//connect to database
    $conn = mysqli_connect('localhost', 'jaewon', '1234','jaewon_items');
    //check connection 
    if(!$conn){
        echo 'Connection error:' . mysqli_connect_error();
    }
?>