<html>
<head>
<meta charset="utf-8" />
<title><? echo $_GET['img_name']; ?></title>
</head>
<body style="margin:0;padding:0;">
<?
$img = "../roomimg/".$_GET['img_name'];
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
<img src="../roomimg/<?echo $_GET['img_name']; ?>" width="<?echo $img_width; ?>" height="<?echo $img_height; ?>" onclick="javascript:self.close();" alt="이미지" />
</body>
</html>