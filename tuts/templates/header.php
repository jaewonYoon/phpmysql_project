<?php 

session_start(); 
//www.123.com?noname 
if($_SERVER['QUERY_STRING'] == 'noname'){
	unset($_SESSION['name']);
	header('Location: ./login.php');
	//session_unset();
}
//둘 중의 하나 Null coalescing operator 
$name= $_SESSION['name'] ?? 'Guest';

?>

<head>
	<title>New project</title>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
    	.brand{
    		background: #cbb09c !important;
    	}
    	.brand-text{
    		color: #cbb09c !important;
    	}
		form {
			max-width: 460px;
			margin: 20px auto;
			padding: 20px; 
		}
		.item{
			width: 100px;
			margin: 40px auto -30px;
			display: block;
			position: relative;
			top: -30px;
		}
		img{
			border-radius: 30%;
			height: 100px;
			width: 100px;
		}
    </style>
</head>

<body class="grey lighten-4">
	<nav class="white z-depth-0">
		<div class="container">
			<a href="index.php" class="brand-logo brand-text"> ACE shop </a>
			
			<ul id = "nav-mobile" class="right hide-on-small-and-down">
	
				<li class="grey-text">Hello <?php echo htmlspecialchars($name) ?> </li>
				<li><a href="add.php" class="btn brand z-depth-0">Add a material</a></li>
				<!-- <form action="login.php" method="post">
				<button name ="logout" class="btn brand z-depth-0"
				>logout</button>
				</form> -->
				
			</ul>
			
			<!-- <li>
				<button class="btn brand z-depth-0" name="signout">Signout</button>
				</li> -->
		</div>
		
	</nav>
	
