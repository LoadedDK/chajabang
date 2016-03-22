<?
//회원가입 : 가입폼
include "../lib/common.php";
log_se_check();
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 회원가입</title>
<script type="text/javascript">
function check_input() {
	var upw1 = document.getElementById('u_pw')
	var upw2 = document.getElementById('u_pw_ok')
	
	if(!document.join.u_id.value) {
		alert('아이디를 입력하세요.');
		document.join.u_id.focus();
	} else if(!document.join.u_pw.value) {
		alert('패스워드를 입력하세요.');
		document.join.u_pw.focus();
	} else if(document.join.u_pw.value.length < 5) {
		alert('패스워드는 최대 6자리 이상 입력하세요.');
		document.join.u_pw.focus();
	} else if(!document.join.u_pw_ok.value) {
		alert('패스워드를 입력하세요.');
		document.join.u_pw_ok.focus();
	} else if(upw1.value != upw2.value) {
		alert('패스워드를  바르게 입력하세요.');
		document.join.u_pw.focus();
	} else if(!document.join.u_name.value) {
		alert('이름을 입력하세요.');
		document.join.u_name.focus();
	} else if(!document.join.u_email.value) {
		alert('이메일을 입력하세요.');
		document.join.u_email.focus();
	} else if(!document.join.u_phone.value) {
		alert('연락처를 입력하세요.');
		document.join.u_phone.focus();
	} else if(!document.join.u_ans.value) {
		alert('질문에 대한 답변을 입력하세요.');
		document.join.u_ans.focus();
	} else {
		document.join.submit();
	} 
}
function fncHangulCheck()
{
    var obj     = event.srcElement;
    obj.value   = obj.value.replace(/[ㄱ-ㅎ|ㅏ-ㅣ|가-힝]/,'');
	obj.value   = obj.value.replace(/[`~!@#$%^&*\\\'\";:\/?]/,'');
	obj.value   = obj.value.replace(/\W|\s/,'');
}
function digitCheck()
{
    var obj  = event.srcElement;
    obj.value = obj.value.replace(/[^\d]/g,'');
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
	<?
	if($_GET['type'] == "s") 
		echo "회원가입 > 가입유형 선택 > 방주인";
	else if($_GET['type'] == "c") 
		echo "회원가입 > 가입유형 선택 >  일반회원";
	?>
	</div>
</div>
<div id="body">
	<div id="user_join">
	<form name="join" id="join" action="join_ok.php" method="post">
	<?
	if($_GET['type'] == "s") {
	?>
	<input type="hidden" name="type" value="s" />
	<?
	} elseif($_GET['type'] == "c") {
	?>
	<input type="hidden" name="type" value="c" />
	<?
	}
	?>	
		<table width="100%" border="0" cellpadding="10">
			<tr>
				<td width="80"><span class="font_user_join_a">아이디</span></td>
				<td><input style="width:150px;" type="text" name="u_id" id="u_id" onkeyup="javascript:fncHangulCheck();" /></td>
			</tr>
			<tr>
				<td><span class="font_user_join_a">암호</span></td>
				<td><input style="width:170px;" type="password" name="u_pw" id="u_pw" /></td>
			</tr>
			<tr>
				<td><span class="font_user_join_a">암호 확인</span></td>
				<td><input style="width:170px;" type="password" name="u_pw_ok" id="u_pw_ok" /></td>
			</tr>
			<tr>
				<td><span class="font_user_join_a">이름</span></td>
				<td><input style="width:100px;" type="text" size="10" name="u_name" id="u_name" /></td>
			</tr>
			<tr>
				<td><span class="font_user_join_a">이메일</span></td>
				<td><input style="width:300px;" type="text" size="30" name="u_email" id="u_email" />
				</td>
			</tr>
			<tr>
				<td><span class="font_user_join_a">연락처</span></td>
				<td><input type="text" name="u_phone" id="u_phone" onkeyup="digitCheck()" /></td>
			</tr>
			<tr>
				<td><span class="font_user_join_a">패스워드<br/>분실 질문</span></td>
				<td>
					<select  style="height:30px;" name="u_qes">
						<option>초등학교 가장 기억에 남는 선생님 성함은?</option>
						<option>가장 소중하게 생각하는 친구 이름은?</option>
						<option>나의 좌우명은?</option>
						<option>보물 1호는?</option>
						<option>내가 제일 좋아하는 위인은?</option>
						<option>아버지 성함은?</option>
						<option>나의 초등학교 이름은?</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><span class="font_user_join_a">답변</span></td>
				<td><input type="text" name="u_ans" id="u_ans" /></td>
			</tr>
		</table><br /><br />
		<input style="height:40px;width:200px;border: 0px;background-color: #555;font-size: 13pt;color: #fff;" type="button" onclick="check_input();" value="가입" />&nbsp;&nbsp;
		<input style="height:40px;width:200px;border: 0px;background-color: #bbb;font-size: 13pt;color: #fff;" type="button" onclick="javascript:self.close();" value="취소" />
	</form>
	</div>
</div>
</div>
</body>
</html>