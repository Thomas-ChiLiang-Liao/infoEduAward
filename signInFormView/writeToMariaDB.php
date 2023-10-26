<!DOCTYPE html> 
<?php
session_start();
if ( !isset($_SESSION['id']) ) header("$_SESSION[serverRoot]");
else { 
	include '../menu.php';

  foreach ($_POST as $index => $data) {
    $_POST[$index] = str_replace('"','',$data);
    $_POST[$index] = str_replace("'",'',$_POST[$index]);
    if ( !($index == 'id' or $index == 'name' or $index == 'captain' or $index == 'email' or $index == 'table') ) $_SESSION[$index] = $_POST[$index];
  }
  $_SESSION['name'] = ( isset( $_POST['name'] ) ? $_POST['name'] : $_POST['captain'] );
  if ( $_SESSION['rol'] == 'team') {
    switch ( $_SESSION['members'] ) {
      case 3: $_SESSION['mem4'] = null;
              $_SESSION['sch4'] = null;
      case 4: $_SESSION['mem5'] = null;
              $_SESSION['sch5'] = null;
      case 5: $_SESSION['mem6'] = null;
              $_SESSION['sch6'] = null;
    }
  }

  $pdo = new PDO('mysql:host=localhost:3307;dbname=infoEduAward;charset=utf8','infoEduAward','Atq@blD0VjRst-yG');

  // 先把帳號、密碼及角色寫入 table user 
  // 此為檢視、修改，帳號、密碼不給改
  /*
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
  */
  // table user 寫入完畢，且沒問題！

  if ( $_POST["table"] == "person" ) {
    // 寫入 table person
    // print_r ($_POST);
    $sql = "UPDATE person SET " . 
              "name = :name, sex = :sex, pCat = :pCat, schoolFull = :schoolFull, school = :school, " .
              "teacherSeniority = :teacherSeniority, schoolSeniority = :schoolSeniority, cat = :cat, theme = :theme, " . 
              "cellPhone = :cellPhone, fax = :fax, fax_extent = :fax_extent, officeTel = :officeTel, officeTel_ext = :officeTel_ext " .
          "WHERE email = \"$_SESSION[id]\";";
    $statement = $pdo->prepare($sql);
    switch ($_POST["pCat"]) {
      case 1: $pCat = "校長"; break;
      case 2: $pCat = "主任"; break;
      case 3: $pCat = "兼任行政職務教師"; break;
      case 4: $pCat = "專任教師"; break;
      case 5: $pCat = "導師"; 
    }
    $_SESSION['pCat'] = $pCat;
    switch ($_POST["cat"]) {
      case 1: $cat = "資訊科技教學組"; break;
      case 2: $cat = "一般科目教學組"; break;
      case 3: $cat = "行政類";
    }
    $_SESSION['cat'] = $cat;
    $fax_extent = ( $_POST["fax_extent"] == "" ? null : $_POST["fax_extent"] );
    $officeTel_ext = ( $_POST["officeTel_ext"] == "" ? null : $_POST["officeTel_ext"] );

    $statement->bindParam(":name", $_POST["name"], PDO::PARAM_STR, 20);
    $statement->bindParam(":sex", $_POST["sex"], PDO::PARAM_STR, 1);
    $statement->bindParam(":pCat", $pCat, PDO::PARAM_STR, 8);
    $statement->bindParam(":schoolFull", $_POST["schoolFull"], PDO::PARAM_STR, 20);
    $statement->bindParam(":school", $_POST["school"], PDO::PARAM_STR, 10);
    $statement->bindParam(":teacherSeniority", $_POST["teacherSeniority"], PDO::PARAM_STR, 2);
    $statement->bindParam(":schoolSeniority", $_POST["schoolSeniority"], PDO::PARAM_STR, 2);
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
    
    $sql = "UPDATE team SET " .
              "schoolFull = :schoolFull, school = :school, members = :members, captain = :captain, pCat = :pCat, cat = :cat, theme = :theme, " .
              "cellPhone = :cellPhone, fax = :fax, fax_extent = :fax_extent, officeTel = :officeTel, officeTel_ext = :officeTel_ext, " .
              "mem2 = :mem2, sch2 = :sch2, mem3 = :mem3, sch3 = :sch3, mem4 = :mem4, sch4 = :sch4, mem5 = :mem5, sch5 = :sch5, mem6 = :mem6, sch6 = :sch6 " .
            "WHERE email = \"$_SESSION[id]\";";
    $statement = $pdo->prepare($sql);
    switch ($_POST["pCat"]) {
      case 1: $pCat = "校長"; break;
      case 2: $pCat = "主任"; break;
      case 3: $pCat = "兼任行政職務教師"; break;
      case 4: $pCat = "專任教師"; break;
      case 5: $pCat = "導師"; 
    }
    $_SESSION['pCat'] = $pCat;
    switch ($_POST["cat"]) {
      case 1: $cat = "資訊科技教學組"; break;
      case 2: $cat = "一般科目教學飷"; break;
      case 3: $cat = "行政類";
    }
    $_SESSION['cat'] = $cat;
    $fax_extent = ( $_POST["fax_extent"] == "" ? null : $_POST["fax_extent"] );
    $officeTel_ext = ( $_POST["officeTel_ext"] == "" ? null : $_POST["officeTel_ext"] );

    $statement->bindParam(":schoolFull", $_POST["schoolFull"], PDO::PARAM_STR, 20);
    $statement->bindParam(":school", $_POST["school"], PDO::PARAM_STR, 10);
    $statement->bindParam(":members", $_POST["members"], $_POST["members"], PDO::PARAM_STR, 1);
    $statement->bindParam(":captain", $_POST["captain"], PDO::PARAM_STR, 20);
    $statement->bindParam(":pCat", $pCat, PDO::PARAM_STR, 8);
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
    $mem4 = ( ( isset($_POST["mem4"])  && $_POST["mem4"] != null ) ? $_POST["mem4"] : null );
    $sch4 = ( ( isset($_POST["sch4"])  && $_POST["sch4"] != null ) ? $_POST["sch4"] : null );
    $mem5 = ( ( isset($_POST["mem5"])  && $_POST["mem5"] != null ) ? $_POST["mem5"] : null );
    $sch5 = ( ( isset($_POST["sch5"])  && $_POST["sch5"] != null ) ? $_POST["sch5"] : null );
    $mem6 = ( ( isset($_POST["mem6"])  && $_POST["mem6"] != null ) ? $_POST["mem6"] : null );
    $sch6 = ( ( isset($_POST["sch6"])  && $_POST["sch6"] != null ) ? $_POST["sch6"] : null );  
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
  $_SESSION['msg'] = "info,訊息,資料修改完畢，請由上方功能進行後續操作。";
  header("Location: $_SESSION[serverRoot]/main");
}
?>
 