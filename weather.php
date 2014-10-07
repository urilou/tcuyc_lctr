<?php
  include("parse_weather_warn.php");

  $weather_xml = "http://weather.service.msn.com/data.aspx?weadegreetype=C&culture=ja-JP&weasearchstr=Yokohama";
  $warning_html = file_get_html('http://www.jma.go.jp/jp/warn/320_table.html');
  $weather_data = simplexml_load_file($weather_xml);
  //$time = date('Hi');
  $min = date("i");
  $today = date("j");
  $tmrrw = date("j",strtotime("+1 day"));
  $sunday = date("w");

  $weather_file = "weather.txt";
  $warning_file = "warning.txt";

// msn天気からの読み取り
  $weathernowtext = $weather_data->weather->current->attributes()->skytext;
  $weathernowtemp = $weather_data->weather->current->attributes()->temperature;
  $weathernowfeel = $weather_data->weather->current->attributes()->feelslike;
  $weathernowfeel = $weather_data->weather->current->attributes()->feelslike;
  $weathernowhumi = $weather_data->weather->current->attributes()->humidity;
  $weathernowwind = $weather_data->weather->current->attributes()->winddisplay;
  $weathernowtime = $weather_data->weather->current->attributes()->observationtime;
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

  $weathertodaytext = $weather_data->weather->forecast[0]->attributes()->skytextday;
  $weathertodaytemp = $weather_data->weather->forecast[0]->attributes()->high;
  $weathertodayrain = $weather_data->weather->forecast[0]->attributes()->precip;
  $weathertmrrwtext = $weather_data->weather->forecast[1]->attributes()->skytextday;
  $weathertmrrwtemp = $weather_data->weather->forecast[1]->attributes()->high;
  $weathertmrrwrain = $weather_data->weather->forecast[1]->attributes()->precip;

// 警報注意報の取得
  $warning_info = $warning_html->find('table#WarnTableTable',0)->find('tr',2);
  $warning_text = '横浜市に'.warn_parse($warning_info);
  if ($warning_text == '横浜市に気象警報・注意報があります >>') {
    $warning_text = '';
  }

//いまの横浜の天気 :: 晴れ（12度）体感12度、風向: 北北西 / 風速: 10 m/s
//21日の横浜の天気 :: 晴時々曇（最高気温14度、降水確率10%）
//【横浜市営地下鉄ブルーライン】電車緊急停止装置動作による運転見合わせのため、現在もダイヤが大幅に乱れております。
//$weathertmrrw = "明日、".$tmrrw."日の横浜の天気は".$weathertmrrwtext."（最高気温".$weathertmrrwtemp."度、降水確率".$weathertmrrwrain."%）です。（".$weathernowtime."、Foreca）";

  echo '<div><b>取得した天気情報</b></div>';
  $weather_now = "いまの横浜の天気は".$weathernowtext."、気温: ".$weathernowtemp."度（体感".$weathernowfeel."度）、湿度: ".$weathernowhumi."%、".$weathernowwind."、不快指数: ".$weathernowfukai."（".$weathernowfkifl."）です。（".$weathernowtime."、Foreca）";
  echo "<div>".$weather_now."</div>";
  $weather_today = "おはようございます。".$today."日の横浜の天気は".$weathertodaytext."（最高気温".$weathertodaytemp."度、降水確率".$weathertodayrain."%）です。";
  echo "<div>".$weather_today."</div>";
  $weather_tmrrw = "明日、".$tmrrw."日の横浜の天気は".$weathertmrrwtext."（最高気温".$weathertmrrwtemp."度、降水確率".$weathertmrrwrain."%）です。（".$weathernowtime."、Foreca）";
  echo "<div>".$weather_tmrrw."</div>";
  echo "<div>".$warning_text."</div>";

// 8時の天気ツイート
  if ($time == '0800') {
    write($weather_file,$weather_today."\n".$weather_now);
    tweet($weather_file);
  }

// 13時の天気ツイート
  if ($time == '1300') {
    write($weather_file, $weather_now);
    tweet($weather_file);
  }

// 熱中症注意ツイート
  if (85 <= $weathernowfukai && $min == 00) {
    write($weather_file, '【熱中症に注意】'.$weather_now);
    tweet($weather_file);
  }

// 警報注意報ツイート
  if ( !empty ($warning_text) && $min == 05) {
    write($warning_file, $warning_text);
    tweet($warning_file);
  }
?>