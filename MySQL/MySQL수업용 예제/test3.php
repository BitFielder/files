<?php
/* 구매갯수에 따른 덤 구하기
구매갯수 500개이상 덤 20%
	300개이상 덤 15%
	100개이상 덤 10%
	50개이상 덤 5%
	50개미만 덤 0%
	<출력 결과>
	구매갯수 : 80개
	덤 : 4개
	총갯수 : 84개*/
	$a = 80;
	if ($a >=500)$b = 0.2;
	else if($a >=300) $b = 0.15;
	else if($a >=100) $b = 0.1;
	else if($a >=50) $b = 0.05;
	else $b = 0;
	$c = $a*$b;
	$d = $a+$c;
	echo "구매갯수 : {$a}<br>덤 : {$c}<br>총갯수 : {$d}";
	?>