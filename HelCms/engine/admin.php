<?php
if (!isset($_SESSION['online'])) {
	header('location:../index.php');
	exit();
	
}
if (!isset($_GET['a'])){
		$_GET['a'] = 1;
}
if (!isset($_GET['act'])){
		$_GET['act'] = 1;
}
if ($_SESSION['acces']!=1){
	echo 'Nie powinieneś próbować tu wchodzić za próby oszystwa otrzymujesz chuja do dupy';
	exit();
	} else {
		echo'<a href="home.php?id=666&a=news">Formularz newsów</a> || ';
		echo'<a href="home.php?id=666&a=users">Użytkownicy</a>';
		switch($_GET['a']){
			
			case '1';
			
			break;
			
			case 'news';
				news();
			break;
			case 'users';
				users();
			break;
			
			default;
				echo'Jesteś adminem bravo TY!!';
			break;
			}
	}
	
	function news(){
		require_once "dbconf.php";
		require_once "db.php";
		//wyświetlanie istniejących newsów
		$newsy=$dbconnect->query("SELECT * FROM news");
		while ($row = $newsy->fetch_assoc()){
		$numer=$row['n_id'];
		$tytul=$row['tytul'];
		$tresc=$row['tresc'];
		$author=$row['author'];
		$data=$row['data'];
		echo'<br><b>'.$tytul.'</b>  <a href="home.php?id=666&a=news&act=edit&numer='.$numer.'">[EDYTUJ]</a>';
		echo'<a href="home.php?id=666&a=news&act=del&numer='.$numer.'">[KASUJ]</a>';
		}
			echo'<form method="post" action="home.php?id=666&a=news&act=add">
				<input type="text" name="tytul" placeholder="Nagłówek">
				<input type="text" name="tresc" placeholder="Treść artykułu">
				<input type="submit" value="Dodaj Posta">
				</form>';
		switch($_GET['act']){
			case '1';
			break;
			case'add';
			$tytul=$_POST['tytul'];
			$tresc=$_POST['tresc'];
			$author=$_SESSION['user'];
			$data=date("Y-m-d");
			$dbconnect->query("INSERT INTO news (tytul, tresc, author, data) VALUES ('$tytul','$tresc', '$author', '$data')");
			header('location:home.php?id=666&a=news');
			break;
			case 'edit';
			if(!isset($_POST['nowytytul'])){
			echo'<form method="post">
				<input type="text" name="nowytytul" placeholder="Nagłówek">
				<input type="text" name="nowatresc" placeholder="Treść artykułu">
				<input type="submit" value="Edytuj">
				</form>';
			}else{
			$nowytytul=$_POST['nowytytul'];		
			$nowatresc=$_POST['nowatresc'];
			$newsid=$_GET['numer'];
			$author=$_SESSION['user'];
			$data=date("Y-m-d");
			$dbconnect->query("UPDATE news SET tytul='$nowytytul',tresc='$nowatresc' WHERE n_id='$newsid'");
			header('location:home.php?id=666&a=news');
			}
			break;
			case 'del';
			$newsid=$_GET['numer'];
			$dbconnect->query("DELETE FROM news WHERE n_id='$newsid'");
			header('location:home.php?id=666&a=news');
			break;
			default;
			break;
			}
			
	$dbconnect->close();
	}
	function users(){
		require_once "dbconf.php";
		require_once "db.php";
		
	}
?>
