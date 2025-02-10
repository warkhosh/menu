<?php

namespace Warkhosh\Menu\Entity;

interface EntityServiceInterface
{
    /**
     * @param int $id
     * @param array $data
     * @return array
     */
    public function saveEntity(int $id, array $data = []): array;

    /**
     * @param int $id
     * @return array
     */
    public function destroyEntity(int $id): array;
}
