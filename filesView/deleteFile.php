<?php
session_start();
if ( !isset($_SESSION['id']) ) header("$_SESSION[serverRoot]");
else { 
	include '../menu.php';
  unlink("$_POST[deleteFilename]");
  $_SESSION['msg'] = 'info,訊息,刪除成功。';
  header("Location: $_SESSION[serverRoot]/main"); 
}
?>