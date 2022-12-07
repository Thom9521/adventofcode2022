<?php
$data = file_get_contents(__DIR__ . "./data.txt");
$dataAsArray = explode("\n", $data);

$tree = [];

$directory = "";
$level = 0;
foreach($dataAsArray as $row) {
    $words = explode(" ", trim($row));

    $word1 = isset($words[0]) ? trim($words[0]) : null;
    $word2 = isset($words[1]) ? trim($words[1]) : null;
    $word3 = isset($words[2]) ? trim($words[2]) : null;

    $size = 0;
    $file = "";
    // $directory = "";

    if($word1 === "$" && $word2 === "cd" && $word3 === "/"){
        $level = 0;
    } else if($word1 === "$" && $word2 === "cd" && !in_array($word3, ['/', '..'])){
        $level++;
        $parent = $directory;
        $directory = $word3;
    } else if($word1 === "$" && $word2 === "cd" && $word3 === '..'){
        $level--;
    } else if(is_numeric($word1)){
        $size = $word1;
        $file = $word2;
    }

    if($size !== 0 && $directory !== ""){

        if($parent !== ""){
            $tree[$directory]["parent"] = $parent;
        }
        $tree[$directory][] = $size;
    }
}

$directorySize = [];

foreach($tree as $key => $branch) {
    foreach($branch as $leaf) {
        if(is_numeric($leaf)) {
            $directorySize[$key] = $leaf;
        } else {
            echo $leaf;
        }
    }
}

// print_r($tree);
// print_r($directorySize);