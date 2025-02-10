<?php

namespace Warkhosh\Menu\Entity;

class BaseEntityService implements EntityServiceInterface
{
    /**
     * @param int $id
     * @param array $data
     * @return array
     */
    public function saveEntity(int $id, array $data = []): array
    {
        return [];
    }

    /**
     * @param int $id
     * @return array
     */
    public function destroyEntity(int $id): array
    {
        return [];
    }
}
