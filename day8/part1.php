<?php
$data = file_get_contents(__DIR__ . "./data.txt");
$dataAsArray = explode("\n", $data);

$totalVisibleTrees = 0;
$totalVisibleTreesArray = 0;


// From left
foreach($dataAsArray as $index => $row) {
    $trees = str_split(trim($row));
    $visibleTrees = 0;
    $biggesTree = -1;

    foreach($trees as $tree){
        if($tree > $biggesTree){
            $visibleTrees++;
            $biggesTree = $tree;
        } else {
            break;
        }
    }

    $totalVisibleTrees += $visibleTrees;
}

// From right
foreach($dataAsArray as $index => $row) {
    $trees = array_reverse(str_split(trim($row)));
    $visibleTrees = 0;
    $biggesTree = -1;

    foreach($trees as $tree){
        if($tree > $biggesTree){
            $visibleTrees++;
            $biggesTree = $tree;
        } else {
            break;
        }
    }

    $totalVisibleTrees += $visibleTrees;
}


// From top
foreach(str_split(trim($dataAsArray[0])) as $indexCol => $column) {
        if(in_array($indexCol, ['0', '98'])){
            continue;
        }
        $visibleTrees = 0;
        $biggesTree = -1;

    foreach($dataAsArray as $indexRow => $row) {
        $trees = str_split(trim($row));

        if($trees[$indexCol] > $biggesTree){
            $visibleTrees++;
            $biggesTree = $trees[$indexCol];
        } else {
            break;
        }
    }
    $totalVisibleTrees += $visibleTrees;
}


// From bottom
foreach(str_split(trim($dataAsArray[0])) as $indexCol => $column) {
    if(in_array($indexCol, ['0', '98'])){
        continue;
    }
    $visibleTrees = 0;
    $biggesTree = -1;

foreach(array_reverse($dataAsArray) as $indexRow => $row) {
    $trees = str_split(trim($row));

    if($trees[$indexCol] > $biggesTree){
        $visibleTrees++;
        $biggesTree = $trees[$indexCol];
    } else {
        break;
    }
}
$totalVisibleTrees += $visibleTrees;
}

echo PHP_EOL . $totalVisibleTrees;
