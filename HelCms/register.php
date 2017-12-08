<?php
session_start();
if (isset($_POST['login'])){
	$wszystko_ok=true;
	//sprawdzam login
	$login=$_POST['login'];
	if ((strlen($login)<5) || (strlen($login)>20)){
		$wszystko_ok=false;
		$_SESSION['e_login']="Login musi posiadać od 5 do 20 znaków";
	}
	if((ctype_alnum($login))==false){
		$wsystko_ok=false;
		$_SESSION['e_login']="Login powinien zawierać tylko litery i cyfry (bez polskich znaków)";
		}
	//sprawdzam maila
	$mail=$_POST['mail'];
	$mailB=filter_var($mail,FILTER_SANITIZE_EMAIL);
	if (((filter_var($mailB,FILTER_VALIDATE_EMAIL))==FALSE) OR ($mail!=$mailB)){
		$wsystko_ok=false;
		$_SESSION['e_mail']='E-mail zawiera niedozwolone znaki';
		}
	//sprawdzam hasło
	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];
	if($pass1!=$pass2){
		$wszystko_ok=false;
		$_SESSION['e_pass']="Podane hasła są różne";
	}
	if((strlen($pass1) < 8) OR (strlen($pass1) > 20)){
		$wszystko_ok=false;
		$_SESSION['e_pass']="hasło musi mieć od 8 do 20 znaków";
	
	}
	$pass_hash=password_hash($pass1, PASSWORD_DEFAULT);
	//regulamin
	if(!isset($_POST['regulamin'])){
		$wszystko_ok=false;
		$_SESSION['e_reg']="zaakceptuj regulamin";
	}
	//captcha
	$secret_key="6Le8BhwUAAAAAL7i0l2n8XC5maApAocKl0yxNbPA";
	$captcha=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
	$come=json_decode($captcha);
	if($come->success==False){
		$wszystko_ok=false;
		$_SESSION['e_captcha']="udowodnij, że jesteś człowiekiem";
	}
		require_once "dbconf.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		try{
		$dbconnect = new mysqli($host,$db_user,$db_pass,$db_name);
			if ($dbconnect->connect_errno!=0){
			throw new Exception(mysqli_connect_errno());
		} Else{
			$result=$dbconnect->query("SELECT id FROM users WHERE login='$login'");
			If (!$result) throw new Exception($dbconnect->error);
			$ile= $result->num_rows;
			if($ile>0){
				$wszystko_ok=false;
			$_SESSION['e_login']="Podany Login jest już zajęty";
			}
			$result_mail=$dbconnect->query("SELECT id FROM users WHERE email='$mail'");
			If (!$result_mail) throw new Exception($dbconnect->error);
			$ile_mail= $result_mail->num_rows;
			if($ile_mail>0){
				$wszystko_ok=false;
			$_SESSION['e_mail']="Z tym adresem E-mail jest już powiązane konto";
			}
			If($wszystko_ok==true){
			//formularz zwalidowany pozytywnie
			If($dbconnect->query("INSERT INTO users VALUES (NULL,'$login','$pass_hash','$mail',0,NULL)")) {
				$_SESSION['register']=TRUE;
				header('location:welcome.php');
			} else {
				throw new Exception($dbconnect->error);
			}
			$dbconnect->close();
		}
		
		} 
		}
		catch (Exception $e)
		{
			echo'<div class="error">Błąd serwera, wypierdalaj</div>';
		}
	
		}
	
?>

<!DOCTYPE HTML>
<HTML Lang='pl'>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge, Chrome=1">
	<title>HelCms</title>
	<link rel="stylesheet" href="layout/base.css" type="text/css"/>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
<div id='login'>
<form method="post">
	<input type='text' name='login' placeholder='Login'>
	<?php
	if(isset($_SESSION['e_login'])){
	echo ('<div class="error">'.$_SESSION['e_login'].'</div>');
	unset($_SESSION['e_login']);
	}
	?>
	<input type='password' name='pass1' placeholder='Hasło'>
	<input type='password' name='pass2' placeholder='Potwierdź Hasło'>
	<?php
	if(isset($_SESSION['e_pass'])){
	echo ('<div class="error">'.$_SESSION['e_pass'].'</div>');
	unset($_SESSION['e_pass']);
	}
	?>
	<input type='text' name='mail' placeholder='E-mail'>
	<?php
	if(isset($_SESSION['e_mail'])){
	echo ('<div class="error">'.$_SESSION['e_mail'].'</div>');
	unset($_SESSION['e_mail']);
	}
	?>
<label>
	<input type='checkbox' name='regulamin' >Akceptuję regulamin 
</label>
<?php
	if(isset($_SESSION['e_reg'])){
	echo ('<div class="error">'.$_SESSION['e_reg'].'</div>');
	unset($_SESSION['e_reg']);
	}
	?>
	<div class="g-recaptcha" data-sitekey="6Le8BhwUAAAAAMfwKgvHiKg8cdhMPUoAHyrRSJAV"></div>
	<?php
	if(isset($_SESSION['e_captcha'])){
	echo ('<div class="error">'.$_SESSION['e_captcha'].'</div>');
	unset($_SESSION['e_captcha']);
	}
	?>
	<input type='submit' value='Zarejestruj'>
</form>
</div>
</body>

</html> 