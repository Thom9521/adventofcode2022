<?php
$data = file_get_contents(__DIR__ . "./data.txt");

$dataAsArray = explode("\n", $data);

$total = 0;

$rules = [
    "A" => 1,
    "B" => 2,
    "C" => 3,
    "X" => 1,
    "Y" => 2,
    "Z" => 3
];

$movesRules = [
    "A" => "rock",
    "B" => "paper",
    "C" => "scissors",
    "X" => "rock",
    "Y" => "paper",
    "Z" => "scissors"
];

foreach ($dataAsArray as $round) {
    $pointsThisRound = 0;

    $moves = explode(" ", $round);

    $enemyMove = $rules[trim($moves[0])];
    $myMove = $rules[trim($moves[1])];

    if ($movesRules[trim($moves[0])] == "rock" && trim($moves[1]) == "X") {
        $pointsThisRound += 3;
    } else if ($movesRules[trim($moves[0])] == "paper" && trim($moves[1]) == "X") {
        $pointsThisRound += 1;
    } else if ($movesRules[trim($moves[0])] == "scissors" && trim($moves[1]) == "X") {
        $pointsThisRound += 2;
    } else if ($movesRules[trim($moves[0])] == "rock" && trim($moves[1]) == "Y") {
        $pointsThisRound += 4;
    } else if ($movesRules[trim($moves[0])] == "paper" && trim($moves[1]) == "Y") {
        $pointsThisRound += 5;
    } else if ($movesRules[trim($moves[0])] == "scissors" && trim($moves[1]) == "Y") {
        $pointsThisRound += 6;
    } else if ($movesRules[trim($moves[0])] == "rock" && trim($moves[1]) == "Z") {
        $pointsThisRound += 8;
    } else if ($movesRules[trim($moves[0])] == "paper" && trim($moves[1]) == "Z") {
        $pointsThisRound += 9;
    } else if ($movesRules[trim($moves[0])] == "scissors" && trim($moves[1]) == "Z") {
        $pointsThisRound += 7;
    } else {
        echo $movesRules[trim($moves[0])];
        echo " ";
        echo $movesRules[trim($moves[1])];
    }
    $total += $pointsThisRound;
}

echo $total;
