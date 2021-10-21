<?php
/* 
| 작성자 : sb
| 작성일 : 2021-10-21
| 용도 : 익명 함수 내부에서 전역 범위의 변수를 사용하기
*/
$printer = function($value){ echo "$value <br/>"; };

$products = [ 'Tires' => 100,
              'Oil' => 10,
              'Spark Plugs' => 4 ];
$markup = 0.20;

$apply = function(&$val) use ($markup) {
  $val = $val * (1+$markup);
};

array_walk($products, $apply);

array_walk($products, $printer);
?>