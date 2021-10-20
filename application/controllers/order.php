<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /* ========================================================
  | 작성자 : sb
  | 작성일 : 2021-10-11
  | 최종 수정일 : 2021-10-17
  | 용도 : [성공적인웹프로그래밍:PHP와 MySQL] 책 참조
  |        주문 관련 처리하는 페이지
  ========================================================*/
  class Order extends CI_Controller {


    function __construct() {
      parent::__construct();

      $this->load->model('order_m');
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
      $data['address'] = preg_replace('/\t|\R/',' ',$_POST['address']);
      $data['document_root'] = $_SERVER['DOCUMENT_ROOT'];
      $data['date'] = date('H:i, jS F Y');
      
      // get total qty, amount
      $total = $this->order_m->get_total($data['tireqty'], $data['oilqty'], $data['sparkqty']);

      $data = array_merge($data, $total);
      
      $this->load->view("order/processorder.php", $data);
    } // end processorder()

    // forwarding freight.php
    public function freight() {
      $this->load->view("order/freight.php");
    } // end freight()

    // forwarding vieworders.php
    public function vieworders() {
      // create short variable names
      $data['document_root'] = $_SERVER['DOCUMENT_ROOT'];
      
      $this->load->view("order/vieworders.php", $data);
    } // end vieworders.php

  } // end Order
?>