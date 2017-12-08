<?php
session_start();
if(!isset($_SESSION['register'])){
	header('location:index.php');
	exit();
} ELSE {
	unset($_SESSION['register']);
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
<div id="login"> Dziękujemy za zarejestrowanie możesz już zalogować się na konto<br>
<a href="index.php">ZALOGUJ</a>
</div>
</body>

</html> 