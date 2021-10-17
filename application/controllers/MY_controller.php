<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /* ========================================================
  | 작성자 : sb
  | 작성일 : 2021-10-17
  | 용도 : [성공적인웹프로그래밍:PHP와 MySQL] 책 참조
  |        메인 페이지
  ========================================================*/
  class MY_controller extends CI_Controller {


    function __construct() {
      parent::__construct();

    }

    public function index() {
      $this->hans_front_page();
    }

    // forwarding hans_front_page.php
    public function hans_front_page() {
      $this->load->view("hans_front_page");
    } // end hans_front_page()


  } // end My_controller
?>