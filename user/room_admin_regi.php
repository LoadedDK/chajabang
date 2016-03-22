<?
//회원방 등록 페이지
include "../lib/common.php";
$query = mysql_query("select * from user where u_id='$_SESSION[fr_u_id]'");
$user = mysql_fetch_array($query);
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 회원 방 관리 > 등록</title>
<script type="text/javascript">
function check_input() {
	var upw1 = document.getElementById('u_pw')
	var upw2 = document.getElementById('u_pw_ok')
	
	if(!document.regi.name.value) {
		alert('방이름을 입력하세요.');
		document.regi.name.focus();
	} else if(!document.regi.add_c.value) {
		alert('방주소를 입력하세요.');
		document.regi.add_c.focus();
	} else if(!document.regi.comment.value) {
		alert('간략설명을 입력하세요.');
		document.regi.comment.focus();
	} else if(isNaN(document.regi.pay_d.value)) {		
		alert('보증금은 숫자만 입력하세요.');
		document.regi.pay_d.value = "0";
		document.regi.pay_d.focus();
	} else if(document.regi.rent_type.value == "y" && !document.regi.pay_y.value) {		
		alert('사글세 가격을 입력하세요.');
		document.regi.pay_y.focus();
	} else if(isNaN(document.regi.pay_y.value)) {		
		alert('가격란은 숫자만 입력하세요.');
		document.regi.pay_y.value = "0";
		document.regi.pay_y.focus();
	} else if(document.regi.rent_type.value == "m" && !document.regi.pay_m.value) {		
		alert('월세 가격을 입력하세요.');
		document.regi.pay_m.focus();
	} else if(isNaN(document.regi.pay_m.value)) {		
		alert('가격란은 숫자만 입력하세요.');
		document.regi.pay_m.value = "0";
		document.regi.pay_m.focus();
	} else if(document.regi.rent_type.value == "j" && !document.regi.pay_j.value) {		
		alert('전세 가격을 입력하세요.');
		document.regi.pay_j.focus();
	} else if(isNaN(document.regi.pay_j.value)) {		
		alert('가격란은 숫자만 입력하세요.');
		document.regi.pay_j.value = "0";
		document.regi.pay_k.focus();
	} else if(!document.regi.photo.value) {		
		alert('메인 썸네일 이미지는 필수로 등록해주세요.');
		document.regi.photo.focus();
	} else {
		document.regi.submit();
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
<div id="room_admin">
<div id="head">
	<div id="title">
	<? echo "ID : ".$user['u_id']." / 이름 : ".$user['u_name'];?>
	</div>
</div>
<div id="body">
	<div id="body_title">
		<span class="body_title_f">▶</span> 방 등록관리 > 등록
	</div>
	<div id="body_content">
	<form name="regi" id="regi" action="room_admin_regi_ok.php" method="post" enctype="multipart/form-data" >
	<input type="hidden" name="type" value="s" />
		<table width="100%" border="0" cellpadding="8">
			<tr>
				<td width="120"><span class="font_user_join_a">지역</span></td>
				<td>
				<input type="radio" name="area" checked="checked" value="s">&nbsp;솔뫼 방향&nbsp;&nbsp;
				<input type="radio" name="area" value="n">&nbsp;논골 방향
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">건물(방) 이름</span></td>
				<td>
				<input style="height:30px;width:100px; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="name" id="name" />
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">주소</span></td>
				<td>
				<input style="height:30px;width:130px; border:2px solid #bbb; font-size: 13pt;color: #666; text-align:center;" type="text" value="경상북도안동시" readonly name="add_a" id="add_a" />&nbsp;&nbsp;
				<select style="height:30px;width:100px; border:2px solid #bbb; font-size: 13pt;color: #666; text-align:center;" name="add_b">
					<option>송천동</option>
					<option>경동로</option>
					<option>송천길</option>
					<option>송천1길</option>
					<option>송천2길</option>
					<option>송천3길</option>
					<option>논골길</option>
					<option>향교길</option>
				</select>
				&nbsp;&nbsp;
				번지 수 : <input style="height:30px;width:70px; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="add_c" id="add_c" onkeyup="addressCheck()" />
				</td>
			</tr>
			<tr>
				<td width="80"><span class="font_user_join_a"><font color="red">빈방유무</font></span></td>
				<td>
				<input type="radio" name="state" checked="checked" value="y">&nbsp;있음&nbsp;&nbsp;
				<input type="radio" name="state" value="n">&nbsp;없음
				</td>
			</tr>
			<tr>
				<td width="80"><span class="font_user_join_a">간략설명</span></td>
				<td>
				<input style="height:30px;width:600px; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="comment" id="comment" />
				&nbsp;<span class="disc">(30자 내로 입력하세요.)</span>
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">임대형식</span></td>
				<td>
				<input type="radio" name="rent_type" value="y" checked="checked">&nbsp;사글세&nbsp;&nbsp;
				<input type="radio" name="rent_type" value="m">&nbsp;월세&nbsp;&nbsp;
				<input type="radio" name="rent_type" value="j">&nbsp;전세
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">방 종류</span></td>
				<td>
				<input type="radio" name="room_type" value="o" checked="checked">&nbsp;원룸&nbsp;&nbsp;
				<input type="radio" name="room_type" value="t">&nbsp;투룸&nbsp;&nbsp;
				<input type="radio" name="room_type" value="m">&nbsp;미니투룸
				<input type="radio" name="room_type" value="e">&nbsp;기타
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">보증금</span></td>
				<td>
				<input style="height:30px;width:55px;  padding-right:3px; text-align:right; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="pay_d" id="pay_d" onkeyup="digitCheck()" />
				&nbsp;<span class="unit">[단위] : 만원</span>&nbsp;<span class="disc">(보증금이 있을 경우에만 입력하세요.)</span>
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">사글세</span></td>
				<td>
				<input style="height:30px;width:55px;  padding-right:3px; text-align:right; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="pay_y" id="pay_y" onkeyup="digitCheck()" />
				&nbsp;<span class="unit">[단위] : 만원</span>&nbsp;<span class="disc">(임대형식이 사글세인 경우에만 입력하세요.)</span>
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">월세</span></td>
				<td>
				<input style="height:30px;width:55px;  padding-right:3px; text-align:right; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="pay_m" id="pay_m" onkeyup="digitCheck()" />
				&nbsp;<span class="unit">[단위] : 만원</span>&nbsp;<span class="disc">(임대형식이 월세인 경우에만 입력하세요.)</span>
				</td>
			</tr>			
			<tr>
				<td width="120"><span class="font_user_join_a">전세</span></td>
				<td>
				<input style="height:30px;width:55px;  padding-right:3px; text-align:right; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="pay_j" id="pay_j" onkeyup="digitCheck()" />
				&nbsp;<span class="unit">[단위] : 만원</span>&nbsp;<span class="disc">(임대형식이 전세인 경우에만 입력하세요.)</span>
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">방 크기</span></td>
				<td>
				<input style="height:30px;width:50px; border:2px solid #bbb; font-size: 13pt;color: #666;" type="text" name="size" id="size" />
				&nbsp;<span class="disc">(평수로 입력하세요.)</span>
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">심야전기</span></td>
				<td>
				<br/>
				<input type="radio" name="midnight" value="y">&nbsp;예&nbsp;&nbsp;&nbsp;
				<input type="radio" name="midnight" value="n" checked="checked">&nbsp;아니오&nbsp;&nbsp;
				<br/><br />
				</td>
			</tr>
			<tr>
				<td width="120"><span class="font_user_join_a">세금</span></td>
				<td>
				<br/>
				<input type="checkbox" name="tax_e" value="y">&nbsp;전기세&nbsp;&nbsp;
				<input type="checkbox" name="tax_g" value="y">&nbsp;가스세&nbsp;&nbsp;
				<input type="checkbox" name="tax_b" value="y">&nbsp;보일러세&nbsp;&nbsp;
				<input type="checkbox" name="tax_w" value="y">&nbsp;수도세&nbsp;&nbsp;
				<input type="checkbox" name="tax_i" value="y">&nbsp;인터넷&nbsp;&nbsp;
				&nbsp;<span class="disc">(임차인이 납부해야할 세금 항목을 체크해주세요.)</span>
				<br/><br />
				</td>
			</tr>
			<tr>
				<td width="80"><span class="font_user_join_a">사진</span></td>
				<td>
				<table border="0">
				<span class="font_thum">※ 첫 번째 이미지는 썸네일로 등록됩니다.</span><br/>
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
				<textarea style="height:300px;width:700px; border:2px solid #bbb; font-size: 11pt;color: #666; text-align:left;" name="detail" id="detail"></textarea>
				</td>
			</tr>
		</table>
	</form>
	</div>
	<div id="body_btn">
	<input style="height:40px;width:200px;border: 0px;background-color: #555;font-size: 13pt;color: #fff;" type="button" onclick="check_input();" value="등록" />&nbsp;&nbsp;
		<input style="height:40px;width:200px;border: 0px;background-color: #bbb;font-size: 13pt;color: #fff;" type="button" onclick="window.location='room_admin.php';" value="취소" />
	</div>
</div>
</div>
</body>
</html>