<?php

namespace Warkhosh\Menu;

interface ItemRepositoryInterface
{
    /**
     * @param int $id
     * @return array
     */
    public function getItems(int $id);

    /**
     * Getting entity values
     *
     * @param int   $entityId
     * @param array $ids - list of specific identifiers in entities
     * @return array
     */
    public function getEntities(int $entityId, array $ids = []);
}