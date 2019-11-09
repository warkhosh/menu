<?php

namespace Warkhosh\Menu;

use Exception;
use Warkhosh\Menu\Entity\EntityRepositoryInterface;
use Warkhosh\Menu\Entity\EntitySourceServiceInterface;
use Warkhosh\Menu\Item\BaseItemHelper;
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
     * @var EntitySourceServiceInterface
     */
    protected $entitySourceService;

    /**
     * @return $this
     */
    static public function init()
    {
        return new static();
    }

    /**
     * Install
     *
     * @return $this
     */
    public function install()
    {
        try {
            $this->installItemRepository(\Warkhosh\Menu\Item\BaseItemRepository::class);
            $this->installEntityRepository(\Warkhosh\Menu\Entity\BaseEntityRepository::class);
            $this->installItemSourceService(\Warkhosh\Menu\Item\BaseItemSourceService::class);
            $this->installEntitySourceService(\Warkhosh\Menu\Entity\BaseEntitySourceService::class);

        } catch (Exception $e) {
            //throw new $e;
        }

        return $this;
    }

    /**
     * @param int $menuId
     * @param int $level
     * @return array
     */
    public function getMenu(int $menuId, $level)
    {
        $items = $this->itemRepository->getItemsForMenu($menuId);
        $items = BaseItemHelper::getSequentialTree($items, 'id', $level);

        $entities = $this->itemSourceService->getEntitiesFromItems($items);
        $entityItems = $this->entitySourceService->getEntityForItem($entities);
        $items = $this->itemSourceService->getAddedEntityForItemList($items, $entityItems);

        return $items;
    }

    public function getMenuTree(int $menuId)
    {
        $items = $this->itemRepository->getItemsForMenu($menuId);
        $items = BaseItemHelper::getSequentialTree($items, 'id', null);

        $entities = $this->itemSourceService->getEntitiesFromItems($items);
        $entityItems = $this->entitySourceService->getEntityForItem($entities);
        $items = $this->itemSourceService->getAddedEntityForItemList($items, $entityItems);

        return $items;
    }

    /**
     * @param ItemRepositoryInterface $repository
     * @return void
     */
    public function setItemRepository(ItemRepositoryInterface $repository)
    {
        $this->itemRepository = $repository;
    }

    /**
     * @param string $className
     * @return $this
     * @throws Exception
     */
    public function installItemRepository(string $className)
    {
        if (! ($repository = new $className()) instanceof ItemRepositoryInterface) {
            throw new Exception("Class does not inherit interface ItemRepositoryInterface");
        }

        $this->itemRepository = $repository;

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
        if (! ($repository = new $className()) instanceof EntityRepositoryInterface) {
            throw new Exception("Class does not inherit interface EntityRepositoryInterface");
        }

        $this->entityRepository = $repository;

        return $this;
    }

    /**
     * @param ItemSourceServiceInterface $service
     * @return void
     */
    public function setItemSourceService(ItemSourceServiceInterface $service)
    {
        $this->itemSourceService = $service;
    }

    /**
     * @param string $className
     * @return $this
     * @throws Exception
     */
    public function installItemSourceService(string $className)
    {
        if (! ($service = new $className()) instanceof ItemSourceServiceInterface) {
            throw new Exception("Class does not inherit interface ItemSourceServiceInterface");
        }

        $this->itemSourceService = $service;

        return $this;
    }

    /**
     * @param EntitySourceServiceInterface $service
     * @return void
     */
    public function setEntitySourceService(EntitySourceServiceInterface $service)
    {
        $this->entitySourceService = $service;
    }

    /**
     * @param string $className
     * @return $this
     * @throws Exception
     */
    public function installEntitySourceService(string $className)
    {
        if (! ($service = new $className()) instanceof EntitySourceServiceInterface) {
            throw new Exception("Class does not inherit interface EntitySourceServiceInterface");
        }

        $this->entitySourceService = $service;

        return $this;
    }
}