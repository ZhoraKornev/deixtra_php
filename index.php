<?php

include 'class/Sequence.php';
include 'class/Queue.php';
include 'class/Node.php';
include 'class/Stack.php';

$stack = new Stack();
$stack->put('Stack_test_1');
$stack->put('Stack_test_2');
$stack->put('Stack_test_3');

echo $stack->get() . PHP_EOL;
echo $stack->get() . PHP_EOL;
echo $stack->get() . PHP_EOL;

$queue = new Queue();

$queue->put('Queue_test_1');
$queue->put('Queue_test_2');
$queue->put('Queue_test_3');

foreach ($queue->getList() as $item){
    echo $item . PHP_EOL;
}

echo $queue->get() . PHP_EOL;
