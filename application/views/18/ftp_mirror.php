<!DOCTYPE html>
<html>
  <head>
    <title>Mirror Update</title>
  </head>
  <body>
    <h1>Mirror Update</h1>

    <?php
    // 변수를 설정한다 - 각 애플리케이션에 맞게 이것을 변경하면 된다
    $host = 'apache.cs.utah.edu';
    $user = 'anonymous';
    $password = 'me@example.com';
    $remotefile = '/apache.org/httpd/httpd-2.4.25.tar.gz';
    $localfile = './httpd-2.4.25.tar.gz';

    // 호스트에 연결한다
    $conn = ftp_connect($host);

    if (!$conn) {
      echo 'Error: Could not connect to '.$host;
      exit;
    }

    echo 'Connected to '.$host.'<br />';

    // 호스트에 로그인한다
    $result = @ftp_login($conn, $user, $pass);
    if (!$result) {
      echo 'Error: Could not log in as '.$user;
      ftp_quit($conn);
      exit;
    }

    echo 'Logged in as '.$user.'<br />';

    // 패시브 모드(passive mode)를 활성화 한다
    ftp_pasv($conn, true);

    // 변경이 필요한지 알기 위해 파일 시간을 확인한다
    echo 'Checking file time...<br />';
    if (file_exists($localfile)) {
      $localtime = filemtime($localfile);
      echo 'Local file last updated ';
      echo date('G:i j-M-Y', $localtime);
      echo '<br />';
    } else {
      $localtime = 0;
    }

    $remotetime = ftp_mdtm($conn, $remotefile);
    if (!($remotetime >= 0)) {
      // 파일이 없다는 의미가 아니다 서버에서 파일 변경 시간을 지원하지 않을 수 있다
      echo 'Can\'t access remote file time.<br />';
      $remotetime = $localtime+1;
    } else {
      echo 'Remote file last updated ';
      echo date('G:i j-M-Y', $remotetime);
      echo '<br />';
    }

    if (!($remotetime > $localtime)) {
      echo 'Local copy is up to date.<br />';
      exit;
    }

    // 파일을 다운로드한다
    echo 'Getting file from server...<br />';
    $fp = fopen($localtime, 'wb');

    if (!$success = ftp_fget($conn, $fp, $remotefile, FTP_BINARY)) {
      echo 'Error: Could not download file.';
      fclose($fp);
      ftp_quit($conn);
      exit;
    }

    fclose($fp);
    echo 'File downloaded successfully.';
    // 호스트와의 연결을 닫는다
    ftp_close($conn);

    ?>
  </body>
</html>