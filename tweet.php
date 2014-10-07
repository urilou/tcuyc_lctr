<?php

  $arg1 = $argv[1];
  if (!empty($arg1)) {
    require_once(dirname(__FILE__) . "/EasyBotter.php");
    $eb = new EasyBotter();
    bot();
  }

  function tweet($file){
    $file_size = count(file($file));
    for ($i = 1; $i <= $file_size; $i++ ) {
      system("'/usr/local/php5.4/bin/php' 'tweet.php' '".$file."'");
    }
  }

  function bot(){
    global $eb, $arg1;
    $response = $eb->postRotation($arg1);
  }

?>