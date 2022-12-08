<?php
$data = file_get_contents(__DIR__ . "./data.txt");
$dataAsArray = explode("\n", $data);

$totalVisibleTrees = 0;
$totalVisibleTreesArray = 0;

$treesFound = [];

$rowLength = strlen(trim($dataAsArray[0]));
$colLength = count($dataAsArray);

// From left
foreach ($dataAsArray as $index => $row) {
    $trees = str_split(trim($row));
    $visibleTrees = 0;
    $biggesTree = -1;

    foreach ($trees as $index2 => $tree) {
        $treeComp = $index . "_" . $index2;
        if ($tree > $biggesTree && !in_array($treeComp, $treesFound)) {
            $treesFound[] = $treeComp;
            $visibleTrees++;
            $biggesTree = $tree;
        } else {
            break;
        }
    }

    $totalVisibleTrees += $visibleTrees;
}

// From right
foreach ($dataAsArray as $index => $row) {
    $trees = array_reverse(str_split(trim($row)));
    $visibleTrees = 0;
    $biggesTree = -1;
    foreach ($trees as $index2 => $tree) {
        $treeComp = $index . "_" . $rowLength - $index2;
        if ($tree > $biggesTree && !in_array($treeComp, $treesFound)) {
            $treesFound[] = $treeComp;
            $visibleTrees++;
            $biggesTree = $tree;
        } else {
            break;
        }
    }

    $totalVisibleTrees += $visibleTrees;
}

// $dataIndex = count($dataAsArray);

// while ($dataIndex) {
//     $tree = $row[--$dataIndex];
//     $treeComp = $dataIndex . "_" . $tree;
//     echo $treeComp . PHP_EOL;
//     if ($tree > $biggesTree && !in_array($treeComp, $treesFound)) {
//         echo $treeComp . PHP_EOL;
//         $treesFound[] = $treeComp;
//         $visibleTrees++;
//         $biggesTree = $tree;
//     }
// }
// exit();

/*
$index2 = count(str_split(trim($row)));

while ($index2) {
    $tree = $row[--$index2];
    $treeComp =  $index . "_" . $index2;
    if ($tree > $biggesTree && !in_array($treeComp, $treesFound)) {
        echo $treeComp . PHP_EOL;
        $treesFound[] = $treeComp;
        $visibleTrees++;
        $biggesTree = $tree;
    }
}
exit();
*/

// From top
foreach (str_split(trim($dataAsArray[0])) as $indexCol => $column) {

    $visibleTrees = 0;
    $biggesTree = -1;

    foreach ($dataAsArray as $indexRow => $row) {
        $trees = str_split(trim($row));
        $treeComp = $colLength -  $indexCol . "_" . $indexRow;
        if ($trees[$indexCol] > $biggesTree && !in_array($treeComp, $treesFound)) {
            $treesFound[] = $treeComp;
            $visibleTrees++;
            $biggesTree = $trees[$indexCol];
        } else {
            break;
        }
    }
    $totalVisibleTrees += $visibleTrees;
}


// From bottom
foreach (str_split(trim($dataAsArray[0])) as $indexCol => $column) {
    $visibleTrees = 0;
    $biggesTree = -1;

    foreach (array_reverse($dataAsArray) as $indexRow => $row) {
        $trees = str_split(trim($row));
        $treeComp = $colLength -  $indexCol . "_" . $rowLength - $indexRow;
        if ($trees[$indexCol] > $biggesTree && !in_array($treeComp, $treesFound)) {
            $treesFound[] = $treeComp;
            echo $treeComp . PHP_EOL;

            $visibleTrees++;
            $biggesTree = $trees[$indexCol];
        } else {
            break;
        }
    }
    $totalVisibleTrees += $visibleTrees;
}
print_r($treesFound);
// print_r(array_reverse($dataAsArray));
echo PHP_EOL . $totalVisibleTrees;
