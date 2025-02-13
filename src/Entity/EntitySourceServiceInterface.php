<?php

declare(strict_types=1);

namespace Warkhosh\Menu\Entity;

interface EntitySourceServiceInterface
{
    /**
     * Получение активных сущностей из указанных пунктов меню
     *
     * @param array $entityIds
     * @return array
     */
    public function getEntityForItem(array $entityIds): array;
}
