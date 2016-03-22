<?
//회원가입 : 가입처리
include "../lib/common.php";
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 회원가입</title>
</head>
<body>
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
if($_POST['u_name'] && $_POST['u_email'] && $_POST['u_phone']) {
mysql_query("update user set u_pw=password('$_POST[u_pw]'), u_email='$_POST[u_email]', u_phone='$_POST[u_phone]' where u_id='$_SESSION[fr_u_id]'");	
?>
<div id="head">
	<div id="title">회원정보 수정 성공</div>
</div>
<div id="body">
	<div id="user_modify">
		<p style="color:#0099cc;"><?echo $_POST['u_id']; ?>님, 회원정보 수정을 정상적으로 완료하였습니다.</p>
		<p>많은 이용 부탁드립니다.</p>
	</div>
	<div id="btn_can">
		<input type="button" onclick="javascript:self.close();" value="완료" />
	</div>
</div>
<?
} else {
	alertback("잘못된 접근입니다!");
}
?>
</div>
</body>
</html>