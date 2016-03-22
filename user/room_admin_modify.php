<?
//회원방 관리 페이지
include "../lib/common.php";
$query_u = mysql_query("select * from user where u_id='$_SESSION[fr_u_id]'");
$user = mysql_fetch_array($query_u);
$query_r = mysql_query("select * from room where r_num='$_GET[r_num]'");
$room = mysql_fetch_array($query_r);

$address = str_replace("경상북도","",$room['r_address']);//번지수 뽑기
$address = str_replace("안동시","",$address);//번지수 뽑기
$address = str_replace("송천동","",$address);//번지수 뽑기
$address = str_replace("경동로","",$address);//번지수 뽑기
$address = str_replace("송천길","",$address);//번지수 뽑기
$address = str_replace("송천1길","",$address);//번지수 뽑기
$address = str_replace("송천2길","",$address);//번지수 뽑기
$address = str_replace("송천3길","",$address);//번지수 뽑기
$address = str_replace("논골길","",$address);//번지수 뽑기
$address = str_replace("향교길","",$address);//번지수 뽑기
$address = str_replace(" ","",$address);//번지수 뽑기
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 회원 방 관리 > 방 정보 수정</title>
<script type="text/javascript">
function check_input() {

	if(!document.modify.name.value) {
		alert('방이름을 입력하세요.');
		document.modify.name.focus();
	} else if(!document.modify.add_c.value) {
		alert('방주소를 입력하세요.');
		document.modify.add_c.focus();
	} else if(!document.modify.comment.value) {
		alert('간략설명을 입력하세요.');
		document.modify.comment.focus();
	} else if(isNaN(document.modify.pay_d.value)) {		
		alert('보증금은 숫자만 입력하세요.');
		document.modify.pay_d.value = "0";
		document.modify.pay_d.focus();
	} else if(document.modify.rent_type.value == "y" && !document.modify.pay_y.value) {		
		alert('사글세 가격을 입력하세요.');
		document.modify.pay_y.focus();
	} else if(isNaN(document.modify.pay_y.value)) {		
		alert('가격란은 숫자만 입력하세요.');
		document.modify.pay_y.value = "0";
		document.modify.pay_y.focus();
	} else if(document.modify.rent_type.value == "m" && !document.modify.pay_m.value) {		
		alert('월세 가격을 입력하세요.');
		document.modify.pay_m.focus();
	} else if(isNaN(document.modify.pay_m.value)) {		
		alert('가격란은 숫자만 입력하세요.');
		document.modify.pay_m.value = "0";
		document.modify.pay_m.focus();
	} else if(document.modify.rent_type.value == "j" && !document.modify.pay_j.value) {		
		alert('전세 가격을 입력하세요.');
		document.modify.pay_j.focus();
	} else if(isNaN(document.modify.pay_j.value)) {		
		alert('가격란은 숫자만 입력하세요.');
		document.modify.pay_j.value = "0";
		document.modify.pay_k.focus();
	} else {
		document.modify.submit();
	} 
}
function addressCheck()
{
    var obj  = event.srcElement;
    obj.value = obj.value.replace(/[^\d-]/g,'');
}

function digitCheck()
{
    var obj  = event.srcElement;
    obj.value = obj.value.replace(/[^\d]/g,'');
}
</script>
</head>
<body>
<?
if($user['u_id'] != $room['u_id']) {
alertback("잘못된 접근입니다.");
} else {

?>
<div id="room_admin">
<div id="head">
	<div id="title">
	<? echo "ID : ".$user['u_id']." / 이름 : ".$user['u_name'];?>
	</div>
</div>
<div id="body">
	<div id="body_title">
		<span class="body_title_f">▶</span> 방 등록관리 > 수정
	</div>
	<div id="body_content">
	<form name="modify" id="modify" action="room_admin_modify_ok.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="r_num" value="<?echo $room['r_num']; ?>" />
	<input type="hidden" name="type" value="s" />
		<table width="100%" border="0" cellpadding="8">
			<tr>
				<td width="120"><span class="font_user_join_a">지역</span></td>
				<td>
				<?
				if($room['r_area'] == "s") {
				?>
				<input type="radio" name="area" checked="checked" value="s">&nbsp;솔뫼 방향&nbsp;&nbsp;
				<input type="radio" name="area" value="n">&nbsp;논골 방향
				<?
				} else {
				?>
				<input type="radio" name="area" value="s">&nbsp;솔뫼 방향&nbsp;&nbsp;
				<input type="radio" name="area" checked="checked" value="n">&nbsp;논골 방향
				<?
				}
				?>
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">건물(방) 이름</span></td>
				<td>
				<input style="height:30px;width:100px; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="name" id="name" value="<?echo $room['r_name']; ?>" />
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">주소</span></td>
				<td>
				<input style="height:30px;width:130px; border:2px solid #bbb; font-size: 13pt;color: #666; text-align:center;" type="text" value="경상북도안동시" readonly name="add_a" id="add_a" />&nbsp;&nbsp;
				<select style="height:30px;width:100px; border:2px solid #bbb; font-size: 13pt;color: #666; text-align:center;" name="add_b">
					<?
					if(eregi("송천동",$room['r_address'])) {
						echo "
							<option>송천동</option>
							<option>경동로</option>
							<option>송천길</option>
							<option>송천1길</option>
							<option>송천2길</option>
							<option>송천3길</option>
							<option>논골길</option>
							<option>향교길</option>
						";
					} elseif(eregi("송천길",$room['r_address'])) {
						echo "
							<option>송천길</option>
							<option>경동로</option>
							<option>송천동</option>						
							<option>송천1길</option>
							<option>송천2길</option>
							<option>송천3길</option>
							<option>논골길</option>
							<option>향교길</option>
						";
					} elseif(eregi("경동로",$room['r_address'])) {
						echo "
							<option>경동로</option>
							<option>송천동</option>		
							<option>송천길</option>
							<option>송천1길</option>
							<option>송천2길</option>
							<option>송천3길</option>
							<option>논골길</option>
							<option>향교길</option>
						";
					} elseif(eregi("송천1길",$room['r_address'])) {
						
						echo "
							<option>송천1길</option>
							<option>경동로</option>
							<option>송천동</option>	
							<option>송천길</option>
							<option>송천2길</option>
							<option>송천3길</option>
							<option>논골길</option>
							<option>향교길</option>
						";
					} elseif(eregi("송천2길",$room['r_address'])) {
						echo "
							<option>송천2길</option>
							<option>경동로</option>
							<option>송천동</option>		
							<option>송천길</option>
							<option>송천1길</option>							
							<option>송천3길</option>
							<option>논골길</option>
							<option>향교길</option>
						";
					} elseif(eregi("송천3길",$room['r_address'])) {
						echo "
							<option>송천3길</option>
							<option>경동로</option>
							<option>송천동</option>	
							<option>송천길</option>
							<option>송천1길</option>
							<option>송천2길</option>
							<option>논골길</option>		
							<option>향교길</option>
						";
					} elseif(eregi("논골길",$room['r_address'])) {
						echo "
							<option>논골길</option>	
							<option>송천3길</option>
							<option>경동로</option>
							<option>송천동</option>
							<option>송천길</option>
							<option>송천1길</option>
							<option>송천2길</option>
							<option>향교길</option>
						";
					} elseif(eregi("향교길",$room['r_address'])) {
						echo "
							<option>향교길</option>
							<option>논골길</option>	
							<option>경동로</option>
							<option>송천동</option>
							<option>송천길</option>
							<option>송천1길</option>
							<option>송천2길</option>	
							<option>송천3길</option>
						";
					}
					?>
				</select>
				&nbsp;&nbsp;
				번지 수 : <input style="height:30px;width:70px; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="add_c" id="add_c" value="<?echo $address; ?>" onkeyup="addressCheck()" />
				</td>
			</tr>
			<tr>
				<td width="80"><span class="font_user_join_a"><font color="red">빈방유무</font></span></td>
				<td>
				<?
				if($room['r_state'] == "y") {
				?>
				<input type="radio" name="state" checked="checked" value="y">&nbsp;있음&nbsp;&nbsp;
				<input type="radio" name="state" value="n">&nbsp;없음
				<?
				} else {
				?>
				<input type="radio" name="state" value="y">&nbsp;있음&nbsp;&nbsp;
				<input type="radio" name="state" checked="checked" value="n">&nbsp;없음
				<?
				}
				?>
				</td>
			</tr>
			<tr>
				<td width="80"><span class="font_user_join_a">간략설명</span></td>
				<td>
				<input style="height:30px;width:600px; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="comment" id="comment" value="<?echo $room['r_comment']; ?>" />
				&nbsp;<span class="disc">(30자 내로 입력하세요.)</span>
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">임대형식</span></td>
				<td>
				<input type="radio" name="rent_type" value="y" <?if($room['r_rent_type'] == "y") echo "checked='checked'";?>>&nbsp;사글세&nbsp;&nbsp;
				<input type="radio" name="rent_type" value="m" <?if($room['r_rent_type'] == "m") echo "checked='checked'";?>>&nbsp;월세&nbsp;&nbsp;
				<input type="radio" name="rent_type" value="j" <?if($room['r_rent_type'] == "j") echo "checked='checked'";?>>&nbsp;전세
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">방 종류</span></td>
				<td>
				<input type="radio" name="room_type" value="o" <?if($room['r_type'] == "o") echo "checked='checked'";?>>&nbsp;원룸&nbsp;&nbsp;
				<input type="radio" name="room_type" value="t" <?if($room['r_type'] == "t") echo "checked='checked'";?>>&nbsp;투룸&nbsp;&nbsp;
				<input type="radio" name="room_type" value="m" <?if($room['r_type'] == "m") echo "checked='checked'";?>>&nbsp;미니투룸
				<input type="radio" name="room_type" value="e" <?if($room['r_type'] == "e") echo "checked='checked'";?>>&nbsp;기타
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">보증금</span></td>
				<td>
				<?
				if($room['r_deposit'] != 0) {
					$deposit = substr($room['r_deposit'],-0, -4);
				}
				?>
				<input style="height:30px;width:55px;  padding-right:3px; text-align:right; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="pay_d" id="pay_d" value="<?echo $deposit; ?>" onkeyup="digitCheck()" />&nbsp;<span class="unit">[단위] : 만원</span>
				&nbsp;<span class="disc">(보증금이 있을 경우에만 입력하세요.)</span>
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">사글세</span></td>
				<td>
				<?
				if($room['r_pay_year'] != 0) {
					$pay_year = substr($room['r_pay_year'],-0, -4);
				}
				?>
				<input style="height:30px;width:55px;  padding-right:3px; text-align:right; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="pay_y" id="pay_y" value="<?echo $pay_year; ?>" onkeyup="digitCheck()" />&nbsp;<span class="unit">[단위] : 만원</span>
				&nbsp;<span class="disc">(임대형식이 사글세인 경우에만 입력하세요.)</span>
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">월세</span></td>
				<td>
				<?
				if($room['r_pay_month'] != 0) {
					$pay_month = substr($room['r_pay_month'],-0, -4);
				}
				?>
				<input style="height:30px;width:55px;  padding-right:3px; text-align:right; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="pay_m" id="pay_m" value="<?echo $pay_month; ?>" onkeyup="digitCheck()" />&nbsp;<span class="unit">[단위] : 만원</span>
				&nbsp;<span class="disc">(임대형식이 월세인 경우에만 입력하세요.)</span>
				</td>
			</tr>			
			<tr>
				<td width="120"><span class="font_user_join_a">전세</span></td>
				<td>
				<?
				if($room['r_pay_jun'] != 0) {
					$pay_jun = substr($room['r_pay_jun'],-0, -4);
				}
				?>
				<input style="height:30px;width:55px;  padding-right:3px; text-align:right; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="pay_j" id="pay_j" value="<?echo $pay_jun; ?>" onkeyup="digitCheck()" />&nbsp;<span class="unit">[단위] : 만원</span>
				&nbsp;<span class="disc">(임대형식이 전세인 경우에만 입력하세요.)</span>
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">방 크기</span></td>
				<td>
				<input style="height:30px;width:70px; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="size" id="size" value="<?echo $room['r_size']; ?>" />
				&nbsp;<span class="disc">(평수로 입력하세요.)</span>
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">심야전기</span></td>
				<td>
				<br/>
				<input type="radio" name="midnight" value="y" <?if($room['r_midnight'] == "y") echo "checked='checked'";?>>예&nbsp;&nbsp;&nbsp;
				<input type="radio" name="midnight" value="n" <?if($room['r_midnight'] == "n") echo "checked='checked'";?>>&nbsp;아니오&nbsp;&nbsp;
				<br/><br />
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">세금</span></td>
				<td>
				<br/>
				<input type="checkbox" name="tax_e" value="y" <?if($room['r_tax_elec'] == "y") echo "checked='checked'";?>>&nbsp;전기세&nbsp;&nbsp;
				<input type="checkbox" name="tax_g" value="y" <?if($room['r_tax_gas'] == "y") echo "checked='checked'";?>>&nbsp;가스세&nbsp;&nbsp;
				<input type="checkbox" name="tax_b" value="y" <?if($room['r_tax_boiler'] == "y") echo "checked='checked'";?>>&nbsp;보일러세&nbsp;&nbsp;
				<input type="checkbox" name="tax_w" value="y" <?if($room['r_tax_water'] == "y") echo "checked='checked'";?>>&nbsp;수도세&nbsp;&nbsp;
				<input type="checkbox" name="tax_i" value="y" <?if($room['r_tax_internet'] == "y") echo "checked='checked'";?>>&nbsp;인터넷&nbsp;&nbsp;
				&nbsp;<span class="disc">(임차인이 납부해야할 세금 항목을 체크해주세요.)</span>
				<br/><br />
				</td>
			</tr>
			<tr>
				<td width="80"><span class="font_user_join_a">사진</span></td>
				<td>
				<table border="0">
				<span class="font_thum">※ 업로드 하지 않으면 기존의 이미지로 대체됩니다.</span><br/>
				<tr>
					<td><span class="font_photo_bold">대표(내부) 사진<font color="red">(필수)</font></span></td>
					<td><input style="margin-top: 10px; border:1px solid #bbb; background-color:#fff; text-align:center; font-size: 10pt;color: #666; margin-bottom:8px;" type="file" name="photo" id="photo" /></td>				
				</tr>
				<tr>
					<td><span class="font_photo_bold">부엌 사진</span></td>
					<td><input style="border:1px solid #bbb; background-color:#fff; text-align:center; font-size: 10pt;color: #666; margin-bottom:8px;" type="file" name="photo_k" id="photo_k" /></td>
				</tr>
				<tr>
					<td><span class="font_photo_bold">욕실 사진</span></td>
					<td><input style="border:1px solid #bbb; background-color:#fff; text-align:center; font-size: 10pt;color: #666; margin-bottom:8px;" type="file" name="photo_b" id="photo_b" /></td>
				</tr>
				<tr>
					<td><span class="font_photo_bold">방(기타) 사진</span></td>
					<td><input style="border:1px solid #bbb; background-color:#fff; text-align:center; font-size: 10pt;color: #666; margin-bottom:8px;" type="file" name="photo_r" id="photo_r" /></td>
				</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td width="80"><span class="font_user_join_a">상세내용</span></td>
				<td>
				<textarea style="height:300px;width:700px; border:2px solid #bbb; font-size: 11pt;color: #666; text-align:left;" name="detail" id="detail"><?echo strip_tags($room['r_detail']); ?></textarea>
				</td>
			</tr>
		</table>
	</form>
	</div>
	<div id="body_btn">
	<input style="height:40px;width:200px;border: 0px;background-color: #555;font-size: 13pt;color: #fff;" type="button" onclick="check_input();" value="수정완료" />&nbsp;&nbsp;
		<input style="height:40px;width:200px;border: 0px;background-color: #bbb;font-size: 13pt;color: #fff;" type="button" onclick="window.location='room_admin.php';" value="취소" />
	</div>
</div>
</div>
<?
}
?>
</body>
</html>