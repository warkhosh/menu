<?php

declare(strict_types=1);

namespace Warkhosh\Menu\Item;

class BaseItemSourceService implements ItemSourceServiceInterface
{
    /**
     * Получение списка сущностей присутствующих в пунктах меню
     *
     * @param array $items
     * @return array
     */
    public function getEntitiesFromItems(array $items): array
    {
        $entityList = [];

        //foreach ($items as $item) {
        //    if ($item['entity_id'] > 0) {
        //        if (! in_array($item['entity_type'], BaseMenuOption::$entityList)) {
        //            continue;
        //        }
        //
        //        $entityList[$item['entity_id']] = ['id' => $item['entity_id'], 'type' => $item['entity_type']];
        //    }
        //}

        return $entityList;
    }

    /**
     * Добавление значений из сущностей в указанный список меню
     *
     * @param array $items
     * @param array $groupedByTypeEntityList
     * @return array
     */
    public function getAddedEntityForItemList(array $items, array $groupedByTypeEntityList): array
    {
        //foreach ($items as $key => $item) {
        //    $entityType = $item['entity_type'] ?? 0;
        //    $entityId = $item['entity_id'] ?? 0;
        //
        //    if ($entityId > 0) {
        //        if (isset($groupedByTypeEntityList[$entityType][$entityId])) {
        //            $entity = $groupedByTypeEntityList[$entityType][$entityId];
        //
        //            // дописываем в текущий item значение entity
        //            $items[$key]['entity'] = $entity;
        //
        //            // Устанавливаем название ссылки из сущности если в значении пункта меню его не указали
        //            if (empty($items[$key]['value']) && ! empty($entity['name'])) {
        //                $items[$key]['value'] = $entity['name'];
        //            }
        //
        //            // Устанавливаем подсказку к ссылке из сущности если в значении пункта меню его не указали
        //            if (empty($items[$key]['attr_title']) && ! empty($entity['name'])) {
        //                $items[$key]['attr_title'] = $entity['name'];
        //            }
        //
        //            // ...
        //        } else {
        //            continue;
        //        }
        //
        //    } elseif ((int)$entityId === 0) {
        //        // ...
        //    }
        //}

        return $items;
    }
}
