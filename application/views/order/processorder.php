<!DOCTYPE html>
<html>
  <head>
    <title>Bob's Auto Parts - Order Results</title>
  </head>
  <body>
    <h1>Bob's Auto Parst</h1>
    <h2>Order Results</h2>
    <?php
      echo '<p> Order processed at '. date('H:i, jS F Y') . '</p>';
      echo '<p>Your order is as follows: </p>';
      // 제품별 수량
      echo htmlspecialchars($tireqty).' tires<br/>';
      echo htmlspecialchars($oilqty).' bottles of oil<br/>';
      echo htmlspecialchars($sparkqty).' spark plugs<br/>';
      // 총 수량
      echo "<p>Items ordered: ".$totalqty."<br/>";
      // 최종 가격, 세금
      echo "Subtotal: $".number_format($totalamount, 2)."<br />";
      echo "Total including tax: $".number_format($totalamount,2)."</p>";
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