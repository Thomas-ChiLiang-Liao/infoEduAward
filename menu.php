<?php
function menu($func) { 
	session_start(); 
	$dDay = mktime(0,0,0,3,1,2023);
  //$dDay = mktime(0,0,0,12,30,21);
	if ( !isset($_SESSION['serverRoot']) ) $_SESSION['serverRoot'] = "https://$_SERVER[SERVER_NAME]" . dirname($_SERVER['SCRIPT_NAME']);
?>

	<div class="container-fluid">
		<!-- 標題列 -->
		<div class="row d-none d-sm-block">
			<div class="col-12 m-0 pt-3 pb-1 bg-primary">
				<h3 class="text-center text-white">臺北市112年百大菁英資訊教育人才選拔</h4>
			</div>
		</div>
	</div>
	
	<!-- 功能表 -->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark p-0 pl-2">
		<!-- 功能表壓縮紐 -->
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- 功能表超連結 -->
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav mr-auto">
        <?php if ( !isset( $_SESSION['rol'] ) ) { ?>
        <!-- 起始功能表，使用者尚未登入 -->
        <li class="nav-link<?php echo ( $func == 'plane' ? ' active' : '' ); ?>">
					<a class="nav-link" href="<?php echo $_SESSION['serverRoot']; ?>/plane/">實施計畫</a>
				</li>
        <li class="nav-link<?php echo ( $func == 'signIn' ? ' active' : '' ); ?>">
					<a class="nav-link" href="<?php echo $_SESSION['serverRoot']; ?>/signIn/">我要報名</a>
				</li>
        <li class="nav-link<?php echo ( $func == 'themeList' ? ' active' : '' ); ?>">
					<a class="nav-link" href="<?php echo $_SESSION['serverRoot']; ?>/themeList/">報名主題列表</a>
				</li>
        <?php } else { 
          if ( $_SESSION['rol'] == 'person' OR $_SESSION['rol'] == 'team' ) { ?>
        <!-- 一般報名者 -->
        <li class="nav-link<?php echo ( $func == 'plane' ? ' active' : '' ); ?>">
					<a class="nav-link" href="<?php echo $_SESSION['serverRoot']; ?>/plane/">實施計畫</a>
				</li>
        <li class="nav-link<?php echo ( $func == 'changePassword' ? ' active' : '' ); ?>">
					<a class="nav-link" href="<?php echo $_SESSION['serverRoot']; ?>/changePassword/">修改密碼</a>
				</li>        
        <li class="nav-link<?php echo ( $func == 'signInFormView' ? ' active' : '' ); ?>">
					<a class="nav-link" href="<?php echo $_SESSION['serverRoot']; ?>/signInFormView/">報名資料檢視(修改)</a>
				</li>   
        <li class="nav-link<?php echo ( $func == 'filesView' ? ' active' : '' ); ?>">
					<a class="nav-link" href="<?php echo $_SESSION['serverRoot']; ?>/filesView/">報名表及成果資料檢視(上傳)</a>
				</li>        
        <?php  } } ?>
			</ul>
			<p class="text-white my-2">
				<?php if ( isset( $_SESSION['id'] ) ) { ?>
				<span class="text-warning"><?php echo $_SESSION['name']; ?></span>&nbsp;&nbsp;<a class="nav-link d-inline" href="<?php echo $_SESSION['serverRoot'] . '/logout.php'; ?>">登出</a>
				<?php } else { ?>
				<a class="nav-link d-inline" href="<?php echo $_SESSION['serverRoot']; ?>/login/"; ?>登入</a>
				<?php } ?>
			</p>
		</div>
	</nav>
	<?php if ( $_SESSION['type'] == 2 and $func == '') { ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<?php if ( time() < $dDay ) { ?>
				<div class="alert alert-info mt-5">
					<strong>訊息：</strong>本案已通過初審，自即日起至112年2月28日(含)止為上傳佐證資料的時間。佐證資料可以影片、教案、活動紀錄、照片、報章雜誌及臉書等多元形式呈現(至多5筆資料，每筆資料均以電子檔呈現，檔案大小不超過25MB)。
				</div>
				<?php } else { ?>
				<div class="alert alert-danger mt-5">
					<strong>訊息：</strong>本案已通過初審，自即日起至112年2月28日(含)止為上傳佐證資料的時間，現在已超過上傳時間。
				</div>						
				<?php } ?>
			</div>
		</div>
	</div>	
	<? } ?>
<?php } ?>