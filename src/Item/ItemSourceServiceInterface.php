<?php

namespace Warkhosh\Menu\Item;

interface ItemSourceServiceInterface
{
    /**
     * Получение списка сущностей присутствующих в пунктах меню
     *
     * @param array $items
     * @return array
     */
    public function getEntitiesFromItems(array $items): array;

    /**
     * Добавление значений из сущностей в указанный список меню
     *
     * @param array $items
     * @param array $groupedByTypeEntityList
     * @return array
     */
    public function getAddedEntityForItemList(array $items, array $groupedByTypeEntityList): array;
}
