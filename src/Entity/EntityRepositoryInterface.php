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
     * @param int $entityId
     * @return array
     */
    public function getEntities(int $entityId);

    /**
     * Getting all entities
     *
     * @param int $entityId
     * @return array
     */
    public function getAllEntities(int $entityId);
}