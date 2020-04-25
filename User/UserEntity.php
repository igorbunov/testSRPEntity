<?php

namespace User;

use Entity\IEntity;

class UserEntity implements IEntity
{
    public function __construct()
    {
    }

    public function create(array $data): int
    {
        // TODO: Implement create() method.

        return -1;
    }

    public function read(int $id)
    {
        // TODO: Implement read() method.
    }

    public function update(array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
