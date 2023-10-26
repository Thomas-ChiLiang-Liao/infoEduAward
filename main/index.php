<!DOCTYPE html> 
<?php 
session_start();
if ( !isset($_SESSION['id']) ) header("Location: $_SESSION[serverRoot]");
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
		<script src="/include/autoLogout.js"></script>
  </head>
  <body>
		<?php menu('');?>
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-10 offset-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
          <!--
          <div class="alert alert-warning">
            <strong>$_SESSION</strong><br>
            <?php //print_r ($_SESSION); ?>
          </div>
-->
          <?php if ( isset($_SESSION['msg']) && $_SESSION['msg'] != "" ) { 
            $msg = explode(',',$_SESSION['msg']); ?>
          <div class="alert alert-<?php echo $msg[0]; ?>">
            <strong><?php echo $msg[1]; ?>：</strong><?php echo $msg[2]; ?>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
	</body>
</html>