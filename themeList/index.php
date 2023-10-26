<!DOCTYPE html> 
<?php 
if ( !isset( $_SERVER['HTTP_X_HTTPS'] ) OR ( $_SERVER['HTTP_X_HTTPS'] != 'on' ) ) header( "Location: https://$_SERVER[SERVER_NAME]$_SERVER[REQUEST_URI]" );
else {
	include "../menu.php";
  $pdo = new PDO('mysql:host=localhost:3307;dbname=infoEduAward;charset=utf8','infoEduAward','Atq@blD0VjRst-yG');

  $personStatement = $pdo->query("SELECT * FROM person WHERE 1;");
  $personError = $pdo->errorInfo();
  if ($personError[0] != '00000') {
    echo "讀取 table.person 時發生錯誤！代碼：$personError[0]/$personError[1]<br>訊息：$personError[2]";
    exit();
  }
  $teamStatement = $pdo->query("SELECT * FROM team WHERE 1;");
  $teamError = $pdo->errorInfo();
  if ($teamError[0] != '00000') {
    echo "讀取 table.team 時發生錯誤！代碼：$teamError[0]/$teamError[1]<br>訊息：$teamError[2]";
    exit();
  }
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
		<?php menu('themeList'); ?> 
    <div class="container-fluid">
      <div class="row mt-5">
        <div class="col-10 offset-1 col-md-8 offset-md-2">
          <div class="card mx-xl-5">
            <div class="card-header bg-primary text-white text-center">
              <h4>個人組報名主題列表</h4>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <td>編號</td>
                    <td>主題</td>
                    <td>報名表</td>
                    <td>成果資料</td>
                  </tr>
                </thead>
                <tbody>
                  <?php if ( $personStatement->rowCount() == 0 ) { ?>
                  <tr><td colspan="4">尚無報名資料</td></tr>
                  <?php } else { while ($person = $personStatement->fetch(PDO::FETCH_ASSOC)) { ?>
                  <tr>
                    <td>person<?php echo $person['id']; ?></td>
                    <td><?php echo $person['theme']; ?></td>
                    <td class="font-weight-bold text-<?php echo ( file_exists("../files/person$person[id]_regForm.pdf") ? 'success' : 'warning' ); ?>"><?php echo ( file_exists("../files/person$person[id]_regForm.pdf") ? '已上傳' : '未上傳' ); ?></td>
                    <td class="font-weight-bold text-<?php echo ( file_exists("../files/person$person[id]_achievement.pdf") ? 'success' : 'warning' );?>"><?php echo ( file_exists("../files/person$person[id]_achievement.pdf") ? '已上傳' : '未上傳' ) ;?></td>
                  </tr> 
                  <?php } }?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card mx-xl-5 mt-5">
            <div class="card-header bg-primary text-white text-center">
              <h4>團體組報名主題列表</h4>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <td>編號</td>
                    <td>主題</td>
                    <td>報名表</td>
                    <td>成果資料</td>
                  </tr>
                </thead>
                <tbody>
                  <?php if ( $teamStatement->rowCount() == 0 ) { ?>
                  <tr><td colspan="4">尚無報名資料</td></tr>
                  <?php } else { while ($team = $teamStatement->fetch(PDO::FETCH_ASSOC)) { ?>
                  <tr>
                    <td>team<?php echo $team['id']; ?></td>
                    <td><?php echo $team['theme']; ?></td>
                    <td class="font-weight-bold text-<?php echo ( file_exists("../files/team$team[id]_regForm.pdf") ? 'success' : 'warning' ); ?>"><?php echo ( file_exists("../files/team$team[id]_regForm.pdf") ? '已上傳' : '未上傳' ); ?></td>
                    <td class="font-weight-bold text-<?php echo ( file_exists("../files/team$team[id]_achievement.pdf") ? 'success' : 'warning' );?>"><?php echo ( file_exists("../files/team$team[id]_achievement.pdf") ? '已上傳' : '未上傳' ) ;?></td>
                  </tr> 
                  <?php } }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
	</body>
</html>
<?php } ?>