<?include "lib/common.php";?>
<!DOCTYPE HTML>
<html>
<head>
<LINK REL="SHORTCUT ICON" HREF="http://220.69.240.111/img/favicon.ico"  type="image/x-icon"  />
<link rel="stylesheet" href="css/style.css" />
<meta charset="utf-8" />
<title>찾아방-안동대학교 자취방 찾기 프로젝트</title>
<script type="text/javascript" src="http://openapi.map.naver.com/openapi/naverMap.naver?ver=2.0&key=5fea24539e7a7fb976d7c1242d3d7fe0"></script>
<script language="JavaScript">
function getCookie(name) {

	var nameOfCookie = name + '=';
	var x = 0;
	
	while( x <= document.cookie.length){
	
		var y = (x+nameOfCookie.length);
		
		if( document.cookie.substring(x,y) == nameOfCookie ){
		
			if( (endOfCookie=document.cookie.indexOf(";",y)) == -1 )
			endOfCookie = document.cookie.length;
			return unescape( document.cookie.substring(y, endOfCookie) );
		
		}
		
		x = document.cookie.indexOf("", x) + 1;
		
		if(x == 0)
			break
	
	}
	return "";
}


function popup(){
	
	if(getCookie("Notice") != "no"){ //쿠키네임지정!
	
		var child = null;
		

		//팝업 띄울 페이지 디렉토리 혹은 팝업창!
		child = window.open("popup/popup_01.php", "pop", "width=670, height=670, notoolbars, resizable=no, scrollbars=auto"); 
		child.focus();
	}
	return;
}

//popup(); //자동으로 팝업 띄우기


function popupCenter(url, w, h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var newWindow = window.open(url, 'title','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);

	if (window.focus) {
		newWindow.focus();
	}
}

function popupCenter_b(url, w, h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var newWindow = window.open(url, 'title','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);

	if (window.focus) {
		newWindow.focus();
	}
} 


</script> 
</head>
<body>
<?
/* 조회수 매기기 */
 $ip =  $_SERVER['REMOTE_ADDR'];//유저 ip 불러오기
//이전 기록 확인 쿼리
	$result = mysql_query("SELECT * FROM statistics WHERE s_ip='$ip' and TIMESTAMPDIFF(minute, s_date, NOW())<'30' ORDER BY s_num DESC LIMIT 1");
	$statistics = mysql_fetch_array($result);
	//30분 이내에 접속된 동일 사용자 기록이 없을 경우에만. DB 입력
	if($statistics == NULL)
		mysql_query("INSERT INTO statistics(s_date, s_ip) VALUES(NOW(), '$ip')");
?>
<div id="wrap">
<!-- 헤더영역 시작(로고,유틸,옵션별 검색 영역) -->
<div id="head">
	<div id="head_top">
			<div id="head_top_logo">
			<a style="text-decoration:none;" href="index.php">
				<div class="logo">
					<div id="logo_top">
					찾아<span class="logo_o">방</span>
					</div>
					<div id="logo_bottom">
					안동대학교자취방찾기프로젝트
					</div>
				</div>
			</a>
			</div>
			<div id="head_top_util">
				<div id="util_menu">
				<a href="javascript:popupCenter('./page/intro.php',600,700)"><b>찾아방 Info</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<?
				$query_u2 = mysql_query("select * from user where u_id='$_SESSION[fr_u_id]'");
				$user2 = mysql_fetch_array($query_u2);
				if($user2['u_lv'] == "s") {
				?>
					<a href="javascript:popupCenter('./user/room_admin.php',1200,800)">방 관리</a>&nbsp;&nbsp;|
					&nbsp;&nbsp;<a href="javascript:popupCenter('./user/modify.php',600,700)">회원정보 수정</a>&nbsp;&nbsp;|
					&nbsp;&nbsp;<a href="./user/logout.php">로그아웃</a>&nbsp;&nbsp;|
					&nbsp;&nbsp;<a href="javascript:popupCenter('./user/brake_away.php',600,400)">회원탈퇴</a>&nbsp;&nbsp;&nbsp;
						<input type="button" onclick="popupCenter('./user/commu.php',850,650)" value="의견 남기기" />
				<?
				} elseif($user2['u_lv'] == "m") {
				?>
					<a style="color:orange;" href="javascript:popupCenter('./admin/count.php',900,700)">접속통계</a>&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="javascript:popupCenter('./admin/room_admin.php',1200,800)">방 관리</a>&nbsp;&nbsp;|
					&nbsp;&nbsp;<a href="javascript:popupCenter('./admin/user_admin.php',1200,800)">회원 관리</a>&nbsp;&nbsp;|
					&nbsp;&nbsp;<a href="javascript:popupCenter('./user/modify.php',600,700)">관리자정보 수정</a>&nbsp;&nbsp;|
					&nbsp;&nbsp;<a href="./user/logout.php">로그아웃</a>&nbsp;&nbsp;&nbsp;
						<input type="button" onclick="popupCenter('./user/commu.php',850,650)" value="의견 남기기" />&nbsp;&nbsp;<input type="button" onclick="popupCenter('./popup/popup_01.php',670,670)" value="안내" />
				<?
				} elseif($user2['u_lv'] == "c") {
				?>
					&nbsp;&nbsp;<a href="javascript:popupCenter('./user/modify.php',600,700)">회원정보 수정</a>&nbsp;&nbsp;|
					&nbsp;&nbsp;<a href="./user/logout.php">로그아웃</a>&nbsp;&nbsp;|
					&nbsp;&nbsp;<a href="javascript:popupCenter('./user/brake_away.php',600,400)">회원탈퇴</a>&nbsp;&nbsp;&nbsp;
						<input type="button" onclick="popupCenter('./user/commu.php',850,650)" value="의견 남기기" />&nbsp;&nbsp;<input type="button" onclick="popupCenter('./popup/popup_01.php',670,670)" value="안내" />
				<?
				} else {
				?>
					<a href="javascript:popupCenter('./user/join_type.php',600,700)">회원가입</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:popupCenter('./user/login.php',600,450)">로그인</a>&nbsp;&nbsp;&nbsp;
						<input type="button" onclick="popupCenter('./user/commu.php',850,650)" value="의견 남기기" />&nbsp;&nbsp;<input type="button" onclick="popupCenter('./popup/popup_01.php',670,670)" value="안내" />
				<?
				}
				?>
				</div>
				<div id="commu">
			
				</div>
			</div>
	</div>
	<div id="head_bottom">
		<div id="head_bottom_content">
			<div id="option">
			<? include "page/option.php"; ?>
			</div>
		</div>
	</div>
</div>
<!-- 헤더영역 종료 -->
<div id="body">
<div id="con">
	<div id="map_area">
		<div id="map_legend">
			<p><img src="./img/marker_y.png" width="19" />&nbsp;&nbsp;방 있음&nbsp;&nbsp;
			<img src="./img/marker_n.png" width="19" />&nbsp;&nbsp;방 없음</p>
		</div>
		<div id="Map">
		</div>
		<? include "page/map.php"; ?>
	</div>
	<div id="right_result">
		<div id="result">
		<?include "page/result.php"; ?>
		</div>
	</div>
</div>
</div>
<div id="footer">
	<div id="copy">
	Copyright (c) 2015 안동대학교 컴퓨터공학과 A.D.D Allrights reserved.
	</div>
	<div id="footer_menu">
	
	</div>
</div>
</div>
</body>
</html>