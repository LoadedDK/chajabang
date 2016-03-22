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
$result = mysql_query("select * from comment where c_num='$_POST[c_num]' and c_pw=password('$_POST[c_pw]')");
$comment = mysql_fetch_array($result);

if($comment) {
mysql_query("delete from comment where c_num='$_POST[c_num]'");
echo "
	<script>
	opener.location.reload();
	window.close();
	</script>
	";
} else {
	alert("비밀번호가 틀렸습니다.");
	echo "
	<script>
	window.close();
	</script>
	";
}
?>
</div>
</div>
</body>
</html>