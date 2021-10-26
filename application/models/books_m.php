<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /* ========================================================
  | 작성자 : sb
  | 작성일 : 2021-10-25
  | 최종 수정일 : 2021-10-26
  | 용도 : book 관련 db 연결 페이지
  ========================================================*/
  class Books_m extends CI_Model{


    public function __construct(){
      parent::__construct();

    }

    public function get_bookList($searchtype, $searchterm) {
      $db = new mysqli('127.0.0.1', 'root', '140600', 'books');

      if (mysqli_connect_errno()) {
        echo '<p>Error: Could not connect to database.<br />
        Please try again later.</p>';
      }
      $query = "SELECT ISBN, Author, Title, Price 
                FROM Books 
                WHERE $searchtype = ?";

      $stmt = $db->prepare($query);
      $stmt->bind_param('s', $searchterm);
      $stmt->execute();
      $stmt->store_result();

      $stmt->bind_result($isbn, $author, $title, $price);
      $stmt->free_result();
      $db->close();

      return $stmt;
    }


  } // end Order_m
?>