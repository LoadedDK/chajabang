<?include "../lib/common.php";?>
<!DOCTYPE HTML>
<html>
<head>
<LINK REL="SHORTCUT ICON" HREF="http://220.69.240.111/img/favicon.ico"  type="image/x-icon"  />
<link rel="stylesheet" href="../css/popup.css" />
<meta charset="utf-8" />
<title>찾아방-안동대학교 자취방 찾기 프로젝트</title>
</head>
<body>
<div id="head">
<div class="logo">
	<div id="logo_top">
	찾아<span class="logo_o">방</span>
	</div>
	<div id="logo_bottom">
	안동대학교자취방찾기프로젝트
	</div>
</div>
</div>
<div id="body">
<p>
<span style="font-size:13pt;color:red;font-weight:500;">필독사항!!!</span><br/>
<span style="font-weight:500; font-size:12pt;">안녕하십니까? 관리자입니다. 찾아방 사이트 이용에 앞서 몇가지 사항을 알려드립니다.</span><br/><br/>
<b>첫째</b><br/> 해당 홈페이지는 집주인과 학생들의 직접적인 소통을 위해 만들었습니다. 
      그러므로 학생 여러분들의 개인 방 홍보는 현재 불가하오니 많은 양해바라며,
      추후 학생 게시판을 통해 따로 안내하도록 하겠습니다. <br/><br/>
<b>둘째</b><br/> 한줄 남기기를 통해 현재 홈페이지에 대한 다양한 의견들을 남겨주시면 감사하겠습니다.
      여러분이 남긴 의견은 추후 사이트 업데이트에 큰 도움이 되겠습니다.<br/><br/>
<b>셋째</b><br/> 사용법에 관한 사항입니다.
      현재 건물주의 연락처는 일반회원으로 가입하셔야 확인할 수 있습니다.
      하지만 가입을 하지 않더라도 자취방의 기본정보는 제공됩니다.
      방정보를 올리고 싶으시다면 방주인으로 회원가입을 해야 방에 관한 정보를 
      등록 및 관리를 하실 수 있습니다. <br/><br/>
끝으로 여러분의 관심과 작은 의견을 통해 좀 더 훌륭한 웹 서비스를 제공하도록 노력하겠습니다.
</p>
<span style="color:#4374D9"><i>안동대학교 컴퓨터공학과 팀 A.D.D</i></span>
</div>
<div id="footer">
<a href="#" onclick="closeWin();">[창닫기]</a>
<script type="text/javascript">
    function setCookie( name, value, expiredays )
    {
    
        var todayDate = new Date();
        todayDate.setDate( todayDate.getDate() + expiredays );
        
    document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
    
    }
    
    function closeWin()
    {
    
        setCookie("Notice", "no", 1);
        self.close();
    }
</script>
</div>
</body>
</html>