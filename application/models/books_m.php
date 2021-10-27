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

    // db 연결
    public function connect_db () {
      $db = new mysqli('127.0.0.1', 'root', '140600', 'books');

      if (mysqli_connect_errno()) {
        echo '<p>Error: Could not connect to database.<br />
        Please try again later.</p>';
      }

      return $db;
    } // end connect_db()

    // 책 목록 불러오기
    public function get_bookList($searchtype, $searchterm) {
      $db = $this->connect_db();

      $query = "SELECT ISBN, Author, Title, Price 
                FROM Books 
                WHERE $searchtype = ?";

      $stmt = $db->prepare($query);
      $stmt->bind_param('s', $searchterm);
      $stmt->execute();
      $stmt->store_result();

      $stmt->bind_result($isbn, $author, $title, $price);
      $stmt->free_result();
      $data = array();

      $db->close();

      $data["bookList"] = $stmt;

      return $data;
    } // end get_bookList()

    // db에 책 입력
    public function insert_book ($data) {
      $db = $this->connect_db();

      $query = "INSERT INTO Books VALUES (?, ?, ?, ?)";
      $stmt = $db->prepare($query);
      $stmt->bind_param('sssd', $data["isbn"], $data["author"], $data["title"], $data["price"]);
      $stmt->execute();

      $db->close();

      return $stmt->affected_rows;
    } // end insert_book()


  } // end Order_m
?>