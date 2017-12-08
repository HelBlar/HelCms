<?php
session_start();
if((isset($_SESSION['online'])) && ($_SESSION['online']==true)){
	header('location:engine/home.php');
	exit();
}
?>

<!DOCTYPE HTML>
<HTML Lang='pl'>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge, Chrome=1">
	<title>HelCms</title>
	<link rel="stylesheet" href="layout/base.css" type="text/css"/>
</head>

<body>
<div id="login">
	<form action='login.php' method="post">
	<input type="text" name="login" placeHolder="Login">
	<input type="password" name="pass" placeHolder="Hasło">
	<input type="submit" value="Zaloguj się">
	</form>
	<?php
	if(isset($_SESSION['error'])){
	echo '<div class="error">'.$_SESSION['error'].'</div>';
	unset ($_SESSION['error']);
	}
	?>
	<center><b><a href="register.php"  style='color:#990000' >Zarejestruj się</a></b></center>
	
</div>
</body>

</html> 