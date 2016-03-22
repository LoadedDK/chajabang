<?
//패스워드 찾기 폼
include "../lib/common.php";
session_cache_limiter("nocache,must-revalidate"); //history시 폼 값 저장
log_se_check();
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 패스워드 찾기</title>
<script type="text/javascript">
function check_input() {
	var upw1 = document.getElementById('u_pw')
	var upw2 = document.getElementById('u_pw_ok')
	
	if(!document.find_pass.u_ans.value) {
		alert('답변을 입력하세요.');
		document.find_pass.u_ans.focus();
	} else {
		document.find_pass.submit();
	} 
}
</script>
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
<div id="head">
	<div id="title">
	패스워드 찾기 :)
	</div>
</div>
<div id="body">
	<div id="user_login">
	<?
	$query_u = mysql_query("select * from user where u_id='$_POST[u_id]' and u_email='$_POST[u_email]'");
	$user = mysql_fetch_array($query_u);
	if($user) {
	?>
	<form name="find_pass" id="find_pass" action="find_password_next.php" method="post">
	<input type="hidden" name="u_id" value="<?echo $user['u_id']; ?>" />
		<table width="100%" border="0" cellpadding="10">
			<tr>
				<td><span class="font_user_join_a">질문</span></td>
				<td><span style="color:#0099cc" class="font_user_join_a"><?echo $user['u_qes']; ?></span></td>
			</tr>
			<tr>
				<td><span class="font_user_join_a">답변</span></td>
				<td><input type="text" name="u_ans" id="u_ans" /></td>
			</tr>
		</table>
	</form>
	</div>
	<div id="btn_ok">
		<input style="height:40px;width:200px;border: 0px;background-color: #555;font-size: 13pt;color: #fff;" type="button" onclick="check_input();" value="다음" />
		<input type="button" onclick="javascript:self.close();" value="종료" />
	</div>
	<?
	} else {
		alert("입력한 정보가 틀렸습니다. 초기화면으로 이동합니다.");
		movepage("find_password.php");
	}
	?>
</div>
</div>
</body>
</html>