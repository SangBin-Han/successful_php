<?php
/* 
| 작성자 : sb
| 작성일 : 2021-10-23
| 용도 : 사용자 정의 Exception 클래스의 예
*/
class myException extends Exception {
  function __toString() {
    return "<strong>Exception ".$this->getCode()
    ."</strong>: ".$this->getMessage()."<br />"
    ."in ".$this->getFile()." on line ".$this->getLine()."<br />";
  }
}

try {
  throw new myException("A terrible error has occurred", 42);
} catch (myException $m) {
  echo $m;
}
?>