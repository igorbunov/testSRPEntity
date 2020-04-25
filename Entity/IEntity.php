<?php

namespace Entity;

interface IEntity
{
    public function create(array $data): int;

    public function read(int $id);

    public function update(array $data);

    public function delete(int $id);
}