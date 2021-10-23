<?php
/* 
| 작성자 : sb
| 작성일 : 2021-10-23
| 용도 : 예외를 던지고 받는 페이지
*/
try {
  throw new Exception("A terrible error has occurred", 42);
} catch (Exception $e) {
  echo "Exception ".$e->getCode(). ": ". $e->getMessage()."<br />".
  " in ".$e->getFIle(). "on line". $e->getLine(). "<br />";
}
?>