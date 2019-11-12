<?php

namespace Warkhosh\Menu\Entity;

class BaseEntityService implements EntityServiceInterface
{
    /**
     * @param int   $id
     * @param array $data
     * @return \ArrayObject
     */
    public function saveEntity(int $id, array $data = [])
    {
        return new \ArrayObject();
    }

    /**
     * @param int $id
     * @return \ArrayObject
     */
    public function destroyEntity(int $id)
    {
        return new \ArrayObject();
    }
}