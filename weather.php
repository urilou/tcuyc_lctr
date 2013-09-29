<?php
  date_default_timezone_set("Asia/Tokyo");
  $xml = "http://weather.service.msn.com/data.aspx?weadegreetype=C&culture=ja-JP&weasearchstr=Yokohama";
  $data = simplexml_load_file($xml);
  $today = date("j");
  $tmrrw = date("j",strtotime("+1 day"));
  $sunday = date("w");
  $mornfilepath = "/home/users/1/mods.jp-usi/web/lecturebot/weather.txt";
  $noonfilepath = "/home/users/1/mods.jp-usi/web/lecturebot/weathernoon.txt";
  $nowfilepath = "/home/users/1/mods.jp-usi/web/lecturebot/weathernow.txt";
  $tmrrwfilepath = "/home/users/1/mods.jp-usi/web/lecturebot/weathertmrrw.txt";
  $replyfilepath = "/home/users/1/mods.jp-usi/web/lecturebot/weatherreply.php";

$weathernowtext = $data->weather->current->attributes()->skytext;
$weathernowtemp = $data->weather->current->attributes()->temperature;
$weathernowfeel = $data->weather->current->attributes()->feelslike;
$weathernowfeel = $data->weather->current->attributes()->feelslike;
$weathernowhumi = $data->weather->current->attributes()->humidity;
$weathernowwind = $data->weather->current->attributes()->winddisplay;
$weathernowtime = $data->weather->current->attributes()->observationtime;
$weathernowwind = str_replace(" / ", "、", $weathernowwind);
$weathernowtime = substr($weathernowtime, 0, 5);

//不快指数計算
$weathernowfukai = (0.81 * $weathernowtemp) + (0.01 * $weathernowhumi* (0.99 * $weathernowtemp - 14.3)) + 46.3;

if($weathernowfukai < 55){
  $weathernowfkifl = "寒い";
}elseif((55 <= $weathernowfukai)&&($weathernowfukai <60)){
  $weathernowfkifl = "肌寒い";
}elseif((60 <= $weathernowfukai)&&($weathernowfukai <65)){
  $weathernowfkifl = "何も感じない";
}elseif((65 <= $weathernowfukai)&&($weathernowfukai <70)){
  $weathernowfkifl = "快い";
}elseif((70 <= $weathernowfukai)&&($weathernowfukai <75)){
  $weathernowfkifl = "暑くない";
}elseif((75 <= $weathernowfukai)&&($weathernowfukai <80)){
  $weathernowfkifl = "やや暑い";
}elseif((80 <= $weathernowfukai)&&($weathernowfukai <85)){
  $weathernowfkifl = "暑くて汗が出る";
}elseif(85 <= $weathernowfukai){
  $weathernowfkifl = "暑くてたまらない";
}

$weathertodaytext = $data->weather->forecast[0]->attributes()->skytextday;
$weathertodaytemp = $data->weather->forecast[0]->attributes()->high;
$weathertodayrain = $data->weather->forecast[0]->attributes()->precip;

$weathertmrrwtext = $data->weather->forecast[1]->attributes()->skytextday;
$weathertmrrwtemp = $data->weather->forecast[1]->attributes()->high;
$weathertmrrwrain = $data->weather->forecast[1]->attributes()->precip;

//いまの横浜の天気 :: 晴れ（12度）体感12度、風向: 北北西 / 風速: 10 m/s
//21日の横浜の天気 :: 晴時々曇（最高気温14度、降水確率10%）
//【横浜市営地下鉄ブルーライン】電車緊急停止装置動作による運転見合わせのため、現在もダイヤが大幅に乱れております。

//$weathertmrrw = "明日、".$tmrrw."日の横浜の天気は".$weathertmrrwtext."（最高気温".$weathertmrrwtemp."度、降水確率".$weathertmrrwrain."%）です。（".$weathernowtime."、Foreca）";

$weathernow = "いまの横浜の天気は".$weathernowtext."、気温: ".$weathernowtemp."度（体感".$weathernowfeel."度）、湿度: ".$weathernowhumi."%、".$weathernowwind."、不快指数: ".$weathernowfukai."（".$weathernowfkifl."）です。（".$weathernowtime."、Foreca）";
echo "<br>".$weathernow;

$weathertmrrw = "明日、".$tmrrw."日の横浜の天気は".$weathertmrrwtext."（最高気温".$weathertmrrwtemp."度、降水確率".$weathertmrrwrain."%）です。（".$weathernowtime."、Foreca）";
echo "<br>".$weathertmrrw;

$weatherreply = "<?php\n$"."data = array(\n'(明日|あす|あした)(の)(てんき|天気)'=> array(\n'$weathertmrrw',\n),\n'(いま|今)(の)(てんき|天気)'=> array(\n'$weathernow',\n),\n);";
echo "<br>".$weatherreply;

$weathertoday = "おはようございます。".$today."日の横浜の天気は".$weathertodaytext."（最高気温".$weathertodaytemp."度、降水確率".$weathertodayrain."%）です。";
echo "<br>".$weathertoday;

$fpmorn = fopen($mornfilepath, "w");
stream_set_write_buffer($fpmorn,0);
// $suncheck = strpos("0", $sunday);
//  if ($suncheck !== false) {
//  flock($fpmorn, LOCK_EX);
//  fwrite($fpmorn, "");
//  } else {
  flock($fpmorn, LOCK_EX);
  fwrite($fpmorn, $weathertoday."\n".$weathernow);
//  }
fclose($fpmorn);

//昼用
$fpmorn = fopen($noonfilepath, "w");
stream_set_write_buffer($fpmorn,0);
  flock($fpmorn, LOCK_EX);
  fwrite($fpmorn, $weathernow);
fclose($fpmorn);

$fpnow = fopen($nowfilepath, "w");
stream_set_write_buffer($fpnow,0);
// $suncheck = strpos("0", $sunday);
//  if ($suncheck !== false) {
//  flock($fpnow, LOCK_EX);
//  fwrite($fpnow, "");
//  } else {
  flock($fpnow, LOCK_EX);
  fwrite($fpnow, $weathernow);
//  }
fclose($fpnow);

$fptmrrw = fopen($tmrrwfilepath, "w");
stream_set_write_buffer($fptmrrw,0);
// $suncheck = strpos("0", $sunday);
//  if ($suncheck !== false) {
//  flock($fptmrrw, LOCK_EX);
//  fwrite($fptmrrw, "");
//  } else {
  flock($fptmrrw, LOCK_EX);
  fwrite($fptmrrw, $weathertmrrw);
//  }
fclose($fptmrrw);

$fpreply = fopen($replyfilepath, "w");
stream_set_write_buffer($fpreply,0);
// $suncheck = strpos("0", $sunday);
//  if ($suncheck !== false) {
//  flock($fpreply, LOCK_EX);
//  fwrite($fpreply, "");
//  } else {
  flock($fpreply, LOCK_EX);
  fwrite($fpreply, $weatherreply);
//  }
fclose($fpreply);
?>