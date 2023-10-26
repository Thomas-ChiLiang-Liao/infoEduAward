<!DOCTYPE html> 

<?php
session_start();
if ( !isset($_SESSION['id']) ) header("$_SESSION[serverRoot]");
else { 
	include '../menu.php';
?>

<html lang="en">
  <head>
    <title>百大資訊人才選拔</title>
    <meta charset="utf-8">
    <link rel="icon" href="../images/NA156516864930117.gif" type="image/x-icon">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
		<!-- JavaScript 自定函數 -->
		<script type="text/javascript" src="/include/js/myFunc.js"></script>
		<script type="text/javascript" src="/include/js/sha1.js"></script>
		<script type="text/javascript">
			function checkNewPassword(objAId, objBId) {
				if ( !(checkPasswordsConsistence(objAId, objBId)) || document.getElementById("oldPw").value == '' ) 
					document.getElementById("setNewPasswordButton").disabled = true;
				else
					document.getElementById("setNewPasswordButton").disabled = false;
			}
			
			function encryptPw(){
				document.getElementById('oldPw').value = SHA1(document.getElementById('oldPw').value);
				document.getElementById('newPw').value = SHA1(document.getElementById('newPw').value);
				document.getElementById('confirmPw').value = SHA1(document.getElementById('confirmPw').value);
				return true;
			}
		</script>
		<script src="/include/autoLogout.js"></script>
		<style>
			a:link, a:visited { color: white }
		</style>
  </head>
  <body onload="document.getElementById('setNewPasswordButton').disabled = true">
		<!-- 標題列 -->
 		<?php menu('changePassword'); ?>
		<div class="container-fluid">
			<div class="row mt-5">
				<div class="col-10 offset-1 col-md-6 offset-md-3">
					<div class="card">
						<div class="card-header <?php echo (isset($_GET['errorCode']) ? 'bg-danger' : 'bg-warning'); ?>">
							<h5 class="text-white"><?php echo (isset($_GET['errorCode']) ? '變更密碼失敗！請重新操作。' : '變更密碼作業'); ?></h5>
						</div>
						<div class="card-body">
							<form action="writeToMarinDB.php" method="post" onsubmit="encryptPw()">
								<div class="form-group">
    							<input type="password" class="form-control" placeholder="請輸入舊密碼" id="oldPw" name="oldPw">
    						</div> 
    						<div class="form-group">
    							<input type="password" class="form-control" placeholder="請輸入新密碼" id="newPw" name="newPw" onkeyup="checkNewPassword('newPw','confirmPw')">
    						</div>
    						<div class="form-group">
    							<input type="password" class="form-control" placeholder="確認新密碼" id="confirmPw" name="confirmPw" onkeyup="checkNewPassword('newPw','confirmPw')">
    						</div>
    						<button type ="submit" class="btn btn-secondary" id="setNewPasswordButton">送出</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
} 
?>