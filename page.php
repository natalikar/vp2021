<?php
	$author_name = "Natali Karja";
	//echo $author_name;	//print
	//vaatan praegust ajahetke
	$full_time_now = date("d.m.Y H:i:s");
	//vaatan nädalapäeva
	$weekday_now = date("N");
	//echo $weekday_now;
	$weekday_names_et = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
	//echo $weekday_names_et [$weekday_now -1];
	//küsime ainult tunde
	$hour_now = ("H");
	$day_category = "tavaline päev";
	if($weekday_now <= 5){
		$day_category = "koolipäev";
	} else {
		$day_category = "puhkepäev";
	}
	
	//lisan lehele juhusliku pildi
	$photo_dir = "photos/";
	//loen kataloogi sisu
	//$all_files = scandir($photo_dir);  <- pole vaja vms
	$all_files = array_slice(scandir ($photo_dir), 2);
	//echo $all_files; <- ei tööta nii
	//var_dump ($all_files);  <- pole vaja
	
	//kontrollin ja võtan ainult fotod
	$allowed_photo_types = ["image/jpeg", "image/png"];
	$all_photos = [];
	foreach ($all_files as $file) {
		$file_info = getimagesize ($photo_dir .$file);
		if(isset($file_info["mime"])){
			if(in_array($file_info["mime"], $allowed_photo_types)) {
				array_push($all_photos, $file);
			}//if in_array lõppeb
		}//if isset lõppeb
	}//foreach lõppeb
	
	$file_count = count($all_photos);
	$photo_num = mt_rand(0, $file_count - 1);
	//echo $photo_num;
	//<img src="photos/pilt.jpg" alt="Tallinna Ülikool">
	$photo_html = '<img src="' .$photo_dir .$all_photos[$photo_num] .'" alt="Tallinna Ülikool">';
	
	//if($hour_now >=8 and $hour_now <= 18)
	//if($hour_now < and $hour_now > 23)
?>

<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title><?php echo $author_name; ?>, veebiprogrammeerimine</title>
</head>
<body>
	<h1><?php echo $author_name; ?>, veebiprogrammeerimine</h1>
	<p>See töö on valminud õppetöö raames ja ei sisalda mingit tõsiseltvõetavat sisu!</p>
	<p>Õppetöö toimub <a href="http://www.tlu.ee/dt">Tallinna Ülikooli Digitehnoloogiate instituudis</a>.</p>
	<img src="portfolio-21.jpg" alt="Tallinna Ülikooli Astra õppehoone" width="600">
	<p>Lehe avamise hetk: <span><?php echo $weekday_names_et [$weekday_now -1] .", " .$full_time_now .", on " .$day_category ; ?></span></p>
	<?php echo $photo_html; ?>
</body>
</html>