<!DOCTYPE html> 
<?php
include '../menu.php';

foreach ($_POST as $index => $data) {
  $_POST[$index] = str_replace('"','',$data);
  $_POST[$index] = str_replace("'",'',$_POST[$index]);
}

$pdo = new PDO('mysql:host=localhost:3307;dbname=infoEduAward;charset=utf8','infoEduAward','Atq@blD0VjRst-yG');

// 先把帳號、密碼及角色寫入 table user
$pw = sha1( $_POST["pw"] );
$sql = "INSERT INTO user (id, pw, rol) VALUES ( :email, :pw, :rol )";
$statement = $pdo->prepare($sql);
$statement->bindParam(":email", $_POST["email"], PDO::PARAM_STR, 30);
$statement->bindParam(":pw", $pw, PDO::PARAM_STR, 40);
$statement->bindParam("rol", $_POST["table"], pdo::PARAM_STR, 10);

$statement->execute();
$errMessage = $statement->errorInfo();
if ( $errMessage[0] != '00000' ) {
  echo "寫入 table.user 發生錯誤！代碼：$errMessage[0]/$errMessage[1]<br>訊息：$errMessage[2];";
  exit();
}
// table user 寫入完畢，且沒問題！

if ( $_POST["table"] == "person" ) {
  // 寫入 table person
  // print_r ($_POST);
  $sql = "INSERT INTO person (name, sex, pCat, schoolFull, school, teacherSeniority, schoolSeniority, email, cat, theme, cellPhone, fax, fax_extent, officeTel, officeTel_ext) VALUES " .
         "(:name, :sex, :pCat, :schoolFull, :school, :teacherSeniority, :schoolSeniority, :email, :cat, :theme, :cellPhone, :fax, :fax_extent, :officeTel, :officeTel_ext);";
  $statement = $pdo->prepare($sql);
  switch ($_POST["pCat"]) {
    case 1: $pCat = "校長"; break;
    case 2: $pCat = "主任"; break;
    case 3: $pCat = "兼任行政職務教師"; break;
    case 4: $pCat = "專任教師"; break;
    case 5: $pCat = "導師"; 
  }
  switch ($_POST["cat"]) {
    case 1: $cat = "資訊科技教學組"; break;
    case 2: $cat = "一般科目教學組"; break;
    case 3: $cat = "行政類";
  }
  $fax_extent = ( $_POST["fax_extent"] == "" ? null : $_POST["fax_extent"] );
  $officeTel_ext = ( $_POST["officeTel_ext"] == "" ? null : $_POST["officeTel_ext"] );

  $statement->bindParam(":name", $_POST["name"], PDO::PARAM_STR, 20);
  $statement->bindParam(":sex", $_POST["sex"], PDO::PARAM_STR, 1);
  $statement->bindParam(":pCat", $pCat, PDO::PARAM_STR, 8);
  $statement->bindParam(":schoolFull", $_POST["schoolFull"], PDO::PARAM_STR, 20);
  $statement->bindParam(":school", $_POST["school"], PDO::PARAM_STR, 10);
  $statement->bindParam(":teacherSeniority", $_POST["teacherSeniority"], PDO::PARAM_STR, 2);
  $statement->bindParam(":schoolSeniority", $_POST["schoolSeniority"], PDO::PARAM_STR, 2);
  $statement->bindParam(":email", $_POST["email"], PDO::PARAM_STR, 30);
  $statement->bindParam(":cat", $cat, PDO::PARAM_STR, 8);
  $statement->bindParam(":theme", $_POST["theme"], PDO::PARAM_STR, 50);
  $statement->bindParam(":cellPhone", $_POST["cellPhone"], PDO::PARAM_STR, 10);
  $statement->bindParam(":fax", $_POST["fax"], PDO::PARAM_STR, 10);
  $statement->bindParam(":fax_extent", $fax_extent, PDO::PARAM_STR, 4);
  $statement->bindParam("officeTel", $_POST["officeTel"], PDO::PARAM_STR, 10);
  $statement->bindParam("officeTel_ext", $officeTel_ext, PDO::PARAM_STR, 4);

  $statement->execute();
  $errMessage = $statement->errorInfo();
  if ( $errMessage[0] != '00000' ) {
    echo "寫入 table.user 發生錯誤！代碼：$errMessage[0]/$errMessage[1]<br>訊息：$errMessage[2];";
    exit();
  }
} else {
  // 寫入 team
  //print_r ($_POST);
  
  $sql = "INSERT INTO team (schoolFull, school, members, captain, sex, pCat, email, cat, theme, cellPhone, fax, fax_extent, officeTel, officeTel_ext, mem2, sch2, mem3, sch3, mem4, sch4, mem5, sch5, mem6, sch6) VALUES " .
         "(:schoolFull, :school, :members, :captain, :sex, :pCat, :email, :cat, :theme, :cellPhone, :fax, :fax_extent, :officeTel, :officeTel_ext, :mem2, :sch2, :mem3, :sch3, :mem4, :sch4, :mem5, :sch5, :mem6, :sch6);";
  $statement = $pdo->prepare($sql);
  switch ($_POST["pCat"]) {
    case 1: $pCat = "校長"; break;
    case 2: $pCat = "主任"; break;
    case 3: $pCat = "兼任行政職務教師"; break;
    case 4: $pCat = "專任教師"; break;
    case 5: $pCat = "導師"; 
  }
  switch ($_POST["cat"]) {
    case 1: $cat = "資訊科技教學組"; break;
    case 2: $cat = "一般科目教學飷"; break;
    case 3: $cat = "行政類";
  }
  $fax_extent = ( $_POST["fax_extent"] == "" ? null : $_POST["fax_extent"] );
  $officeTel_ext = ( $_POST["officeTel_ext"] == "" ? null : $_POST["officeTel_ext"] );

  $statement->bindParam(":schoolFull", $_POST["schoolFull"], PDO::PARAM_STR, 20);
  $statement->bindParam(":school", $_POST["school"], PDO::PARAM_STR, 10);
  $statement->bindParam(":members", $_POST["members"], $_POST["members"], PDO::PARAM_STR, 1);
  $statement->bindParam(":captain", $_POST["captain"], PDO::PARAM_STR, 20);
  $statement->bindParam(":sex", $_POST["sex"], PDO::PARAM_STR, 1);
  $statement->bindParam(":pCat", $pCat, PDO::PARAM_STR, 8);
  $statement->bindParam(":email", $_POST["email"], PDO::PARAM_STR, 30);
  $statement->bindParam(":cat", $cat, PDO::PARAM_STR,8);
  $statement->bindParam(":theme", $_POST["theme"], PDO::PARAM_STR, 50);
  $statement->bindParam(":cellPhone", $_POST["cellPhone"], PDO::PARAM_STR, 10);
  $statement->bindParam(":fax", $_POST["fax"], PDO::PARAM_STR, 10);
  $statement->bindParam(":fax_extent", $fax_extent, PDO::PARAM_STR, 4);
  $statement->bindParam(":officeTel", $_POST["officeTel"], PDO::PARAM_STR, 10);
  $statement->bindParam(":officeTel_ext", $officeTel_ext, PDO::PARAM_STR, 4);
  $statement->bindParam(":mem2", $_POST["mem2"], PDO::PARAM_STR, 20);
  $statement->bindParam(":sch2", $_POST["sch2"], PDO::PARAM_STR, 20);
  $statement->bindParam(":mem3", $_POST["mem3"], PDO::PARAM_STR, 20);
  $statement->bindParam(":sch3", $_POST["sch3"], PDO::PARAM_STR, 20);
  $mem4 = ( isset($_POST["mem4"]) ? $_POST["mem4"] : null );
  $sch4 = ( isset($_POST["sch4"]) ? $_POST["sch4"] : null );
  $mem5 = ( isset($_POST["mem5"]) ? $_POST["mem5"] : null );
  $sch5 = ( isset($_POST["sch5"]) ? $_POST["sch5"] : null );
  $mem6 = ( isset($_POST["mem6"]) ? $_POST["mem6"] : null );
  $sch6 = ( isset($_POST["sch6"]) ? $_POST["sch6"] : null );  
  $statement->bindParam(":mem4", $mem4, PDO::PARAM_STR, 20);
  $statement->bindParam(":sch4", $sch4, PDO::PARAM_STR, 20);
  $statement->bindParam(":mem5", $mem5, PDO::PARAM_STR, 20);
  $statement->bindParam(":sch5", $sch5, PDO::PARAM_STR, 20);
  $statement->bindParam(":mem6", $mem6, PDO::PARAM_STR, 20);
  $statement->bindParam(":sch6", $sch6, PDO::PARAM_STR, 20);

  $statement->execute();
  $errMessage = $statement->errorInfo();
  if ( $errMessage[0] != '00000' ) {
    echo "寫入 table.user 發生錯誤！代碼：$errMessage[0]/$errMessage[1]<br>訊息：$errMessage[2];";
    exit();
  }  
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
		<?php menu(''); ?> 
    <div class="container-fluid">
      <div class="row mt-5">
        <div class="col-10 offset-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
          <div class="alert alert-info">
            <strong>訊息：</strong>資料建立完畢，請登入後再進行其他操作。
          </div>
        </div>
      </div>
    </div>
	</body>
</html>