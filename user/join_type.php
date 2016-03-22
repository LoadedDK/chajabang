<?
//회원가입 : 가입유형 선택
include "../lib/common.php";
log_se_check();
?>
<html>
<head>
<link rel="stylesheet" href="../css/user.css" />
<meta charset="utf-8" />
<title>찾아방 - 회원가입</title>
</head>
<body>
<div id="wrapper">
<div class="logo">
	<div id="logo_top">
	찾아<span class="logo_o">방</span>
	</div>
	<div id="logo_bottom">
	안동대학교자취방찾기프로젝트
	</div>
</div>
<div id="head">
	<div id="title">
	회원가입 > 가입유형 선택
	</div>
</div>
<div id="body">
	<div id="btn_area">
		<a href="join.php?type=s">
		<div id="btn_area_a">
			<span class="font_figure">▶</span>&nbsp;방주인 가입하기.<br />
			<span class="font_comment">( 방을 등록하고 관리할 수 있습니다. )</span>
		</div>
		</a>
		<a href="join.php?type=c">
		<div id="btn_area_b">
			<span class="font_figure">▶</span>&nbsp;일반회원 가입하기.<br />
		</div>	
		</a>
	</div>
	<div id="btn_can">
		<input type="button" onclick="javascript:self.close();" value="취소" />
	</div>
</div>
</div>
</body>
</html>