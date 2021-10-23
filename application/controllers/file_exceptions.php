<?php
/* 
| 작성자 : sb
| 작성일 : 2021-10-23
| 용도 : 파일 입출력 관련 사용자 정의 에러
*/
class fileOpenException extends Exception {
  function __toString() {
    return "fileOpenException ". $this->getCode()
    . ": ". $this->getMessage()."<br />"." in "
    . $this->getFile(). " on line ". $this->getLine()
    ."<br />";
  }
}

class fileWriteException extends Exception {
  function __toString() {
    return "fileWriteException ". $this->getCode()
    . ": ". $this->getMessage()."<br />"." in "
    . $this->getFile(). " on line ". $this->getLine()
    . "<br />";
  }
}

class fileLockException extends Exception {
  function __toString() {
    return "fileWriteException ". $this->getCode()
    . ": ". $this->getMessage()."<br />"." in "
    . $this->getFile(). " on line ". $this->getLine()
    . "<br />";
  }
}
?>