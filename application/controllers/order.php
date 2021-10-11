<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /* ========================================================
  | 작성자 : sb
  | 작성일 : 2021-10-11
  | 용도 : [성공적인웹프로그래밍:PHP와 MySQL] 책 참조
  |        주문 관련 처리하는 페이지
  ========================================================*/
  class Order extends CI_Controller {


    function __construct() {
      parent::__construct();
    }

    public function index() {
      $this->form();
    }

    // forwarding orderform.html
    public function form() {
      $this->load->view("order/orderform.html");
    } // end form()

    // forwarding processorder.php
    public function processorder() {
      // create short variable names
      $data['tireqty'] = $_POST['tireqty'];
      $data['oilqty'] = $_POST['oilqty'];
      $data['sparkqty'] = $_POST['sparkqty'];
      $data['find'] = $_POST['find'];

      $data['totalqty'] = 0;
      $data['totalqty'] = $data['tireqty'] + $data['oilqty'] + $data['sparkqty'];

      $data['totalamount'] = 0.00;

      define('TIREPRICE', 100);
      define('OILPRICE', 10);
      define('SPARKPRICE', 4);

      $data['totalamount'] = $data['tireqty'] * TIREPRICE
                           + $data['oilqty'] * OILPRICE
                           + $data['sparkqty'] * SPARKPRICE;

      $taxrate = 0.10; // 판매세율
      $data['totalamount'] = $data['totalamount'] * (1 + $taxrate);


      $this->load->view("order/processorder.php", $data);
    } // end processorder()

  } // end Order
?>