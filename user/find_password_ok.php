<?
//패스워드 찾기 폼
include "../lib/common.php";
log_se_check();
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 패스워드 찾기</title>
</head>
<body>
<?
if(!$_POST['u_id']) {
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
<div id="head">
	<div id="title">
	패스워드 변경 성공
	</div>
</div>
<div id="body">
	<div id="user_login">
	<?
	mysql_query("update user set u_pw=password('$_POST[u_pw]') where u_id='$_POST[u_id]'");	
	?>
	<div id="body">
		<div id="user_modify">
			<p style="color:#0099cc;">패스워드 변경에 성공했습니다.</p>
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
}
?>
</body>
</html>