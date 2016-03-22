<?
include "../lib/common.php";
$query_r = mysql_query("select * from room where r_num='$_GET[r_num]'");
$room = mysql_fetch_array($query_r);
$query_u = mysql_query("select * from user where u_id='$room[u_id]'");
$user = mysql_fetch_array($query_u);

//조회수 증가시키기
mysql_query("update room set r_view = r_view + 1 where r_num='$room[r_num]'");


?>
<html>	
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - View(<?echo $room['r_name']; ?>)</title>
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
</div><hr />
<div id="body">
	<div id="body_title">
		<span class="body_title_f">▶</span>&nbsp;&nbsp;<font style="font-size:15pt;"><?echo $room['r_name']; ?></font>&nbsp;&nbsp;
		<font style="color:#333; font-size: 13pt;">(등록자 : 
		<?
		if($_SESSION['fr_u_id']) {
			echo $user['u_name'];
		} else {
			for($i=1;$i<=strlen($user['u_name'])/3;$i++) echo "*";
		}
		?>
		)</font>
		<font style="color:#333; font-size: 13pt;">&nbsp;&nbsp;/&nbsp;&nbsp;빈방 : </font>	
		<?
		if($room['r_state'] == "y") echo "<font style='color:green; font-size: 13pt'>있음</fron>";
		else echo "<font style='color:red; font-size: 13pt'>없음</fron>";
		?>
		</font>
	</div>
	<div id="room_view_table">
	<table width="860" border="1" cellspacing="0" cellpadding="3">
	<tr>
		<td colspan="2" width="350">
		<?
		//이미지 사이즈
		$img = "../roomimg/".$room['r_photo'];
		$imgSize = getimagesize($img);
		$width = $imgSize[0];
		$height = $imgSize[1];
		if($width > 800 || $height > 600) {
			$sumw = (100*600)/$height;
			$sumh = (100*800)/$width;
			if($sumw < $sumh) {
				$img_width = ceil(($width*$sumw)/100);
				$img_height = 600;
			} else {
				$img_height = ceil(($height*$sumh)/100);
				$img_width = 800;
			}
		} else {
			$img_width = $width;
			$img_height = $height;
		}
		?>
		<img src="<?echo $img; ?>" width="350" height="220" onclick="window.open('open_img.php?img_name=<?echo $room['r_photo']; ?>', '_blank', 'width=<?echo $img_width; ?>, height=<?echo $img_height; ?>')" alt="썸네일" />
		</td>
		<td width="510" style="text-align:left; line-height:22pt; vertical-align:top;">
		<font color="orange">▶</font> <font color="#333"><b>임대방식</b> : 
		<?
		if($room['r_rent_type'] == "y") echo "사글세";
		elseif($room['r_rent_type'] == "m") echo "월세";
		elseif($room['r_rent_type'] == "j") echo "전세";
		?>
		</font><br />
		<font color="orange">▶</font> <font color="#333"><b>방 종류</b> : 
		<?
		if($room['r_type'] == "o") echo "원룸";
		elseif($room['r_type'] == "t") echo "투룸";
		elseif($room['r_type'] == "m") echo "미니투룸";
		elseif($room['r_type'] == "e") echo "기타";
		?>
		</font><br />
		<font color="orange">▶</font> <font color="#333"><b>가격</b> : 
		<?
			if($room['r_rent_type'] == "y") {
				if($room['r_deposit'] == 0)
					$deposit = "없음";
				else
					$deposit = substr($room['r_deposit'],-0, -4)."만원";
				$pay_year = substr($room['r_pay_year'],-0, -4)."만원";
				echo "보증금 : ".$deposit." / 가격 : ".$pay_year."<br />";
			} elseif($room['r_rent_type'] == "m") {
				if($room['r_deposit'] == 0)
					$deposit = "없음";
				else
					$deposit = substr($room['r_deposit'],-0, -4)."만원";
				$pay_month = substr($room['r_pay_month'],-0, -4)."만원";
				echo "보증금 : ".$deposit." / 가격 : ".$pay_month."<br />";
			} elseif($room['r_tent_type'] == "j") {
				if($room['r_deposit'] == 0)
					$deposit = "없음";
				else
					$deposit = substr($room['r_deposit'],-0, -4)."만원";
				$pay_jun = substr($room['r_pay_jun'],-0, -4)."만원";
				echo "보증금 : ".$deposit." / 가격 : ".$pay_jun."<br />";
			}
		?>
		<span style="font-size:10pt; color:#999;">※ 기간과 환경에 따라 가격이 차이가 날 수 있습니다.</span><br/>
		</font>
		<font color="orange">▶</font> <font color="#333"><b>세금</b> : 
		<?
		if($room['midnight'] == "y") echo "※심야 보일러 ";
		if($room['r_tax_gas'] == "y") echo "가스세  ";
		if($room['r_tax_boiler'] == "y") echo "보일러세  ";
		if($room['r_tax_elec'] == "y") echo "전기세  ";
		if($room['r_tax_water'] == "y") echo "수도세  ";
		if($room['r_tax_internet'] == "y") echo "인터넷  ";
		?>
		</font><br />
		<font color="orange">▶</font> <font color="#333"><b>주소</b> : <?echo $room['r_address']; ?></font><br />
		<font color="orange">▶</font> <font color="#333"><b>연락처</b> : 
		<?
		if($_SESSION['fr_u_id']) {
			echo $user['u_phone'];
		} else {
			for($i=1;$i<=strlen($user['u_phone']);$i++) echo "*";
		}
		?>
		</font><br />
		<font color="orange">▶</font> <font color="#333"><b>코멘트</b><br />
		<?echo $room['r_comment']; ?></font><br />
		</td>
	</tr>
	<tr>
		<th colspan="3">이미지</th>
	</tr>
	<tr>
		<td style="text-align:center;" colspan="3">
			<ul>
				<li>
				<p>부엌</p>
				<?
				if($room['r_photo_k']) {
				//이미지 사이즈
				$img = "../roomimg/".$room['r_photo_k'];
				$imgSize = getimagesize($img);
				$width = $imgSize[0];
				$height = $imgSize[1];
				if($width > 800 || $height > 600) {
					$sumw = (100*600)/$height;
					$sumh = (100*800)/$width;
					if($sumw < $sumh) {
						$img_width = ceil(($width*$sumw)/100);
						$img_height = 600;
					} else {
						$img_height = ceil(($height*$sumh)/100);
						$img_width = 800;
					}
				} else {
					$img_width = $width;
					$img_height = $height;
				}
				
				?>
				<img style="border:1px solid #999; padding:5px;" src="../roomimg/<?echo $room['r_photo_k']; ?>" width="200" height="120" onclick="window.open('open_img.php?img_name=<?echo $room['r_photo_k'];?>', '_blank', 'width=<?echo $img_width; ?>, height=<?echo $img_height; ?>')" alt="부엌사진" />
				<?
				} else {
					echo "No Image";
				}
				?>
				</li>
				<li>
				<p>욕실</p>
				<?
				if($room['r_photo_b']) {
				//이미지 사이즈
				$img = "../roomimg/".$room['r_photo_b'];
				$imgSize = getimagesize($img);
				$width = $imgSize[0];
				$height = $imgSize[1];
				if($width > 800 || $height > 600) {
					$sumw = (100*600)/$height;
					$sumh = (100*800)/$width;
					if($sumw < $sumh) {
						$img_width = ceil(($width*$sumw)/100);
						$img_height = 600;
					} else {
						$img_height = ceil(($height*$sumh)/100);
						$img_width = 800;
					}
				} else {
					$img_width = $width;
					$img_height = $height;
				}
				?>
				<img style="border:1px solid #999; padding:5px;" src="../roomimg/<?echo $room['r_photo_b']; ?>" width="200" height="120" onclick="window.open('open_img.php?img_name=<?echo $room['r_photo_b'];?>', '_blank', 'width=<?echo $img_width; ?>, height=<?echo $img_height; ?>')" alt="욕실사진" />
				<?
				} else {
					echo "No Image";
				}
				?>
				</li>
				<li>
				<p>기타</p>
				<?
				if($room['r_photo_r']) {
				//이미지 사이즈
				$img = "../roomimg/".$room['r_photo_r'];
				$imgSize = getimagesize($img);
				$width = $imgSize[0];
				$height = $imgSize[1];
				if($width > 800 || $height > 600) {
					$sumw = (100*600)/$height;
					$sumh = (100*800)/$width;
					if($sumw < $sumh) {
						$img_width = ceil(($width*$sumw)/100);
						$img_height = 600;
					} else {
						$img_height = ceil(($height*$sumh)/100);
						$img_width = 800;
					}
				} else {
					$img_width = $width;
					$img_height = $height;
				}
				?>
				<img style="border:1px solid #999; padding:5px;" src="../roomimg/<?echo $room['r_photo_r']; ?>" width="200" height="120" onclick="window.open('open_img.php?img_name=<?echo $room['r_photo_r'];?>', '_blank', 'width=<?echo $img_width; ?>, height=<?echo $img_height; ?>')" alt="기타사진" />
				<?
				} else {
					echo "No Image";
				}
				?>
				</li>
			</ul>
			<br /><br /><br />
		</td>
	</tr>
	<tr>
		<th colspan="3">상세내용</th>
	</tr>
	<tr>
		<td style="text-align:center;" colspan="3">
			<?echo $room['r_detail']; ?>
		</td>
	</tr>
	</table>
	</div>
</div>
</div>
</body>
</html>