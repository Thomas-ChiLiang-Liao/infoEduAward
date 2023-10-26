<!DOCTYPE html> 
<?php 
if ( !isset( $_SERVER['HTTP_X_HTTPS'] ) OR ( $_SERVER['HTTP_X_HTTPS'] != 'on' ) ) header( "Location: https://$_SERVER[SERVER_NAME]$_SERVER[REQUEST_URI]" );
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
		<style>
			a.nav-link.d-inline:link, a.nav-link.d-inline:visited { color: white }
		</style>
  </head>
  <body>
    <?php menu('signIn'); ?>
		<div class="container-fluid">
      <div class="row pt-5">
        <div class="col-10 col-offset-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3">
          <div class="alert alert-info">
            <strong>注意！</strong>本系統以 E-mail Address 為帳號，故若同時報名個人組與團體組，請使用不用的 E-mail Address。
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-4 offset-4 text-center">
          <a href="person.php" class="btn btn-lg btn-outline-primary mr-3">個人組報名</a>
          <a href="team.php" class="btn btn-lg btn-outline-primary ml-3">團體組報名</a>
        </div>
      </div>
    </div>
	</body>
</html>
<?php } ?>