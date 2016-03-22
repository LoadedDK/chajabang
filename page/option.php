<script>
function check_input() {
	var pay_a = document.getElementById('pay_a')
	var pay_b = document.getElementById('pay_b')
	
	if(document.option.pay_a.value && !document.option.pay_b.value) {
		alert('가격란 모두 입력해주세요.');
		document.option.pay_b.focus();
	} else if(!document.option.pay_a.value && document.option.pay_b.value) {
		alert('가격란 모두 입력해주세요.');
		document.option.pay_a.focus();
	} else if(pay_a.value > pay_b.value) {
		alert('가격을 정확히 입력하세요.');
		document.option.pay_a.focus();
	} else if(document.option.pay_a.value && document.option.pay_a.value == 0) {
		alert('가격은 최소 1만원 이상 입력하세요.');
		document.option.pay_a.focus();
	} else {
		document.option.submit();
	} 
}
function digitCheck()
{
	if(event.keyCode==13) check_input();
    var obj  = event.srcElement;
    obj.value = obj.value.replace(/[^\d]/g,'');
}
</script>
<form name="option" action="index.php" method="get">
<ul>
	<li>
		<div class="option_left">
			<span class="option_bold">[지역]</span>
		</div>
		<div class="option_right">
			<span class="option_check">
			<input type="checkbox" name="area_s" value="y" <?if($_GET['area_s'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;솔뫼 방향
			</span>
			<span class="option_check">
			<input type="checkbox" name="area_n" value="y" <?if($_GET['area_n'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;논골 방향
			</span>
		</div>
	</li>
	<li>
		<div class="option_left">
			<span class="option_bold">[방 종류]</span>
		</div>
		<div class="option_right">
			<span class="option_check">
			<input type="checkbox" name="room_type_one" value="y" <?if($_GET['room_type_one'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;원룸
			</span>
			<span class="option_check">
			<input type="checkbox" name="room_type_two" value="y" <?if($_GET['room_type_two'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;투룸
			</span>
			<span class="option_check">
			<input type="checkbox" name="room_type_mini" value="y" <?if($_GET['room_type_mini'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;미니투룸
			</span>
			<span class="option_check">
			<input type="checkbox" name="room_type_etc" value="y" <?if($_GET['room_type_etc'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;기타
			</span>
		</div>
	</li>
	<li>
		<div class="option_left">
			<span class="option_bold">[가격 범위]</span>
		</div>
		<div class="option_right">
		<?
		$query_p = mysql_query("select ")
		?>
		<input style="width:65px; text-align:right; padding-right:3px;" id="pay_a" type="text" name="pay_a" onkeyup="digitCheck()" value="<?if($_GET['pay_a']) echo $_GET['pay_a']; ?>" />&nbsp;<span style="font-size:10pt; color:#555;font-weight:bold;">만원</span>&nbsp;~&nbsp;
		<input style="width:65px; text-align:right; padding-right:3px;" id="pay_b" type="text" name="pay_b" onkeyup="digitCheck()" value="<?if($_GET['pay_b']) echo $_GET['pay_b']; ?>" />&nbsp;<span style="font-size:10pt; color:#555;font-weight:bold;">만원</span>
		</div>
	</li>
	<li>
		<div class="option_left">
			<span class="option_bold">[가격순]</span>
		</div>
		<div class="option_right" style="line-height:20pt;">
			<span class="option_check">
			<input type="radio" name="order" value="desc" <?if($_GET['order'] == "desc") echo "checked='checked'";?>>&nbsp;&nbsp;높은가격 순
			</span>
			<span class="option_check">
			<input type="radio" name="order" value="asc" <?if($_GET['order'] == "asc") echo "checked='checked'";?>>&nbsp;&nbsp;낮은가격 순
			</span>
		</div>
	</li>
	<li>
		<div class="option_left">
			<span class="option_bold">[방 이름]</span>
		</div>
		<div class="option_right">
			<input style="width:130px; text-align:left;" id="r_name" type="text" name="r_name" value="<?if($_GET['r_name']) echo $_GET['r_name']; ?>"  onKeyUp="if(event.keyCode==13) check_input();" />
		</div>
	</li>
</ul>
<a onclick="this.nextSibling.style.display=(this.nextSibling.style.display=='none')?'block':'none';" href="javascript:void(0)"> 
상세검색하기 >>
</a><div style="DISPLAY: none">
<ul style="margin-top: 15px;">
	<li>
		<div class="option_left">
			<span class="option_bold">[임대 방식]</span>
		</div>
		<div class="option_right">
			<span class="option_check">
			<input type="checkbox" name="rent_type_year" value="y" <?if($_GET['rent_type_year'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;사글세
			</span>						
			<span class="option_check">
			<input type="checkbox" name="rent_type_month" value="y" <?if($_GET['rent_type_month'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;월세
			</span>
			<span class="option_check">
			<input type="checkbox" name="rent_type_jun" value="y" <?if($_GET['rent_type_jun'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;전세
			</span>
		</div>
	</li>
	<li>
		<div class="option_left">
			<span class="option_bold">[세금]</span>
		</div>
		<div class="option_right" style="line-height:20pt;">
			<span class="option_check">
			<input type="checkbox" name="midnight" value="y" <?if($_GET['midnight'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;심야전기
			</span>
			<span class="option_check">
			<input type="checkbox" name="tax_b" value="y" <?if($_GET['tax_b'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;난방비
			</span>
			<span class="option_check">
			<input type="checkbox" name="tax_e" value="y" <?if($_GET['tax_e'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;전기세<br/>
			</span>
			<span class="option_check">
			<input type="checkbox" name="tax_w" value="y" <?if($_GET['tax_w'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;수도세
			</span>
			<span class="option_check">
			<input type="checkbox" name="tax_g" value="y" <?if($_GET['tax_g'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;가스세
			</span>
			<span class="option_check">
			<input type="checkbox" name="tax_i" value="y" <?if($_GET['tax_i'] == "y") echo "checked='checked'";?>>&nbsp;&nbsp;인터넷
			</span>
		</div>
	</li>
</ul>

</div>

<div id="option_submit">
	<input style="width: 400px;height: 30px;margin: 0;padding: 0;border-radius: 0;background: orange;border: 1px solid #cc9966;color: #333333;font-weight: 500;" type="button" value="검색하기" onclick="check_input();" />&nbsp;&nbsp;
</div>
</form>