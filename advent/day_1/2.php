<?php

function test () {

    assert (calc(1969) == 966);
    assert (calc(100756) == 50346);

}

function calc ($mass) {

    (int) $fuel = 0;
    (int) $fuelsum = 0;
    $fuel = floor($mass / 3) - 2;
    $fuelsum = $fuel;

    while ((floor($fuel / 3) - 2) > 0) {

    $fuel =  floor($fuel / 3) - 2;
    $fuelsum = $fuelsum + $fuel;   

    }

    return $fuelsum;

}

function main () {

    $myfile = fopen("1_input.txt", "r") or die("Unable to open file!");
    (int) $sum = 0;

    while(!feof($myfile)) {

        $line = (int) fgets($myfile);
        $sum = $sum + calc($line);

        }

    echo "<h1>" . $sum . "<h1>";
    fclose($myfile);
        
}

test();
main();

?>