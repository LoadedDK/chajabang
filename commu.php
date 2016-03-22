<?
//유저 소통게시판
include "../lib/common.php";
?>
<html>
<head>
<link rel="stylesheet" href="../css/commu.css" />
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
<div id="head">
	<div id="title">
	<b>한줄게시판</b>
	<p>찾아방에 대한 의견이나 후기, 기타 코멘트등 자유롭게 작성해주세요.</p>
	</div>
	<div id="input_content">
	<form name="commu">
		<div id="input_content_top">
		<?
		for($i=1;$i<=26;$i++) {
		if($i < 10)
			$j = "0".$i;
		else
			$j = $i;
		if($i == 11 || $i == 21) echo "<br/>";
		?>
		
		<input type="radio" name="icon" value="i<?echo $j; ?>"><img src="../icon/i<?echo $j; ?>.png" width="30" height="30" alt="icon" />&nbsp;&nbsp;
		<?
		}
		?>
		</div><br/>
		<div id="input_content_left">
			<textarea cols="90" rows="3" name="text"></textarea>
		</div>
		<div id="input_content_right">
			<input style="width:100px; height:50px;" type="submit" value="작성" />
		</div>
	</form>
	</div>
</div>
<div id="body">

</div>
</div>
</body>
</html>