<?php
/* 
| 작성자 : sb
| 작성일 : 2021-10-17
| 용도 : 메인 페이지
*/
  $document_root = $_SERVER['DOCUMENT_ROOT'];
  $file_path = $document_root."/application/views";
  $pictures = array('/imgs/brakes.jpg', '/imgs/headlight.jpg',
                    '/imgs/spark_plug.jpg', '/imgs/steering_wheel.jpg',
                    '/imgs/tire.jpg', '/imgs/wiper_blade.jpg');
  shuffle($pictures);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Han's Auto Parts</title>
  </head>
  <body>
    <h1>Han's Auto Parts</h1>
      <div align="center">
        <table style="width:100%; border:0">
          <tr>
            <?php
              for ($i =0; $i < 3; $i++) {
                echo "<td style=\"width: 33%; text-align: center\">";
                echo    "<img src=\"".$file_path.$pictures[$i]."\"/>";
                echo  "</td>";
              }
            ?>
          </tr>
        </table>
      </div>
  </body>
</html>