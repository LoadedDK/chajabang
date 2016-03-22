<?
//본 페이지는 방 리스트를 모바일 안드로이드로 전달해주는 겁니다 히이ㅣ이이이
$conn = mysql_connect("localhost","root","9801");
mysql_select_db("findroom");
mysql_query("set names utf8",$conn); 
?>
<html>	
<head>
<meta charset="utf-8" />
<title>방 리스트</title>
</head>
<body>
<?

$query_str = "select u_id, r_area, r_name, r_address, r_rent_type, r_type, r_deposit, r_pay_month, r_pay_year, r_pay_jun, r_type, r_size, r_midnight, r_tax_gas, r_tax_boiler, r_tax_elec, r_tax_water, r_tax_internet, r_photo, r_photo_k, r_photo_b, r_photo_r, r_comment, r_detail, r_state from room order by r_num desc";
$result = mysql_query($query_str);
$i = 0;
$num = mysql_num_rows($result);//갯수
$room_arr = array();
echo "{\"room_list\" :[ ";
while($room = mysql_fetch_array($result)) {	
$query_str_user = "select u_phone from user where u_id='$room[u_id]'";
$result_user = mysql_query($query_str_user);
$user = mysql_fetch_array($result_user);
	//$room_arr[] = $room;
	$room_arr["r_photo"] = "http://220.69.240.111/roomimg/".$room["r_photo"]; // 썸네일
	$room_arr["r_photo_k"] = "http://220.69.240.111/roomimg/".$room["r_photo_k"]; // 부엌
	$room_arr["r_photo_b"] = "http://220.69.240.111/roomimg/".$room["r_photo_b"]; // 욕실
	$room_arr["r_photo_r"] = "http://220.69.240.111/roomimg/".$room["r_photo_r"]; // 기타
	$room_arr["r_area"] = iconv("EUC-KR", "UTF-8", $room["r_area"]); //방향
	$room_arr["r_name"] = $room["r_name"]; //방이름
	$room_arr["r_address"] = $room["r_address"]; //주소
	$room_arr["r_rent_type"] = $room["r_rent_type"];//임대방식
	$room_arr["r_deposit"] = $room["r_deposit"];//보증금
	$room_arr["r_pay_month"] = $room["r_pay_month"];//월세가격
	$room_arr["r_pay_year"] = $room["r_pay_year"];//사글세가격
	
	$room_arr["r_pay_jun"] = $room["r_pay_jun"];//전세가격
	$room_arr["r_room_type"] = $room["r_type"];//방 종류
	$room_arr["r_size"] = $room["r_size"];	//방크기
	$room_arr["r_midnight"] = $room["r_midnight"];//심야전기 유무
	$room_arr["r_tax_gas"] = $room["r_tax_gas"];	//가스비 유무
	$room_arr["r_tax_boiler"] = $room["r_tax_boiler"];//보일러 유무
	$room_arr["r_tax_elec"] = $room["r_tax_elec"];	//전기세 유무
	$room_arr["r_tax_water"] = $room["r_tax_water"];	//수도세 유무
	$room_arr["r_tax_internet"] = $room["r_tax_internet"];	//인터넷 유무
	$room_arr["r_state"] = $room["r_state"];	//빈방 유무
	$room_arr["r_phone_num"] = $user["u_phone"];	//연락처
	echo json_encode($room_arr);
	$i ++;
	if($i < $num)
	echo ",";

} 
echo "]}";

?>
</body>
</html>