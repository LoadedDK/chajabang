<?
//회원탈퇴 OK
include "../lib/common.php";
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 회원 탈퇴</title>
</head>
<body>
<?
if($_POST['brake_value'] == 1) {
$query_u = mysql_query("select * from user where u_id='$_SESSION[fr_u_id]'");
$user = mysql_fetch_array($query_u);

$query_r = mysql_query("select * from room where u_id='$user[u_id]'");
while($room = mysql_fetch_array($query_r)) {
	unlink("../roomimg/".$room['r_photo']);
	if($room['r_photo_k']) unlink("../roomimg/".$room['r_photo_k']);
	if($room['r_photo_b']) unlink("../roomimg/".$room['r_photo_b']);
	if($room['r_photo_r']) unlink("../roomimg/".$room['r_photo_r']);
	mysql_query("delete from room where r_num='$room[r_num]'");
}
mysql_query("delete from user where u_id='$user[u_id]'");
unset($_SESSION['fr_u_id']);
echo "
	<script>
	opener.location.reload();
	</script>
	";
?>
<div id="wrapper">
<div class="logo">
	<div id="logo_top">
	찾아<span class="logo_o">방</span>
	</div>
	<div id="logo_bottom">
	안동대학교자취방찾기프로젝트
	</div>
</div>
<div id="head">
	<div id="title">
	회원 탈퇴 :)
	</div>
</div>
<div id="body">
	<div id="user_login">
	<form name="brake" id="brake" action="brake_away_ok.php" method="post">
		<input type="hidden" name="brake_value" value="1" />
		<table width="100%" border="0" cellpadding="10">
			<tr>
				회원탈퇴가 완료되었습니다. 감사합니다.
			</tr>
		</table>
	</form>
	</div>
	<div id="btn_ok">
		<input type="button" onclick="javascript:self.close();" value="종료" />
	</div>
</div>
</div>
<?
} else {
	alert("잘못된 접근입니다. 창을 종료합니다.");
	self.close();
}
?>
</body>
</html>