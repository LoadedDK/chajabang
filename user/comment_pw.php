<?
//유저 소통게시판
include "../lib/common.php";
?>
<html>
<head>
<link rel="stylesheet" href="../css/commu.css" />
<meta charset="utf-8" />
<title>찾아방 - 소통게시판</title>
<script type="text/javascript">
function check_input() {
	 if(!document.commu.c_pw.value) {
		alert('패스워드를 입력하세요.');
		document.commu.c_pw.focus();
	} else {
		document.commu.submit();
	} 
}
</script>
</head>
<body>
<div id="wrapper">
<div id="head">
	<div id="title">
	<b><span style="color:#000;">암호 4자리를 입력해주세요.</span></b>
	</div>
	<br/>
	<div id="input_content">
	<form id="commu" name="commu" action="comment_delete.php" method="post">
	<input type="hidden" name="c_num" value="<?echo $_GET['c_num']; ?>" />
			<span style="font-size:12pt; color:#666;">패스워드 4자리 : </span><input type="password" id="c_pw" name="c_pw" style="width:100px;" />
			<input type="button" onclick="check_input()" value="완료" />
	</form>
	</div>
</div>
</div>
</body>
</html>