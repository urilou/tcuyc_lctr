<?php
  $ftp_file = $argv[1];

  if (!empty($ftp_file)) {
    include("setting.php");

	$conn_id = ftp_connect($ftp_settings['ftp_server']);
	$login_result = ftp_login($conn_id, $ftp_settings['ftp_user_name'], $ftp_settings['ftp_user_pass']);
	echo $remote_file;
	if (!ftp_put($conn_id, $remote_dir.$ftp_file, $ftp_file, FTP_BINARY)) {
	  echo "There was a problem while uploading $ftp_file<br>";
	  exit;
	}
	ftp_close($conn_id);
  }

  function ftp_upload($file) {
  	global $remote_dir, $ftp_settings;
    system("'/usr/local/php5.4/bin/php' 'uploader.php' '".$file."' > /dev/null &");
  }

?>