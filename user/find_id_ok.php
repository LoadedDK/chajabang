<?
//패스워드 찾기 폼
include "../lib/common.php";
log_se_check();
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 아이디 찾기</title>
</head>
<body>
<?
if(!$_POST['u_name']) {
	alertback("잘못된 접근입니다.");
} else {
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
<?
$query_u = mysql_query("select * from user where u_name='$_POST[u_name]' and u_email='$_POST[u_email]'");
$user = mysql_fetch_array($query_u);
if($user) {
?>
<div id="head">
	<div id="title">
	아이디 찾기 성공
	</div>
</div>
<div id="body">
	<div id="user_login">
	<div id="body">
		<div id="user_modify">
			<p style="color:#0099cc;">I D : <?echo substr($user['u_id'],-0, -3)."***"; ?></p>
			<p>로그인 해주세요.</p>
		</div>
		<div id="btn_can">
			<input style="height:40px;width:200px;border: 0px;background-color: #3399ff;font-size: 13pt;color: #fff;" type="button" onclick="document.location='login.php';" value="로그인" />
			<input type="button" onclick="javascript:self.close();" value="완료" />
		</div>
	</div>
</div>
</div>
<?
} else {
	alert("입력한 정보가 틀렸습니다. 초기화면으로 이동합니다.");
	movepage("find_id.php");
}
}
?>
</body>
</html>