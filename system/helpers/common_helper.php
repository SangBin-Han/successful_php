<?php
/* 
| 작성자 : sb
| 작성일 : 2021-10-20
| 용도 : 공통으로 사용하는 함수들
*/
defined('BASEPATH') OR exit('No direct script access allowed');

// --------------------------------------------------------------------

if ( ! function_exists('reverse_r')) {
	function reverse_r($str) {
		if (strlen($str) > 0) {
      revers_r(substr($str, 1));
    }
    echo substr($str, 0, 1);
    return;
	}
}

// --------------------------------------------------------------------

if ( ! function_exists('reverse_i')) {
	function reverse_i($str) {
		for ($i=1; $i<=strlen($str); $i++) {
      echo substr($str, -$i, 1);
    }
    return;
	}
}
