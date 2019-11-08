<?php

namespace Warkhosh\Menu\Entity;

class BaseEntityRepository implements EntityRepositoryInterface
{
    /**
     * Getting specific entity
     *
     * @param int $entityId
     * @return array
     */
    public function getEntity(int $entityId)
    {
        return [];
    }

    /**
     * Getting Active entities
     *
     * @param int $entityId
     * @return array
     */
    public function getEntities(int $entityId)
    {
        return [];
    }

    /**
     * Getting all entities
     *
     * @param int $entityId
     * @return array
     */
    public function getAllEntities(int $entityId)
    {
        return [];
    }
}