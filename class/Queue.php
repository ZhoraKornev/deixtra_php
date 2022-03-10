<?php

class Queue extends Sequence
{
    private ?Node $head = null;
    private Node $last;

    public function put(string $item): void
    {
        $node = new Node($item);
        if ($this->isEmpty()){
            $this->last = $node;
            $this->head = $node;
            return;
        }
        $this->last->setNext($node);
        $this->last = $node;
    }

    public function get(): ?string
    {
        if ($this->isEmpty()){
            return null;
        }
        $item = $this->head->getItem();
        //actually set prev
        $this->head = $this->head->getNext();
        return $item;
    }

    protected function getFirst(): ?Node
    {
        return $this->head;
    }
}