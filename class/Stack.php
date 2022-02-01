<?php

class Stack
{
    private ?Node $last;

    public function __construct()
    {
        $this->last = null;
    }

    public function put(string $item): void
    {
        $this->last = new Node($item, $this->last);
    }

    public function get(): ?string
    {
        if ($this->isEmpty()) return null;
        $item = $this->last->getItem();
        $this->last = $this->last->getNext();
        return $item;
    }

    private function isEmpty(): bool
    {
        return $this->last == null;
    }
}