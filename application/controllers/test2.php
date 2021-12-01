<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /* ========================================================
  | 작성자 : sb
  | 작성일 : 2021-10-25
  | 최종 수정일 : 2021-10-28
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

    // newbook.html forwarding
    public function insert_book () {

      $this->load->view("newbook.html");
    } // end insert_book()
    
    // db에 새로운 책 추가
    public function exec_insert_book() {
      $data = array();

      if (!isset($_POST["ISBN"]) || !isset($_POST["Author"]) || !isset($_POST["Title"]) || !isset($_POST["Price"])) {
        echo "<p>You have not entered all the required details.<br />
              Please go back and try again.</p>";
        exit;
      }

      // 짧은 이름의 변수를 생성한다.
      $data["isbn"] = $_POST["ISBN"];
      $data["author"] = $_POST["Author"];
      $data["title"] = $_POST["Title"];
      $data["price"] = $_POST["Price"];

      $result = $this->books_m->insert_book($data);

      if ($result > 0) {
        echo "<p>Book inserted into the database.</p>";
      } else {
        echo "<p>An error has occurred.<br/>
              The item was not added.</p>";
      }
    } // end exec_insert_book()

    // forwarding results_pdo.php
    public function results_pdo() {
      // 짧은 이름의 변수를 생성한다.
      $searchtype = $_POST["searchtype"];
      $searchterm = trim($_POST["searchterm"]);

      if (!$searchtype || !$searchterm) {
        echo "<p>You have not entered search details.<br />
        Please go back and try again.</p>";
        exit;
      }

      // searchtype이 올바른지 확인한다.
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

      $data = $this->books_m->get_bookList_with_PDO($searchtype, $searchterm);

      $this->load->view("results_pdo.php", $data);
    } // end results_pdo()

  } // end Books
?>