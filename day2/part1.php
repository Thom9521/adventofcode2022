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

    $pointsThisRound += $myMove;

    if ($movesRules[trim($moves[0])] == $movesRules[trim($moves[1])]) {
        $pointsThisRound += 3;
    } else if ($movesRules[trim($moves[0])] == "rock" && $movesRules[trim($moves[1])] == "paper") {
        $pointsThisRound += 6;
    } else if ($movesRules[trim($moves[0])] == "paper" && $movesRules[trim($moves[1])] == "rock") {
        $pointsThisRound += 0;
    } else if ($movesRules[trim($moves[0])] == "scissors" && $movesRules[trim($moves[1])] == "rock") {
        $pointsThisRound += 6;
    } else if ($movesRules[trim($moves[0])] == "rock" && $movesRules[trim($moves[1])] == "scissors") {
        $pointsThisRound += 0;
    } else if ($movesRules[trim($moves[0])] == "paper" && $movesRules[trim($moves[1])] == "scissors") {
        $pointsThisRound += 6;
    } else if ($movesRules[trim($moves[0])] == "scissors" && $movesRules[trim($moves[1])] == "paper") {
        $pointsThisRound += 0;
    } else {
        echo $movesRules[trim($moves[0])];
        echo " ";
        echo $movesRules[trim($moves[1])];
    }

    $total += $pointsThisRound;
}

echo $total;
