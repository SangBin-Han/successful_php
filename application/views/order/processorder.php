<!DOCTYPE html>
<html>
  <head>
    <title>Bob's Auto Parts - Order Results</title>
  </head>
  <body>
    <h1>Bob's Auto Parst</h1>
    <h2>Order Results</h2>
    <?php
      // 주문 날짜
      echo '<p> Order processed at '. date('H:i, jS F Y') . '</p>';
      echo '<p>Your order is as follows: </p>';
      // 총 수량
      echo "<p>Items ordered: ".$totalqty."<br/>";
      if ($totalqty == 0) {
        echo "You did not order anything on the previous page!<br/>";
      } else {
        // 제품별 수량
        if ($tireqty > 0) {
          echo htmlspecialchars($tireqty).' tires<br/>';
        }
        if ($oilqty > 0) {
          echo htmlspecialchars($oilqty).' bottles of oil<br/>';
        }
        if ($sparkqty > 0) {
          echo htmlspecialchars($sparkqty).' spark plugs<br/>';
        }
      }
      // 최종 가격, 세금
      echo "Subtotal: $".number_format($totalamount, 2)."<br />";
      echo "Total including tax: $".number_format($totalamount,2)."</p>";

      echo "<p>Address to ship to is ".htmlspecialchars($address)."</p>";

      $outputstring = $date."\t".$tireqty." tires\t".$oilqty." oil\t".$sparkqty." spark plugs\t\$".$totalamount."\t".$address."\n";

      //  데이터를 추가하기 위해 파일을 연다.
      @$fp = fopen("$document_root/application/views/order/orders.txt", 'ab'); // a - 추가 b - 바이너리

      flock($fp, LOCK_EX);

      if (!$fp) {
        echo "<p><strong> Your order could not be processed at this time.
              Please try again later.</strong></p>";
        exit;
      }

      fwrite($fp, $outputstring, strlen($outputstring));
      flock($fp, LOCK_UN);
      fclose($fp);

      echo "<p>Order written.</p>";

      // isset, empty test
      echo 'isset($tireqty): '.isset($tireqty).'<br/>';
      echo 'isset($nothere): '.isset($nothere).'<br/>';
      echo 'empty($tireqty): '.empty($tireqty).'<br/>';
      echo 'empty($nothere): '.empty($nothere).'<br/>';

      switch($find) {
        case "a":
          echo "<p>Regular customer.</p>";
          break;
        case "b":
          echo "<p>Customer referred by TV advert.</p>";
          break;
        case "c":
          echo "<p>Customer referred by phone directory.</p>";
          break;
        case "d":
          echo "<p>Customer referred by word of mouth.</p>";
          break;
        default :
          echo "<p>Wo do not know how this customer found us.</p>";
          break;
      }
    ?>
  </body>
</html>