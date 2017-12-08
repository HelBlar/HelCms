<?php
session_start();
if ((!isset($_POST['login'])) || (!isset($_POST['pass']))){
	header('location:index.php');
	exit();
}
require_once "dbconf.php";
$dbconnect = @new Mysqli($host, $db_user, $db_pass, $db_name);
if ($dbconnect->connect_errno!=0){
	echo'ERROR'.$dbconnect->connect_errno;
} Else {
	$login=$_POST['login'];
	$pass=$_POST['pass'];
	$login=htmlentities($login, ENT_QUOTES, "UTF-8");
	
	$db="";
		if($result=@$dbconnect->query(
		sprintf("SELECT*FROM users WHERE login='%s'",
		mysqli_real_escape_string($dbconnect,$login)))){
			$count=$result->num_rows;
			if($count==1){//znaleziono usera
				$fetch=$result->fetch_assoc();
				if(password_verify($pass,$fetch['pass'])){
					$_SESSION['online']=TRUE;
					$_SESSION['id']=$fetch['id'];
					$_SESSION['user']=$fetch['login'];
					$_SESSION['acces']=$fetch['type'];
					$result->close();
					header('Location:engine/home.php?id=1');
					unset($_SESSION['ERROR']);
				} Else {
					$_SESSION['error']="Błędne hasło";
					header('location:index.php');
				}
			} Else {//nie znaleziono usera
			$_SESSION['error']="Użytkownik o podnaym loginie nie istnieje" ;
				header('location:index.php');
				
			}
	$dbconnect->close();
}

}


?>