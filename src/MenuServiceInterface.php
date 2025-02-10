<?php

namespace Warkhosh\Menu;

interface MenuServiceInterface
{
    /**
     * @param int $id
     * @param array $data
     * @return array
     */
    public function saveMenu(int $id, array $data = []): array;

    /**
     * @param int $id
     * @return array
     */
    public function destroyMenu(int $id): array;
}
