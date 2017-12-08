<?php
if (!isset($_SESSION['online'])) {
	header('location:../index.php');
	exit();
}
if (!isset($_POST['avatar'])){
	echo'Wpisz numer avatara';
	}	else {
	$avatar=$_POST['avatar'];
	If($dbconnect->query("UPDATE users SET avatar='$avatar' where id='$userid'")) {
			Echo'avatar zmieniony';	
	}
	}	
?>
<div>
<form method ="post">
<input type="text" name="avatar">
<input type="submit" value="wybierz">
</form>
</div>