<?
session_start();
//session_cache_limiter("nocache,must-revalidate"); //history시 폼 값 저장
$conn = mysql_connect("localhost","root","9801");
mysql_select_db("findroom");
mysql_query("set names utf8",$conn); 


function log_se_check() {
	if($_SESSION['fr_u_id']) {
		alertback("잘못된 접근입니다.");
	}
}
function movepage($url) {
echo "
	<script>
	self.location='$url';
	</script>
";
}

function alert($msg) {
echo "
	<script>
	alert('$msg');
	</script>
";
}

function alertback($msg) {
echo "
	<script>
	alert('$msg');
	history.back();
	</script>
";
}
?>