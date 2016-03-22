var oPoint = new nhn.api.map.LatLng(36.5422434, 128.7971389);

nhn.api.map.setDefaultPoint('LatLng');
oMap = new nhn.api.map.Map('Map' ,{
	point : oPoint,
	zoom : 11,
	enableWheelZoom : true,
	enableDragPan : true,
	enableDblClickZoom : true,
	mapMode : 0,
	activateTrafficMap : false,
	activateBicycleMap : false,
	minMaxLevel : [ 1, 14 ],
});

var mapZoom = new nhn.api.map.ZoomControl(); // - 줌 컨트롤 선언
mapZoom.setPosition({right:20, top:20}); // - 줌 컨트롤 위치 지정
oMap.addControl(mapZoom); // - 줌 컨트롤 추가.

var oSize = new nhn.api.map.Size(28, 37);
var oOffset = new nhn.api.map.Size(14, 37);
var oIcon = new nhn.api.map.Icon('http://static.naver.com/maps2/icons/pin_spot2.png', oSize, oOffset);


var oPoint1 = new nhn.api.map.LatLng(36.5446821, 128.7939983);

var oMarker1 = new nhn.api.map.Marker(oIcon, { point : oPoint1, title : '임진섭' });  //마커 생성
oMap.addOverlay(oMarker1); //마커를 지도위에 표현
 
var oLabel1 = new nhn.api.map.MarkerLabel(); // - 마커 라벨 선언.
oMap.addOverlay(oLabel1); // - 마커 라벨 지도에 추가. 기본은 라벨이 보이지 않는 상태로 추가됨.
 
oMap.attach('mouseenter', function(oCustomEvent) {
	var oTarget1 = oCustomEvent.target;
	// 마커위에 마우스 올라간거면
	if (oTarget1 instanceof nhn.api.map.Marker) {
		var oMarker1 = oTarget1;
		oLabel1.setVisible(true, oMarker1); // - 특정 마커를 지정하여 해당 마커의 title을 보여준다.
	}
});

oMap.attach('mouseleave', function(oCustomEvent) {
	var oTarget1 = oCustomEvent.target;
	// 마커위에서 마우스 나간거면
	if (oTarget1 instanceof nhn.api.map.Marker) {
		oLabel1.setVisible(false);
	}
});

//oLabel1.setVisible(true, oMarker1); // 마커 라벨 보이기


var oPoint2 = new nhn.api.map.LatLng(36.5428400, 128.7898434);

var oMarker2 = new nhn.api.map.Marker(oIcon, { point : oPoint2, title : '윤민우&이진수' });  //마커 생성
oMap.addOverlay(oMarker2); //마커를 지도위에 표현

var oLabel2 = new nhn.api.map.MarkerLabel(); // - 마커 라벨 선언.
oMap.addOverlay(oLabel2); // - 마커 라벨 지도에 추가. 기본은 라벨이 보이지 않는 상태로 추가됨.

oMap.attach('mouseenter', function(oCustomEvent) {
	var oTarget2 = oCustomEvent.target;
	// 마커위에 마우스 올라간거면
	if (oTarget2 instanceof nhn.api.map.Marker) {
		var oMarker2 = oTarget2;
		oLabel2.setVisible(true, oMarker2); // - 특정 마커를 지정하여 해당 마커의 title을 보여준다.
	}
});

oMap.attach('mouseleave', function(oCustomEvent) {
	var oTarget2 = oCustomEvent.target;
	// 마커위에서 마우스 나간거면
	if (oTarget2 instanceof nhn.api.map.Marker) {
		oLabel2.setVisible(false);
	}
});



var oInfoWnd1 = new nhn.api.map.InfoWindow();
oInfoWnd1.setVisible(false);
oMap.addOverlay(oInfoWnd1);

oInfoWnd1.setPosition({
	top : 20,
	left : 20
});


oMarker1.attach('click', function(oCustomEvent) {
	var mPoint1 = oCustomEvent.point;
	var oTarget = oCustomEvent.target;
	oInfoWnd1.setVisible(false);
	if(oTarget instanceof nhn.api.map.Marker) {
		if(oCustomEvent.clickCoveredMarker) {
			return;
		}
		oInfoWnd1.setContent("<div style=\"width:50px; height:50px; background-color:white; border:1px solid #000000;\">일단은 텍스트</div>");
		oInfoWnd1.setPoint(oTarget.getPoint());
		oInfoWnd1.setPosition({right : 15, top : 30});
		oInfoWnd1.setVisible(true);
		oInfoWnd1.autoPosition();
		return;
	}
});


oInfoWnd1.attach('click', function(oCustomEvent) {

	alert("asd");

});