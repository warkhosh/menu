<?php

namespace Warkhosh\Menu\Entity;

interface EntityServiceInterface
{
    /**
     * @param int   $id
     * @param array $data
     * @return \ArrayObject
     */
    public function saveEntity(int $id, array $data = []);

    /**
     * @param int $id
     * @return \ArrayObject
     */
    public function destroyEntity(int $id);
}