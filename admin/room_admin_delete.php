<?
//관리자 방 삭제 페이지
include "../lib/common.php";
$query = mysql_query("select * from user where u_id='$_SESSION[fr_u_id]'");
$user = mysql_fetch_array($query);

$query2 = mysql_query("select * from room where r_num='$_GET[r_num]'");
$room = mysql_fetch_array($query2);

?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 관리자 방 관리</title>
</head>
<body>
<?
if($user['u_lv'] == "m") {
?>
<div id="room_admin">
<div id="head">
	<div id="title">
	관리자모드 > 방 삭제
	</div>
</div>
<div id="body">
	<div id="body_title">
		<span class="body_title_f">▶</span> 방 등록관리 > 삭제
	</div>
	<div>
	<?

	unlink("../roomimg/".$room['r_photo']);
	if($room['r_photo_k']) unlink("../roomimg/".$room['r_photo_k']);
	if($room['r_photo_b']) unlink("../roomimg/".$room['r_photo_b']);
	if($room['r_photo_r']) unlink("../roomimg/".$room['r_photo_r']);
	mysql_query("delete from room where r_num='$room[r_num]'");
	alert("삭제를 완료했습니다.");
	echo "
	<script>
	opener.location.reload();
	</script>
	";
	movepage("room_admin.php");

	?>
	</div>
</div>
</div>
<?
} else {
	alertback("잘못된 접근입니다.");
}
?>
</body>
</html>