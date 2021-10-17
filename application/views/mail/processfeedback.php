<?php
/* 
| 작성자 : sb
| 작성일 : 2021-10-17
| 용도 : 고객 피드백 폼의 내용을 이메일로 보내는 기본 스크립트
*/

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Han's Auto Parts - Feedback Submitted</title>
  </head>
  <body>
    <h1>Feedback submitted</h1>
    <p>Your feedback (shown below) has been sent.</p>
    <p><?php echo nl2br(htmlspecialchars($feedback)); ?></p>
  </body>
</html>

