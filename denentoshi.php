<?php
  date_default_timezone_set("Asia/Tokyo");
  include_once("simple_html_dom.php");
  $html = file_get_html("http://transit.loco.yahoo.co.jp/traininfo/detail/114/0/");
  $filepath = "/home/users/1/mods.jp-usi/web/lecturebot/denentoshi.txt";

$denentoshiinfo = $html->find("dl.serviceInfo",0)->find("dd",0)->innertext;
echo "田園都市線の運転状況: ".$denentoshiinfo."<br>";

//直通先パターン
  if (preg_match("/田園都市線内/", $denentoshiinfo)){
        echo "田園都市線での";
        $dlline = "田園都市線での";
    }else if  (preg_match("/大井町線内/", $denentoshiinfo)){
        echo "大井町線での";
        $dlline = "大井町線での";
    }else if  (preg_match("/半蔵門線内/", $denentoshiinfo)){
        echo "東京メトロ半蔵門線での";
        $dlline = "東京メトロ半蔵門線での";
    }else if  (preg_match("/スカイツリーライン内/", $denentoshiinfo)){
        echo "東武スカイツリーライン線での";
        $dlline = "東武スカイツリーライン線での";
    }else if  (preg_match("/スカイツリーライン線内/", $denentoshiinfo)){
        echo "東武スカイツリーライン線での";
        $dlline = "東武スカイツリーライン線での";
    }else if  (preg_match("/スカイツリー線内/", $denentoshiinfo)){
        echo "東武スカイツリー線での";
        $dlline = "東武スカイツリー線での";
    }else if  (preg_match("/伊勢崎線内/", $denentoshiinfo)){
        echo "東武伊勢崎線での";
        $dlline = "東武伊勢崎線での";
    }else if  (preg_match("/新宿線内/", $denentoshiinfo)){
        echo "都営新宿線での";
        $dlline = "都営新宿線での";

  //会社線
    }else if  (preg_match("/東急/", $denentoshiinfo)){
        echo "東急線での";
        $dlline = "東急線での";
    }else if  (preg_match("/メトロ/", $denentoshiinfo)){
        echo "東京メトロ線での";
        $dlline = "東京メトロ線での";
    }else if  (preg_match("/東武/", $denentoshiinfo)){
        echo "東武線での";
        $dlline = "東武線での";
    }else if  (preg_match("/都営/", $denentoshiinfo)){
        echo "都営線での";
        $dlline = "都営線での";
    }else if  (preg_match("/JR/", $denentoshiinfo)){
        echo "JR線での";
        $dlline = "JR線での";
    }

//原因パターン
  if (preg_match("/混雑/", $denentoshiinfo)){
        echo "混雑のため";
        $dlcause = "混雑のため";
    }else if  (preg_match("/震災/", $denentoshiinfo)){
        echo "震災のため";
        $dlcause = "震災のため";
    }else if  (preg_match("/地震/", $denentoshiinfo)){
        echo "地震のため";
        $dlcause = "地震のため";
    }else if  (preg_match("/災害/", $denentoshiinfo)){
        echo "災害のため";
        $dlcause = "災害のため";
    }else if  (preg_match("/工事のため/", $denentoshiinfo)){
        echo "工事のため";
        $dlcause = "工事のため";
    }else if  (preg_match("/人身事故/", $denentoshiinfo)){
        echo "人身事故のため";
        $dlcause = "人身事故のため";
    }else if  (preg_match("/救護活動/", $denentoshiinfo)){
        echo "救護活動のため";
        $dlcause = "救護活動のため";
    }else if  (preg_match("/架線点検/", $denentoshiinfo)){
        echo "架線点検のため";
        $dlcause = "架線点検のため";
    }else if  (preg_match("/車輪空転/", $denentoshiinfo)){
        echo "車輪空転のため";
        $dlcause = "車輪空転のため";
    }else if  (preg_match("/車両点検/", $denentoshiinfo)){
        echo "車両点検のため";
        $dlcause = "車両点検のため";
    }else if  (preg_match("/踏切内点検/", $denentoshiinfo)){
        echo "踏切内点検のため";
        $dlcause = "踏切内点検のため";
    }else if  (preg_match("/線路内点検/", $denentoshiinfo)){
        echo "線路内点検のため";
        $dlcause = "線路内点検のため";
    }else if  (preg_match("/車両故障/", $denentoshiinfo)){
        echo "車両故障のため";
        $dlcause = "車両故障のため";
    }else if  (preg_match("/ドア点検/", $denentoshiinfo)){
        echo "ドア点検のため";
        $dlcause = "ドア点検のため";
    }else if  (preg_match("/線路支障/", $denentoshiinfo)){
        echo "線路支障のため";
        $dlcause = "線路支障のため";
    }else if  (preg_match("/強風/", $denentoshiinfo)){
        echo "強風のため";
        $dlcause = "強風のため";
    }else if  (preg_match("/大雨/", $denentoshiinfo)){
        echo "大雨のため";
        $dlcause = "大雨のため";
    }else if  (preg_match("/大雪/", $denentoshiinfo)){
        echo "大雪のため";
        $dlcause = "大雪のため";
    }else if  (preg_match("/支障物と接触/", $denentoshiinfo)){
        echo "支障物と接触のため";
        $dlcause = "支障物と接触のため";
    }else if  (preg_match("/除雪作業/", $denentoshiinfo)){
        echo "除雪作業のため";
        $dlcause = "除雪作業のため";
    }else if  (preg_match("/異音の確認/", $denentoshiinfo)){
        echo "異音の確認のため";
        $dlcause = "異音の確認のため";
    }else if  (preg_match("/信号確認/", $denentoshiinfo)){
        echo "信号確認のため";
        $dlcause = "信号確認のため";
    }else if  (preg_match("/信号機故障/", $denentoshiinfo)){
        echo "信号機故障のため";
        $dlcause = "信号機故障のため";
    }else if  (preg_match("/踏切安全確認/", $denentoshiinfo)){
        echo "踏切安全確認のため";
        $dlcause = "踏切安全確認のため";
    }else if  (preg_match("/接続待合せ/", $denentoshiinfo)){
        echo "接続待合せのため";
        $dlcause = "接続待合せのため";
    }else if  (preg_match("/車内トラブル/", $denentoshiinfo)){
        echo "車内トラブルのため";
        $dlcause = "車内トラブルのため";
    }else if  (preg_match("/電力設備の確認/", $denentoshiinfo)){
        echo "電力設備の確認のため";
        $dlcause = "電力設備の確認のため";
    }else if  (preg_match("/信号装置故障/", $denentoshiinfo)){
        echo "信号装置故障のため";
        $dlcause = "信号装置故障のため";
    }else if  (preg_match("/工事用車両故障/", $denentoshiinfo)){
        echo "工事用車両故障のため";
        $dlcause = "工事用車両故障のため";
    }else if  (preg_match("/線路に人立入/", $denentoshiinfo)){
        echo "線路に人立入のため";
        $dlcause = "線路に人立入のため";
    }else if  (preg_match("/悪天候/", $denentoshiinfo)){
        echo "悪天候のため";
        $dlcause = "悪天候のため";
    }else if  (preg_match("/動物支障/", $denentoshiinfo)){
        echo "動物支障のため";
        $dlcause = "動物支障のため";
    }else if  (preg_match("/暴風雪/", $denentoshiinfo)){
        echo "暴風雪のため";
        $dlcause = "暴風雪のため";
    }else if  (preg_match("/倒木/", $denentoshiinfo)){
        echo "倒木のため";
        $dlcause = "倒木のため";
    }else if  (preg_match("/線路点検/", $denentoshiinfo)){
        echo "線路点検のため";
        $dlcause = "線路点検のため";
    }else if  (preg_match("/駅構内点検/", $denentoshiinfo)){
        echo "駅構内点検のため";
        $dlcause = "駅構内点検のため";
    }else if  (preg_match("/ポイント点検/", $denentoshiinfo)){
        echo "ポイント点検のため";
        $dlcause = "ポイント点検のため";
    }else if  (preg_match("/停電/", $denentoshiinfo)){
        echo "停電のため";
        $dlcause = "停電のため";
    }else if  (preg_match("/倒竹/", $denentoshiinfo)){
        echo "倒竹のため";
        $dlcause = "倒竹のため";
    }else if  (preg_match("/強風が見込/", $denentoshiinfo)){
        echo "強風が予想されるため";
        $dlcause = "強風が予想されるため";
    }else if  (preg_match("/雪/", $denentoshiinfo)){
        echo "雪のため";
        $dlcause = "雪のため";
    }else if  (preg_match("/沿線火災/", $denentoshiinfo)){
        echo "沿線火災のため";
        $dlcause = "沿線火災のため";
    }else if  (preg_match("/踏切事故/", $denentoshiinfo)){
        echo "踏切事故のため";
        $dlcause = "踏切事故のため";
    }else if  (preg_match("/送電設備点検/", $denentoshiinfo)){
        echo "送電設備点検のため";
        $dlcause = "送電設備点検のため";
    }else if  (preg_match("/変電所点検/", $denentoshiinfo)){
        echo "変電所点検のため";
        $dlcause = "変電所点検のため";
    }else if  (preg_match("/シカと衝突/", $denentoshiinfo)){
        echo "シカと衝突のため";
        $dlcause = "シカと衝突のため";
    }else if  (preg_match("/お客さま同士トラブル/", $denentoshiinfo)){
        echo "お客さま同士トラブルのため";
        $dlcause = "お客さま同士トラブルのため";
    }else if  (preg_match("/お客さま救護/", $denentoshiinfo)){
        echo "お客さま救護のため";
        $dlcause = "お客さま救護のため";
    }else if  (preg_match("/架線断線/", $denentoshiinfo)){
        echo "架線断線のため";
        $dlcause = "架線断線のため";
    }else if  (preg_match("/車両の定期検査に伴う点検整備のため/", $denentoshiinfo)){
        echo "車両の定期的な整備のため";
        $dlcause = "車両の定期的な整備のため";
    }else if  (preg_match("/触車事故/", $denentoshiinfo)){
        echo "触車事故のため";
        $dlcause = "触車事故のため";
    }else if  (preg_match("/線路内発煙/", $denentoshiinfo)){
        echo "線路内発煙のため";
        $dlcause = "線路内発煙のため";
    }else if  (preg_match("/動物と衝突/", $denentoshiinfo)){
        echo "動物と衝突のため";
        $dlcause = "動物と衝突のため";
    }else if  (preg_match("/濃霧/", $denentoshiinfo)){
        echo "濃霧のため";
        $dlcause = "濃霧のため";
    }else if  (preg_match("/霧/", $denentoshiinfo)){
        echo "霧のため";
        $dlcause = "霧のため";
    }else if  (preg_match("/工事の遅れ/", $denentoshiinfo)){
        echo "工事の遅れのため";
        $dlcause = "工事の遅れのため";
    }else if  (preg_match("/乗務員急病/", $denentoshiinfo)){
        echo "乗務員急病のため";
        $dlcause = "乗務員急病のため";
    }else if  (preg_match("/不発弾処理/", $denentoshiinfo)){
        echo "不発弾処理のため";
        $dlcause = "不発弾処理のため";
    }else if  (preg_match("/安全確認/", $denentoshiinfo)){
        echo "安全確認のため";
        $dlcause = "安全確認のため";
    }else if  (preg_match("/送電設備故障/", $denentoshiinfo)){
        echo "送電設備故障のため";
        $dlcause = "送電設備故障のため";
    }else if  (preg_match("/車輪凍結/", $denentoshiinfo)){
        echo "車輪凍結のため";
        $dlcause = "車輪凍結のため";
    }else if  (preg_match("/軌道凍結/", $denentoshiinfo)){
        echo "軌道凍結のため";
        $dlcause = "軌道凍結のため";
    }else if  (preg_match("/窓ガラス破損/", $denentoshiinfo)){
        echo "窓ガラス破損のため";
        $dlcause = "窓ガラス破損のため";
    }else if  (preg_match("/台風/", $denentoshiinfo)){
        echo "台風のため";
        $dlcause = "台風のため";
    }else if  (preg_match("/乗務員支障/", $denentoshiinfo)){
        echo "乗務員支障のため";
        $dlcause = "乗務員支障のため";
    }else if  (preg_match("/ポイント故障/", $denentoshiinfo)){
        echo "ポイント故障のため";
        $dlcause = "ポイント故障のため";
    }else if  (preg_match("/折り返し列車遅延/", $denentoshiinfo)){
        echo "折り返し列車遅延のため";
        $dlcause = "折り返し列車遅延のため";
    }else if  (preg_match("/踏切支障/", $denentoshiinfo)){
        echo "踏切支障のため";
        $dlcause = "踏切支障のため";
    }else if  (preg_match("/発煙/", $denentoshiinfo)){
        echo "発煙のため";
        $dlcause = "発煙のため";
    }else if  (preg_match("/架線支障の影響/", $denentoshiinfo)){
        echo "架線支障のため";
        $dlcause = "架線支障のため";
    }else if  (preg_match("/信号関係故障/", $denentoshiinfo)){
        echo "信号に関連する装置の故障のため";
        $dlcause = "信号に関連する装置の故障のため";
    }else if  (preg_match("/夜間作業遅延/", $denentoshiinfo)){
        echo "夜間作業遅延のため";
        $dlcause = "夜間作業遅延のため";
    }else if  (preg_match("/災害復旧工事/", $denentoshiinfo)){
        echo "災害復旧工事のため";
        $dlcause = "災害復旧工事のため";
    }else if  (preg_match("/ドア故障/", $denentoshiinfo)){
        echo "ドア故障のため";
        $dlcause = "ドア故障のため";
  }

//現状パターン
  if (preg_match("/情報はありません/", $denentoshiinfo)){
        echo "";
        $dlstaus = "";
    }else if  (preg_match("/平常通り/", $denentoshiinfo)){
        echo "遅れていましたが、現在は平常通りです。";
        $dlstaus = "遅れていましたが、現在は平常通りです。";
    }else if  (preg_match("/％程度の運転本数/", $denentoshiinfo)){
        echo "遅れています。また、電車の本数は通常より少なくなっています。";
        $dlstaus = "遅れています。また、電車の本数は通常より少なくなっています。";
    }else if  (preg_match("/一部列車が運休/", $denentoshiinfo)){
        echo "一部の電車が運休しています。";
        $dlstaus = "一部の電車が運休しています。";
    }else if  (preg_match("/一部列車に遅れ/", $denentoshiinfo)){
        echo "一部の電車が遅れています。";
        $dlstaus = "一部の電車が遅れています。";
    }else if  (preg_match("/一部列車に運休/", $denentoshiinfo)){
        echo "一部の電車が運休しています。";
        $dlstaus = "一部の電車が運休しています。";
    }else if  (preg_match("/直通運転を中止/", $denentoshiinfo)){
        echo "直通運転を中止しています。";
        $dlstaus = "直通運転を中止しています。";
    }else if  (preg_match("/直通運転を再開/", $denentoshiinfo)){
        echo "直通運転を再開し、遅れています。";
        $dlstaus = "直通運転を再開し、遅れています。";
    }else if  (preg_match("/遅れと運転変更/", $denentoshiinfo)){
        echo "遅れています。また、行先が変更されることがあります。";
        $dlstaus = "遅れています。また、行先が変更されることがあります。";
    }else if  (preg_match("/運転変更/", $denentoshiinfo)){
        echo "行先が変更されることがあります。";
        $dlstaus = "行先が変更されることがあります。";
    }else if  (preg_match("/遅れや運休が/", $denentoshiinfo)){
        echo "遅れています。また、一部の電車は運休しています。";
        $dlstaus = "遅れています。また、一部の電車は運休しています。";
    }else if  (preg_match("/遅れと運休が/", $denentoshiinfo)){
        echo "遅れています。また、一部の電車は運休しています。";
        $dlstaus = "遅れています。また、一部の電車は運休しています。";
    }else if  (preg_match("/再開しました。なお、列車に遅れ/", $denentoshiinfo)){
        echo "運転を見合わせていましたが、再開しました。なお、遅れや運休がある可能性があります。";
        $dlstaus = "運転を見合わせていましたが、再開しました。なお、遅れや運休がある可能性があります。";
    }else if  (preg_match("/再開し遅れが/", $denentoshiinfo)){
        echo "運転を見合わせていましたが、再開しました。遅れや運休がでています。";
        $dlstaus = "運転を見合わせていましたが、再開しました。遅れや運休がでています。";
    }else if  (preg_match("/見合わせ/", $denentoshiinfo)){
        echo "運転を見合わせています。";
        $dlstaus = "運転を見合わせています。";
    }else if  (preg_match("/運転を再開/", $denentoshiinfo)){
        echo "運転を見合わせていましたが、再開しました。なお、遅れや運休がでている可能性があります。";
        $dlstaus = "運転を見合わせていましたが、再開しました。なお、遅れや運休がでている可能性があります。";
    }else if  (preg_match("/遅れが/", $denentoshiinfo)){
        echo "遅れています。";
        $dlstaus = "遅れています。";
    }else if  (preg_match("/運休となります/", $denentoshiinfo)){
        echo "運休します。";
        $dlstaus = "運休します。";
    }else if  (preg_match("/通過扱い/", $denentoshiinfo)){
        echo "一部の駅を特例的に通過しています。";
        $dlstaus = "一部の駅を特例的に通過しています。";
  }

$ldi = "【運行情報】東急田園都市線 >> ".$dlline.$dlcause.$dlstaus;

    if ($ldi == "【運行情報】東急田園都市線 >> ") {
        $ldi = "";
    } else {}


$fpdli = fopen($filepath, "w");
stream_set_write_buffer($fpdli,0);
  flock($fpdli, LOCK_EX);
  fwrite($fpdli, $ldi);
fclose($fpdli);
?>