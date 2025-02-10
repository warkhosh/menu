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
    public function getEntity(int $entityId): array
    {
        return [];
    }

    /**
     * Getting Active entities
     *
     * @param array $entityIds
     * @return array
     */
    public function getEntityValues(array $entityIds): array
    {
        return [];
    }

    /**
     * Getting all entities
     *
     * @param array $entityIds
     * @return array
     */
    public function getAllEntityValues(array $entityIds): array
    {
        return [];
    }
}
