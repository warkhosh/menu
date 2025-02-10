<?php

namespace Warkhosh\Menu;

class BaseMenuService implements MenuServiceInterface
{
    /**
     * @param int $id
     * @param array $data
     * @return array
     */
    public function saveMenu(int $id, array $data = []): array
    {
        return [];
    }

    /**
     * @param int $id
     * @return array
     */
    public function destroyMenu(int $id): array
    {
        return [];
    }
}
