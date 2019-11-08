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

        } catch (Exception $e) {
            //throw new $e;
        }

        return $this;
    }

    /**
     * @param int $menuId
     * @return array
     */
    public function getValues(int $menuId)
    {
        $items = $this->itemRepository->getItemsForMenu($menuId);
        $entities = $this->entityRepository->getEntityValues($this->itemSourceService->getEntitiesFromItems($items));

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
        if (!  ($sourceService = new $className()) instanceof ItemSourceServiceInterface) {
            throw new Exception("Class does not inherit interface ItemSourceServiceInterface");
        }

        $this->itemSourceService = $sourceService;

        return $this;
    }
}