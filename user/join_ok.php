<?
//회원가입 : 가입처리
include "../lib/common.php";
log_se_check();
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

<!-- 중복체크 -->
<?
$query = mysql_query("select u_id from user where u_id='$_POST[u_id]'");
$user_check = mysql_fetch_array($query);
if($user_check) {
?>
<div id="head">
	<div id="title">회원가입 > 가입유형 선택 > 방주인 > 가입실패</div>
</div>
<div id="body">
	<div id="user_join">
	<form name="join" id="join" action="join_ok.php" method="post">
		<p>동일한 아이디가 존재하여 회원가입에 실패하였습니다.<br/>다시 시도해 주세요.</p>
	</form>
	</div>
	<div id="btn_can">
		<input style="height:40px;width:200px;border: 0px;background-color: #555;font-size: 13pt;color: #fff;" type="button" onclick="history.back();" value="뒤로가기" />
		<input type="button" onclick="javascript:self.close();" value="취소" />
	</div>
</div>
<?
} else {
mysql_query("insert into user(u_id,u_pw,u_name,u_email,u_phone,u_lv,u_qes,u_ans,u_join_date)
values('$_POST[u_id]',password('$_POST[u_pw]'),'$_POST[u_name]','$_POST[u_email]','$_POST[u_phone]','$_POST[type]','$_POST[u_qes]','$_POST[u_ans]',now())");
?>
<div id="head">
	<div id="title">회원가입 > 가입유형 선택 > 방주인 > 가입성공</div>
</div>
<div id="body">
	<div id="user_join">
	<form name="join" id="join" action="join_ok.php" method="post">
		<p style="color:#0099cc;"><?echo $_POST['u_id']; ?>님, 가입을 축하합니다.</p>
		<p>로그인 해주세요.</p>
	</form>
	</div>
	<div id="btn_can">
		<input style="height:40px;width:200px;border: 0px;background-color: #3399ff;font-size: 13pt;color: #fff;" type="button" onclick="document.location='login.php';" value="로그인" />
		<input type="button" onclick="javascript:self.close();" value="종료" />
	</div>
</div>
<?
}
?>
</div>
</body>
</html>