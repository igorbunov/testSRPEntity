<?php

namespace Collection;

interface ICollection
{
    public function findByFilter(array $filter, QueryLimit $limit): ICollection;

    public function each($callback);

    public function count(): int;
}