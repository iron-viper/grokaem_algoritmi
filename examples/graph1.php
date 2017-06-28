<?php

// Алгоритм поиска в ширину с учетом дубликатов

$graph           = [];
$graph["you"]    = ["alice", "bob", "claire"];
$graph["bob"]    = ["anuj", "peggy"];
$graph["alice"]  = ["peggy"];
$graph["claire"] = ["thom", "jonny"];
$graph["anuj"]   = [];
$graph["peggy"]  = [];
$graph["thom"]   = [];
$graph["jonny"]  = [];


function personIsSeller($name)
{
    return substr($name, -1) === "m";
}

function search($name, $graph)
{
    $searchQueue = [];
    $searchQueue = array_merge($searchQueue, $graph[$name]);
    $searched    = [];

    $step = 1;
    while (count($searchQueue) > 0) {
        $person = array_shift($searchQueue);

        if (!in_array($person, $searched)) {
            if (personIsSeller($person)) {
                echo $person . " is mango seller! Steps: " . $step;

                return true;
            }

            $searchQueue = array_merge($searchQueue, $graph[$person]);
            $searched[]  = $person;
        }
        $step++;
    }

    echo "The seller is not found. Steps: " . $step;

    return false;
}

search("you", $graph);

