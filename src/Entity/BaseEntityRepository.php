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
     * @param array $entityIds
     * @return array
     */
    public function getEntities(array $entityIds)
    {
        return [];
    }

    /**
     * Getting all entities
     *
     * @param array $entityIds
     * @return array
     */
    public function getAllEntities(array $entityIds)
    {
        return [];
    }
}