<?php

namespace Entity;

use Log\ILogger;

class LoggedEntity implements IEntity
{
    private $entity;
    private $logger;

    public function __construct(IEntity $entity, ILogger $logger)
    {
        $this->entity = $entity;
        $this->logger = $logger;
    }

    public function create(array $data) : int
    {
        $id = $this->entity->create($data);

        $this->logger->log();

        return $id;
    }

    public function read(int $id)
    {
        $result = $this->entity->read($id);

        $this->logger->log();

        return $result;
    }

    public function update(array $data)
    {
        $this->entity->update($data);

        $this->logger->log();
    }

    public function delete(int $id)
    {
        $this->entity->delete($id);

        $this->logger->log();
    }

}