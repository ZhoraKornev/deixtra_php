<?php

class Walker
{
    private Graph $graph;

    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
    }

    public function walk(string $node,Sequence $sequence): array
    {
        $path = [];
        $sequence->put($node);
        show($path,$sequence);
        while (!$sequence->isEmpty()){
            $curr = $sequence->get();
            $path[$curr] = true;
            foreach ($this->graph->getEdges($curr) as $next => $length){
                if (empty($path[$next])){
                    if (!$sequence->contains($next)){
                        $sequence->put($next);
                    }
                }
                show($path,$sequence);
            }
        }
        return $path;
    }
}
