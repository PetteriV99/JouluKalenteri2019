<?php

function test () { #test code function

    $arr = [1,0,0,0,99];
    assert (code($arr) == [2,0,0,0,99]);
    $arr = [2,3,0,3,99];
    assert (code($arr) == [2,3,0,6,99]);
    $arr = [2,4,4,5,99,0];
    assert (code($arr) == [2,4,4,5,99,9801]);
    $arr = [1,1,1,4,99,5,6,0,99];
    assert (code($arr) == [30,1,1,4,2,5,6,0,99]);
}

function code($prog) { #iterate program array until opcode 99 is met

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

function sum ($arr, $k) { #get $i from code function and sum the next two positions, third telling where to save the result

    $sum = $arr[$arr[$k+1]] + $arr[$arr[$k + 2]];
    $arr[$arr[$k + 3]] = $sum;
    return $arr;
}

function multi ($arr, $k) { #same as sum but it multiplies

    $mul = $arr[$arr[$k+1]] * $arr[$arr[$k + 2]];
    $arr[$arr[$k + 3]] = $mul;
    return $arr;
   
}

function main () { #get input and change values before running the code function

    $myfile = file_get_contents('input.txt', true) or die("Unable to open file!");
    $inp = explode(",", $myfile); 

    $inp [1] = 12;
    $inp [2] = 2;
    $inp = code($inp);
    echo "<h1>" . $inp[0] . "<h1>";

}

test();
main();

?>