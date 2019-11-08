<?php

namespace Warkhosh\Menu\Item;

interface ItemRepositoryInterface
{
    /**
     * Getting specific item
     *
     * @param int $id
     * @return array
     */
    public function getItem(int $id);

    /**
     * Getting active items For Menu
     *
     * @param int $menuId
     * @return array
     */
    public function getItemsForMenu(int $menuId);

    /**
     * Getting all items For Menu
     *
     * @param int $menuId
     * @return array
     */
    public function getAllItemsForMenu(int $menuId);
}