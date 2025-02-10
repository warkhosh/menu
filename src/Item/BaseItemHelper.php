<?php

namespace Warkhosh\Menu\Item;

class BaseItemHelper
{
    /**
     * Returns a sequential tree
     *
     * @param array $itemList
     * @param string $primaryKey
     * @param int|null $specificLevel
     * @return array
     */
    public static function getSequentialTree(
        array $itemList,
        string $primaryKey = 'id',
        int $specificLevel = null
    ): array {
        $tree = [];

        $children = $items = [];

        foreach ($itemList as $key => $item) {
            $children[$item['parent_id']][] = $item[$primaryKey];
            $items[$item[$primaryKey]] = $item;
        }

        unset($itemList);

        $tree = static::getSequentialListOfChildItems(0, 0, $children, $items);

        if (! is_null($specificLevel) && $specificLevel >= 0) {
            $specificItems = [];

            foreach ($tree as $item) {
                if ($item['level'] === $specificLevel) {
                    $specificItems[] = $item;
                }
            }

            $tree = $specificItems;
        }

        return $tree;
    }

    /**
     * Returns a sequential list of child values
     *
     * @param int $level
     * @param int $parentId
     * @param array $children
     * @param array $items
     * @return array
     */
    public static function getSequentialListOfChildItems(
        int $level = 0,
        int $parentId = 0,
        array $children = [],
        array $items = []
    ): array {
        $tree = [];

        if (key_exists($parentId, $children)) {
            foreach ($children[$parentId] as $itemId) {
                $item = $items[$itemId];
                $item['level'] = $level;

                $tree[] = $item;

                foreach (static::getSequentialListOfChildItems(($level + 1), $itemId, $children, $items) as $addItem) {
                    $tree[] = $addItem;
                }
            }
        }

        return $tree;
    }
}
