<?php

namespace Warkhosh\Menu;

class ItemRepository implements ItemRepositoryInterface
{
    /**
     * @param int $id
     * @return array
     */
    public function getItems(int $id)
    {
        return [];
    }

    /**
     * Getting entity values
     *
     * @param int   $entityId
     * @param array $ids - list of specific identifiers in entities
     * @return array
     */
    public function getEntities(int $entityId, array $ids = [])
    {
        return [];
    }
}