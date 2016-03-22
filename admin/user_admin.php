<?
//관리자 방관리 페이지
include "../lib/common.php";
$query = mysql_query("select * from user where u_id='$_SESSION[fr_u_id]'");
$user = mysql_fetch_array($query);
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 관리자 방 관리</title>
<script>
function popupCenter_b(url) {
	var newWindow = window.open(url, '_blank','width=900,height=700');

	if (window.focus) {
		newWindow.focus();
	}
} 
</script>
</head>
<body>
<?
if($user['u_lv'] == "m") {
?>
<div id="room_admin">
<div id="head">
	<div id="title">
	관리자모드 > 회원 관리
	</div>
</div>
<div id="body">
	<div id="room_admin_table">
	<table width="96%" border="0" cellspacing="0" cellpadding="7">
	<tr>
		<th width="40">번호</th>
		<th width="100">ID</td>
		<th width="300">이름</th>
		<th width="50">E-meail</th>
		<th width="60">연락처</th>
		<th width="100">등급</th>
		<th width="100">가입일</th>
	</tr>
	<?
	$i = 1;
	$query_a = mysql_query("select * from user order by u_join_date asc");
	while($user_a = mysql_fetch_array($query_a)) {
	if($user_a['u_lv'] == "m") continue; 
	?>
	<tr>
		<td><?echo $i; ?></td>
		<td><?echo $user_a['u_id']; ?></td>
		<td><?echo $user_a['u_name']; ?></td>
		<td><?echo $user_a['u_email']; ?></td>
		<td><?echo $user_a['u_phone']; ?></td>
		<td>
			<?
			if($user_a['u_lv'] == "m") echo "관리자";
			elseif($user_a['u_lv'] == "s") echo "방주인";
			elseif($user_a['u_lv'] == "c") echo "일반회원";
			?>
		</td>
		<td><?echo $user_a['u_join_date']; ?></td>
	</tr>
	<tr>
		<td colspan="9" style="text-align:left;">
		<input style="height:20px;width:60px;border: 0px;background-color: #cccc33;font-size: 9pt;color: #fff;" type="button" onclick="window.location='user_modify.php?u_id=<?echo $user_a['u_id']; ?>'" value="수정" />&nbsp;&nbsp;
		<input style="height:20px;width:60px;border: 0px;background-color: #999999;font-size: 9pt;color: #fff;" type="button" onClick="if (confirm('삭제하시겠습니까?')) location.href='user_brake_away_ok.php?u_id=<?echo $user_a['u_id']; ?>'" value="삭제" />&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
		<td colspan="9" style="text-align:left;">
		<hr />
		</td>
	</tr>
	<?
	$i++;
	}
	?>
	</table>
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