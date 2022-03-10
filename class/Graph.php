<?php

class Graph
{
    private array $edges;

//Mampuцa cMeжноcmu вepщuH:
//edges['A]['B] = 1P; Length
///edges[ 'B']['A'] = 12;
    public function __construct()
    {
        $this->edges = [];
    }

    public function addNode(string $node)
    {
        $this->edges[$node] = [];
    }

    public function addEdge(string $node1, string $node2, string $length)
    {
        $this->edges[$node1][$node2] = $length;
        $this->edges[$node2][$node1] = $length;
    }

    public function getNodes(): iterable
    {
        foreach ($this->edges as $node => $edge){
            yield $node;
        }
    }

    public function getEdges(string $node1): iterable
    {
        if (empty($this->edges[$node1])){
            return [];
        }
        foreach ($this->edges[$node1] as $node2 => $length){
            yield $node2 => $length;
        }
    }
}
