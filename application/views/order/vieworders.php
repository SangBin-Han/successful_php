<?php
/* 
| 작성자 : sb
| 작성일 : 2021-10-11
| 용도 : 주문 파일을 읽는 인터페이스
*/
  $document_root = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bob's Auto Parts - Order Results</title>
  </head>
  <body>
    <h1>Bob's Auto Parts</h1>
    <h2>Customer Orders</h2>
    <?php 
      @$fp = fopen("$document_root/application/views/order/orders.txt", 'rb'); // r - 읽기 b - 바이너리
      flock($fp, LOCK_SH); // lock file for reading 

      if (!$fp) {
        echo "<p><strong>No orders pending.<br/>
             Please try again later.</strong></>";
        exit;
      }
      // feof = File End Of File
      while (!feof($fp)) {
        // fgets() = 한 번에 한 줄씩
        //          \n을 만나거나 EOF를 만날 때까지 데이터를 읽는다.
        $order = fgets($fp); 
        echo htmlspecialchars($order)."<br/>";
      }

      flock($fp, LOCK_UN); // release read lock
      fclose($fp);
    ?>
  </body>
</html>