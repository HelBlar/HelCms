<?php
session_start();
if (!isset($_SESSION['online'])) {
	header('location:../index.php');
	exit();
}
	if (!isset($_GET['id'])){
		$_GET['id']=1;
	}
		
	$userid=$_SESSION['id'];
	require_once "dbconf.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
	$dbconnect = new Mysqli($host, $db_user, $db_pass, $db_name);
			if ($dbconnect->connect_errno!=0){
			echo'<div class="error">Błąd Bazy danych</div>';
			}
	$wynik = $dbconnect->query("SELECT * FROM users WHERE id = '$userid'");
	$user= $wynik->fetch_assoc();
?>

<!DOCTYPE HTML>
<HTML Lang='pl'>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge, Chrome=1">
	<title>HelCms</title>
	<link rel="stylesheet" href="../layout/base.css" type="text/css"/>
</head>

<body>
<div id="home">
<div id="menu">
<a href="home.php?id=1">Główna</a>
<a href="home.php?id=2">Profil</a>
</div>
<div id="prawa"><center>
<a href='../logout.php'>WYLOGUJ</a>
</center>
</div>
<div id="data">
<?php
         switch($_GET['id']){
              case '1':
                     include 'start.php';
              break;

              case '2':
                     include 'profil.php';
              break;
				case '666':
                     include 'admin.php';
              break;
              default:
					echo'Nie masz dostępu lub strona nie istnieje, jeśli masz co do tego wątpliwości zgłoś sprawę administracji';
              break;
       }
?>
</div>

<div id="prawa"><center>
<?php
include_once "prawa.php";
?>
</center>
</div>
</div>
</body>

</html>