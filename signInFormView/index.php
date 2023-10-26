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
		<script src="/include/autoLogout.js"></script>
    <script src="script.js"></script>
		<style>
			a:link, a:visited { color: white }
		</style>
  </head>
  <body onload="init()">
		<!-- 標題列 -->
 		<?php menu('signInFormView'); ?>
		<div class="container-fluid">
			<div class="row mt-5">
				<div class="col-10 offset-col-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
          <?php if ( $_SESSION['rol'] == 'person' ) { ?>
            <div class="card">
              <div class="card-header text-center bg-warning text-white"><h4>報名資料檢視與修改</h4></div>
              <div class="card-body">
                <form action="writeToMariaDB.php" method="post">
                  <input type="hidden" name="table" id="table" value="person">
                  <!-- 姓名 -->  
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">姓名</span>
                    </div>
                    <input type="text" class="form-control" id="name" name="name" required value="<?php echo $_SESSION['name']; ?>">
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
                  <!-- 服務學校 -->
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">服務學校</span>
                    </div>
                    <input type="text" class="form-control" placeholder="全銜" id="schoolFull" name="schoolFull" required value="<?php echo $_SESSION['schoolFull']; ?>">
                    <input type="text" class="form-control" placeholder="簡稱" id="school" name="school" required value="<?php echo $_SESSION['school']; ?>">
                  </div>                
                  <!-- 行動電話 -->
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">行動電話</span>
                    </div>
                    <input type="tel" class="form-control" placeholder="09123456789" id="cellPhone" name="cellPhone" required pattern="[0]{1}[0-9]{9}" value="<?php echo $_SESSION['cellPhone']; ?>">
                  </div>
                  <!-- 辦公室電話 -->
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">辦公室電話</span>
                    </div>
                    <input type="tel" class="form-control" placeholder="格式：0227091630" id="officeTel" name="officeTel" required pattern="[0]{1}[0-9]{9}" value="<?php echo $_SESSION['officeTel']; ?>">
                    <input type="tel" class="form-control" placeholder="分機" id="officeTel_ext" name="officeTel_ext" pattern="[0-9]{0-5}" value="<?php echo $_SESSION['officeTel_ext']; ?>">
                  </div>
                  <!-- 傳真電話 -->
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">傳真電話</span>
                    </div>
                    <input type="tel" class="form-control" placeholder="格式：0227849909" id="fax" name="fax" pattern="[0]{1}[0-9]{9}" value="<?php echo $_SESSION['fax']; ?>">
                    <input type="tel" class="form-control" placeholder="分機" id="fax_extent" name="fax_extent" pattern="[0-9]{0-5}" value="<?php echo $_SESSION['fax_extent']; ?>">
                  </div>                
                  <!-- 服務年資 -->
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">服務年資</span>
                    </div>
                    <input type="number" class="form-control" placeholder="正式教師年資" id="teacherSeniority" name="teacherSeniority" required value="<?php echo $_SESSION['teacherSeniority']; ?>">
                    <input type="number" class="form-control" placeholder="現任學校年資" id="schoolSeniority" name="schoolSeniority" required value="<?php echo $_SESSION['schoolSeniority']; ?>">
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
                    <input type="text" class="form-control" id="theme" name="theme" required value="<?php echo $_SESSION['theme']; ?>">
                  </div>
                  <button class="btn btn-warning mt-2 text-left" type="submit">送出</button>
                </form>
              </div>
            </div>
          <?php } else { ?>
            <div class="card">
              <div class="card-header text-center bg-warning text-white"><h4>報名資料檢視與修改</h4></div>
              <div class="card-body">
                <form action="writeToMariaDB.php" method="post">
                  <input type="hidden" name="table" id="table" value="team">
                  <!-- 服務學校 -->
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">學校</span>
                    </div>
                    <input type="text" class="form-control" placeholder ="全銜" id="schoolFull" name="schoolFull" required value="<?php echo $_SESSION['schoolFull']; ?>">
                    <input type="number" class="form-control" placeholder="人數" id="members" name="members" required min="3" max="6" onblur="setMembers()" value="<?php echo $_SESSION['members']; ?>">
                  </div>                                       
                  <!-- 成員1 -->  
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">成員1(隊長)</span>
                    </div>
                    <input type="text" class="form-control" id="captain" name="captain" placeholder="成員1(隊長)姓名" required value="<?php echo $_SESSION['name']; ?>">
                    <input type="text" name="school" id="school" class="form-control" placeholder="服務學校簡稱" required value="<?php echo $_SESSION['school']; ?>">
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
                    <input type="tel" class="form-control" placeholder="09123456789" id="cellPhone" name="cellPhone" required pattern="[0]{1}[0-9]{9}" value="<?php echo $_SESSION['cellPhone']; ?>">
                  </div>
                  <!-- 辦公室電話 -->
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">辦公室電話</span>
                    </div>
                    <input type="tel" class="form-control" placeholder="格式：0227091630" id="officeTel" name="officeTel" required pattern="[0]{1}[0-9]{9}" value="<?php echo $_SESSION['officeTel']; ?>">
                    <input type="tel" class="form-control" placeholder="分機" id="officeTel_ext" name="officeTel_ext" pattern="[0-9]{0-5}" value="<?php echo $_SESSION['officeTel_ext']; ?>">
                  </div>
                  <!-- 傳真電話 -->
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">傳真電話</span>
                    </div>
                    <input type="tel" class="form-control" placeholder="格式：0227849909" id="fax" name="fax" pattern="[0]{1}[0-9]{9}"  value="<?php echo $_SESSION['fax']; ?>">
                    <input type="tel" class="form-control" placeholder="分機" id="fax_extent" name="fax_extent" pattern="[0-9]{0-5}" value="<?php echo $_SESSION['fax_extent']; ?>">
                  </div>  
                  <!-- 成員2 -->  
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">成員2</span>
                    </div>
                    <input type="text" class="form-control" id="mem2" name="mem2" placeholder="姓名" required value="<?php echo $_SESSION['mem2']; ?>">
                    <input type="text" name="sch2" id="sch2" class="form-control" placeholder="服務學校簡稱" required value="<?php echo $_SESSION['sch2']; ?>">
                  </div>      
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">成員3</span>
                    </div>
                    <input type="text" class="form-control" id="mem3" name="mem3" placeholder="姓名" required value="<?php echo $_SESSION['mem3']; ?>">
                    <input type="text" name="sch3" id="sch3" class="form-control" placeholder="服務學校簡稱" required  value="<?php echo $_SESSION['sch3']; ?>">
                  </div>  
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">成員4</span>
                    </div>
                    <input type="text" class="form-control" id="mem4" name="mem4" placeholder="姓名" required  value="<?php echo $_SESSION['mem4']; ?>">
                    <input type="text" name="sch4" id="sch4" class="form-control" placeholder="服務學校簡稱" required value="<?php echo $_SESSION['sch4']; ?>">
                  </div>  
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">成員5</span>
                    </div>
                    <input type="text" class="form-control" id="mem5" name="mem5" placeholder="姓名" required  value="<?php echo $_SESSION['mem5']; ?>">
                    <input type="text" name="sch5" id="sch5" class="form-control" placeholder="服務學校簡稱" required value="<?php echo $_SESSION['sch5'] ?>">
                  </div>  
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text">成員6</span>
                    </div>
                    <input type="text" class="form-control" id="mem6" name="mem6" placeholder="姓名" required value="<?php echo $_SESSION['mem6']; ?>">
                    <input type="text" name="sch6" id="sch6" class="form-control" placeholder="服務學校簡稱" required value="<?php echo $_SESSION['sch6']; ?>">
                  </div>                                                                                                          
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
                    <input type="text" class="form-control" id="theme" name="theme" required value="<?php echo $_SESSION['theme']; ?>">
                  </div>
                  <button class="btn btn-warning mt-2 text-left" type="submit">送出</button>
                </form>
              </div>
            </div>
          <?php } ?>
				</div>
			</div>
		</div>
	</body>
  <script>
    let sex = "<?php echo $_SESSION['sex']; ?>";
    let pCat = "<?php echo $_SESSION['pCat']; ?>";
    let cat = "<?php echo $_SESSION['cat']; ?>";
    setMembers();
  </script>
</html>
<?php
} 
?>