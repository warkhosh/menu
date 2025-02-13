<?php

declare(strict_types=1);

namespace Warkhosh\Menu\Entity;

class BaseEntitySourceService implements EntitySourceServiceInterface
{
    /**
     * Получение активных сущностей из указанных пунктов меню
     *
     * @param array $entityIds
     * @return array
     */
    public function getEntityForItem(array $entityIds): array
    {
        $result = [];

        //foreach ($entityIds as $entityType => $entities) {
        //    $result[$entityType] = ...select($entities);
        //}

        return $result;
    }
}
