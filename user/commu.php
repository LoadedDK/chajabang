<?
//유저 소통게시판
include "../lib/common.php";
?>
<html>
<head>
<link rel="stylesheet" href="../css/commu.css" />
<meta charset="utf-8" />
<title>찾아방 - 소통게시판</title>
<script type="text/javascript">
function check_input() {
	if(!document.commu.c_name.value) {
		alert('닉네임을 입력하세요.');
		document.commu.c_name.focus();
	} else if(document.commu.c_name.value.length > 20) {
		alert('닉네임은 20자 이하로 입력하세요.');
		document.commu.c_name.focus();
	} else if(document.commu.c_pw.value.length != 4) {
		alert('패스워드는 4자리로 입력하세요.');
		document.commu.c_pw.focus();
	} else if(!document.commu.c_comment.value) {
		alert('내용을 입력하세요.');
		document.commu.c_comment.focus();
	} else {
		document.commu.submit();
	} 
}
</script>
</head>
<body>
<div id="wrapper">
<div id="head">
	<div id="title">
	<b><span style="color:#000;">찾아</span><span style="color:orange;">방</span> 의견 게시판</b>
	<p>찾아방에 대한 의견이나 후기, 기타 코멘트등 자유롭게 작성해주세요.</p>
	</div>
	<div id="input_content">
	<form id="commu" name="commu" action="commu_ok.php" method="post">
		<div id="input_content_top">
		<span style="font-size:10pt; color:red;">※ 찾아방 웹사이트의 불편/개선 사항을 적는 곳입니다. 각 방의 개인적인 리뷰는 무통보 삭제조치하겠습니다.</span><br/>
		<span style="font-size:10pt; color:orange;">※ 본 이미지들은 베타서비스 기간 이후 소멸되며, 저작권에 문제가 되는 즉시 삭제조치하겠습니다.</span><br/><br/>
		<?
		for($i=1;$i<=26;$i++) {
		if($i < 10)
			$j = "0".$i;
		else
			$j = $i;
		if($i == 11 || $i == 21) echo "<br/>";
		?>
		
		<input type="radio" name="c_icon" <?if($i==1) echo "checked='checked'";?> value="i<?echo $j; ?>"><img src="../icon/i<?echo $j; ?>.png" width="30" height="30" alt="icon" />&nbsp;&nbsp;
		<?
		}
		?>
		</div><br/>
		<div id="input_content_center">
			<span style="font-size:10pt; color:#666;"><b>- 닉네임</b> : </span><input type="text" id="c_name" name="c_name" style="width:100px;" />
			<span style="font-size:10pt; color:#666;">&nbsp;&nbsp;/&nbsp;&nbsp;패스워드 4자리 : </span><input type="password" id="c_pw" name="c_pw" style="width:100px;" />
		</div><br/>
		<div id="input_content_left">
			<textarea name="c_comment" cols="90" rows="3" name="text"></textarea>
		</div>
		<div id="input_content_right">
			<input style="width:100px; height:50px; background-color:orange; border:1px solid orange; font-size:12pt;" type="button" onclick="check_input()" value="작성" />
		</div>
	</form>
	</div>
</div>
<div id="body">
<?
$result = mysql_query("select * from comment order by c_num desc");
while($comment = mysql_fetch_array($result)) {
?>
<br/>
<?
if($comment['c_name'] == "관리자") {
?>
<div class="comment_list">
	<div id="left">
	<img src="../icon/ia.png"" width="70" height="70" alt="icon" />
	</div>
	<div id="right_a">
		<div id="name">
			<span style="color: #4374D9; font-size:12pt;"><b>관리자</b></span>
			&nbsp;&nbsp;<span style="color: #999; font-size:10pt;"><?echo $comment['c_date']; ?></span>
		</div>
		<div id="text_b">
			<span style="color: #333; font-size:10pt;"><?echo $comment['c_text']; ?><span>
		</div>
	</div>
</div>
<?
} else {
?>
<div class="comment_list">
	<div id="left">
	<img src="../icon/<?echo $comment['c_icon'].".png";?>" width="70" height="70" alt="icon" />
	</div>
	<div id="right_a">
		<div id="name">
			<span style="color: #4374D9; font-size:12pt;"><b><?echo $comment['c_name']; ?></b></span>
			&nbsp;&nbsp;<span style="color: #999; font-size:10pt;"><?echo $comment['c_date']; ?></span>
			&nbsp;&nbsp;
			<a style="color:#777; text-decoration:none; font-size:10pt;" href="#" onclick="window.open('comment_pw.php?type=d&c_num=<?echo $comment['c_num']; ?>', '_blank', 'width=400, height=100')"/>삭제</a>
		</div>
		<div id="text">
			<span style="color: #333; font-size:10pt;"><?echo $comment['c_text']; ?><span>
		</div>
	</div>
</div>
<?
}

}
?>
</div>
</div>
</body>
</html>