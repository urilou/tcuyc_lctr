<?php
  function warn_parse($warning_info){
    if ( !empty ($warning_info->find('td.wrn',0)->innertext) ) {
      $wn = $wn.'、大雨';
    }
    if ( !empty ($warning_info->find('td.wrn',1)->innertext) ) {
      $wn = $wn.'、洪水';
    }
    if ( !empty ($warning_info->find('td.wrn',2)->innertext) ) {
      $wn = $wn.'、暴風';
    }
    if ( !empty ($warning_info->find('td.wrn',3)->innertext) ) {
      $wn = $wn.'、暴風雪';
    }
    if ( !empty ($warning_info->find('td.wrn',4)->innertext) ) {
      $wn = $wn.'、大雪';
    }
    if ( !empty ($warning_info->find('td.wrn',5)->innertext) ) {
      $wn = $wn.'、波浪';
    }
    if ( !empty ($warning_info->find('td.wrn',6)->innertext) ) {
      $wn = $wn.'、高潮';
    }
    if ( !empty ($warning_info->find('td.adv',0)->innertext) ) {
      $ad = $ad.'、大雨';
    }
    if ( !empty ($warning_info->find('td.adv',1)->innertext) ) {
      $ad = $ad.'、洪水';
    }
    if ( !empty ($warning_info->find('td.adv',2)->innertext) ) {
      $ad = $ad.'、強風';
    }
    if ( !empty ($warning_info->find('td.adv',3)->innertext) ) {
      $ad = $ad.'、風雪';
    }
    if ( !empty ($warning_info->find('td.adv',4)->innertext) ) {
      $ad = $ad.'、大雪';
    }
    if ( !empty ($warning_info->find('td.adv',5)->innertext) ) {
      $ad = $ad.'、波浪';
    }
    if ( !empty ($warning_info->find('td.adv',6)->innertext) ) {
      $ad = $ad.'、高潮';
    }
    if ( !empty ($warning_info->find('td.adv',7)->innertext) ) {
      $ad = $ad.'、雷';
    }
    if ( !empty ($warning_info->find('td.adv',8)->innertext) ) {
      $ad = $ad.'、融雪';
    }
    if ( !empty ($warning_info->find('td.adv',9)->innertext) ) {
      $ad = $ad.'、濃霧';
    }
    if ( !empty ($warning_info->find('td.adv',10)->innertext) ) {
      $ad = $ad.'、乾燥';
    }
    if ( !empty ($warning_info->find('td.adv',11)->innertext) ) {
      $ad = $ad.'、なだれ';
    }
    if ( !empty ($warning_info->find('td.adv',12)->innertext) ) {
      $ad = $ad.'、低温';
    }
    if ( !empty ($warning_info->find('td.adv',13)->innertext) ) {
      $ad = $ad.'、霜';
    }
    if ( !empty ($warning_info->find('td.adv',14)->innertext) ) {
      $ad = $ad.'、着氷';
    }
    if ( !empty ($warning_info->find('td.adv',15)->innertext) ) {
      $ad = $ad.'、着雪';
    }

    $wn = ltrim($wn, '、');
    $ad = ltrim($ad, '、');

    if (!empty($wn)) {
      $wn = ' [警報] '.$wn;
    }

    if (!empty($ad)) {
      $ad = ' [注意報] '.$ad;
    }

    return '気象警報・注意報があります >>'.$wn.$ad;
  }
?>