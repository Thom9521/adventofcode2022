<?php
$data = file_get_contents(__DIR__ . "./data.txt");
$dataAsArray = explode("\n", $data);

$priorities = [
    "a",
    "b",
    "c",
    "d",
    "e",
    "f",
    "g",
    "h",
    "i",
    "j",
    "k",
    "l",
    "m",
    "n",
    "o",
    "p",
    "q",
    "r",
    "s",
    "t",
    "u",
    "v",
    "w",
    "x",
    "y",
    "z",
    "A",
    "B",
    "C",
    "D",
    "E",
    "F",
    "G",
    "H",
    "I",
    "J",
    "K",
    "L",
    "M",
    "N",
    "O",
    "P",
    "Q",
    "R",
    "S",
    "T",
    "U",
    "V",
    "W",
    "X",
    "Y",
    "Z"
];

$total = 0;

$groups = [];
$group = [];
$count = 0;
foreach($dataAsArray as $index => $rucksack){
    $count++;
    $group[] = $rucksack;

    if($count === 3){
        $groups[] = $group;
        $group = [];
        $count = 0;
    }
}

foreach($groups as $rucksack){
    $compartment1 = str_split(trim($rucksack[0]));
    $compartment2 = str_split(trim($rucksack[1]));
    $compartment3 = str_split(trim($rucksack[2]));

    $itemsFound = [];
    $points = 0;
    foreach($compartment1 as $item){
        if(in_array($item, $compartment2) && in_array($item, $compartment3) && !in_array($item, $itemsFound)){
            $itemsFound[] = $item;
            $value = array_search($item, $priorities) + 1;
            $points += $value;
        }
    }
    $total+= $points;

}
echo $total;