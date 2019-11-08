<?php

namespace Warkhosh\Menu;

class Item
{
    /**
     * @var ItemRepositoryInterface
     */
    protected $repository;

    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var array
     */
    protected $entities = [];

    /**
     * @param int $id
     * @return array
     */
    public function getItems(int $id)
    {
        return $this->repository->getItems($id);
    }

    /**
     * @param ItemRepositoryInterface $repository
     * @return void
     */
    public function setRepository(ItemRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $className
     * @return $this
     * @throws \Exception
     */
    public function installRepository(string $className)
    {
        if (! $className instanceof ItemRepositoryInterface) {
            throw new \Exception("Class does not inherit interface ItemRepositoryInterface");
        }

        $this->repository = new $className();

        return $this;
    }
}