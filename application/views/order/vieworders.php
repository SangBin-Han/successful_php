<?php
/* 
| 작성자 : sb
| 작성일 : 2021-10-11
| 최종 수정일 : 2021-10-17
| 용도 : 주문 파일을 읽는 인터페이스
*/
  // 짧은 이름의 변수를 생성한다.
  $document_root = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Han's Auto Parts - Order Results</title>
  </head>
  <body>
    <h1>Han's Auto Parts</h1>
    <h2>Customer Orders</h2>
    <?php 
      $orders = file("$document_root/application/views/order/orders.txt");

      $number_of_orders = count($orders);
      if ($number_of_orders == 0) {
        echo "<p><strong>No orders pending.<br />
              Please try again later.</strong></p>";
      }

      for ($i=0; $i < $number_of_orders; $i++) {
        echo $orders[$i]."<br />";
      }
    ?>
  </body>
</html>