<?php
if (!isset($_SESSION['online'])) {
	header('location:../index.php');
	exit();
}
		require_once "../dbconf.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		$dbconnect = new mysqli($host,$db_user,$db_pass,$db_name);
			if ($dbconnect->connect_errno!=0){
		echo'<div class="error">Błąd Bazy danych</div>';
		}
		
?>