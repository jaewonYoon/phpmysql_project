<?php
$address= [
    "maple street",
    "bacon street",
    "namyangjoo",
   
];
function random_address(){
    global $address; 
    return  $address[rand(0,2)];
}
?> 