<?php

namespace Warkhosh\Menu\Item;

class BaseItemService implements ItemServiceInterface
{
    /**
     * @param int $id
     * @param array $data
     * @return array
     */
    public function saveItem(int $id, array $data = []): array
    {
        return [];
    }

    /**
     * @param int $menuId
     * @param int $id
     * @return array
     */
    public function destroyItem(int $menuId, int $id): array
    {
        return [];
    }
}
