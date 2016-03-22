<?
//관리자 회원정보 수정폼
include "../lib/common.php";
$query_u = mysql_query("select * from user where u_id='$_SESSION[fr_u_id]'");
$user = mysql_fetch_array($query_u);
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 관리자 정보 수정</title>
<script type="text/javascript">
function check_input() {
	var upw1 = document.getElementById('u_pw')
	var upw2 = document.getElementById('u_pw_ok')
	
	if(!document.modify.u_pw.value) {
		alert('패스워드를 입력하세요.');
		document.modify.u_pw.focus();
	} else if(!document.modify.u_pw_ok.value) {
		alert('패스워드를 입력하세요.');
		document.modify.u_pw_ok.focus();
	} else if(document.modify.u_pw.value.length < 5) {
		alert('패스워드는 최대 6자리 이상 입력하세요.');
		document.modify.u_pw.focus()
	} else if(upw1.value != upw2.value) {
		alert('패스워드를  바르게 입력하세요.');
		document.modify.u_pw.focus();
	} else if(!document.modify.u_name.value) {
		alert('이름을 입력하세요.');
		document.modify.u_name.focus();
	} else if(!document.modify.u_email.value) {
		alert('이메일을 입력하세요.');
		document.modify.u_email.focus();
	} else if(!document.modify.u_phone.value) {
		alert('연락처를 입력하세요.');
		document.modify.u_phone.focus();
	} else {
		document.modify.submit();
	} 
}

function digitCheck()
{
    var obj  = event.srcElement;
    obj.value = obj.value.replace(/[^\d]/g,'');
}
</script>
</head>
<body>
<?
if($user['u_lv'] == "m") {
$query_u2 = mysql_query("select * from user where u_id='$_GET[u_id]'");
$user2 = mysql_fetch_array($query_u2);
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
	회원정보 수정 페이지입니다.
	</div>
</div>
<div id="body">
	<div id="user_modify">
	<form name="modify" id="modify" action="user_modify_ok.php" method="post">
	<input type="hidden" name="type" value="s" />
		<table width="100%" border="0" cellpadding="10">
			<tr>
				<td width="80"><span class="font_user_modify_a">아이디</span></td>
				<td><input style="background-color:#eee;" type="text" name="u_id" id="u_id" readonly value="<?echo $user2['u_id']; ?>" /></td>
			</tr>
			<tr>
				<td><span class="font_user_modify_a">암호</span></td>
				<td><input type="password" name="u_pw" id="u_pw" /></td>
			</tr>
			<tr>
				<td><span class="font_user_modify_a">암호 확인</span></td>
				<td><input type="password" name="u_pw_ok" id="u_pw_ok" /></td>
			</tr>
			<tr>
				<td><span class="font_user_modify_a">이름</span></td>
				<td><input style="background-color:#eee;" type="text" size="10" name="u_name" id="u_name" readonly value="<?echo $user2['u_name']; ?>" /></td>
			</tr>
			<tr>
				<td><span class="font_user_modify_a">이메일</span></td>
				<td><input type="text" size="30" name="u_email" id="u_email" value="<?echo $user2['u_email']; ?>" /></td>
			</tr>
			<tr>
				<td><span class="font_user_modify_a">연락처</span>	</td>
				<td><input type="text" name="u_phone" id="u_phone" value="<?echo $user2['u_phone']; ?>" onkeyup="digitCheck()" /></td>
			</tr>
		</table><br /><br />
		<input style="height:40px;width:200px;border: 0px;background-color: #555;font-size: 13pt;color: #fff;" type="button" onclick="check_input();" value="수정완료" />&nbsp;&nbsp;
		<input style="height:40px;width:200px;border: 0px;background-color: #bbb;font-size: 13pt;color: #fff;" type="button" onclick="javascript:self.close();" value="취소" />
	</form>
	</div>
</div>
</div>
<?
} else {
	alertback('관리자 계정이 아닙니다.');
}
?>
</body>
</html>