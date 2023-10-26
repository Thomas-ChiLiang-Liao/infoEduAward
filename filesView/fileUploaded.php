<?php
session_start();
if ( !isset($_SESSION['id']) ) header("$_SESSION[serverRoot]");
else { 
	include '../menu.php';
  if ( isset($_FILES['regForm']) OR isset($_FILES['achievement']) ) {
    if ( $_FILES['regForm']['error'] == UPLOAD_ERR_OK and $_FILES['regForm']['name'] != '') {
      $regFormFile = "../files/$_SESSION[tableId]_regForm.pdf";
      if ( file_exists($regFormFile) ) unlink ( $regFormFile );
      move_uploaded_file($_FILES['regForm']['tmp_name'], $regFormFile);
    }
    if ( $_FILES['achievement']['error'] == UPLOAD_ERR_OK and $_FILES['achievement']['name'] != '') {
      $regFormFile = "../files/$_SESSION[tableId]_achievement.pdf";
      if ( file_exists($regFormFile) ) unlink ( $regFormFile );
      move_uploaded_file($_FILES['achievement']['tmp_name'], $regFormFile);
    } 
    $_SESSION['msg'] = "info,訊息,上傳成功。".'<br>'.$msg;
  } 
  else $_SESSION['msg'] = 'danger,錯誤,檔案太大(超過50M)，請處理後再上傳。';
  header("Location: $_SESSION[serverRoot]/main");
}
?>