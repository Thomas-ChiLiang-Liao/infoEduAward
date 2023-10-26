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
  <body>
		<!-- 標題列 -->
 		<?php menu('filesView'); ?>
		<div class="container-fluid">
			<div class="row mt-5">
				<div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
          <div class="card">
            <div class="card-header text-center bg-primary text-white">
              <h4><?php echo $_SESSION['theme'] ?></h4>
            </div>
            <div class="card-body">
              <form action="fileUploaded.php" method="post" enctype="multipart/form-data" id="fileUploadForm"></form>
              <form action="deleteFile.php" method="post" id="deleteForm">
                <input type="hidden" name="deleteFilename" id="deleteFilename">
              </form>
              <form action="pdfView.php" method="post" id="pdfViewForm" target="_blank">
                <input type="hidden" name="tableId" id="tableId">
                <input type="hidden" name="filename" id="filename">
              </form>
              <table class="table table-hover">
                <tr>
                  <td class="align-middle">報名表</td>
                  <td>
                    <?php if ( file_exists("../files/$_SESSION[tableId]_regForm.pdf") ) { ?>
                    <button class="btn btn-danger" onclick="deleteFile(<?php echo "'../files/$_SESSION[tableId]_regForm.pdf'"; ?>)">刪除</button>
                    <?php } else { ?>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="refForm" name="regForm" form="fileUploadForm" onchange="getFilename(this)">
                      <label class="custom-file-label text-secondary" for="regForm">請選擇上傳的檔案(*.pdf)</label>
                    </div>
                    <?php } ?>
                  </td>
                  <td class="align-middle">
                    <button class="btn btn-primary" <?php echo ( file_exists("../files/$_SESSION[tableId]_regForm.pdf") ? "" : "disabled" ); ?> onclick="pdfView(<?php echo "'$_SESSION[tableId]','regForm.pdf'"; ?>)">檢視</button>
                  </td>
                </tr>
                <tr>
                  <td class="align-middle">成果資料</td>
                  <td>
                    <?php if ( file_exists("../files/$_SESSION[tableId]_achievement.pdf") ) { ?>
                    <button class="btn btn-danger" onclick="deleteFile(<?php echo "'../files/$_SESSION[tableId]_achievement.pdf'"; ?>)">刪除</button> 
                    <?php } else { ?>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="achievement" name="achievement" form="fileUploadForm" onchange="getFilename(this)">
                      <label class="custom-file-label text-secondary" for="regForm">請選擇上傳的檔案(*.pdf)</label>
                    </div>  
                    <?php } ?>
                  </td>
                  <td class="align-middle">
                    <button class="btn btn-primary" <?php echo ( file_exists("../files/$_SESSION[tableId]_achievement.pdf") ? "" : "disabled" ); ?> onclick="pdfView(<?php echo "'$_SESSION[tableId]','achievement.pdf'"; ?>)">檢視</button>
                  </td>
                </tr>                
                <tr>
                  <td colspan="3"><button type="submit" class="btn btn-secondary" form="fileUploadForm">上傳</button></td>
                </tr>
              </table>
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