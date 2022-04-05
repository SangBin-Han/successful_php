<?php 
/* 
| 작성자 : sb
| 최종 수정일 : 2021-10-23
| 용도 : 주문 결과 페이지
*/
require_once("application/controller/file_exceptions.php");
?>
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
      try {
        if (!($fp = @fopen("$document_root/application/views/order/orders.txt", 'ab'))) { // a - 추가 b - 바이너리
          throw new fileOpenException();
        }
        if (!flock($fp, LOCK_EX)) {
          throw new fileWriteException();
        }
        if (!fwrite($fp, $outputstring, strlen($outputstring))) {
          throw new fileWriteException();
        }

        flock($fp, LOCK_UN);
        fclose($fp);
        echo "<p>Order written.</p>";
      } catch (fileOpenException $foe) {
        echo "<p><strong>Orders file could not be opened.<br />
              Please contact our webmaster for help.</strong></p>";
      } catch (Exception $e) {
        echo "<p><strong>Your order could not be processed at this time.
              Please try again later.</strong></p>";
      }
    ?>
  </body>
</html>