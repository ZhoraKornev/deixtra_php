<?php

include 'class/Sequence.php';
include 'class/Queue.php';
include 'class/Node.php';
include 'class/Stack.php';
include 'class/Graph.php';
include 'class/Walker.php';

$stack = new Stack();
$stack->put('Stack_test_1');
$stack->put('Stack_test_2');
$stack->put('Stack_test_3');

foreach ($stack->getList() as $item){
    echo $item . PHP_EOL;
}

$queue = new Queue();

$queue->put('Queue_test_1');
$queue->put('Queue_test_2');
$queue->put('Queue_test_3');

foreach ($queue->getList() as $item){
    echo $item . PHP_EOL;
}


$graph = new Graph();

$graph->addNode('A');
$graph->addNode('B');
$graph->addNode('C');
$graph->addNode('D');
$graph->addNode('E');
$graph->addNode('F');
$graph->addNode('G');


$graph->addEdge('A', 'B', 2);
$graph->addEdge('A', 'C', 3);
$graph->addEdge('A', 'D', 6);

$graph->addEdge('B', 'C', 4);
$graph->addEdge('B', 'E', 9);

$graph->addEdge('C', 'D', 1);
$graph->addEdge('C', 'E', 7);
$graph->addEdge('C', 'F', 6);

$graph->addEdge('D', 'F', 4);

$graph->addEdge('E', 'F', 1);
$graph->addEdge('E', 'G', 5);

$graph->addEdge('F', 'G', 8);

foreach ($graph->getNodes() as $node) {
    echo $node. PHP_EOL;
}
$node1= 'A';
foreach ($graph->getEdges($node1) as $node2 => $length) {
    echo $node1.'-->>'.$node2.' = ' . $length. PHP_EOL;
}

$walker = new Walker($graph);
$walker->walkDepth('C');
print_r($walker->path);
$walker->walkDepthNew('C');
print_r($walker->path);


$graph = new Graph();

for ($x =0; $x < 8;$x++)
    for ($y = 0; $y <8; $y ++)
        $graph->addNode("$x$y");

for ($x = 0; $x < 8; $x++)
    for ($y = 0; $y < 8; $y++)
        for ($sx = 0; $sx < 8; $sx++) {
            $sy = 1 - $sx;
            if ($x + $sx < 8)
                if ($y + $sy < 8)
                    $graph->addEdge("$x$y", ($x + $sx) . ($y + $sy), 1);
        }


$walker = new Walker($graph);
$walker->walkDepth('00');
print_r($walker->path);


function show(array $path,Sequence $sequence){
    for ($x = 0; $x < 8; $x++)
    {
        for ($y = 0; $y < 8; $y++){
            if ($path["$x$y"])
            echo "$x$y ";
            if ($sequence->get("$x$y")){
                echo "++ ";
            }
            echo ".. ";
            echo "<br> \n";
        }
    }

}



