<!DOCTYPE html>
<html>
  <head>
    <title>File Details</title>
  </head>
  <body>
    <?php

    if (!isset($_GET["file"])) {
      echo "You have not specified a file name.";
    } else {
      $upload_dir = "./uploads/";

      // 보안을 고려하여 디렉터리 정보는 제거한다.
      $the_file = basename($_GET["file"]);

      $safe_file = $uploads_dir.$the_file;

      echo '<h1>Details of File: '.$the_file.'</h1>';

      echo '<h2>File Data</h2>';
      echo 'File Last Accessed: '.date('j F Y H:i', fileatime($safe_file)).'<br/>';
      echo 'File Last Modified: '.date('j F Y H:i', fileatime($safe_file)).'<br/>';
      /* posix_getpwuid()와 posix_getgrgid() 함수는 윈도우 시스템에서 사용할 수 없어서
        여기서는 주석 처리하였다. 유닉스나 리눅스에서는 주석을 없애고 테스트하면 된다.
        $user = posix_getpwuid(fileowner($safe_file));
        echo 'File Owner: '.$user['name'].'<br/>';

        $group = posix_getgrgid(filegroup($safe_file));
        echo 'File Group: '.$group['name'].'<br/>';
      */

      echo 'File Permissions: '.decoct(fileperms($safe_file)).'<br/>';
      echo 'File Type: '.filetype($safe_file).'<br/>';
      echo 'File Size: '.filesize($safe_file).'bytes<br/>';

      echo '<h2>File Tests</h2>';
      echo 'is_dir: '.(is_dir($safe_file)? 'true' : 'false').'<br/>';
      echo 'is_executable: '.(is_executable($safe_file)? 'true' : 'false').'<br/>';
      echo 'is_file: '.(is_file($safe_file)? 'true' : 'false').'<br/>';
      echo 'is_link: '.(is_link($safe_file)? 'true' : 'false').'<br/>';
      echo 'is_readable: '.(is_readable($safe_file)? 'true' : 'false').'<br/>';
      echo 'is_writable: '.(is_writable($safe_file)? 'true' : 'false').'<br/>';
    }
    ?>
  </body>
</html>