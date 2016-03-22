<?
//패스워드 찾기 폼
include "../lib/common.php";
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 회원 탈퇴</title>
</head>
<body>
<?
$query_u = mysql_query("select * from user where u_id='$_SESSION[fr_u_id]' and u_pw=password('$_POST[u_pw]')");
$user = mysql_fetch_array($query_u);
if($user) {
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
	회원 탈퇴 :)
	</div>
</div>
<div id="body">
	<div id="user_login">
	<form name="brake" id="brake" action="brake_away_ok.php" method="post">
		<input type="hidden" name="brake_value" value="1" />
		<table width="100%" border="0" cellpadding="10">
			<tr>
				지금 탈퇴하시면 업로드된 데이터들은 모두 소멸됩니다.<br/>
				계속 하시겠습니까?<br/>
			</tr>
		</table>
	</div>
	<div id="btn_ok">
		<input style="height:40px;width:200px;border: 0px;background-color: #555;font-size: 13pt;color: #fff;" type="submit" value="계속" />
		<input type="button" onclick="javascript:self.close();" value="종료" />
	</div>
	</form>
</div>
</div>
<?
} else {
	alertback("패스워드를 잘못입력하셨습니다.");
}
?>
</body>
</html>