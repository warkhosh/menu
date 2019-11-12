<?php

namespace Warkhosh\Menu;

interface MenuServiceInterface
{
    /**
     * @param int   $id
     * @param array $data
     * @return \ArrayObject
     */
    public function saveMenu(int $id, array $data = []);

    /**
     * @param int $id
     * @return \ArrayObject
     */
    public function destroyMenu(int $id);
}