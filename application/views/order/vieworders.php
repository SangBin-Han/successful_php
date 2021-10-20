<?php
/* 
| 작성자 : sb
| 작성일 : 2021-10-17
| 용도 : 주문 데이터를 필드로 분리하고 형식화하여 출력
*/
  // 짧은 이름의 변수를 생성한다.
  $document_root = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Han's Auto Parts - Order Results</title>
    <style type="text/css">
      table, th, td {
        border-collapse: collapse;
        border: 1px solid black;
        padding: 6px;
      }
      th {
        background: #ccccff;
      }
    </style>
  </head>
  <body>
    <h1>Han's Auto Parts</h1>
    <h2>Customer Orders</h2>
    <?php 
      // 파일 데이터 전체를 읽는다.
      // 각 주문 데이터가 하나의 배열 요소가 된다.
      $orders = file("$document_root/application/views/order/orders.txt");
      
      // 배열의 요소 수를 알아낸다.
      $number_of_orders = count($orders);

      if ($number_of_orders == 0) {
        echo "<p><strong>No orders pending.<br />
              Please try again later.</strong></p>";
      }

      echo "<table>\n";
        echo "<tr>
                <th>Order Date</th>
                <th>Tires</th>
                <th>Oil</th>
                <th>Spark Plugs</th>
                <th>Total</th>
                <th>Address</th>
              </tr>";

      for ($i=0; $i < $number_of_orders; $i++) {
        // 각 줄의 데이터 레코드를 필드로 분리한다.
        $line = explode("\t", $orders[$i]);
      

        // 주문 부품의 개수를 보존한다.
        $line[1] = intval($line[1]);
        $line[2] = intval($line[2]);
        $line[3] = intval($line[3]);

        // 각 주문 데이터를 출력한다.
        echo "<tr>
                <td>".$line[0]."</td>
                <td style=\"text-align: right;\">".$line[1]."</td>
                <td style=\"text-align: right;\">".$line[2]."</td>
                <td style=\"text-align: right;\">".$line[3]."</td>
                <td style=\"text-align: right;\">".$line[4]."</td>
                <td>".$line[5]."</td>
              </tr>";
      }
      echo "</table>";
    ?>
  </body>
</html>