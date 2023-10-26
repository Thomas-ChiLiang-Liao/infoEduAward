<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_POST['tableId'] . ( $_POST['filename'] == 'regForm.pdf' ? ' 報名表' : ' 成果資料'); ?></title>
</head>
<body>
  <iframe src="../files/<?php echo "$_POST[tableId]_$_POST[filename]"; ?>" width="100%" height="1000" frameborder="0"></frame>
</body>
</html>