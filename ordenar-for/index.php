<?php

$array = [5,7,1,2,4,9,11,20,200,3];
$count = count($array);
$aux = "";
for ($x = 0; $x < $count; $x++) {
	for ($y=($x+1); $y < $count; $y++) {
		//5 maior 4
		//var_dump($aux,$y,$array[$x],$array[$y]);
		//die();
		if(($array[$x]) > ($array[$y])){
			$aux = $array[$y];
			$array[$y] = $array[$x];
			//var_dump($array[$x]);
			$array[$x] = $aux;
			//var_dump($array[$y]);
		}
	}
}

var_dump($array);