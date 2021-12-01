<?php
/* 
| 작성자 : sb
| 작성일 : 2021-10-23
| 용도 : 반복자 클래스와 관련 인터페이스 구현하기
*/
class ObjectIterator implements Iterator {
  private $obj;
  private $count;
  private $currentIndex;

  function __construct($obj) {
    $this->obj = $obj;
    $this->count = count($this->obj->data);
  }

  function rewind() {
    $this->currentIndex = 0;
  }

  function valid() {
    return $this->currentIndex < $this->count;
  }

  function key() {
    return $this->currentIndex;
  }

  function current() {
    return $this->obj->data[$this->currentIndex];
  }

  function next() {
    $this->currentIndex++;
  }
}

class Object implements IteratorAggregate {
  public $data = array();

  function __construct($in) {
    $this->data = $in;
  }

  function getIterator() {
    return new ObjectIterator($this);
  }
}

$myObject = new Object(array(2,4,6,8,10));

$myIterator = $myObject->getIterator();
for ($myIterator->rewind(); $myIterator->valid(); $myIterator->next()) {
  $key = $myIterator->key();
  $value = $myIterator->current();
  echo $key," => ".$value."<br />";
}
?>