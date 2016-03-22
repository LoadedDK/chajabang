<?
//로그인 폼
include "../lib/common.php";
log_se_check();
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 로그인</title>
<script type="text/javascript">
function check_input() {
	
	if(!document.login.u_id.value) {
		alert('아이디를 입력하세요.');
		document.login.u_id.focus();
	} else if(!document.login.u_pw.value) {
		alert('패스워드를 입력하세요.');
		document.login.u_pw.focus();
	} else {
		document.login.submit();
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
	로그인 :)
	</div>
</div>
<div id="body">
	<div id="user_login">
	<form name="login" id="login" action="login_ok.php" method="post">

		<table width="100%" border="0" cellpadding="10">
			<tr>
				<td width="80"><span class="font_user_login">I D</span></td>
				<td><input type="text" name="u_id" id="u_id"
<input name="passwd" type="password"  size="10"  onKeyUp="if(event.keyCode==13) document.login.u_pw.focus();"  /></td>
			</tr>
			<tr>
				<td><span class="font_user_login">Password</span></td>
				<td><input type="password" name="u_pw" id="u_pw" onKeyUp="if(event.keyCode==13) check_input();" /></td>
			</tr>
		</table>
	</form>
	</div>
	<div id="btn_ok">
		<input style="height:40px;width:200px;border: 0px;background-color: #555;font-size: 13pt;color: #fff;" type="button" onclick="check_input();" value="로그인" />
		<input type="button" onclick="javascript:self.close();" value="종료" />
	</div>
	<div id="find">
		<p><a href="find_id.php">아아디를 잃어버리셨나요?</a></p>
		<p><a href="find_password.php">패스워드를 잃어버리셨나요?</a></p>
	</div>
</div>
</div>
</body>
</html>