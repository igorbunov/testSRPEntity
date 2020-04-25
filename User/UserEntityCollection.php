<?php

namespace User;

use Collection\ICollection;
use Collection\QueryLimit;

class UserEntityCollection implements ICollection
{
    private $items;

    public function __construct($items = [])
    {
        $this->items = $items;
    }

    public function findByFilter(array $filter, QueryLimit $limit): ICollection
    {
        //TODO: do search in BD

        $result = [
            ['id' => 1, 'title' => 'aaaa'],
            ['id' => 2, 'title' => 'bbbb'],
            ['id' => 3, 'title' => 'cccc']
        ]; // some results from db

        return new self($result);
    }

    public function each($callback)
    {
        foreach ($this->items as $i => $item) {
            $callback($item, $i);
        }
    }

    public function count(): int
    {
        return count($this->items);
    }

}