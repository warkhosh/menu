<?php

namespace Warkhosh\Menu\Item;

class BaseItemRepository implements ItemRepositoryInterface
{
    /**
     * Getting specific item
     *
     * @param int $id
     * @return array
     */
    public function getItem(int $id): array
    {
        return [];
    }

    /**
     * Getting active items For Menu
     *
     * @param int $menuId
     * @return array
     */
    public function getItemsForMenu(int $menuId): array
    {
        return [];
    }

    /**
     * Getting all items For Menu
     *
     * @param int $menuId
     * @return array
     */
    public function getAllItemsForMenu(int $menuId): array
    {
        return [];
    }
}
