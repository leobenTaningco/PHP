<?php
/*
 Challenge 2: Get the sum of the numbers in an array by using a foreach loop and for loop. 
*/


$numbers = [1, 2, 3, 4, 5]; //sum using foreach loop
$numbers2 = [1, 2, 3, 4, 5,6,7,8,9,19];  //sum using for loop

//solution goes here
$sum = 0;

foreach ($numbers as $number) {
    $sum += $number;
}

echo "Sum using foreach loop: " . $sum . "<br>";

$sum = 0;
for ($i = 0; $i < count($numbers2); $i++) {
    $sum += $numbers2[$i];
}
echo "Sum using for loop: " . $sum . "<br>";