<?php
  /* 
  | 작성자 : sb
  | 작성일 : 2021-10-19
  | 용도 : 메인 페이지 - require 테스트 용
  */
  $document_root = $_SERVER['DOCUMENT_ROOT'];

  echo 'This is the main file.<br />';
  require($document_root.'/application/views/reusable.php');
  echo 'The script will end now.<br />';
?>