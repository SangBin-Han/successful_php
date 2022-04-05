<?php
// 계산할 날짜(생일)를 설정한다
$day = 18;
$month = 9;
$year = 1972;

$bdayunix = mktime(0, 0, 0, $month, $day, $year); // 생일을 타임스탬프로 변환한다
$nowunix = time();
$ageunix = $nowunix - $bdayunix; // 차이를 계산한다
$age = floor($ageunix / (365 * 24 * 60 * 60)); // convert from seconds to years

echo "Current age is ".$age.".";
?>