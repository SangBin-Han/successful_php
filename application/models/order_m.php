<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Order_m extends CI_Model{


    public function __construct(){
      parent::__construct();

    }

    public function get_total($tireqty=0, $oilqty=0, $sparkqty=0) {
      // create short varialbe names
      $data['totalqty'] = 0;
      $data['totalamount'] = 0.00;
      $taxrate = 0.10; // local sales tax is 10%

      // create constants
      define('TIREPRICE', 100);
      define('OILPRICE', 10);
      define('SPARKPRICE', 4);

      $data['totalqty'] = $tireqty + $oilqty + $sparkqty;

      $data['totalamount'] = $tireqty * TIREPRICE
                           + $oilqty * OILPRICE
                           + $sparkqty * SPARKPRICE;
      
      $data['totalamount'] = $data['totalamount'] * (1 + $taxrate);

      return $data;
    }


  } // end Order_m
?>