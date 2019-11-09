<?php

namespace Warkhosh\Menu\Item;

class BaseItemHelper
{
    /**
     * Returns a sequential tree
     *
     * @param array    $itemList
     * @param string   $primaryKey
     * @param int|null $specificLevel
     * @return array
     */
    static public function getSequentialTree(array $itemList, $primaryKey = 'id', int $specificLevel = null)
    {
        $tree = [];

        if (is_array($itemList)) {
            $children = $items = [];

            foreach ($itemList as $key => $item) {
                $children[$item['parent_id']][] = $item[$primaryKey];
                $items[$item[$primaryKey]] = $item;
            }

            unset($itemList);

            $tree = static::getSequentialListOfChildItems($level = 0, 0, $children, $items);

            if ($specificLevel >= 0) {
                $specificItems = [];

                foreach ($tree as $item) {
                    if ($item['level'] === $specificLevel) {
                        $specificItems[] = $item;
                    }
                }

                $tree = $specificItems;
            }
        }

        return $tree;
    }

    /**
     * Returns a sequential list of child values
     *
     * @param int   $level
     * @param int   $parentId
     * @param array $children
     * @param array $items
     * @return array
     */
    static public function getSequentialListOfChildItems(
        int $level = 0,
        int $parentId = 0,
        array $children = [],
        array $items = []
    ) {
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