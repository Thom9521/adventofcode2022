<?php
$data = file_get_contents(__DIR__ . "./data.txt");
$dataAsArray = str_split($data);

$charArray = [];

$count = 0;
foreach ($dataAsArray as $char) {
    $count++;

    if (!in_array($char, $charArray)) {
        $charArray[] = $char;
    } else {
        $charArray = [$char];
    }

    if (count($charArray) == 14) {
        echo $count;
        break;
    }
}
