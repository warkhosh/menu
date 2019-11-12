<?php

namespace Warkhosh\Menu\Item;

interface ItemServiceInterface
{
    /**
     * @param int   $id
     * @param array $data
     * @return \ArrayObject
     */
    public function saveItem(int $id, array $data = []);

    /**
     * @param int $menuId
     * @param int $id
     * @return \ArrayObject
     */
    public function destroyItem(int $menuId, int $id);
}