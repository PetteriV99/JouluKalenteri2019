<?php

function opcode($prog) { #iterate program array until opcode 99 is met

        $i = 0;

        do {

            if ($prog[$i] == (1 or 2)) { 

                $prog = instruction($prog, $i);

            }  

            $i = $i + 4;

        } while ($prog[$i] < 98);

    return $prog;

}

function instruction ($arr, $k) { #get current iteration from opcode and calculate using the next two positions, third telling where to save the result

    if ($arr[$k] == 1) {

        $sum = $arr[$arr[$k+1]] + $arr[$arr[$k + 2]];
        $arr[$arr[$k + 3]] = $sum;

    } else {

        $sum = $arr[$arr[$k+1]] * $arr[$arr[$k + 2]];
        $arr[$arr[$k + 3]] = $sum;

    }

    return $arr;
}

function inputs ($comms) { #test values until output 19690720 is found

    $comms = opcode($comms);

    echo "<h1>" . $comms[0]. "<h1>";
    return 0;

}

function main () { #get input

    $myfile = file_get_contents('input.txt', true) or die("Unable to open file!");
    $commands = explode(",", $myfile); 
    $commands = inputs($commands);

}

main();

?>