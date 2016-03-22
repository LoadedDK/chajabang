<?
//회원탈퇴
include "../lib/common.php";
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 회원 탈퇴</title>
<script type="text/javascript">
function check_input() {
	if(!document.brake.u_pw.value) {
		alert('패스워드를 입력하세요.');
		document.brake.u_pw.focus();
	} else {
		document.brake.submit();
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
	회원 탈퇴 :)
	</div>
</div>
<div id="body">
	<div id="user_login">
	<form name="brake" id="brake" action="brake_away_next.php" method="post">

		<table width="100%" border="0" cellpadding="10">
			<tr>
				<td><span class="font_user_login">Password</span></td>
				<td><input type="password" name="u_pw" id="u_pw" onKeyUp="if(event.keyCode==13) check_input();" /></td>
			</tr>
		</table>
	</form>
	</div>
	<div id="btn_ok">
		<input style="height:40px;width:200px;border: 0px;background-color: #555;font-size: 13pt;color: #fff;" type="button" onclick="check_input();" value="계속" />
		<input type="button" onclick="javascript:self.close();" value="종료" />
	</div>
</div>
</div>
</body>
</html>