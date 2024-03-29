<?php

namespace Warkhosh\Menu\Item;

interface ItemSourceServiceInterface
{
    /**
     * Retrieving Entity Values from a item List
     *
     * @param array $items
     * @return array
     */
    public function getEntitiesFromItems(array $items);

    /**
     * @param array $items
     * @param array $entityItems
     * @return array
     */
    public function getAddedEntityForItemList(array $items, array $entityItems);
}