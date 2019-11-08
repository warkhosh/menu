<?php

namespace Warkhosh\Menu;

use Exception;
use Warkhosh\Menu\Entity\EntityRepositoryInterface;
use Warkhosh\Menu\Item\ItemRepositoryInterface;
use Warkhosh\Menu\Item\ItemSourceServiceInterface;

class AppMenu
{
    /**
     * @var ItemRepositoryInterface
     */
    protected $itemRepository;

    /**
     * @var EntityRepositoryInterface
     */
    protected $entityRepository;

    /**
     * @var ItemSourceServiceInterface
     */
    protected $itemSourceService;

    /**
     * @param int $menuId
     * @return array
     */
    public function getValues(int $menuId)
    {
        $items = $this->itemRepository->getItemsForMenu($menuId);
        $entities = $this->entityRepository->getEntities($this->itemSourceService->getEntitiesFromItems($items));

        return $items;
    }

    /**
     * @param ItemRepositoryInterface $repository
     * @return void
     */
    public function setRepository(ItemRepositoryInterface $repository)
    {
        $this->itemRepository = $repository;
    }

    /**
     * @param string $className
     * @return $this
     * @throws Exception
     */
    public function installRepository(string $className)
    {
        if (! $className instanceof ItemRepositoryInterface) {
            throw new Exception("Class does not inherit interface ItemRepositoryInterface");
        }

        $this->itemRepository = new $className();

        return $this;
    }

    /**
     * @param EntityRepositoryInterface $repository
     * @return void
     */
    public function setEntityRepository(EntityRepositoryInterface $repository)
    {
        $this->entityRepository = $repository;
    }

    /**
     * @param string $className
     * @return $this
     * @throws Exception
     */
    public function installEntityRepository(string $className)
    {
        if (! $className instanceof EntityRepositoryInterface) {
            throw new Exception("Class does not inherit interface EntityRepositoryInterface");
        }

        $this->entityRepository = new $className();

        return $this;
    }

    /**
     * @param ItemSourceServiceInterface $sourceService
     * @return void
     */
    public function setSourceService(ItemSourceServiceInterface $sourceService)
    {
        $this->itemSourceService = $sourceService;
    }

    /**
     * @param string $className
     * @return $this
     * @throws Exception
     */
    public function installSourceService(string $className)
    {
        if (! $className instanceof ItemSourceServiceInterface) {
            throw new Exception("Class does not inherit interface ItemSourceServiceInterface");
        }

        $this->itemSourceService = new $className();

        return $this;
    }
}