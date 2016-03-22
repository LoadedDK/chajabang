<?
//로그아웃
include "../lib/common.php";
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 로그아웃</title>
</head>
<body>
<?
unset($_SESSION['fr_u_id']);
movepage("../index.php");
?>
</body>
</html>