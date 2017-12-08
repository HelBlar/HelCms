<?php
if (!isset($_SESSION['online'])) {
	header('location:../index.php');
	exit();
}
?>

HelCms pierwsze kroki w świecie PHP
<div id="news">
<?php
$newsy=$dbconnect->query("SELECT * FROM news");
	while ($row = $newsy->fetch_assoc()){
		
		$numer=$row['n_id'];
		$tytul=$row['tytul'];
		$tresc=$row['tresc'];
		$author=$row['author'];
		$data=$row['data'];
		
		echo'<br><b>'.$tytul.'</b><br>';
		echo''.$tresc.'<br>';
		echo'<b>Autor: </b>'.$author;
		echo'<br>Data dodania: '.$data;
		echo'<br><br>';
	}


?>
</div>