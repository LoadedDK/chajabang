<?
//유저 소통게시판
include "../lib/common.php";
?>
<html>
<head>
<link rel="stylesheet" href="../css/commu.css" />
<meta charset="utf-8" />
<title>찾아방 - 소통 게시판</title>
</head>
<body>
<div id="wrapper">
<div id="head">
	
</div>
<div id="body">
<?
$ip =  $_SERVER['REMOTE_ADDR'];

$result = mysql_query("select * from comment order by c_num desc");
$comment = mysql_fetch_array($result);

if($_SESSION['fr_u_id'] == "admin") {
	$date = date("Y/m/d H:i:s");
	mysql_query("insert into comment(c_name,c_icon,c_text,c_date,c_pw,c_ip)
	values('$_POST[c_name]','$_POST[c_icon]','$_POST[c_comment]','$date',password('$_POST[c_pw]'),'$ip')");
	movepage("commu.php");
} else {

	if($ip == $comment['c_ip']) {
		alert("같은 사용자가 글을 연속으로 올릴 수 없습니다.");
		movepage("commu.php");
	} elseif($_POST['c_name'] == "관리자") {
		alert("관리자 닉네임은 관리자 로그인 후에 작성해주세요.");
		movepage("commu.php");
	} else {
	$date = date("Y/m/d H:i:s");
	mysql_query("insert into comment(c_name,c_icon,c_text,c_date,c_pw,c_ip)
	values('$_POST[c_name]','$_POST[c_icon]','$_POST[c_comment]','$date',password('$_POST[c_pw]'),'$ip')");
	movepage("commu.php");
	}
}
?>
</div>
</div>
</body>
</html>