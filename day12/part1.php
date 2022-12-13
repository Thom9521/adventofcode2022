<?php
$data = file_get_contents(__DIR__ . "./data.txt");
$dataAsArray = explode("\n", $data);

$alphabet = [
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
    "z"
];

$currentChar = "";
$currentPosRow = 0;
$currentPosCol = 0;
$startPosRow = 0;
$startPosCol = 0;
$currentAlphabetPos = array_search('a', $alphabet);
$totalMoves = 0;


$newDataArray = [];
$checkedPositions = [];
// Find S
foreach ($dataAsArray as $index => $row) {
    $chars = str_split(trim($row));
    foreach ($chars as $index2 => $char) {
        $newDataArray[$index] = $chars;
        if (empty($currentChar)) {
            if ($char === 'S') {
                $currentPosRow = $index;
                $currentPosCol = $index2;
                $currentChar = $char;
                $startPosRow = $index;
                $startPosCol = $index2;
            }
        }
    }
}

$direction = 0;
while ($currentChar !== "E") {
    $count = 0;
    $direction = rand(0, 3);

    if ($currentPosCol < 0) {
        $currentPosCol = $startPosCol;
    }

    if ($currentPosRow < 0) {
        $currentPosRow = $startPosRow;
    }

    switch ($direction) {
        case 0:
            if (
                array_key_exists($currentPosRow - 1, $newDataArray) &&
                array_key_exists($currentPosCol, $newDataArray[$currentPosRow - 1]) &&
                !in_array($currentPosRow . "_" . $currentPosCol, $checkedPositions) &&
                array_search($newDataArray[$currentPosRow - 1][$currentPosCol], $alphabet) <= $currentAlphabetPos + 1
            ) {
                $currentPosRow = $currentPosRow - 1;
            } else {
                $currentPosRow = $startPosRow;
                $currentPosCol = $startPosCol;
            }
            $count++;
            // $checkedPositions[] = $currentPosRow . "_" . $currentPosCol;
            break;
        case 1:
            if (
                array_key_exists($currentPosRow + 1, $newDataArray) &&
                // !in_array($currentPosRow . "_" . $currentPosCol, $checkedPositions) &&
                array_key_exists($currentPosCol, $newDataArray[$currentPosRow + 1]) &&
                array_search($newDataArray[$currentPosRow + 1][$currentPosCol], $alphabet) <= $currentAlphabetPos + 1
            ) {
                $currentPosRow = $currentPosRow + 1;
            } else {
                // $currentPosRow = $startPosRow;
                // $currentPosCol = $startPosCol;
            }
            $count++;
            break;
        case 2:
            if (
                array_key_exists($currentPosRow, $newDataArray) &&
                // !in_array($currentPosRow . "_" . $currentPosCol, $checkedPositions) &&
                array_key_exists($currentPosCol - 1, $newDataArray[$currentPosRow]) &&
                array_search($newDataArray[$currentPosRow][$currentPosCol - 1], $alphabet) <= $currentAlphabetPos + 1
            ) {
                $currentPosCol = $currentPosCol - 1;
            } else {
                // $currentPosRow = $startPosRow;
                // $currentPosCol = $startPosCol;
            }
            $count++;
            break;
        case 3:
            if (
                array_key_exists($currentPosRow, $newDataArray) &&
                // !in_array($currentPosRow . "_" . $currentPosCol, $checkedPositions) &&
                array_key_exists($currentPosCol + 1, $newDataArray[$currentPosRow]) &&
                array_search($newDataArray[$currentPosRow][$currentPosCol + 1], $alphabet) <= $currentAlphabetPos + 1
            ) {
                $currentPosCol = $currentPosCol + 1;
            } else {
                // $currentPosRow = $startPosRow;
                // $currentPosCol = $startPosCol;
            }
            $count++;
            break;
    }
    echo $currentPosRow . "_" . $currentPosCol . PHP_EOL;
}
