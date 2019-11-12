<?php

namespace Warkhosh\Menu;

class BaseMenuService implements MenuServiceInterface
{
    /**
     * @param int   $id
     * @param array $data
     * @return \ArrayObject
     */
    public function saveMenu(int $id, array $data = [])
    {
        return new \ArrayObject();
    }

    /**
     * @param int $id
     * @return \ArrayObject
     */
    public function destroyMenu(int $id)
    {
        return new \ArrayObject();
    }
}