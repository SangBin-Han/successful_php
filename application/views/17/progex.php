<?php
chdir('./uploads/');

// exec() 함수 사용 시
echo '<h1>Using exec()</h1>';
echo '<pre>';

// 유닉스
exec("ls -la", $result);

// 윈도우
// exec('dir', $result);

foreach ($result as $line) {
  echo $line.PHP_EOL;
}

echo "</pre>";
echo "<hr />";

// passthru() 함수 사용 시
echo '<h1>Using passthru()</h1>';
echo '<pre>';

// 유닉스
passthru('ls -la');

// 윈도우
// passthru('dir');

echo "</pre>";
echo "<hr />";

// system() 함수 사용 시
echo '<h1>Using system()</h1>';
echo '<pre>';

// 유닉스
$result = system('ls -la');

// 윈도우
// $result = system('dir');

echo "</pre>";
echo "<hr />";

// 실행 연산자 사용 시
echo '<h1>Using Backticks</h1>';
echo '<pre>';

// 유닉스
$result = 'ls -al';

// 윈도우
// $result = 'dir';

echo $result;
echo '</pre>';

?>