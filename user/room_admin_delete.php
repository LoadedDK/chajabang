<?
//회원방 관리 페이지
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
<title>찾아방 - 회원 방 관리</title>
</head>
<body>
<div id="room_admin">
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
	<? echo "ID : ".$user['u_id']." / 이름 : ".$user['u_name'];?>
	</div>
</div>
<div id="body">
	<div id="body_title">
		<span class="body_title_f">▶</span> 방 등록관리 > 삭제
	</div>
	<div>
	<?
	if($user['u_id'] != $room['u_id']) {
	alertback("잘못된 접근입니다.");
	} else {
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
	}
	?>
	</div>
</div>
</div>
</body>
</html>