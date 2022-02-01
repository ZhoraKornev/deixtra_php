<?php

include 'class/Node.php';
include 'class/Stack.php';

$stack = new Stack();
$stack->put('Test_1');
$stack->put('Test_2');
$stack->put('Test_3');

echo $stack->get() . "<br>  \n";
echo $stack->get() . "<br>  \n";
echo $stack->get() . "<br>  \n";