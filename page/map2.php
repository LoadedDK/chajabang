<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>

var oPoint = new nhn.api.map.LatLng(36.5422434, 128.7971389);

nhn.api.map.setDefaultPoint('LatLng');
oMap = new nhn.api.map.Map('Map' ,{
	point : oPoint,
	zoom : 11,
	enableWheelZoom : true,
	enableDragPan : true,
	enableDblClickZoom : true,
	mapMode : 0,
	activateTrafficMap : false,
	activateBicycleMap : false,
	minMaxLevel : [ 11, 14 ],
});

var mapZoom = new nhn.api.map.ZoomControl(); // - 줌 컨트롤 선언
mapZoom.setPosition({left:20, bottom:20}); // - 줌 컨트롤 위치 지정
oMap.addControl(mapZoom); // - 줌 컨트롤 추가.

var oSize = new nhn.api.map.Size(28, 37);
var oOffset = new nhn.api.map.Size(14, 37);
var oIcon_y = new nhn.api.map.Icon('./img/marker_y.png', oSize, oOffset);
var oIcon_n = new nhn.api.map.Icon('./img/marker_n.png', oSize, oOffset);

<?
if($_GET['pay_a'])
	$pay_a = $_GET['pay_a']."0000";
if($_GET['pay_b'])
	$pay_b = $_GET['pay_b']."0000";

if($_GET['area_s'] || $_GET['area_n']) {
	$query_area = "where ";
	if($_GET['area_s']) {
		$query_area = $query_area."(r_area = 's'";
		if($_GET['area_n'])
			$query_area = $query_area." or r_area = 'n'";
		$query_area = $query_area.")";
	} elseif($_GET['area_n']) {
		$query_area = $query_area."(r_area = 'n')";
	}
	//임대방식 체크
	if($_GET['rent_type_year'] || $_GET['rent_type_month'] || $_GET['rent_type_jun']) {
		$query_rent_type = " and ";
		if($_GET['rent_type_year']) {
			$query_rent_type = $query_rent_type."(r_rent_type = 'y'";
			if($_GET['rent_type_month'])
				$query_rent_type = $query_rent_type." or r_rent_type = 'm'";
			if($_GET['rent_type_jun'])
				$query_rent_type = $query_rent_type." or r_rent_type = 'j'";
			$query_rent_type = $query_rent_type.")";
		} elseif($_GET['rent_type_month']) {
			$query_rent_type = $query_rent_type."(r_rent_type = 'm'";
			if($_GET['rent_type_jun'])
				$query_rent_type = $query_rent_type." or r_rent_type = 'j'";
			$query_rent_type = $query_rent_type.")";
		} elseif($_GET['rent_type_jun']) {
			$query_rent_type = $query_rent_type."(r_rent_type = 'j')";
		}
	}

	//방종류 체크
	if($_GET['room_type_one'] || $_GET['room_type_two'] || $_GET['room_type_mini'] || $_GET['room_type_etc']) {
		$query_room_type = " and ";
		if($_GET['room_type_one']) {
			$query_room_type = $query_room_type."(r_type = 'o'";
			if($_GET['room_type_two'])
				$query_room_type = $query_room_type." or r_type = 't'";
			if($_GET['room_type_mini'])
				$query_room_type = $query_room_type." or r_type = 'm'";
			if($_GET['room_type_etc'])
				$query_room_type = $query_room_type." or r_type = 'e'";
			$query_room_type = $query_room_type.")";
		} elseif($_GET['room_type_two']) {
			$query_room_type = $query_room_type."(r_type = 't'";
			if($_GET['room_type_mini'])
				$query_room_type = $query_room_type." or r_type = 'm'";
			if($_GET['room_type_etc'])
				$query_room_type = $query_room_type." or r_type = 'e'";
			$query_room_type = $query_room_type.")";
		} elseif($_GET['room_type_mini']) {
			$query_room_type = $query_room_type."(r_type = 'm'";
			if($_GET['room_type_etc'])
				$query_room_type = $query_room_type." or r_type = 'e'";
			$query_room_type = $query_room_type.")";
		} elseif($_GET['room_type_etc']) {
			$query_room_type = $query_room_type."(r_type = 'e')";
		}
	}

	//세금
	if($_GET['midnight'] || $_GET['tax_b'] || $_GET['tax_e'] || $_GET['tax_w'] || $_GET['tax_g'] || $_GET['tax_i']) {
		$query_tax = " and ";
		if($_GET['midnight']) {
			$query_tax = $query_tax."(r_midnight = 'y'";
			if($_GET['tax_b'])
				$query_tax = $query_tax." or r_tax_boiler = 'y'";
			if($_GET['tax_e'])
				$query_tax = $query_tax." or r_tax_elec = 'y'";
			if($_GET['tax_w'])
				$query_tax = $query_tax." or r_tax_water = 'y'";
			if($_GET['tax_g'])
				$query_tax = $query_tax." or r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_b']) {
			$query_tax = $query_tax."(r_tax_boiler = 'y'";
			if($_GET['tax_e'])
				$query_tax = $query_tax." or r_tax_elec = 'y'";
			if($_GET['tax_w'])
				$query_tax = $query_tax." or r_tax_water = 'y'";
			if($_GET['tax_g'])
				$query_tax = $query_tax." or r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_e']) {
			$query_tax = $query_tax."(r_tax_elec = 'y'";
			if($_GET['tax_w'])
				$query_tax = $query_tax." or r_tax_water = 'y'";
			if($_GET['tax_g'])
				$query_tax = $query_tax." or r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_w']) {
			$query_tax = $query_tax."(r_tax_water = 'y'";
			if($_GET['tax_g'])
				$query_tax = $query_tax." or r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_g']) {
			$query_tax = $query_tax."(r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_i']) {
			$query_tax = $query_tax."(r_tax_internet = 'y')";
		}
	}
//지역 선택을 안했을 때
} elseif($_GET['rent_type_year'] || $_GET['rent_type_month'] || $_GET['rent_type_jun']) {
	$query_rent_type = "where ";
	if($_GET['rent_type_year']) {
		$query_rent_type = $query_rent_type."(r_rent_type = 'y'";
		if($_GET['rent_type_month'])
			$query_rent_type = $query_rent_type." or r_rent_type = 'm'";
		if($_GET['rent_type_jun'])
			$query_rent_type = $query_rent_type." or r_rent_type = 'j'";
		$query_rent_type = $query_rent_type.")";
	} elseif($_GET['rent_type_month']) {
		$query_rent_type = $query_rent_type."(r_rent_type = 'm'";
		if($_GET['rent_type_jun'])
			$query_rent_type = $query_rent_type." or r_rent_type = 'j'";
		$query_rent_type = $query_rent_type.")";
	} elseif($_GET['rent_type_jun']) {
		$query_rent_type = $query_rent_type."(r_rent_type = 'j')";
	}


	//방종류 체크
	if($_GET['room_type_one'] || $_GET['room_type_two'] || $_GET['room_type_mini'] || $_GET['room_type_etc']) {
		$query_room_type = " and ";
		if($_GET['room_type_one']) {
			$query_room_type = $query_room_type."(r_type = 'o'";
			if($_GET['room_type_two'])
				$query_room_type = $query_room_type." or r_type = 't'";
			if($_GET['room_type_mini'])
				$query_room_type = $query_room_type." or r_type = 'm'";
			if($_GET['room_type_etc'])
				$query_room_type = $query_room_type." or r_type = 'e'";
			$query_room_type = $query_room_type.")";
		} elseif($_GET['room_type_two']) {
			$query_room_type = $query_room_type."(r_type = 't'";
			if($_GET['room_type_mini'])
				$query_room_type = $query_room_type." or r_type = 'm'";
			if($_GET['room_type_etc'])
				$query_room_type = $query_room_type." or r_type = 'e'";
			$query_room_type = $query_room_type.")";
		} elseif($_GET['room_type_mini']) {
			$query_room_type = $query_room_type."(r_type = 'm'";
			if($_GET['room_type_etc'])
				$query_room_type = $query_room_type." or r_type = 'e'";
			$query_room_type = $query_room_type.")";
		} elseif($_GET['room_type_etc']) {
			$query_room_type = $query_room_type."(r_type = 'e')";
		}
	}

	//세금
	if($_GET['midnight'] || $_GET['tax_b'] || $_GET['tax_e'] || $_GET['tax_w'] || $_GET['tax_g'] || $_GET['tax_i']) {
		$query_tax = " and ";
		if($_GET['midnight']) {
			$query_tax = $query_tax."(r_midnight = 'y'";
			if($_GET['tax_b'])
				$query_tax = $query_tax." or r_tax_boiler = 'y'";
			if($_GET['tax_e'])
				$query_tax = $query_tax." or r_tax_elec = 'y'";
			if($_GET['tax_w'])
				$query_tax = $query_tax." or r_tax_water = 'y'";
			if($_GET['tax_g'])
				$query_tax = $query_tax." or r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_b']) {
			$query_tax = $query_tax."(r_tax_boiler = 'y'";
			if($_GET['tax_e'])
				$query_tax = $query_tax." or r_tax_elec = 'y'";
			if($_GET['tax_w'])
				$query_tax = $query_tax." or r_tax_water = 'y'";
			if($_GET['tax_g'])
				$query_tax = $query_tax." or r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_e']) {
			$query_tax = $query_tax."(r_tax_elec = 'y'";
			if($_GET['tax_w'])
				$query_tax = $query_tax." or r_tax_water = 'y'";
			if($_GET['tax_g'])
				$query_tax = $query_tax." or r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_w']) {
			$query_tax = $query_tax."(r_tax_water = 'y'";
			if($_GET['tax_g'])
				$query_tax = $query_tax." or r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_g']) {
			$query_tax = $query_tax."(r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_i']) {
			$query_tax = $query_tax."(r_tax_internet = 'y')";
		}
	}
//지역,임대방식 선택을 안했을 때
} elseif($_GET['room_type_one'] || $_GET['room_type_two'] || $_GET['room_type_mini'] || $_GET['room_type_etc']) {
	$query_room_type = "where ";
	if($_GET['room_type_one']) {
		$query_room_type = $query_room_type."(r_type = 'o'";
		if($_GET['room_type_two'])
			$query_room_type = $query_room_type." or r_type = 't'";
		if($_GET['room_type_mini'])
			$query_room_type = $query_room_type." or r_type = 'm'";
		if($_GET['room_type_etc'])
			$query_room_type = $query_room_type." or r_type = 'e'";
		$query_room_type = $query_room_type.")";
	} elseif($_GET['room_type_two']) {
		$query_room_type = $query_room_type."(r_type = 't'";
		if($_GET['room_type_mini'])
			$query_room_type = $query_room_type." or r_type = 'm'";
		if($_GET['room_type_etc'])
			$query_room_type = $query_room_type." or r_type = 'e'";
		$query_room_type = $query_room_type.")";
	} elseif($_GET['room_type_mini']) {
		$query_room_type = $query_room_type."(r_type = 'm'";
		if($_GET['room_type_etc'])
			$query_room_type = $query_room_type." or r_type = 'e'";
		$query_room_type = $query_room_type.")";
	} elseif($_GET['room_type_etc']) {
		$query_room_type = $query_room_type."(r_type = 'e')";
	}

	//세금
	if($_GET['midnight'] || $_GET['tax_b'] || $_GET['tax_e'] || $_GET['tax_w'] || $_GET['tax_g'] || $_GET['tax_i']) {
		$query_tax = " and ";
		if($_GET['midnight']) {
			$query_tax = $query_tax."(r_midnight = 'y'";
			if($_GET['tax_b'])
				$query_tax = $query_tax." or r_tax_boiler = 'y'";
			if($_GET['tax_e'])
				$query_tax = $query_tax." or r_tax_elec = 'y'";
			if($_GET['tax_w'])
				$query_tax = $query_tax." or r_tax_water = 'y'";
			if($_GET['tax_g'])
				$query_tax = $query_tax." or r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_b']) {
			$query_tax = $query_tax."(r_tax_boiler = 'y'";
			if($_GET['tax_e'])
				$query_tax = $query_tax." or r_tax_elec = 'y'";
			if($_GET['tax_w'])
				$query_tax = $query_tax." or r_tax_water = 'y'";
			if($_GET['tax_g'])
				$query_tax = $query_tax." or r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_e']) {
			$query_tax = $query_tax."(r_tax_elec = 'y'";
			if($_GET['tax_w'])
				$query_tax = $query_tax." or r_tax_water = 'y'";
			if($_GET['tax_g'])
				$query_tax = $query_tax." or r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_w']) {
			$query_tax = $query_tax."(r_tax_water = 'y'";
			if($_GET['tax_g'])
				$query_tax = $query_tax." or r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_g']) {
			$query_tax = $query_tax."(r_tax_gas = 'y'";
			if($_GET['tax_i'])
				$query_tax = $query_tax." or r_tax_internet = 'y'";
			$query_tax = $query_tax.")";
		} elseif($_GET['tax_i']) {
			$query_tax = $query_tax."(r_tax_internet = 'y')";
		}
	}
//지역,임대방식,방종류 선택을 안했을 때
} elseif($_GET['midnight'] || $_GET['tax_b'] || $_GET['tax_e'] || $_GET['tax_w'] || $_GET['tax_g'] || $_GET['tax_i']) {
	$query_tax = "where ";
	if($_GET['midnight']) {
		$query_tax = $query_tax."(r_midnight = 'y'";
		if($_GET['tax_b'])
			$query_tax = $query_tax." or r_tax_boiler = 'y'";
		if($_GET['tax_e'])
			$query_tax = $query_tax." or r_tax_elec = 'y'";
		if($_GET['tax_w'])
			$query_tax = $query_tax." or r_tax_water = 'y'";
		if($_GET['tax_g'])
			$query_tax = $query_tax." or r_tax_gas = 'y'";
		if($_GET['tax_i'])
			$query_tax = $query_tax." or r_tax_internet = 'y'";
		$query_tax = $query_tax.")";
	} elseif($_GET['tax_b']) {
		$query_tax = $query_tax."(r_tax_boiler = 'y'";
		if($_GET['tax_e'])
			$query_tax = $query_tax." or r_tax_elec = 'y'";
		if($_GET['tax_w'])
			$query_tax = $query_tax." or r_tax_water = 'y'";
		if($_GET['tax_g'])
			$query_tax = $query_tax." or r_tax_gas = 'y'";
		if($_GET['tax_i'])
			$query_tax = $query_tax." or r_tax_internet = 'y'";
		$query_tax = $query_tax.")";
	} elseif($_GET['tax_e']) {
		$query_tax = $query_tax."(r_tax_elec = 'y'";
		if($_GET['tax_w'])
			$query_tax = $query_tax." or r_tax_water = 'y'";
		if($_GET['tax_g'])
			$query_tax = $query_tax." or r_tax_gas = 'y'";
		if($_GET['tax_i'])
			$query_tax = $query_tax." or r_tax_internet = 'y'";
		$query_tax = $query_tax.")";
	} elseif($_GET['tax_w']) {
		$query_tax = $query_tax."(r_tax_water = 'y'";
		if($_GET['tax_g'])
			$query_tax = $query_tax." or r_tax_gas = 'y'";
		if($_GET['tax_i'])
			$query_tax = $query_tax." or r_tax_internet = 'y'";
		$query_tax = $query_tax.")";
	} elseif($_GET['tax_g']) {
		$query_tax = $query_tax."(r_tax_gas = 'y'";
		if($_GET['tax_i'])
			$query_tax = $query_tax." or r_tax_internet = 'y'";
		$query_tax = $query_tax.")";
	} elseif($_GET['tax_i']) {
		$query_tax = $query_tax."(r_tax_internet = 'y')";
	}
}
if($_GET['area_s'] || $_GET['area_n'] || $_GET['rent_type_year'] || $_GET['rent_type_month'] || $_GET['rent_type_jun'] || $_GET['room_type_one'] || $_GET['room_type_two'] || $_GET['room_type_mini'] || $_GET['room_type_etc'] || $_GET['midnight'] || $_GET['tax_b'] || $_GET['tax_e'] || $_GET['tax_w'] || $_GET['tax_g'] || $_GET['tax_i']) {
	if($_GET['pay_a'] && $_GET['pay_b']) {
		$room_string = "select * from room ".$query_area.$query_rent_type.$query_room_type.$query_tax." and (r_pay_year >= $pay_a and r_pay_year <= $pay_b)";
	} else {
		$room_string = "select * from room ".$query_area.$query_rent_type.$query_room_type.$query_tax;
	}
} elseif($_GET['pay_a'] && $_GET['pay_b']) {
	$room_string = "select * from room where (r_pay_year >= $pay_a and r_pay_year <= $pay_b)";
} else {
	$room_string = "select * from room order by r_num asc";
}

if($_GET['r_name']) {
	$room_query = mysql_query("select * from room where r_name LIKE '%$_GET[r_name]%'");
} else {
	$room_query = mysql_query($room_string);
}


$num_query = mysql_query($room_string);
$ii = 0;
while($data_num = mysql_fetch_array($num_query)) {
$r_num[$ii] = $data_num['r_num'];
$ii++;
}


?>

var r_name = [];
var r_address = [];
var r_pay = [];
var r_deposit = [];
var r_comment = [];
var r_state = [];
var oTarget = [];
var oCustomEvent = [];
var oPoint = [];
var oMarker = [];
var oInfoWnd = [];

<?


$i = 0;
while($data1 = mysql_fetch_array($room_query)) {

$img_thum_temp = @explode(",", $data1['r_photo']);

if($data1['r_type'] == "o") {
	$rt = "원룸";
}
elseif($data1['r_type'] == "t") {
	$rt = "투룸";
}
elseif($data1['r_type'] == "m") {
	$rt = "미니투룸";
}
elseif($data1['r_type'] == "e") {
	$rt = "기타";
}

if($data1['r_rent_type'] == "y") {
	if($data1['r_deposit'] == 0)
		$deposit = "없음";
	else
		$deposit = substr($data1['r_deposit'],-0, -4)."만원";
	$pay = substr($data1['r_pay_year'],-0, -4)."만원&nbsp;<b>(사글세)</b>";
} elseif($data1['r_rent_type'] == "m") {
	if($data1['r_deposit'] == 0)
		$deposit = "없음";
	else
		$deposit = substr($data1['r_deposit'],-0, -4)."만원";
	$pay = substr($data1['r_pay_month'],-0, -4)."만원&nbsp;<b>(월세)</b>";
} elseif($data1['r_tent_type'] == "j") {
	if($data1['r_deposit'] == 0)
		$deposit = "없음";
	else
		$deposit = substr($data1['r_deposit'],-0, -4)."만원";
	$pay = substr($data1['r_pay_jun'],-0, -4)."만원&nbsp;<b>(전세)</b>";
}

?>

r_name[<?=$r_num[$i]?>] = "<?=$data1['r_name']?>";
r_address[<?=$r_num[$i]?>] = "<?=$data1['r_address']?>";
r_pay[<?=$r_num[$i]?>] = "<?=$pay?>";
r_deposit[<?=$r_num[$i]?>] = "<?=$deposit?>";
r_comment[<?=$r_num[$i]?>] = "<?=$data1['r_comment']?>";
r_state[<?=$r_num[$i]?>] = "<?=$data1['r_state']?>";

oPoint[<?=$r_num[$i]?>] = new nhn.api.map.LatLng(<?=$data1['r_loc_y']?>, <?=$data1['r_loc_x']?>);

if(r_state[<?=$r_num[$i]?>] == 'y')
	oMarker[<?=$r_num[$i]?>] = new nhn.api.map.Marker(oIcon_y, { point : oPoint[<?=$r_num[$i]?>], title : r_name[<?=$r_num[$i]?>] });  //빈방 있는 마커 생성
if(r_state[<?=$r_num[$i]?>] == 'n')
	oMarker[<?=$r_num[$i]?>] = new nhn.api.map.Marker(oIcon_n, { point : oPoint[<?=$r_num[$i]?>], title : r_name[<?=$r_num[$i]?>] });  //빈방 없는 마커 생성

oMap.addOverlay(oMarker[<?=$r_num[$i]?>]); //마커를 지도위에 표현

oInfoWnd[<?=$r_num[$i]?>] = new nhn.api.map.InfoWindow();
oMap.addOverlay(oInfoWnd[<?=$r_num[$i]?>]);

oMarker[<?=$r_num[$i]?>].attach('click', function(oCustomEvent) {
	if (oCustomEvent.clickCoveredMarker) {
		<? for($j=0; $j<mysql_num_rows($room_query); $j++) { ?>
			oInfoWnd[<?=$r_num[$j]?>].setVisible(false, oMarker[<?=$r_num[$j]?>]);
		<? } ?>
		return;
	}

	var div = "<div style='width: 350px; height: 100px; border: 1px solid #bbbbbb; background-color: white; font-family:나눔고딕; cursor:pointer; '><div style='width: 90px; padding: 10px 0 0 10px; float: left;'><img src='./roomimg/<?=$img_thum_temp[0]?>' width='80' height='80' style='border:1px solid #bbbbbb;' /></div><div style='width:250px; height:100px; float:left;'><div style='padding: 7px 0 0 5px; width:245px; font-size: 13pt; font-weight: bold; color: #333333; '>" + r_name[<?=$r_num[$i]?>] + "<font color='#999'>(<?=$rt?>)</font></div><div style='width: 245px; padding: 5px 0 0 5px; font-size: 9.5pt; line-height: 19px; white-space:nowrap;overflow: hidden; text-overflow: ellipsis; '><span style='color: #3366cc; font-weight: bold; '>" + r_address[<?=$r_num[$i]?>] + "</span><br/><span style='color: #333; '>보증금 : " + r_deposit[<?=$r_num[$i]?>] + " / 가격 : " + r_pay[<?=$r_num[$i]?>] + "<br /></span><span style='color: #888888;'>" + r_comment[<?=$r_num[$i]?>] + "</span></div></div></div>";

	if(!oInfoWnd[<?=$r_num[$i]?>].getVisible()) {
		<? for($j=0; $j<mysql_num_rows($room_query); $j++) { ?>
			oInfoWnd[<?=$r_num[$j]?>].setVisible(false, oMarker[<?=$r_num[$j]?>]);
		<? } ?>

		oInfoWnd[<?=$r_num[$i]?>].setVisible(true, oMarker[<?=$r_num[$i]?>]);
	}
	else
		oInfoWnd[<?=$r_num[$i]?>].setVisible(false, oMarker[<?=$r_num[$i]?>]);

	oInfoWnd[<?=$r_num[$i]?>].setContent(div);
	oInfoWnd[<?=$r_num[$i]?>].setPoint(oMarker[<?=$r_num[$i]?>].getPoint());
	oInfoWnd[<?=$r_num[$i]?>].setPosition({right : 14, top : 40});
	oInfoWnd[<?=$r_num[$i]?>].autoPosition();

	oInfoWnd[<?=$r_num[$i]?>].attach('click', function(oCustomEvent) {
		popupCenter_b('./room/view.php?r_num=<?=$data1['r_num']?>',900,800);
	});

});

<?
$i++;
}
?>

function showOnMap(num) {
	alert(num);
	oInfoWnd[num].setVisible(true, oMarker[num]);
	alert(num);
}

</script>
