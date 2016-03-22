<?
include "../lib/common.php";
$query_r = mysql_query("select * from room where r_num='$_GET[r_num]'");
$room = mysql_fetch_array($query_r);
$query_u = mysql_query("select * from user where u_id='$room[u_id]'");
$user = mysql_fetch_array($query_u);



?>
<html>	
<head>
<link rel="stylesheet" href="../css/view.css" />
<meta charset="utf-8" />
<title>찾아방 - 접속통계</title>
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
		<span style="font-size:25pt; font-weight:bold; color:#4374D9;">접속 통계 시스템</span>&nbsp;&nbsp;
	</div>
	<div id="content">
		<div id="content_title">
		기준 : <?echo date("Y-m-d H:i");?>
		</div>
		<div id="content_table">
		<table width="100%" cellpadding="15" cellspacing="0">
			<tr>
				<th bgcolor="#B2EBF4" colspan="16">접속량</th>
			</tr>
			<tr>
				<th>오늘</th>
				<td colspan="3">
				<?
				$result = mysql_query("select s_num from statistics where date(s_date)=date_add(date(now()),interval 0 day)");
				$cnt = mysql_num_rows($result);
				echo $cnt;
				?>
				</td>
				<th>어제</th>
				<td colspan="3">
				<?
				$result = mysql_query("select s_num from statistics where date(s_date)=date_add(date(now()),interval -1 day)");
				$cnt = mysql_num_rows($result);
				echo $cnt;
				?>
				</td>
				<th>누적</th>
				<td colspan="2">
				<?
				$result = mysql_query("select s_num from statistics");
				$cnt = mysql_num_rows($result);
				echo $cnt;
				?>
				</td>
			</tr>
			<tr>
				<th rowspan="5">시간별</th>
			<?
			for($i=0;$i<24;$i++) {
				echo "<th>".$i."시</th><td>";
				if($i < 10) $j = "0".$i;
				else $j = $i;
				$result = mysql_query("select s_num from statistics where date_format(s_date,'%Y-%m-%d %H')=date_format(now(),'%Y-%m-%d $j')");
				$cnt = mysql_num_rows($result);
				echo $cnt;
				echo"</td>";
				if($i == 5 || $i == 11 || $i == 17 || $i == 23) echo "</tr><tr>";
			}
			?>
			</tr>
			<tr>
				<th bgcolor="#B2EBF4" colspan="16">회원가입</th>
			</tr>
			<tr>
				<th>오늘 가입</th>
				<td colspan="3">
				<?
				$result = mysql_query("select u_id from user where date(u_join_date)=date_add(date(now()),interval 0 day)");
				$cnt = mysql_num_rows($result);
				echo $cnt;
				?>
				</td>
				<th>어제</th>
				<td colspan="3">
				<?
				$result = mysql_query("select u_id from user where date(u_join_date)=date_add(date(now()),interval -1 day)");
				$cnt = mysql_num_rows($result);
				echo $cnt;
				?>
				</td>
				<th>누적</th>
				<td colspan="2">
				<?
				$result = mysql_query("select u_id from user");
				$cnt = mysql_num_rows($result);
				echo $cnt;
				?>
				</td>
			</tr>
			<tr>
				<th bgcolor="#B2EBF4" colspan="16">방 등록</th>
			</tr>
			<tr>
				<th>오늘</th>
				<td colspan="3">
				<?
				$result = mysql_query("select r_num from room where date(r_date)=date_add(date(now()),interval 0 day)");
				$cnt = mysql_num_rows($result);
				echo $cnt;
				?>
				</td>
				<th>어제</th>
				<td colspan="3">
				<?
				$result = mysql_query("select r_num from room where date(r_date)=date_add(date(now()),interval -1 day)");
				$cnt = mysql_num_rows($result);
				echo $cnt;
				?>
				</td>
				<th>누적</th>
				<td colspan="2">
				<?
				$result = mysql_query("select r_num from room");
				$cnt = mysql_num_rows($result);
				echo $cnt;
				?>
				</td>
			</tr>
		</table>
		</div>
	</div>
</div>
</div>
</body>
</html>