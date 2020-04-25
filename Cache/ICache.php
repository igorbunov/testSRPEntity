<?php

namespace Cache;

interface ICache
{
    public function put(string $name, $data);

    public function exists(string $name);

    public function get(string $name);

    public function remove(string $name);
}