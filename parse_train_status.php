<?php
  // 運行情報
  function train_info_parse($line_name, $info_data) {

//直通先パターン
  if (preg_match("/田園都市線内/", $info_data)){
        $line = "東急田園都市線での";
    }else if  (preg_match("/大井町線内/", $info_data)){
        $line = "東急大井町線での";
    }else if  (preg_match("/東横線内/", $info_data)){
        $line = "東急東横線での";
    }else if  (preg_match("/半蔵門線内/", $info_data)){
        $line = "東京メトロ半蔵門線での";
    }else if  (preg_match("/スカイツリーライン内/", $info_data)){
        $line = "東武スカイツリーラインでの";
    }else if  (preg_match("/スカイツリーライン線内/", $info_data)){
        $line = "東武スカイツリーライン線での";
    }else if  (preg_match("/スカイツリー線内/", $info_data)){
        $line = "東武スカイツリー線での";
    }else if  (preg_match("/伊勢崎線内/", $info_data)){
        $line = "東武伊勢崎線での";
    }else if  (preg_match("/新宿線内/", $info_data)){
        $line = "都営新宿線での";

  //会社線
    }else if  (preg_match("/東急/./内/", $info_data)){
        $line = "東急線での";
    }else if  (preg_match("/みなとみらい/./内/", $info_data)){
        $line = "みなとみらい線での";
    }else if  (preg_match("/メトロ/./内/", $info_data)){
        $line = "東京メトロ線での";
    }else if  (preg_match("/東武/./内/", $info_data)){
        $line = "東武線での";
    }else if  (preg_match("/西武/./内/", $info_data)){
        $line = "西武線での";
    }else if  (preg_match("/埼玉高速/./内/", $info_data)){
        $line = "埼玉高速線での";
    }else if  (preg_match("/都営/./内/", $info_data)){
        $line = "都営線での";
    }else if  (preg_match("/JR/./内/", $info_data)){
        $line = "JR線での";
    }

//原因パターン
  if (preg_match("/混雑/", $info_data)){
        $cause = "混雑のため";
    }else if  (preg_match("/震災/", $info_data)){
        $cause = "震災のため";
    }else if  (preg_match("/地震/", $info_data)){
        $cause = "地震のため";
    }else if  (preg_match("/災害/", $info_data)){
        $cause = "災害のため";
    }else if  (preg_match("/工事のため/", $info_data)){
        $cause = "工事のため";
    }else if  (preg_match("/人身事故/", $info_data)){
        $cause = "人身事故のため";
    }else if  (preg_match("/救護活動/", $info_data)){
        $cause = "救護活動のため";
    }else if  (preg_match("/架線点検/", $info_data)){
        $cause = "架線点検のため";
    }else if  (preg_match("/車輪空転/", $info_data)){
        $cause = "車輪空転のため";
    }else if  (preg_match("/車両点検/", $info_data)){
        $cause = "車両点検のため";
    }else if  (preg_match("/踏切内点検/", $info_data)){
        $cause = "踏切内点検のため";
    }else if  (preg_match("/線路内点検/", $info_data)){
        $cause = "線路内点検のため";
    }else if  (preg_match("/車両故障/", $info_data)){
        $cause = "車両故障のため";
    }else if  (preg_match("/ドア点検/", $info_data)){
        $cause = "ドア点検のため";
    }else if  (preg_match("/線路支障/", $info_data)){
        $cause = "線路支障のため";
    }else if  (preg_match("/強風/", $info_data)){
        $cause = "強風のため";
    }else if  (preg_match("/大雨/", $info_data)){
        $cause = "大雨のため";
    }else if  (preg_match("/大雪/", $info_data)){
        $cause = "大雪のため";
    }else if  (preg_match("/支障物と接触/", $info_data)){
        $cause = "支障物と接触のため";
    }else if  (preg_match("/除雪作業/", $info_data)){
        $cause = "除雪作業のため";
    }else if  (preg_match("/異音の確認/", $info_data)){
        $cause = "異音の確認のため";
    }else if  (preg_match("/信号確認/", $info_data)){
        $cause = "信号確認のため";
    }else if  (preg_match("/信号機故障/", $info_data)){
        $cause = "信号機故障のため";
    }else if  (preg_match("/踏切安全確認/", $info_data)){
        $cause = "踏切安全確認のため";
    }else if  (preg_match("/接続待合せ/", $info_data)){
        $cause = "接続待合せのため";
    }else if  (preg_match("/車内トラブル/", $info_data)){
        $cause = "車内トラブルのため";
    }else if  (preg_match("/電力設備の確認/", $info_data)){
        $cause = "電力設備の確認のため";
    }else if  (preg_match("/信号装置故障/", $info_data)){
        $cause = "信号装置故障のため";
    }else if  (preg_match("/工事用車両故障/", $info_data)){
        $cause = "工事用車両故障のため";
    }else if  (preg_match("/線路に人立入/", $info_data)){
        $cause = "線路に人立入のため";
    }else if  (preg_match("/悪天候/", $info_data)){
        $cause = "悪天候のため";
    }else if  (preg_match("/動物支障/", $info_data)){
        $cause = "動物支障のため";
    }else if  (preg_match("/暴風雪/", $info_data)){
        $cause = "暴風雪のため";
    }else if  (preg_match("/倒木/", $info_data)){
        $cause = "倒木のため";
    }else if  (preg_match("/線路点検/", $info_data)){
        $cause = "線路点検のため";
    }else if  (preg_match("/駅構内点検/", $info_data)){
        $cause = "駅構内点検のため";
    }else if  (preg_match("/ポイント点検/", $info_data)){
        $cause = "ポイント点検のため";
    }else if  (preg_match("/停電/", $info_data)){
        $cause = "停電のため";
    }else if  (preg_match("/倒竹/", $info_data)){
        $cause = "倒竹のため";
    }else if  (preg_match("/強風が見込/", $info_data)){
        $cause = "強風が予想されるため";
    }else if  (preg_match("/雪/", $info_data)){
        $cause = "雪のため";
    }else if  (preg_match("/沿線火災/", $info_data)){
        $cause = "沿線火災のため";
    }else if  (preg_match("/踏切事故/", $info_data)){
        $cause = "踏切事故のため";
    }else if  (preg_match("/送電設備点検/", $info_data)){
        $cause = "送電設備点検のため";
    }else if  (preg_match("/変電所点検/", $info_data)){
        $cause = "変電所点検のため";
    }else if  (preg_match("/シカと衝突/", $info_data)){
        $cause = "シカと衝突のため";
    }else if  (preg_match("/お客さま同士トラブル/", $info_data)){
        $cause = "お客さま同士トラブルのため";
    }else if  (preg_match("/お客さま救護/", $info_data)){
        $cause = "お客さま救護のため";
    }else if  (preg_match("/架線断線/", $info_data)){
        $cause = "架線断線のため";
    }else if  (preg_match("/車両の定期検査に伴う点検整備のため/", $info_data)){
        $cause = "車両の定期的な整備のため";
    }else if  (preg_match("/触車事故/", $info_data)){
        $cause = "触車事故のため";
    }else if  (preg_match("/線路内発煙/", $info_data)){
        $cause = "線路内発煙のため";
    }else if  (preg_match("/動物と衝突/", $info_data)){
        $cause = "動物と衝突のため";
    }else if  (preg_match("/濃霧/", $info_data)){
        $cause = "濃霧のため";
    }else if  (preg_match("/霧/", $info_data)){
        $cause = "霧のため";
    }else if  (preg_match("/工事の遅れ/", $info_data)){
        $cause = "工事の遅れのため";
    }else if  (preg_match("/乗務員急病/", $info_data)){
        $cause = "乗務員急病のため";
    }else if  (preg_match("/不発弾処理/", $info_data)){
        $cause = "不発弾処理のため";
    }else if  (preg_match("/安全確認/", $info_data)){
        $cause = "安全確認のため";
    }else if  (preg_match("/送電設備故障/", $info_data)){
        $cause = "送電設備故障のため";
    }else if  (preg_match("/車輪凍結/", $info_data)){
        $cause = "車輪凍結のため";
    }else if  (preg_match("/軌道凍結/", $info_data)){
        $cause = "軌道凍結のため";
    }else if  (preg_match("/窓ガラス破損/", $info_data)){
        $cause = "窓ガラス破損のため";
    }else if  (preg_match("/台風/", $info_data)){
        $cause = "台風のため";
    }else if  (preg_match("/乗務員支障/", $info_data)){
        $cause = "乗務員支障のため";
    }else if  (preg_match("/ポイント故障/", $info_data)){
        $cause = "ポイント故障のため";
    }else if  (preg_match("/折り返し列車遅延/", $info_data)){
        $cause = "折り返し列車遅延のため";
    }else if  (preg_match("/踏切支障/", $info_data)){
        $cause = "踏切支障のため";
    }else if  (preg_match("/発煙/", $info_data)){
        $cause = "発煙のため";
    }else if  (preg_match("/架線支障の影響/", $info_data)){
        $cause = "架線支障のため";
    }else if  (preg_match("/信号関係故障/", $info_data)){
        $cause = "信号に関連する装置の故障のため";
    }else if  (preg_match("/ストライキ/", $info_data)){
        $cause = "ストライキのため";
    }else if  (preg_match("/夜間作業遅延/", $info_data)){
        $cause = "夜間作業遅延のため";
    }else if  (preg_match("/災害復旧工事/", $info_data)){
        $cause = "災害復旧工事のため";
    }else if  (preg_match("/ドア故障/", $info_data)){
        $cause = "ドア故障のため";
    }else if  (preg_match("/地震計誤作動に伴う安全確認/", $info_data)){
        $cause = "地震計誤作動に伴う安全確認を行ったため";
    }else if  (preg_match("/ホームドア故障/", $info_data)){
        $cause = "ホームドア故障のため";
    }else if  (preg_match("/線路内立入/", $info_data)){
        $cause = "線路内立ち入りのため";
    }else if  (preg_match("/架線支障/", $info_data)){
        $cause = "架線支障のため";
    }else if  (preg_match("/信号関係点検/", $info_data)){
        $cause = "信号関係点検のため";
    }else if  (preg_match("/荷物挟まり対応/", $info_data)){
        $cause = "荷物挟まり対応のため";
    }else if  (preg_match("/線路陥没/", $info_data)){
        $cause = "線路陥没のため";
    }else if  (preg_match("/運行設備故障/", $info_data)){
        $cause = "運行設備故障のため";
    }else if  (preg_match("/車内安全確認/", $info_data)){
        $cause = "車内安全確認のため";
    }else if  (preg_match("/接続待ち/", $info_data)){
        $cause = "接続待ちのため";
    }else if  (preg_match("/車両搬入作業/", $info_data)){
        $cause = "車両搬入作業のため";
    }else if  (preg_match("/整備工事/", $info_data)){
        $cause = "整備工事のため";
    }else if  (preg_match("/竜巻注意情報発表/", $info_data)){
        $cause = "竜巻注意情報発表のため";
    }else if  (preg_match("/旅客対応/", $info_data)){
        $cause = "旅客対応のため";
  }

//現状パターン
  if (preg_match("/情報はありません/", $info_data)){
        $staus = "";
    }else if  (preg_match("/平常通り/", $info_data)){
        $staus = "遅れていましたが、現在は平常通りです。";
    }else if  (preg_match("/％程度の運転本数/", $info_data)){
        $staus = "遅れています。また、電車の本数は通常より少なくなっています。";
    }else if  (preg_match("/一部列車が運休/", $info_data)){
        $staus = "一部の電車が運休しています。";
    }else if  (preg_match("/一部列車に遅れ/", $info_data)){
        $staus = "一部の電車が遅れています。";
    }else if  (preg_match("/一部列車に運休/", $info_data)){
        $staus = "一部の電車が運休しています。";
    }else if  (preg_match("/直通運転を中止/", $info_data)){
        $staus = "直通運転を中止しています。";
    }else if  (preg_match("/直通運転を再開/", $info_data)){
        $staus = "直通運転を再開し、遅れています。";
    }else if  (preg_match("/遅れと運転変更/", $info_data)){
        $staus = "遅れています。また、行先が変更されることがあります。";
    }else if  (preg_match("/運転変更/", $info_data)){
        $staus = "行先が変更されることがあります。";
    }else if  (preg_match("/遅れや運転変更/", $info_data)){
        $staus = "遅れています。また、行先が変更されることがあります。";
    }else if  (preg_match("/遅れや運休が/", $info_data)){
        $staus = "遅れています。また、一部の電車は運休しています。";
    }else if  (preg_match("/遅れと運休が/", $info_data)){
        $staus = "遅れています。また、一部の電車は運休しています。";
    }else if  (preg_match("/再開しました。なお、列車に遅れ/", $info_data)){
        $staus = "運転を見合わせていましたが、再開しました。なお、遅れや運休がある可能性があります。";
    }else if  (preg_match("/再開し遅れが/", $info_data)){
        $staus = "運転を見合わせていましたが、再開しました。遅れや運休がでています。";
    }else if  (preg_match("/見合わせ/", $info_data)){
        $staus = "運転を見合わせています。";
    }else if  (preg_match("/運転を再開/", $info_data)){
        $staus = "運転を見合わせていましたが、再開しました。なお、遅れや運休がでている可能性があります。";
    }else if  (preg_match("/遅れが/", $info_data)){
        $staus = "遅れています。";
    }else if  (preg_match("/運休となります/", $info_data)){
        $staus = "運休します。";
    }else if  (preg_match("/通過扱い/", $info_data)){
        $staus = "一部の駅を特例的に通過しています。";
  }

$info_data = "【運行情報】".$line_name." >> ".$line.$cause.$staus;
    if ($info_data == "【運行情報】".$line_name." >> ") {
        $info_data = "";
    } else {}

      return $info_data;
  }

?>