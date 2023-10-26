<!DOCTYPE html> 
<?php 
if ( !isset( $_SERVER['HTTP_X_HTTPS'] ) OR ( $_SERVER['HTTP_X_HTTPS'] != 'on' ) ) header( "Location: https://$_SERVER[SERVER_NAME]$_SERVER[REQUEST_URI]" );
else {
	include "../menu.php";
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
    <script src="/include/js/sha1.js"></script>
    <script src="script.js"></script>
		<style>
			a.nav-link.d-inline:link, a.nav-link.d-inline:visited { color: white }
		</style>
  </head>
  <body>
		<?php menu(''); ?> 
    <div class="container-fluid">
      <div class="row mt-5">
        <div class="col-10 offset-1 col-md-6 offset-md-3">
          <div class="card mx-xl-5">
            <div class="card-header <?php echo ( isset( $_GET['loginFaild'] ) ? 'bg-danger' : 'bg-primary' ) ?>">
              <h5 class="text-white p-1"><?php echo ( isset( $_GET['loginFaild'] ) ? '帳密錯誤！請重新登入！' : '登入' ) ?></h5>
            </div>
            <div class="card-body">
              <form action="login.php" method="post" id="loginForm" onsubmit="return beforeSubmit()">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">帳號</span>
                  </div>
                  <input type="text" name="account" id="account" class="form-control" placeholder="請輸入報名之電子郵件信箱">
                </div>
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">密碼</span>
                  </div>
                  <input type="password" name="pw" id="pw" class="form-control" placeholder="請輸入密碼">
                </div>
                <button type="submit" class="btn btn-primary mt-1">登入</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
	</body>
</html>
<?php } ?>