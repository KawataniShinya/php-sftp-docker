<?php
$conn1 = ssh2_connect('sftp01', 22);
$auth1 = ssh2_auth_password($conn1, 'ftpuser', 'ftppass');
$sftp1 = ssh2_sftp($conn1);
$get_data1 = file_get_contents('/var/www/contents/test.txt');
$put_data1 = file_put_contents('ssh2.sftp://' . $sftp1 . '/sftp_home/test.txt', $get_data1);
die();