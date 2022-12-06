<?php
$data = file_get_contents(__DIR__ . "./data.txt");
$dataAsArray = str_split($data);

$char1 = "";
$char2 = "";
$char3 = "";
$char4 = "";

$count = 0;
foreach ($dataAsArray as $char) {
    $count++;

    if (empty($char1)) {
        $char1 = $char;
    } else if (empty($char2)) {
        $char2 = $char;
    } else if (empty($char3)) {
        $char3 = $char;
    } else if (empty($char4)) {
        $char4 = $char;
    }

    if (!empty($char1) && !empty($char2) && !empty($char3) && !empty($char4)) {
        if (
            $char1 != $char2 &&
            $char1 != $char3 &&
            $char1 != $char4 &&
            $char2 != $char3 &&
            $char2 != $char4 &&
            $char3 != $char4
        ) {
            echo $count;
            break;
        } else {
            echo $char1 . " " . $char2 . " " . $char3 . " " . $char4;
            echo PHP_EOL;
            $char1 = "";
            $char2 = "";
            $char3 = "";
            $char4 = "";
        }
    }
}
