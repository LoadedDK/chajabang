<?
//회원방 수정 OK 페이지
include "../lib/common.php";
$query = mysql_query("select * from user where u_id='$_SESSION[fr_u_id]'");
$user = mysql_fetch_array($query);

$area = $_POST['area'];//지역 솔뫼:s/논골:n
$name = $_POST['name'];//방이름
$state = $_POST['state'];//빈방유무
$add_c = str_replace("번지","",$_POST['add_c']);//번지 글자 없애기
$address = $_POST['add_a'].$_POST['add_b'].$add_c;//방주소
$rent_type = $_POST['rent_type'];//임대형식
$room_type = $_POST['room_type'];//방종류
if($_POST['pay_d']) $deposit = $_POST['pay_d']."0000"; else $deposit = 0;//보증금 검사
if($_POST['size']) $size = $_POST['size']; else $size = "입력안함";//방 크기 검사
$pay_year = $_POST['pay_y']."0000";//사글세
$pay_month = $_POST['pay_m']."0000";//월세
$pay_jun = $_POST['pay_j']."0000";//전세
$midnight = $_POST['midnight'];//심야전기유무
if($_POST['tax_g']) $tax_gas = $_POST['tax_g']; else $tax_gas = "n";//가스세
if($_POST['tax_b']) $tax_boiler = $_POST['tax_b']; else $tax_boiler = "n";//보일러세
if($_POST['tax_e']) $tax_elec = $_POST['tax_e']; else $tax_elec = "n";//전기세
if($_POST['tax_w']) $tax_water = $_POST['tax_w']; else $tax_water = "n";//수도세
if($_POST['tax_i']) $tax_internet = $_POST['tax_i']; else $tax_internet = "n";//인터넷요금
$comment = $_POST['comment'];//한줄설명
$detail = nl2br($_POST['detail']);//상세설명
/*이미지 처리*/
$imageKind = array ('image/pjpeg', 'image/jpeg', 'image/JPG');
$first = $user['u_id']."_".date("Ymdhis");
if($_FILES['photo']['name']) { //대표이미지필드에 값이 있으면
	$img_name = $first."_thum.jpg";
	if (in_array($_FILES['photo']['type'], $imageKind))
		move_uploaded_file ($_FILES['photo']['tmp_name'], "../roomimg/".$img_name);
	else
		alertback("jpg 확장자만 등록해주세요.");
	$query_photo = $img_name;
}
if($_FILES['photo_k']['name']) { //부엌이미지필드에 값이 있으면
	$img_name = $first."_kitchen.jpg";
	if (in_array($_FILES['photo_k']['type'], $imageKind))
		move_uploaded_file ($_FILES['photo_k']['tmp_name'], "../roomimg/".$img_name);		
	else
		alertback("jpg 확장자만 등록해주세요.");
	$query_photo_k = $img_name;
}
if($_FILES['photo_b']['name']) { //욕실이미지필드에 값이 있으면
	$img_name = $first."_bathroom.jpg";
	if (in_array($_FILES['photo_b']['type'], $imageKind))
		move_uploaded_file ($_FILES['photo_b']['tmp_name'], "../roomimg/".$img_name);		
	else
		alertback("jpg 확장자만 등록해주세요.");
	$query_photo_b = $img_name;
}
if($_FILES['photo_r']['name']) { //기타이미지필드에 값이 있으면
	$img_name = $first."_room.jpg";
	if (in_array($_FILES['photo_r']['type'], $imageKind))
		move_uploaded_file ($_FILES['photo_r']['tmp_name'], "../roomimg/".$img_name);		
	else
		alertback("jpg 확장자만 등록해주세요.");
	$query_photo_r = $img_name;
}


//json 파싱
$data1 = file_get_contents('http://openapi.map.naver.com/api/geocode?key=5fea24539e7a7fb976d7c1242d3d7fe0&output=json&query=' . $address);
$json1 = json_decode($data1, true);
$address_json = $json1['result']['items']['0']['address'];
$x1 = $json1['result']['items']['0']['point']['x'];
$y1 = $json1['result']['items']['0']['point']['y'];


if(!$address_json) {
	alertback("주소 입력이 잘못되었습니다.");
} else {

	//이미지 DB수정
	if($query_photo) {
		mysql_query("update room set r_photo='$query_photo' where r_num = '$_POST[r_num]'");
	}
	if($query_photo_k) {
		mysql_query("update room set r_photo_k='$query_photo_k' where r_num = '$_POST[r_num]'");
	}
	if($query_photo_b) {
		mysql_query("update room set r_photo_b='$query_photo_b' where r_num = '$_POST[r_num]'");
	}
	if($query_photo_r) {
		mysql_query("update room set r_photo_r='$query_photo_r' where r_num = '$_POST[r_num]'");
	}


	if($rent_type == "y") {//사글세
		mysql_query("update room set r_area='$area',r_name='$name',r_address='$address_json',r_loc_x='$x1',r_loc_y='$y1',r_rent_type='$rent_type',r_type='$room_type',r_deposit='$deposit',r_pay_year='$pay_year',r_size='$size',r_midnight='$midnight',r_tax_gas='$tax_gas',r_tax_boiler='$tax_boiler',r_tax_elec='$tax_elec',r_tax_water='$tax_water',r_tax_internet='$tax_internet',r_comment='$comment',r_detail='$detail',r_state='$state' where r_num = '$_POST[r_num]'");
		} elseif($rent_type == "m") {//월세
		mysql_query("update room set r_area='$area',r_name='$name',r_address='$address_json',r_loc_x='$x1',r_loc_y='$y1',r_rent_type='$rent_type',r_type='$room_type',r_deposit='$deposit',r_pay_month='$pay_month',r_size='$size',r_midnight='$midnight',r_tax_gas='$tax_gas',r_tax_boiler='$tax_boiler',r_tax_elec='$tax_elec',r_tax_water='$tax_water',r_tax_internet='$tax_internet',r_comment='$comment',r_detail='$detail',r_state='$state' where r_num = '$_POST[r_num]'");
	} elseif($rent_type == "j") {//전세
		mysql_query("update room set r_area='$area',r_name='$name',r_address='$address_json',r_loc_x='$x1',r_loc_y='$y1',r_rent_type='$rent_type',r_type='$room_type',r_deposit='$deposit',r_pay_jun='$pay_jun',r_size='$size',r_midnight='$midnight',r_tax_gas='$tax_gas',r_tax_boiler='$tax_boiler',r_tax_elec='$tax_elec',r_tax_water='$tax_water',r_tax_internet='$tax_internet',r_comment='$comment',r_detail='$detail',r_state='$state' where r_num = '$_POST[r_num]'");
	}
} 
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 회원 방 관리 > 방정보 수정</title>
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
		<span class="body_title_f">▶</span> 방 등록관리 > 방정보 수정 > 수정완료
	</div>
	<div id="body_content">
	<?
	echo "
	<script>
	opener.location.reload();
	</script>
	";
	?>
	<p>수정을 완료하였습니다.</p>
	</div>
	<div id="body_btn">
	<input style="height:40px;width:200px;border: 0px;background-color: #555;font-size: 13pt;color: #fff;" type="button" onclick="window.location='room_admin.php';" value="목록" />&nbsp;&nbsp;
		<input style="height:40px;width:200px;border: 0px;background-color: #bbb;font-size: 13pt;color: #fff;" type="button" onclick="javascript:self.close();" value="종료" />
	</div>
</div>
</div>
</body>
</html>