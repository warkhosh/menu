<?php

namespace Warkhosh\Menu;

interface RepositoryInterface
{
    /**
     * @param int $id
     * @return array
     */
    public function getMenuItems(int $id);

    /**
     * Getting entity values
     *
     * @param int   $entityId
     * @param array $ids - list of specific identifiers in entities
     * @return array
     */
    public function getEntities(int $entityId, array $ids = []);
}