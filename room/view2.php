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
<link rel="stylesheet" href="../css/view.css" />
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>
<script>
(function(){
	var current = 0;
	var max = 0;
	var container;
	function init(){
		container = jQuery(".slide ul");
		max = container.children().length;

		events();
	}
	function events(){
		jQuery("button.prev").on("click", prev);
		jQuery("button.next").on("click", next);
	}
	function prev ( e ) {
		current--;
		if( current < 0 ) current = 0;
		animate();
	}
	function next ( e ) {
		current++;
		if( current > max-1 ) current = max-1;
		animate();
	}
	function animate() {
		var moveX = current * 600;
		TweenMax.to( container, 0.8, {marginLeft:-moveX, ease:Expo.easeOut });
	}
	jQuery( document ).ready( init );
})();
</script>
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
		<span style="font-size:25pt; font-weight:bold; color:#4374D9;"><?echo $room['r_name']; ?></span>&nbsp;&nbsp;
	</div>
	<div class="slide">
		<button class="prev" type="button"><img style="FILTER:alpha(opacity=70);" src="../img/prev.png" width="35" height="70" alt="prev" /></button>
		<ul>
			<li>
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
			<a href="#" onclick="window.open('open_img.php?img_name=<?echo $room['r_photo']; ?>', '_blank', 'width=<?echo $img_width; ?>, height=<?echo $img_height; ?>')"><img src="<?echo $img; ?>" width="600" height="300" alt="썸네일" /></a>
			</li>
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
			<li>
			<a href="#" onclick="window.open('open_img.php?img_name=<?echo $room['r_photo_k'];?>', '_blank', 'width=<?echo $img_width; ?>, height=<?echo $img_height; ?>')"><img src="../roomimg/<?echo $room['r_photo_k']; ?>" width="600" height="300" alt="부엌사진" /></a>
			</li>
			<?
			}
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
			<li>
			<a href="#" onclick="window.open('open_img.php?img_name=<?echo $room['r_photo_b'];?>', '_blank', 'width=<?echo $img_width; ?>, height=<?echo $img_height; ?>')"><img src="../roomimg/<?echo $room['r_photo_b']; ?>" width="600" height="300" alt="욕실사진" /></a>
			</li>
			<?
			}
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
			<li>
			<a href="#" onclick="window.open('open_img.php?img_name=<?echo $room['r_photo_r'];?>', '_blank', 'width=<?echo $img_width; ?>, height=<?echo $img_height; ?>')"><img src="../roomimg/<?echo $room['r_photo_r']; ?>" width="600" height="300"  alt="기타사진" /></a>
			</li>
			<?
			}
			?>
		</ul>
		<button class="next" type="button"><img src="../img/next.png" width="35" height="70" alt="next" /></button>
	</div>
	<div id="content">
		<div id="content_title">
			<span style="font-size:20pt; color:#333; font-weight:500;">방 정보</span>
		</div>
		<div id="content_table">
		<table width="100%" cellpadding="15" cellspacing="0">
			<tr>
				<th>가격정보</th>
				<td>
				<span style="color:#4374D9; font-weight:bold;">
				<?
				if($room['r_rent_type'] == "y") {
					echo substr($room['r_pay_year'],-0, -4)."만원";
				} elseif($room['r_rent_type'] == "m") {
					echo substr($room['r_pay_month'],-0, -4)."만원";
				} elseif($room['r_tent_type'] == "j") {
					echo substr($room['r_pay_jun'],-0, -4)."만원";
				}
				?></span>
				&nbsp;<span style="font-size:10pt; color:#999;">※ 기간과 환경에 따라 가격이 차이가 날 수 있습니다.</span>
				</td>
			</tr>
			<tr>
				<th>보증금</th>
				<td>
				<?
				if($room['r_deposit'] == 0)
					echo "없음";
				else
					echo substr($room['r_deposit'],-0, -4)."만원";
				?>
				</td>
			</tr>
			<tr>
				<th>임대방식</th>
				<td>
				<?
				if($room['r_rent_type'] == "y") echo "사글세";
				elseif($room['r_rent_type'] == "m") echo "월세";
				elseif($room['r_rent_type'] == "j") echo "전세";
				?>
				</td>
			</tr>
			<tr>
				<th>방종류</th>
				<td>
				<?
				if($room['r_type'] == "o") echo "원룸";
				elseif($room['r_type'] == "t") echo "투룸";
				elseif($room['r_type'] == "m") echo "미니투룸";
				elseif($room['r_type'] == "e") echo "기타";
				?>
				</td>
			</tr>
			<tr>
				<th>연락처</th>
				<td>
				<?
				if($_SESSION['fr_u_id']) {
					echo $user['u_phone'];
				} else {
					for($i=1;$i<=strlen($user['u_phone']);$i++) echo "*";
				}
				?>&nbsp;<span style="font-size:10pt; color:#999;">※ 로그인 후에 확인가능 합니다.</span>
				</td>
			</tr>
			<tr>
				<th>주소</th>
				<td>
				<?echo $room['r_address']; ?>
				</td>
			</tr>
			<tr>
				<th>면적</th>
				<td>
				<?echo $room['r_size']; ?>
				</td>
			</tr>
			<tr>
				<th>세금</th>
				<td>
				<?
				if($room['midnight'] == "y") echo "※심야 보일러 ";
				if($room['r_tax_gas'] == "y") echo "가스세  ";
				if($room['r_tax_boiler'] == "y") echo "보일러세  ";
				if($room['r_tax_elec'] == "y") echo "전기세  ";
				if($room['r_tax_water'] == "y") echo "수도세  ";
				if($room['r_tax_internet'] == "y") echo "인터넷  ";
				?>
				</td>
			</tr>
			<tr>
				<th>추가정보</th>
				<td>
				<?echo $room['r_detail']; ?>
				</td>
			</tr>
		</table>
		</div>
	</div>
</div>
</div>
</body>
</html>