<?php

class Walker
{
    private Graph $graph;
    public array $path;

    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
        $this->path = [];
    }

    public function walkDepth(string $node)
    {
        $this->path[$node] = true;
        foreach ($this->graph->getEdges($node) as $node2 => $length){
            if (!$this->path[$node2]){
                $this->walkDepth($node2);
            }
        }
    }

    public function walkDepthNew(string $node)
    {
        $path = [];
        $stack = new Stack();
        $stack->put($node);
        while (!$stack->isEmpty()){
            $curr = $stack->get();
            $this->path[$curr] = true;
        }
        foreach ($this->graph->getEdges($node) as $node2 => $length){
            if (!$this->path[$node2]){
                if (!$stack->contains($node2)){
                    $stack->put($node2);
                }
            }
        }
    }
}
