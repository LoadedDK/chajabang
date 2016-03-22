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
	
	if(!document.find_pass.u_pw.value) {
		alert('패스워드를 입력하세요.');
		document.find_pass.u_pw.focus();
	} else if(document.find_pass.u_pw.value.length < 5) {
		alert('패스워드는 최대 6자리 이상 입력하세요.');
		document.find_pass.u_pw.focus();
	} else if(!document.find_pass.u_pw_ok.value) {
		alert('패스워드를 입력하세요.');
		document.find_pass.u_pw_ok.focus();
	} else if(upw1.value != upw2.value) {
		alert('패스워드를  바르게 입력하세요.');
		document.find_pass.u_pw.focus();
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
	$query_u = mysql_query("select * from user where u_id='$_POST[u_id]' and u_ans='$_POST[u_ans]'");
	$user = mysql_fetch_array($query_u);
	if($user) {
	?>
	<form name="find_pass" id="find_pass" action="find_password_ok.php" method="post">
	<input type="hidden" name="u_id" value="<?echo $user['u_id']; ?>" />
		<table width="100%" border="0" cellpadding="10">
			<tr>
				<td><span class="font_user_join_a">새 암호</span></td>
				<td><input type="password" name="u_pw" id="u_pw" onKeyUp="if(event.keyCode==13) document.find_pass.u_pw_ok.focus();" /></td>
			</tr>
			<tr>
				<td><span class="font_user_join_a">암호 확인</span></td>
				<td><input type="password" name="u_pw_ok" id="u_pw_ok" onKeyUp="if(event.keyCode==13) check_input();" /></td>
			</tr>
		</table>
	</form>
	</div>
	<div id="btn_ok">
		<input style="height:40px;width:200px;border: 0px;background-color: #555;font-size: 13pt;color: #fff;" type="button" onclick="check_input();" value="변경" />
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