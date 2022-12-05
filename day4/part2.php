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

    $elf1Numbers = [];
    $elf2Numbers = [];

    for ($i = $elf1Start; $i < $elf1End + 1; $i++) {
        $elf1Numbers[] = $i;
    }
    for ($i = $elf2Start; $i < $elf2End + 1; $i++) {
        $elf2Numbers[] = $i;
    }

    foreach ($elf1Numbers as $number) {
        if (in_array($number, $elf2Numbers)) {
            $total++;
            break;
        }
    }
}
echo $total;
