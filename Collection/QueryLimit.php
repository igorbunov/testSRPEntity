<?php

namespace Collection;

class QueryLimit
{
    private $start;
    private $limit;

    public function __construct($start = 0, $limit = 10)
    {
        $this->start = $start;
        $this->limit = $limit;
    }

    public function query(): string
    {
        return " LIMIT {$this->start}, {$this->limit} ";
    }
}