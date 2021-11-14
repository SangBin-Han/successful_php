<!DOCTYPE html>
<html>
  <head>
    <title>Stock Quote From NASDAQ</title>
  </head>
  <body>

  <?php
  // 찾을 주식 종목을 선택한다
  $symbol = "GOOG";
  echo '<h1>STock Quote for '.$symbol.'</h1>';

  $url = 'http://download.finance.yahoo.com/d/quotes.csv' . '?s='.$symbol.'&e=.csv&f=sl1d1t1c1ohgv';

  if (!($contents = file_get_contents($url))) {
    die('Failed to open '.$url);
  }

  // 필요한 데이터를 추출한다
  list($symbol, $quote, $date, $time) = explode(',', $contents);
  $date = trim($date, '"');
  $time = trim($time, '"');

  echo '<p>'.$symbol.' was list sold at: $'.$quote.'</p>';
  echo '<p>Quote current as of '.$date.' at '.$time.'</p>';

  // 정보를 가져온 곳을 알린다
  echo '<p>This information retrieved from <br /><a href="'.$url.'">'.$url.'</a>.</p>';
  ?>
  </body>
</html>