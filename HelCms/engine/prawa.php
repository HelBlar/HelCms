<?php
if (!isset($_SESSION['online'])) {
	header('location:../index.php');
	exit();
}
echo'<img src="'.$user['avatar'].'" width="150px" height="150"><br>';
echo $_SESSION['user'];
	if ($_SESSION['acces']==1){
	echo '<br><a href="home.php?id=666">~~ADMIN~~</a>';
	}
	if ($_SESSION['acces']==2){
		echo '<br><a href="mod.php">*MOD*</a>';
	}
?>