<?php

$myfile = fopen("1_input.txt", "r") or die("Unable to open file!");
(int) $sum = 0;

while(!feof($myfile)) {
$fuel = (int) fgets($myfile);
$fuel = floor($fuel / 3) - 2;
if ($fuel < 0) {$fuel = 0;}
echo $fuel . "<br>";
$sum = $sum + $fuel;
}

echo $sum;
fclose($myfile);

?>