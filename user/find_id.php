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
<title>찾아방 - 아이디 찾기</title>
<script type="text/javascript">
function check_input() {
	
	if(!document.find_id.u_name.value) {
		alert('이름을 입력하세요.');
		document.find_id.u_name.focus();
	} else if(!document.find_id.u_email.value) {
		alert('이메일을 입력하세요.');
		document.find_id.u_email.focus();
	} else {
		document.find_id.submit();
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
	아이디 찾기 :)
	</div>
</div>
<div id="body">
	<div id="user_login">
	<form name="find_id" id="find_id" action="find_id_ok.php" method="post">

		<table width="100%" border="0" cellpadding="10">
			<tr>
				<td width="80"><span class="font_user_login">이름</span></td>
				<td><input type="text" name="u_name" id="u_name" onKeyUp="if(event.keyCode==13) document.find_id.u_email.focus();" /></td>
			</tr>
			<tr>
				<td><span class="font_user_login">E-mail</span></td>
				<td><input type="text" name="u_email" id="u_email"onKeyUp="if(event.keyCode==13) check_input();" /></td>
			</tr>
		</table>
	</form>
	</div>
	<div id="btn_ok">
		<input style="height:40px;width:200px;border: 0px;background-color: #555;font-size: 13pt;color: #fff;" type="button" onclick="check_input();" value="찾기" />
		<input type="button" onclick="javascript:self.close();" value="종료" />
	</div>
</div>
</div>
</body>
</html>