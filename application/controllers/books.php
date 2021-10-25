<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /* ========================================================
  | 작성자 : sb
  | 작성일 : 2021-10-25
  | 용도 : book 관련 페이지
  ========================================================*/
  class Books extends CI_Controller {


    function __construct() {
      parent::__construct();
      $this->load->model('books_m');
    }

    public function index() {
      $this->search();
    }

    // forwarding search.html
    public function search() {
      $this->load->view("search.html");
    } // end search()

    // forwarding results.php
    public function results() {
      // 짧은 이름의 변수를 생성한다.
      $searchtype=$_POST['searchtype'];
      $searchterm=trim($_POST['searchterm']);

      if (!$searchtype || !$searchterm) {
        echo "<p>You have not entered search details.<br />
        Please go back and try again.</p>";
        exit;
      }

      // searchtype이 올바른 지 확인
      switch ($searchtype) {
        case "Title":
        case "Author":
        case "ISBN":
          break;
        default:
          echo "<p>That is not a valid search type. <br />
          Please go back and try again.</p>";
          exit;
      }

      $data["bookList"] = $this->books_m->get_bookList($searchtype, $searchterm);

      $this->load->view("results.php", $data);
    } // end results()

  } // end Books
?>