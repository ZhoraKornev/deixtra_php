<?php

abstract class Sequence
{
    abstract public function put(string $item): void;
    abstract public function get(): ?string;

    public function isEmpty(): bool
    {
        return $this->getFirst() == null;
    }

    public function getList(): iterable
    {
        $curr = $this->getFirst();
        while ($curr != null){
            yield $curr->getItem();
            $curr = $curr->getNext();
        }
    }

    public function contains(string $item): bool
    {
        foreach ($this->getList() as $curr) {
            if ($curr == $item){
                return true;
            }
        }
        return false;
    }

    abstract protected function getFirst(): ?Node;
}