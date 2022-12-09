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

$tmpSmallestTress = [];

// From top
foreach ($dataAsArray as $index => $row) {
    $trees = str_split(trim($row));
    $visibleTrees = 0;


    foreach ($trees as $index2 => $tree) {
        $treeComp = $index . "_" . $index2;
        // echo $treeComp . PHP_EOL;
        if (!array_key_exists($index2, $tmpSmallestTress)) {
            $tmpSmallestTress[$index2] = $tree;
            $treesFound[] = $treeComp;
            $visibleTrees++;
        } else if (array_key_exists($index2, $tmpSmallestTress)) {
            if ($tmpSmallestTress[$index2] < $tree) {
                // echo $treeComp . PHP_EOL;
                $tmpSmallestTress[$index2] = $tree;
                if (!in_array($treeComp, $treesFound)) {
                    $treesFound[] = $treeComp;
                    $visibleTrees++;
                }
            }
        }
    }
    $totalVisibleTrees += $visibleTrees;
}


$tmpSmallestTress = [];

// From bottom
foreach (array_reverse($dataAsArray) as $index => $row) {
    $trees = str_split(trim($row));
    $visibleTrees = 0;
    foreach ($trees as $index2 => $tree) {
        $treeComp = $index . "_" . $index2;
        echo $treeComp . PHP_EOL;
        if (!array_key_exists($index2, $tmpSmallestTress)) {
            $tmpSmallestTress[$index2] = $tree;
            $treesFound[] = $treeComp;
            $visibleTrees++;
        } else if (array_key_exists($index2, $tmpSmallestTress)) {
            if ($tmpSmallestTress[$index2] < $tree) {
                echo $treeComp . PHP_EOL;
                $tmpSmallestTress[$index2] = $tree;
                if (!in_array($treeComp, $treesFound)) {
                    $treesFound[] = $treeComp;
                    $visibleTrees++;
                }
            }
        }
    }
    $totalVisibleTrees += $visibleTrees;
}
echo count($treesFound) . "  " . $totalVisibleTrees;
// // From top
// foreach (str_split(trim($dataAsArray[0])) as $indexCol => $column) {

//     $visibleTrees = 0;
//     $biggesTree = -1;

//     foreach ($dataAsArray as $indexRow => $row) {
//         $trees = str_split(trim($row));
//         $treeComp = $indexCol . "_" . $indexRow;
//         if ($trees[$indexCol] > $biggesTree && !in_array($treeComp, $treesFound)) {
//             $treesFound[] = $treeComp;
//             $visibleTrees++;
//             $biggesTree = $trees[$indexCol];
//             echo $trees[$indexCol] . " " . $treeComp .  PHP_EOL;
//         } else {
//             continue;
//         }
//     }
//     $totalVisibleTrees += $visibleTrees;
// }


// // From bottom
// foreach (str_split(trim($dataAsArray[0])) as $indexCol => $column) {
//     $visibleTrees = 0;
//     $biggesTree = -1;

//     foreach (array_reverse($dataAsArray) as $indexRow => $row) {
//         $trees = str_split(trim($row));
//         $treeComp = $colLength -  $indexCol . "_" . $rowLength - $indexRow;
//         if ($trees[$indexCol] > $biggesTree && !in_array($treeComp, $treesFound)) {
//             $treesFound[] = $treeComp;
//             // echo $treeComp . PHP_EOL;

//             $visibleTrees++;
//             $biggesTree = $trees[$indexCol];
//         } else {
//             break;
//         }
//     }
//     $totalVisibleTrees += $visibleTrees;
// }
// print_r($treesFound);
// print_r(array_reverse($dataAsArray));
// echo PHP_EOL . $totalVisibleTrees;
