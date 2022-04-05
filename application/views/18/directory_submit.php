<!DOCTYPE html>
<html>
  <head>
    <title>Site Submission Results</title>
  </head>
  <body>
    <h1>Site Submission Results</h1>

    <?php

    // 폼 필드의 값을 추출한다
    $url = $_POST["url"];
    $email = $_POST["email"];

    // URL을 검사한다
    $url = parse_url($url);
    $host = $url["host"];

    if (!($ip = gethostbyname($host))) {
      echo 'Host for URL does not have valid IP address.';
      exit;
    }

    echo 'Host ('.$host.') is at IP '.$ip.'<br />';

    // 이메일 주소를 검사한다
    $email = explode("@", $email);
    $emailhost = $email[1];

    if (!getmxrr($emailhost, $mxhostsarr)) {
      echo 'Email address is not at valid host.';
      exit;
    }

    echo 'Email is delivered via: <br />
    <ul>';

    for ($i=0; $i < count($mxhostsarr); $i++) {
      echo '<li>'.$mxhostsarr[$i].'</li>';
    }

    echo '</ul>';

    // 여기까지 실행되었다면 다 잘된 것이다
    echo '<p>All submitted details are ok.</p>';
    echo '<p>Thank you for submitting your site.
    It will be visited by one of our staff members soon.</p>';
    // 실제 웹 디렉터리 사이트라면 등록 대기 데이터베이스에 이 사이트를 추가한다
    ?>
  </body>
</html>