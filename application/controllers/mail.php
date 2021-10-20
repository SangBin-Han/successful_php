<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  /* ========================================================
  | 작성자 : sb
  | 작성일 : 2021-10-17
  | 용도 : [성공적인웹프로그래밍:PHP와 MySQL] 책 참조
  |        메일 관련 페이지
  ========================================================*/
  class Mail extends CI_Controller {


    function __construct() {
      parent::__construct();

    }

    public function index() {
      $this->processfeedback();
    }

    // forwarding processfeedback.php
    public function processfeedback() {
      // 짧은 이름의 변수를 생성한다.
      $name=$_POST['name'];
      $email=$_POST['email'];
      $feedback=$_POST['feedback'];

      // email 검증
      if (preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-\.]+$/', $email) ===0) {
        echo "<p>That is not a valid email address.</p>";
        exit;
      }
      // 정해진 값을 설정한다.
      $toaddress = "feedback@example.com"; // the default value
      if (preg_match('/shop|customer service|retail/', $feedback)) {
        $toaddress = 'retail@example.com';
      } else if (preg_match('/deliver|fulfill/', $feedback)) {
        $toaddress = 'fulfillment@example.com';
      } else if (preg_match('/bill|account/', $feedback)) {
        $toaddress = 'accounts@example.com';
      }
      if (preg_match('/bigcustomer\.com/', $email)) {
        $toaddress = 'bob@example.com';
      }
      $subject = "Feedback from web site";
      $mailcontent = "Customer name : ".str_replace("\r\n", "", $name)."\n".
                "Customer email : ".str_replace("\r\n", "", $email)."\n".
                "Customer comments : \n".str_replace("\r\n", "", $feedback)."\n";
      $formaddress = "From : webserver@example.com";

      // mail() 함수를 호출하여 이메일을 보낸다.
      mail($toaddress, $subject, $mailcontent, $formaddress);

      // 데이터 설정
      $data = array();
      $data["feedback"] = $feedback;

      $this->load->view("mail/processfeedback", $data);
    } // end processfeedback()

  } // end Mail
?>