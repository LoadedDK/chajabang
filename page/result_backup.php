<ul>
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
	if($pay_a && $pay_b) {
		$room_string = "select * from room ".$query_area.$query_rent_type.$query_room_type.$query_tax." and (r_pay_year >= $pay_a and r_pay_year <= $pay_b)";
	} else {
		$room_string = "select * from room ".$query_area.$query_rent_type.$query_room_type.$query_tax;
	}
} elseif($pay_a && $pay_b) {
	$room_string = "select * from room where (r_pay_year >= $pay_a and r_pay_year <= $pay_b)";
} else {
	$room_string = "select * from room order by r_pay_year desc";
}

if($_GET['r_name']) {
	$room_query = mysql_query("select * from room where r_name LIKE '%$_GET[r_name]%'");
} else {
	$room_query = mysql_query($room_string);
}

if(mysql_num_rows($room_query) == 0) { //카운팅
	echo "결과 값이 없습니다.";
}
$k=0;

while($data2 = mysql_fetch_array($room_query)) {
?>
<a style="color:#333; text-decoration:none;" href="javascript:popupCenter_b('./room/view.php?r_num=<?echo $data2['r_num']; ?>',900,800)">
<!--<a style="color:#333; text-decoration:none;" onclick=showOnMap('<?//echo $data2['r_num']; ?>')>-->
<li>
	<input type="hidden" id="num<?=$r_num[$k]?>" />
	<div class="result_r_img">
		<img src="./roomimg/<?echo $data2['r_photo'];?>" width="80" height="80" style="border:1px solid #bbbbbb;" />
	</div>
	<div class="result_r_content">
		<div class="result_r_title">
		<?
		if($data2['r_type'] == "o") {
			$rt = "원룸";
		} elseif($data2['r_type'] == "t") {
			$rt = "투룸";
		} elseif($data2['r_type'] == "m") {
			$rt = "미니투룸";
		} elseif($data2['r_type'] == "e") {
			$rt = "기타";
		}
		echo $data2['r_name']."<font size='2pt' color='#999'>(".$rt.")</font>";
		?>
		</div>
		<div class="result_r_text">
			<span class="result_r_text_addr"><? echo $data2['r_address']; ?></span><br/>
			<span class="result_r_text_price">
			<?
			if($data2['r_rent_type'] == "y") {
				if($data2['r_deposit'] == 0)
					$deposit = "없음";
				else
					$deposit = substr($data2['r_deposit'],-0, -4)."만원";
				$pay_year = substr($data2['r_pay_year'],-0, -4)."만원";
				
				if($data2['r_pay_year'] < 110000) echo "가격정보없음<br/>";
				else echo "보증금 : ".$deposit." / 가격 : ".$pay_year."<br />";
			} elseif($data2['r_rent_type'] == "m") {
				if($data2['r_deposit'] == 0)
					$deposit = "없음";
				else
					$deposit = substr($data2['r_deposit'],-0, -4)."만원";
				$pay_month = substr($data2['r_pay_month'],-0, -4)."만원";
				
				if($data2['r_pay_month'] < 110000) echo "가격정보없음<br/>";
				else echo "보증금 : ".$deposit." / 가격 : ".$pay_month."<br />";
			} elseif($data2['r_tent_type'] == "j") {
				if($data2['r_deposit'] == 0)
					$deposit = "없음";
				else
					$deposit = substr($data2['r_deposit'],-0, -4)."만원";
				$pay_jun = substr($data2['r_pay_jun'],-0, -4)."만원";
				
				if($data2['r_pay_jun'] < 110000) echo "가격정보없음<br/>";
				else echo "보증금 : ".$deposit." / 가격 : ".$pay_jun."<br />";
			}
			?>
			</span>
			<span class="result_r_text_comment">
			<? echo $data2['r_comment']; ?>
			</span>
		</div>
	</div>
</li>
</a>
<?
$k++;
}
?>

<script>

function showOnMap(num) {
	
	for(var i = num; i<=num; i++) {
		alert(i);
		if(!oInfoWnd[i].getVisible()) {
			<? for($j=0; $j<mysql_num_rows($room_query); $j++) { ?>
				oInfoWnd<?=$r_num[$j]?>.setVisible(false, oMarker<?=$r_num[$j]?>);
			<? } ?>
			
			oInfoWnd[i].setVisible(true, oMarker<?=$r_num[$i]?>);
		}
		else
			oInfoWnd[i].setVisible(false, oMarker<?=$r_num[$i]?>);
	}
	
}

</script>

</ul>