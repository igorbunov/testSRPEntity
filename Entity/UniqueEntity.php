<?php

namespace Entity;

class UniqueEntity implements IEntity
{
    private $entity;

    public function __construct(IEntity $entity)
    {
        $this->entity = $entity;
    }

    public function create(array $data) : int
    {
        if ($this->isDublicate($data)) {
            throw new \Exception('Dublicated data');
        }

        $id = $this->entity->create($data);

        return $id;
    }

    public function read(int $id)
    {
        return $this->entity->read($id);
    }

    public function update(array $data)
    {
        $this->entity->update($data);
    }

    public function delete(int $id)
    {
        $this->entity->delete($id);
    }

    private function isDublicate(array $data): bool
    {
        //TODO: check dublicate in db

        return false;
    }
}