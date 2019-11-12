<?php

namespace Warkhosh\Menu\Item;

class BaseItemService implements ItemServiceInterface
{
    /**
     * @param int   $id
     * @param array $data
     * @return \ArrayObject
     */
    public function saveItem(int $id, array $data = [])
    {
        return new \ArrayObject();
    }

    /**
     * @param int $id
     * @return \ArrayObject
     */
    public function destroyItem(int $id)
    {
        return new \ArrayObject();
    }
}