<?php

namespace Warkhosh\Menu\Entity;

interface EntitySourceServiceInterface
{
    /**
     * Getting Active entities
     *
     * @param array $entityIds
     * @return array
     */
    public function getEntityForItem(array $entityIds);
}