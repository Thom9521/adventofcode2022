<?php
$data = file_get_contents(__DIR__ . "./data.txt");
$dataAsArray = explode("\n", $data);

$total = 0;
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
        $currentDirs[$currentDir] = $currentDir;
        $dirsSize[$currentDir] = 0;
    } else if ($word1 === "$" && $word2 === "cd" && $word3 === '..') {
        // unset($currentDirs[$currentDir]);
        array_pop($currentDirs);
        array_pop($parents);
    } else if (is_numeric($word1)) {
        foreach ($currentDirs as $dir) {
            $dirsSize[$dir] += (int)trim($word1);
        }
    }
}

foreach ($dirsSize as $size) {
    if ($size < 100000) {
        $total += $size;
    }
}

echo PHP_EOL . $total;
