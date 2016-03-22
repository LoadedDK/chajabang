<script>

var oPoint = new nhn.api.map.LatLng(<? echo $room[r_loc_y]; ?>, <? echo $room[r_loc_x]; ?>);

nhn.api.map.setDefaultPoint('LatLng');
oMap = new nhn.api.map.Map('content_map' ,{
	point : oPoint,
	zoom : 13,
	enableWheelZoom : true,
	enableDragPan : true,
	enableDblClickZoom : true,
	mapMode : 0,
	activateTrafficMap : false,
	activateBicycleMap : false,
	minMaxLevel : [ 12, 14 ],
});

var mapZoom = new nhn.api.map.ZoomControl(); // - 줌 컨트롤 선언
mapZoom.setPosition({left:20, bottom:20}); // - 줌 컨트롤 위치 지정
oMap.addControl(mapZoom); // - 줌 컨트롤 추가.

var oSize = new nhn.api.map.Size(28, 37);
var oOffset = new nhn.api.map.Size(14, 37);
var oIcon_y = new nhn.api.map.Icon('../img/marker_y.png', oSize, oOffset);
var oIcon_n = new nhn.api.map.Icon('../img/marker_n.png', oSize, oOffset);

if('<? echo $room[r_state] ?>' == 'y')
	var oMarker = new nhn.api.map.Marker(oIcon_y, { point : oPoint, title : '<? echo $room[r_name]; ?>' });  //빈방 있는 마커 생성
if('<? echo $room[r_state] ?>' == 'n')
	var oMarker = new nhn.api.map.Marker(oIcon_n, { point : oPoint, title : '<? echo $room[r_name]; ?>' });  //빈방 없는 마커 생성

oMap.addOverlay(oMarker); //마커를 지도위에 표현

oMarker.setVisible(true)

var oInfoWnd = new nhn.api.map.InfoWindow();

var div = "<div style='width: 180px; height: 45px; border: 1px solid #bbbbbb; background-color: white; font-family:나눔고딕; cursor:pointer; '><div style='padding: 3px 0 0 5px; width:245px; font-size: 10pt; font-weight: bold; color: #333333; '><? echo $room[r_name]; ?></div><div style='padding: 2px 0 0 5px; font-size: 9pt; font-weight: bold; line-height: 19px; white-space:nowrap;overflow: hidden; text-overflow: ellipsis; '><span style='color: #3366cc; '><? echo $room[r_address]; ?></span><br/></div></div>";

oInfoWnd.setContent(div);
oInfoWnd.setPoint(oMarker.getPoint());
oInfoWnd.setPosition({right : 14, top : 40});
oInfoWnd.setVisible(true, oMarker);

oMap.addOverlay(oInfoWnd);

</script>
