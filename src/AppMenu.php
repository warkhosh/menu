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
    protected ItemRepositoryInterface $itemRepository;

    /**
     * @var EntityRepositoryInterface
     */
    protected EntityRepositoryInterface $entityRepository;

    /**
     * @var ItemSourceServiceInterface
     */
    protected ItemSourceServiceInterface $itemSourceService;

    /**
     * @var EntitySourceServiceInterface
     */
    protected EntitySourceServiceInterface $entitySourceService;

    /**
     * @return $this
     */
    public static function init(): static
    {
        return new static();
    }

    /**
     * Install
     *
     * @return $this
     */
    public function install(): static
    {
        try {
            $this->installItemRepository(\Warkhosh\Menu\Item\BaseItemRepository::class);
            $this->installEntityRepository(\Warkhosh\Menu\Entity\BaseEntityRepository::class);
            $this->installItemSourceService(\Warkhosh\Menu\Item\BaseItemSourceService::class);
            $this->installEntitySourceService(\Warkhosh\Menu\Entity\BaseEntitySourceService::class);
        } catch (Exception $e) {
            // Logs...
        }

        return $this;
    }

    /**
     * @param int $menuId
     * @param int $level
     * @return array
     */
    public function getMenu(int $menuId, int $level): array
    {
        $items = $this->itemRepository->getItemsForMenu($menuId);
        $items = BaseItemHelper::getSequentialTree($items, 'id', $level);

        $entities = $this->itemSourceService->getEntitiesFromItems($items);
        $entityItems = $this->entitySourceService->getEntityForItem($entities);

        return $this->itemSourceService->getAddedEntityForItemList($items, $entityItems);
    }

    public function getMenuTree(int $menuId): array
    {
        $items = $this->itemRepository->getItemsForMenu($menuId);
        $items = BaseItemHelper::getSequentialTree($items, 'id', null);

        $entities = $this->itemSourceService->getEntitiesFromItems($items);
        $entityItems = $this->entitySourceService->getEntityForItem($entities);

        return $this->itemSourceService->getAddedEntityForItemList($items, $entityItems);
    }

    /**
     * @param ItemRepositoryInterface $repository
     * @return void
     */
    public function setItemRepository(ItemRepositoryInterface $repository): void
    {
        $this->itemRepository = $repository;
    }

    /**
     * @param string $className
     * @return $this
     * @throws Exception
     */
    public function installItemRepository(string $className): static
    {
        $repository = method_exists($className, 'getInstance') ? $className::getInstance() : new $className();

        if (! $repository instanceof ItemRepositoryInterface) {
            throw new Exception("Class does not inherit interface ItemRepositoryInterface");
        }

        $this->itemRepository = $repository;

        return $this;
    }

    /**
     * @param EntityRepositoryInterface $repository
     * @return void
     */
    public function setEntityRepository(EntityRepositoryInterface $repository): void
    {
        $this->entityRepository = $repository;
    }

    /**
     * @param string $className
     * @return $this
     * @throws Exception
     */
    public function installEntityRepository(string $className): static
    {
        $repository = method_exists($className, 'getInstance') ? $className::getInstance() : new $className();

        if (! $repository instanceof EntityRepositoryInterface) {
            throw new Exception("Class does not inherit interface EntityRepositoryInterface");
        }

        $this->entityRepository = $repository;

        return $this;
    }

    /**
     * @param ItemSourceServiceInterface $service
     * @return void
     */
    public function setItemSourceService(ItemSourceServiceInterface $service): void
    {
        $this->itemSourceService = $service;
    }

    /**
     * @param string $className
     * @return $this
     * @throws Exception
     */
    public function installItemSourceService(string $className): static
    {
        $service = method_exists($className, 'getInstance') ? $className::getInstance() : new $className();

        if (! $service instanceof ItemSourceServiceInterface) {
            throw new Exception("Class does not inherit interface ItemSourceServiceInterface");
        }

        $this->itemSourceService = $service;

        return $this;
    }

    /**
     * @param EntitySourceServiceInterface $service
     * @return void
     */
    public function setEntitySourceService(EntitySourceServiceInterface $service): void
    {
        $this->entitySourceService = $service;
    }

    /**
     * @param string $className
     * @return $this
     * @throws Exception
     */
    public function installEntitySourceService(string $className): static
    {
        $service = method_exists($className, 'getInstance') ? $className::getInstance() : new $className();

        if (! $service instanceof EntitySourceServiceInterface) {
            throw new Exception("Class does not inherit interface EntitySourceServiceInterface");
        }

        $this->entitySourceService = $service;

        return $this;
    }
}
