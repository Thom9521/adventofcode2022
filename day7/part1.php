<?php
$data = file_get_contents(__DIR__ . "./data.txt");
$dataAsArray = explode("\n", $data);

$tree = [];

$directory = "";
$parents = [];
$parent = "";

$asd = 0;
$level = 0;
foreach($dataAsArray as $row) {
    $asd++;
    // if($asd > 100){
    //     exit();
    // }
    $words = explode(" ", trim($row));

    $word1 = isset($words[0]) ? trim($words[0]) : null;
    $word2 = isset($words[1]) ? trim($words[1]) : null;
    $word3 = isset($words[2]) ? trim($words[2]) : null;

    echo PHP_EOL . $word1 . " " . $word2 . " " . $word3 . PHP_EOL;

    $size = 0;
    $file = "";
    // $directory = "";
    echo $directory;

    if($word1 === "$" && $word2 === "cd" && $word3 === "/"){
        $level = 0;
        $parents = [];
        $directory = "";
    } else if($word1 === "$" && $word2 === "cd" && !in_array($word3, ['/', '..'])){
        $level++;
        if(!empty($directory)){
            $parents[$directory] = $directory;
        }
        $parent = $directory;
        $directory = $word3 . $level;
    } else if($word1 === "$" && $word2 === "cd" && $word3 === '..'){
        $level--;
        echo $parent;
        // unset($parents[$parent]);
        array_pop($parents);
        if(count($parents) == 0){
            $directory = "";
        }
    } else if(is_numeric($word1)){
        $size = $word1;
        $file = $word2;
    }
    // print_r($parents);

    if($size !== 0 && $directory !== ""){

        foreach($parents as $parent){
            $tree[$parent][] = $size;
        }
        $tree[$directory][] = $size;
    }
}



$total = 0;

// print_r($tree);

foreach($tree as $directory){
    $fileSizes = 0;
    foreach($directory as $size){
        $fileSizes += $size;
    }
    // echo $fileSizes . " ";
    if($fileSizes < 100000) {
        $total += $fileSizes;
    }
}
echo PHP_EOL . $total;
// echo $total;
// $directorySize = [];
// print_r($tree);
// foreach($tree as $key => $branch) {
//     foreach($branch as $leaf) {
//         if(is_numeric($leaf)) {
//             $directorySize[$key] = $leaf;
//         } else {
//             echo $leaf;
//         }
//     }
// }

// print_r($tree);
// print_r($directorySize);