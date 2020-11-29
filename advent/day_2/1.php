<?php

function test () { 

    $arr = [1,0,0,0,99];
    assert (code($arr) == [2,0,0,0,99]);
    $arr = [2,3,0,3,99];
    assert (code($arr) == [2,3,0,6,99]);
    $arr = [2,4,4,5,99,0];
    assert (code($arr) == [2,4,4,5,99,9801]);
    $arr = [1,1,1,4,99,5,6,0,99];
    assert (code($arr) == [30,1,1,4,2,5,6,0,99]);
}

function code($prog) {

        $i = 0;

        do {

            if ($prog[$i] == 1) {

                $prog = sum($prog, $i);

            }  
            elseif ($prog[$i] == 2) {

                $prog = multi($prog, $i);

            } 

            $i = $i + 4;

        } while ($prog[$i] < 98);

    return $prog;

}

function sum ($arr, $k) {

    $sum = $arr[$arr[$k+1]] + $arr[$arr[$k + 2]];
    $arr[$arr[$k + 3]] = $sum;
    return $arr;
}

function multi ($arr, $k) {

    $mul = $arr[$arr[$k+1]] * $arr[$arr[$k + 2]];
    $arr[$arr[$k + 3]] = $mul;
    return $arr;
   
}

function main () {

    $myfile = fopen("input.txt", "r") or die("Unable to open file!");

    (int) $i = 0;

    while(!feof($myfile)) { #pitäisi lukea kunnes tulee pilkku

        $line[$i] = fgetc($myfile);
        $i++;

      }

    fclose($myfile);    
    print_r($line);

    /*
    $line = $line [1] = 12;
    $line = $line [2] = 2;
    $line = code($myfile);
    echo "<h1>" . $line[0] . "<h1>";
    */
}

test();
main();

?>