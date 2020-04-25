<?php

namespace Entity;

use Cache\ICache;

class CachedEntity implements IEntity
{
    private $entity;
    private $cache;

    public function __construct(IEntity $entity, ICache $cache)
    {
        $this->entity = $entity;
        $this->cache = $cache;
    }

    public function create(array $data) : int
    {
        $id = $this->entity->create($data);
        $cacheName = $this->getCacheName($id);

        $this->cache->put($cacheName, $data);

        return $id;
    }

    public function read(int $id)
    {
        $cacheName = $this->getCacheName($id);

        if ($this->cache->exists($cacheName)) {
            return $this->cache->get($cacheName);
        }

        return $this->entity->read($id);
    }

    public function update(array $data)
    {
        $this->entity->update($data);

        $cacheName = $this->getCacheName($data['id']);

        if ($this->cache->exists($cacheName)) {
            $this->cache->remove($cacheName);

            $this->cache->put($cacheName, $data);
        }
    }

    public function delete(int $id)
    {
        $this->entity->delete($id);

        $cacheName = $this->getCacheName($id);

        if ($this->cache->exists($cacheName)) {
            $this->cache->remove($cacheName);
        }
    }

    private function getCacheName(int $id): string
    {
        return get_class($this->entity) . '_' . $id;
    }

}