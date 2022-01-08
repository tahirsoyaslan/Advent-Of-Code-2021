<?php

function comparisonO($input, $index){
    $zeros = 0;
    $ones = 0;
    for ($i = 0; $i < count($input); $i++) {
        if ($input[$i][$index] == 0) {
            $zeros++;
        } else {
            $ones++;
        }
    }
return $ones >= $zeros ? 1 : 0;
}

function comparisonC($input, $index){
    $zeros = 0;
    $ones = 0;
    for ($i = 0; $i < count($input); $i++) {
        if ($input[$i][$index] == 0) {
            $zeros++;
        } else {
            $ones++;
        }
    }
return $ones >= $zeros ? 0 : 1;
}

function problem1($input)
{
    $width = strlen($input[0]) - 1;
    $zeros = array_fill(0, $width, 0);
    $ones = array_fill(0, $width, 0);
    $epsilon = array_fill(0, $width, 0);
    $gamma = array_fill(0, $width, 0);

    for ($i = 0; $i < count($input); $i++) {
        for ($j = 0; $j < $width; $j++) {
            if ($input[$i][$j] == '0') {
                $zeros[$j]++;
            } else {
                $ones[$j]++;
            }
        }
    }

    for ($i = 0; $i < count($zeros); $i++) {
        if ($zeros[$i] > $ones[$i]) {
            $epsilon[$i] = 1;
            $gamma[$i] = 0;
        } else {
            $epsilon[$i] = 0;
            $gamma[$i] = 1;
        }
    }
    return bindec(implode($gamma)) * bindec(implode($epsilon));
}

function problem2($input)
{
    $width = strlen($input[0]) - 1;
    $zeros = array_fill(0, $width, 0);
    $ones = array_fill(0, $width, 0);
    $oxygen = $input;
    $CO2 = $input;

    for ($i = 0; $i < count($input); $i++) {
        for ($j = 0; $j < $width; $j++) {
            
            if ($input[$i][$j] == '0') {
                $zeros[$j]++;
            } else {
                $ones[$j]++;
            }
        }
    }

    for ($i = 0; $i < count($zeros); $i++) {
        $value = comparisonO($oxygen, $i);

        for ($j = 0; $j < count($oxygen); $j++) {

            if ($oxygen[$j][$i] != $value) {
                if(count($oxygen) == 1)
                    break;
                array_splice($oxygen, $j, 1);
                $j--;
            }
        }
    }

    for ($i = 0; $i < count($zeros); $i++) {
        $value = comparisonC($CO2, $i);
        for ($j = 0; $j < count($CO2); $j++) {
            if ($CO2[$j][$i] != $value) {
                if(count($CO2) == 1)
                    break;
                array_splice($CO2, $j, 1);
                $j--;
            }
        }
    }

    return bindec($CO2[0]) * bindec($oxygen[0]);
}




$fn = fopen("input.txt", "r");
$input = array();

while (!feof($fn)) {
    array_push($input, fgets($fn));
}
fclose($fn);
echo "Problem 1: " . problem1($input) . "\n";
echo "Problem 2: " . problem2($input) . "\n";
