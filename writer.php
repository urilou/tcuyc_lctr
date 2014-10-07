<?php
  function write($file, $data){
    $fp = fopen($file, "w");
    stream_set_write_buffer($fp,0);
    flock($fp, LOCK_EX);
    fwrite($fp, $data);
    fclose($fp);
    echo '<div><a href="'.$file.'">'.$file.'</a>に書き込みました</div><div><br></div>';
  }

  function write_array($file, $data){
    global $val;
    $fp = fopen($file, 'w');
    stream_set_write_buffer($fp,0);
    foreach ($data as $a){
      fputs($fp, $a);
    }
    fclose($fp);
    echo '<div><a href="'.$file.'">'.$file.'</a>に書き込みました</div><div><br></div>';
  }
?>