<?
//회원삭제 OK
include "../lib/common.php";
$query = mysql_query("select * from user where u_id='$_SESSION[fr_u_id]'");
$user = mysql_fetch_array($query);
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 회원 탈퇴</title>
</head>
<body>
<?
if(!$user['u_lv'] == "m") {
alertback("잘못된 접근입니다.");
} else {

$query_u2 = mysql_query("select * from user where u_id='$_GET[u_id]'");
$user_2 = mysql_fetch_array($query_u2);

$query_r = mysql_query("select * from room where u_id='$user_2[u_id]'");
while($room = mysql_fetch_array($query_r)) {
	unlink("../roomimg/".$room['r_photo']);
	if($room['r_photo_k']) unlink("../roomimg/".$room['r_photo_k']);
	if($room['r_photo_b']) unlink("../roomimg/".$room['r_photo_b']);
	if($room['r_photo_r']) unlink("../roomimg/".$room['r_photo_r']);
	mysql_query("delete from room where r_num='$room[r_num]'");
}
mysql_query("delete from user where u_id='$user_2[u_id]'");
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
				회원삭제가 완료되었습니다.
			</tr>
		</table>
	</form>
	</div>
	<div id="btn_ok">
		<input type="button" onclick="window.location='user_admin.php';" value="목록으로" />
	</div>
</div>
</div>
<?
}
?>
</body>
</html>