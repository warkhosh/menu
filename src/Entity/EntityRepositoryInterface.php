<?php

namespace Warkhosh\Menu\Entity;

interface EntityRepositoryInterface
{
    /**
     * Getting specific entity
     *
     * @param int $entityId
     * @return array
     */
    public function getEntity(int $entityId);

    /**
     * Getting Active entities
     *
     * @param array $entityIds
     * @return array
     */
    public function getEntities(array $entityIds);

    /**
     * Getting all entities
     *
     * @param array $entityIds
     * @return array
     */
    public function getAllEntities(array $entityIds);
}