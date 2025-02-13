<?php

declare(strict_types=1);

namespace Warkhosh\Menu\Item;

interface ItemServiceInterface
{
    /**
     * @param int $id
     * @param array $data
     * @return array
     */
    public function saveItem(int $id, array $data = []): array;

    /**
     * @param int $menuId
     * @param int $id
     * @return array
     */
    public function destroyItem(int $menuId, int $id): array;
}
