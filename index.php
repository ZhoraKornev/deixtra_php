<?php
//ini_set('error_reporting', E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE); // Show all errors minus STRICT, DEPRECATED and NOTICES
//ini_set('display_errors', 0); // disable error display
//ini_set('log_errors', 0); // disable error logging
include 'class/Sequence.php';
include 'class/Queue.php';
include 'class/Node.php';
include 'class/Stack.php';
include 'class/Graph.php';
include 'class/Walker.php';


$graph = new Graph();

for ($x =0; $x < 8;$x++)
    for ($y = 0; $y <8; $y ++)
        $graph->addNode("$x$y");

for ($x = 0; $x < 8; $x++)
    for ($y = 0; $y < 8; $y++)
        for ($sx = 0; $sx < 8; $sx++) {
            $sy = 1 - $sx;
//            var_dump($sy);
            if ($x + $sx < 8)
                if ($y + $sy < 8)
                    $graph->addEdge("$x$y", ($x + $sx) . ($y + $sy), 1);
        }

$walker = new Walker($graph);
$walker->walkDepthNew('00');
print_r($walker->path);


function show(array $path,Sequence $sequence){
    for ($x = 0; $x < 8; $x++)
    {
        for ($y = 0; $y < 8; $y++){
            if (isset($path["$x$y"])){
                echo "$x$y ";
            }
            elseif ($sequence->contains("$x$y")){
                echo "++ ";
            }
            else{
                echo ".. ";
            }
        }
        echo PHP_EOL;
    }
    foreach ($sequence->getList() as $item) {
        echo $item. " ";
    }
    echo PHP_EOL;

    readline();
}




