<!DOCTYPE html> 
<?php
session_start();
include '../menu.php';

foreach ($_POST as $index => $data) {
  $_POST[$index] = str_replace('"','',$data);
  $_POST[$index] = str_replace("'",'',$_POST[$index]);
}

$pdo = new PDO('mysql:host=localhost:3307;dbname=infoEduAward;charset=utf8','infoEduAward','Atq@blD0VjRst-yG');

$statement = $pdo->query("SELECT * FROM user WHERE pw=\"$_POST[pw]\" AND id=\"$_POST[account]\";");
if ($statement->rowCount() == 0) header ("Location: $_SESSION[serverRoot]/login/index.php?loginFaild=1");
else {
  // 帳密正確，取出特定資料。
  $user = $statement->fetch(PDO::FETCH_ASSOC);
  $statement = $pdo->query("SELECT * FROM $user[rol] WHERE email = \"$user[id]\";");
  $result = $statement->fetch(PDO::FETCH_ASSOC);
  $_SESSION['id'] = $user['id'];
  $_SESSION['rol'] = $user['rol'];
  $_SESSION['name'] = ( isset( $result['name'] ) ? $result['name'] : $result['captain'] );
  $_SESSION['tableId'] = $user['rol'] . $result['id'];
  
  foreach ( $result as $index => $value ) {
    if ( !($index == 'id' or $index == 'name' or $index == 'captain' or $index == 'email') ) $_SESSION[$index] = $value;
  }
  // 尋找是否已上傳檔案
  // 報名表 $_SESSION['tableId'].'_regForm.pdf';
  // 成果資料 $_SESSION['tableId'].'_achievement.pdf';
  $regForm = file_exists("../files/$_SESSION[tableId]_regForm.pdf");
  $achievement = file_exists("../files/$_SESSION[tableId]_achievement.pdf");
  $_SESSION['msg'] = "info,訊息,$_SESSION[name]，您好。您報名之<span class='text-primary font-weight-bold'>$_SESSION[theme]</span>作品之相關檔案上傳狀況如下：<br>報名表<span class='font-weight-bold".( $regForm ? " text-success'>已上傳" : " text-danger'>尚未上傳" )."</span>；成果資料<span class='font-weight-bold".( $achievement ? " text-success'>已上傳" : " text-danger'>尚未上傳" )."</span>。";
  header("Location: $_SESSION[serverRoot]/main");
  
?>

<?php } ?>