<?php
$data = file_get_contents(__DIR__ . "./data.txt");
$dataAsArray = explode("\n", $data);
$total = 0;


foreach ($dataAsArray as $pairs) {

    $pairsSplit = explode(",", $pairs);

    $elf1Start = explode("-", $pairsSplit[0])[0];
    $elf1End = explode("-", $pairsSplit[0])[1];

    $elf2Start = explode("-", $pairsSplit[1])[0];
    $elf2End = explode("-", $pairsSplit[1])[1];

    if (($elf1Start <= $elf2Start && $elf1End >= $elf2End) || ($elf2Start <= $elf1Start && $elf2End >= $elf1End)) {
        $total++;
    }
}
echo $total;
