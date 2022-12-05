<?php
$stackedCrates = [
    1 => ['H', 'R', 'B', 'D', 'Z', 'F', 'L', 'S'],
    2 => ['T', 'B', 'M', 'Z', 'R'],
    3 => ['Z', 'L', 'C', 'H', 'N', 'S'],
    4 => ['S', 'C', 'F', 'J'],
    5 => ['P', 'G', 'H', 'W', 'R', 'Z', 'B'],
    6 => ['V', 'J', 'Z', 'G', 'D', 'N', 'M', 'T'],
    7 => ['G', 'L', 'N', 'W', 'F', 'S', 'P', 'Q'],
    8 => ['M', 'Z', 'R'],
    9 => ['M', 'C', 'L', 'G', 'V', 'R', 'T']
];

$data = file_get_contents(__DIR__ . "./data.txt");
$dataAsArray = explode("\n", $data);
unset($dataAsArray[0]);
unset($dataAsArray[1]);
unset($dataAsArray[2]);
unset($dataAsArray[3]);
unset($dataAsArray[4]);
unset($dataAsArray[5]);
unset($dataAsArray[6]);
unset($dataAsArray[7]);
unset($dataAsArray[8]);
unset($dataAsArray[9]);

$dataAsArray = array_values($dataAsArray);

foreach ($dataAsArray as $row) {
    $rowAsArray = explode(" ", $row);

    $move = trim($rowAsArray[1]);
    $from = trim($rowAsArray[3]);
    $to = trim($rowAsArray[5]);

    for ($i = 0; $i < $move; $i++) {
        $stackedCrates[$to][] = end($stackedCrates[$from]);
        array_pop($stackedCrates[$from]);
    }
}

foreach ($stackedCrates as $stack) {
    echo end($stack);
}
