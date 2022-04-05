<?php
/* 
| 작성자 : sb
| 작성일 : 2021-10-23
| 용도 : 클래스에 관한 정보를 보여주는 페이지
*/
require_once("applications/controller/page.php");

$class = new ReflectionClass("Page");
echo "<pre>".$class."</pre>";
?>