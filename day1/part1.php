<?php
$data = file_get_contents(__DIR__ . "./data.txt");

$caloriesSeperatedByElf = explode("\r\n\r\n", $data);

$caloriesArray = [];

foreach ($caloriesSeperatedByElf as $elf) {
    $caloriesAsArray = explode("\r", $elf);
    $calories = 0;

    foreach ($caloriesAsArray as $fruit) {
        $calories += (int)$fruit;
    }
    $caloriesArray[] = $calories;
}

sort($caloriesArray, SORT_NUMERIC);
$caloriesArray = array_reverse($caloriesArray);

echo $caloriesArray[0];
