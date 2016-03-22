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
	관리자모드 > 방 관리
	</div>
</div>
<div id="body">
	<div id="body_title">
		<span class="body_title_f">▶</span> 방 등록관리
	</div>
	<input style="height:30px;width:150px;border: 0px;background-color: #ff6633;font-size: 13pt;color: #fff;" type="button" onclick="window.location='room_admin_regi.php'" value="방 등록하기" /><br/>
	<div id="room_admin_table">
	<table width="96%" border="0" cellspacing="0" cellpadding="7">
	<tr>
		<th width="40">번호</th>
		<th width="80">썸네일</th>
		<th width="100">방이름</td>
		<th width="300">방주소</th>
		<th width="50">종류</th>
		<th width="60">임대방식</th>
		<th width="100">보증금</th>
		<th width="150">가격</th>
		<th width="100">빈방유무</th>
	</tr>
	<?
	$i = 1;
	$query = mysql_query("select * from room order by r_date asc");
	while($room = mysql_fetch_array($query)) {
	?>
	<tr>
		<td><?echo $i; ?></td>
		<td>
		<?
		$img_thum_temp = @explode(",", $room['r_photo']); 
		$img_thum = $img_thum_temp[0];
		?>
		<img src="../roomimg/<?echo $img_thum;?>" width="70" height="70" alt="thum" />
		</td>
		<td><?echo $room['r_name']; ?></td>
		<td><?echo $room['r_address']; ?></td>
		<td style="font-weight:bold;">
		<?
		if($room['r_type'] == "o") echo "원룸";
		elseif($room['r_type'] == "t") echo "투룸";
		elseif($room['r_type'] == "m") echo "미니투룸";
		?>
		</td>
		<td style="font-weight:bold;">
		<?
		if($room['r_rent_type'] == "y") echo "사글세";
		elseif($room['r_rent_type'] == "m") echo "월세";
		elseif($room['r_rent_type'] == "j") echo "전세";
		?>
		</td>
		<td style="font-weight:bold; color:#009900;">
		<?
		if($room['r_deposit'] == 0) {
			echo "없음";
		} else {
			$deposit = substr($room['r_deposit'],-0, -4)."만원";
			echo $deposit;
		}
		?>
		</td>
		<td style="font-weight:bold; color:#ff6600;">
		<?
		if($room['r_rent_type'] == "y") {
			$pay_year = substr($room['r_pay_year'],-0, -4)."만원";
			echo $pay_year;
		} elseif($room['r_rent_type'] == "m") {
			$pay_month = substr($room['r_pay_month'],-0, -4)."만원";
			echo $pay_month;
		} elseif($room['r_rent_type'] == "j") {
			$pay_jun = substr($room['r_pay_jun'],-0, -4)."만원";
			echo $pay_jun;
		}
		?>
		</td>
		<td style="font-weight:bold; color:#3366cc;">
		<?
		if($room['r_state'] == "y") echo "있음";
		elseif($room['r_state'] == "n") echo "없음";
		?>
		</td>
	</tr>
	<tr>
		<td colspan="9" style="text-align:left;">
		<input style="height:20px;width:60px;border: 0px;background-color: #FFBB00;font-size: 9pt;color: #fff;" type="button" onclick="javascript:popupCenter_b('../room/view.php?r_num=<?echo $room['r_num']; ?>')" value="보기" />&nbsp;&nbsp;
		<input style="height:20px;width:60px;border: 0px;background-color: #cccc33;font-size: 9pt;color: #fff;" type="button" onclick="window.location='room_admin_modify.php?r_num=<?echo $room['r_num']; ?>'" value="수정" />&nbsp;&nbsp;
		<input style="height:20px;width:60px;border: 0px;background-color: #999999;font-size: 9pt;color: #fff;" type="button" onClick="if (confirm('삭제하시겠습니까?')) location.href='room_admin_delete.php?r_num=<?echo $room['r_num']; ?>'" value="삭제" />&nbsp;&nbsp;
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