<?php
$data = file_get_contents(__DIR__ . "./data.txt");
$dataAsArray = explode("\n", $data);

$total = 0;
$totalUsedSpace = 0;
$level = 0;
$currentDirs = [];
$dirsSize = [];

$currentDir = "";
$parents = [];

$countTest = 0;
foreach ($dataAsArray as $row) {
    $countTest++;
    $words = explode(" ", trim($row));

    $word1 = isset($words[0]) ? trim($words[0]) : null;
    $word2 = isset($words[1]) ? trim($words[1]) : null;
    $word3 = isset($words[2]) ? trim($words[2]) : null;

    if ($word1 === "$" && $word2 === "cd" && $word3 === "/") {
        $currentDir = "";
        $currentDirs = [];
        $parents = [];
    } else if ($word1 === "$" && $word2 === "cd" && !in_array($word3, ['/', '..'])) {
        if (!empty($currentDir)) {
            $parents[] = $word3 . "_" . end($parents);
        }

        $currentDir = $word3 . "_" . end($parents);
        if (!in_array($currentDir, $currentDirs))
            $currentDirs[$currentDir] = $currentDir;
        if (!in_array($currentDir, $dirsSize))
            $dirsSize[$currentDir] = 0;
    } else if ($word1 === "$" && $word2 === "cd" && $word3 === '..') {
        array_pop($currentDirs);
        array_pop($parents);
    } else if (is_numeric($word1)) {
        $totalUsedSpace += (int)trim($word1);

        foreach ($currentDirs as $dir) {
            $dirsSize[$dir] += (int)trim($word1);
        }
    }
}

$availableSpace = 70000000 - $totalUsedSpace;
$neededSpace = 30000000 - $availableSpace;

$enoughSpace = 100000000000;
foreach ($dirsSize as $size) {
    if ($size > $neededSpace && $size < $enoughSpace) {
        $enoughSpace = $size;
    }
}
echo $enoughSpace;
