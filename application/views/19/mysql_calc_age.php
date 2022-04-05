<?php
// 계산할 날짜(생일)를 설정한다
$day = 18;
$month = 9;
$year = 1972;

// ISO 8601 날짜 형식으로 생일의 형식을 변환한다
$bdayISO = date("c", mktime(0,0,0,$month,$day,$year));

// mysql 쿼리를 사용해서 나이를 일 수로 계산한다
$db = mysqli_connect('localhost', 'user', 'pass');
$res = mysqli_query($db, "SELECT datediff(now(), '$bdayISO')");
$age = mysqli_fetch_array($res);

// 일 수로 된 나이를 년 단위의 나이(근사치)로 변환한다
echo 'Current age is '.floor($age[0]/365.25).'.';
?>