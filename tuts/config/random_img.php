<?php
$image_url= [
    "strawberry.jpg",
    "apple.jpg",
    "street.jpg",
    "coin.jpg",
    "cart.jpg",
    "shoes.jpg" 
];
function random_img(){
    global $image_url; 
    return  $image_url[rand(0,5)];
}
?> 