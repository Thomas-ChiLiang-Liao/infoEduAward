<!DOCTYPE html> 
<?php 
if ( !isset( $_SERVER['HTTP_X_HTTPS'] ) OR ( $_SERVER['HTTP_X_HTTPS'] != 'on' ) ) header( "Location: https://$_SERVER[SERVER_NAME]$_SERVER[REQUEST_URI]" );
else {
	include '../menu.php';

  $pdo = new PDO('mysql:host=localhost:3307;dbname=infoEduAward;charset=utf8','infoEduAward','Atq@blD0VjRst-yG');

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
    <script src="script.js"></script>
    <script><?php
      $statement = $pdo->query("SELECT * FROM user WHERE 1;");
      $item = 0;
      echo "const email = [";
      if ( $statement->rowCount() <> 0 ) 
        while ( $result = $statement->fetch(PDO::FETCH_ASSOC) ) {
          if ( $item++ > 0 ) echo ", ";
          echo "\"$result[id]\"";
        }
      echo "];";    
    ?></script>
  </head>
  <body>
    <?php menu('signIn'); ?>
		<div class="container-fluid">
      <div class="row mt-5">
        <div class="col-10 offset-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3">
          <div class="card">
            <div class="card-header text-center bg-primary text-white"><h4>團體組報名作業</h4></div>
            <div class="card-body">
              <form action="writeToMariaDB.php" method="post" onsubmit="return beforeSubmit()">
              <input type="hidden" name="table" id="table" value="team">
                <!-- 帳號 - 電子郵件 -->  
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">帳號</span>
                  </div>
                  <input type="email" class="form-control" id="email" name="email" placeholder="E-mail Address" required onchange="isEmailExist();">
                </div>
                <!-- 密碼 -->
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">密碼</span>
                  </div>
                  <input type="password" class="form-control" placeholder="設定密碼" id="pw" name="pw" required onchange="pwCheck()">
                  <input type="password" class="form-control" placeholder="確認密碼" id="pwConfirm" name="pwConfirm" required onchange="pwCheck()">
                </div>     
                <!-- 服務學校 -->
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">學校</span>
                  </div>
                  <input type="text" class="form-control" placeholder ="全銜" id="schoolFull" name="schoolFull" required>
                  <input type="number" class="form-control" placeholder="人數" id="members" name="members" required min="3" max="6" onblur="setMembers()">
                </div>                                       
                <!-- 成員1 -->  
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">成員1(隊長)</span>
                  </div>
                  <input type="text" class="form-control" id="captain" name="captain" placeholder="成員1(隊長)姓名" required>
                  <input type="text" name="school" id="school" class="form-control" placeholder="服務學校簡稱" required>
                </div>
                <!-- 性別 -->
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">性別</span>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline pt-2 pl-5">
                    <input type="radio" class="custom-control-input" id="sex1" name="sex" value="1">
                    <label class="custom-control-label" for="sex1">男</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline pt-2">
                    <input type="radio" class="custom-control-input" id="sex2" name="sex" value="2">
                    <label class="custom-control-label" for="sex2">女</label>
                  </div>                              
                </div>
                <!-- 身分別 -->
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">身分別</span>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline pt-2 pl-5">
                    <input type="radio" class="custom-control-input" id="pCat1" name="pCat" value="1">
                    <label class="custom-control-label" for="pCat1">校長</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline pt-2">
                    <input type="radio" class="custom-control-input" id="pCat2" name="pCat" value="2">
                    <label class="custom-control-label" for="pCat2">主任</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline pt-2">
                    <input type="radio" class="custom-control-input" id="pCat3" name="pCat" value="3">
                    <label class="custom-control-label" for="pCat3">兼任行政職務教師</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline pt-2">
                    <input type="radio" class="custom-control-input" id="pCat4" name="pCat" value="4">
                    <label class="custom-control-label" for="pCat4">專任教師</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline pt-2">
                    <input type="radio" class="custom-control-input" id="pCat5" name="pCat" value="5">
                    <label class="custom-control-label" for="pCat5">導師</label>
                  </div>
                </div>
                <!-- 行動電話 -->
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">行動電話</span>
                  </div>
                  <input type="tel" class="form-control" placeholder="09123456789" id="cellPhone" name="cellPhone" required pattern="[0]{1}[0-9]{9}">
                </div>
                <!-- 辦公室電話 -->
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">辦公室電話</span>
                  </div>
                  <input type="tel" class="form-control" placeholder="格式：0227091630" id="officeTel" name="officeTel" required pattern="[0]{1}[0-9]{9}">
                  <input type="tel" class="form-control" placeholder="分機" id="officeTel_ext" name="officeTel_ext" pattern="[0-9]{0-5}">
                </div>
                <!-- 傳真電話 -->
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">傳真電話</span>
                  </div>
                  <input type="tel" class="form-control" placeholder="格式：0227849909" id="fax" name="fax" pattern="[0]{1}[0-9]{9}">
                  <input type="tel" class="form-control" placeholder="分機" id="fax_extent" name="fax_extent" pattern="[0-9]{0-5}">
                </div>  
                <!-- 成員2 -->  
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">成員2</span>
                  </div>
                  <input type="text" class="form-control" id="mem2" name="mem2" placeholder="姓名" required>
                  <input type="text" name="sch2" id="sch2" class="form-control" placeholder="服務學校簡稱" required>
                </div>      
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">成員3</span>
                  </div>
                  <input type="text" class="form-control" id="mem3" name="mem3" placeholder="姓名" required>
                  <input type="text" name="sch3" id="sch3" class="form-control" placeholder="服務學校簡稱" required>
                </div>  
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">成員4</span>
                  </div>
                  <input type="text" class="form-control" id="mem4" name="mem4" placeholder="姓名" required>
                  <input type="text" name="sch4" id="sch4" class="form-control" placeholder="服務學校簡稱" required>
                </div>  
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">成員5</span>
                  </div>
                  <input type="text" class="form-control" id="mem5" name="mem5" placeholder="姓名" required>
                  <input type="text" name="sch5" id="sch5" class="form-control" placeholder="服務學校簡稱" required>
                </div>  
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">成員6</span>
                  </div>
                  <input type="text" class="form-control" id="mem6" name="mem6" placeholder="姓名" required>
                  <input type="text" name="sch6" id="sch6" class="form-control" placeholder="服務學校簡稱" required>
                </div>                                                                                                          
                <!-- 服務年資 -->
                <!--
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">服務年資</span>
                  </div>
                  <input type="number" class="form-control" placeholder="正式教師年資" id="teacherSeniority" name="teacherSeniority" required>
                  <input type="number" class="form-control" placeholder="現任學校年資" id="schoolSeniority" name="schoolSeniority" required>
                </div>
                -->
                <!-- 評選類別 -->
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">評選類別</span>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline pt-2 pl-5">
                    <input type="radio" class="custom-control-input" id="cat1" name="cat" value="1">
                    <label class="custom-control-label" for="cat1">資訊科技教學組</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline pt-2">
                    <input type="radio" class="custom-control-input" id="cat2" name="cat" value="2">
                    <label class="custom-control-label" for="cat2">一般科目教學組</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline pt-2">
                    <input type="radio" class="custom-control-input" id="cat3" name="cat" value="3">
                    <label class="custom-control-label" for="cat3">行政類</label>
                  </div>
                </div>
                <!-- 主題名稱 -->
                <div class="input-group pt-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text">主題名稱</span>
                  </div>
                  <input type="text" class="form-control" id="theme" name="theme" required>
                </div>
                <button class="btn btn-primary mt-2 text-left" type="submit">送出</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
	</body>
</html>
<?php } ?>