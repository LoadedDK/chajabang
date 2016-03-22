<?
include "common.php";

//지역체크
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
$room_string = "select * from room ".$query_area.$query_rent_type.$query_room_type.$query_tax;
echo $room_string;
$room_query = mysql_query($room_string);
?>