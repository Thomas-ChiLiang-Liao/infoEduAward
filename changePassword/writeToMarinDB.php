<?php
session_start();
if ( !isset($_SESSION['id']) ) header("Location: $_SESSION[serverRoot]");
foreach ($_SESSION AS $index => $data) {
	$_SESSION[$index] = str_replace('"','',$data);
	$_SESSION[$index] = str_replace("'",'',$_SESSION[$index]);
}
foreach ($_POST as $index => $data) {
  $_POST[$index] = str_replace('"','',$data);
  $_POST[$index] = str_replace("'",'',$_POST[$index]);
}

$pdo = new PDO('mysql:host=localhost:3307;dbname=infoEduAward;charset=utf8','infoEduAward','Atq@blD0VjRst-yG');
	
$statement = $pdo->prepare('UPDATE user SET pw = :pw WHERE (id = :id AND pw = :oldPw);');
$statement->bindParam(':pw',$_POST['newPw'],PDO::PARAM_STR, 40);
$statement->bindParam(':id',$_SESSION['id'],PDO::PARAM_STR, 30);
$statement->bindParam(':oldPw',$_POST['oldPw'],PDO::PARAM_STR, 40);

$statement->execute();

if ($statement->rowCount() == 1) {
	$_SESSION['msg'] = 'info,訊息,密碼修改成功！下次請以新密碼登入。<br>請由上方功能表進行後續操作。';
	header("Location: $_SESSION[serverRoot]/main");
}
else header("Location: $_SESSION[serverRoot]/changePassword/index.php?errorCode=1");
?>