<?php

declare(strict_types=1);

namespace Warkhosh\Menu\Item;

interface ItemRepositoryInterface
{
    /**
     * Getting specific item
     *
     * @param int $id
     * @return array
     */
    public function getItem(int $id): array;

    /**
     * Getting active items For Menu
     *
     * @param int $menuId
     * @return array
     */
    public function getItemsForMenu(int $menuId): array;

    /**
     * Getting all items For Menu
     *
     * @param int $menuId
     * @return array
     */
    public function getAllItemsForMenu(int $menuId): array;
}
