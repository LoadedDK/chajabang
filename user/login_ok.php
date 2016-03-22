<?
//로그인 처리
include "../lib/common.php";
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 로그인</title>
</head>
<body>
<?
$query = mysql_query("select * from user where u_id='$_POST[u_id]' and u_pw=password('$_POST[u_pw]')");
$login_check = mysql_fetch_array($query);
if($login_check) {
	$_SESSION['fr_u_id'] = $login_check['u_id'];
	echo "
	<script>
	opener.location.reload();
	self.close();
	</script>
	";
} else {
	alertback('이메일 혹은 패스워를 바르게 입력하세요.');
}
?>
</body>
</html>