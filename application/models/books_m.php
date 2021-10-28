<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /* ========================================================
  | 작성자 : sb
  | 작성일 : 2021-10-25
  | 최종 수정일 : 2021-10-28
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

    // PDO로 책 목록 불러오기
    public function get_bookList_with_PDO($searchtype, $searchterm) {
      // PDO를 사용하기 위해 변수를 설정한다.
      $user = "root";
      $pass = "140600";
      $host = "127.0.0.1";
      $db_name = "books";
      // DSN을 설정한다.
      $dsn = "mysql:host=$host;dbname=$db_name";

      // 데이터베이스에 연결한다
      try {
        $db = new PDO($dsn, $user, $pass);

        // 쿼리를 실행한다
        $query = "SELECT ISBN, Author, Title, Price 
                  FROM Books 
                  WHERE $searchtype = :searchterm";
        
        $stmt = $db->prepare($query);
        $stmt->bindParam(':searchterm', $searchterm);
        $stmt->execute();

        // 반환된 행의 개수를 얻는다
        $data["rowCount"] = $stmt->rowCount();
        $data["result"] = $stmt->fetch(PDO::FETCH_OBJ);

        // 데이터베이스 연결 끊기
        $db = NULL;
      } catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
        exit;
      }

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