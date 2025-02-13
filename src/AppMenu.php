<?php

declare(strict_types=1);

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
     * Конструктор
     *
     * @throws Exception
     */
    public function __construct()
    {
        if (is_string($result = $this->install())) {
            throw new Exception($result);
        }
    }

    /**
     * @return $this
     */
    public static function init(): static
    {
        return new static();
    }

    /**
     * Метод объявления репозиториев и сервисов
     *
     * @bote предназначен для переопределения в наследниках
     *
     * @return bool|string
     */
    protected function install(): bool|string
    {
        try {
            $this->itemRepository = new \Warkhosh\Menu\Item\BaseItemRepository();
            $this->entityRepository = new \Warkhosh\Menu\Entity\BaseEntityRepository();
            $this->itemSourceService = new \Warkhosh\Menu\Item\BaseItemSourceService();
            $this->entitySourceService = new \Warkhosh\Menu\Entity\BaseEntitySourceService();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Возвращает список пунктов для меню
     *
     * @param int $menuId
     * @param int|null $level уровень пунктов для меню
     * @return array
     */
    public function getMenu(int $menuId, int $level = null): array
    {
        // Получение активных элементов в указанном меню
        $items = $this->itemRepository->getItemsForMenu($menuId);
        $items = BaseItemHelper::getSequentialTree($items, 'id', $level);
        $entities = [];

        // Установка списка сущностей для пунктов меню (с группировкой по типу)
        foreach ($this->itemSourceService->getEntitiesFromItems($items) as $entity) {
            $entities[$entity['type']][$entity['id']] = $entity['id'];
        }

        // Получение значений самих сущностей
        $entityItems = $this->entitySourceService->getEntityForItem($entities);

        // Добавление значений из сущностей в указанный список меню
        return $this->itemSourceService->getAddedEntityForItemList($items, $entityItems);
    }

    /**
     * Метод установки репозитория для получения пунктов меню
     *
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
     * Метод установки репозитория для получения сущностей меню
     *
     * @param string $className
     * @return $this
     * @throws Exception
     */
    protected function installEntityRepository(string $className): static
    {
        $repository = method_exists($className, 'getInstance') ? $className::getInstance() : new $className();

        if (! $repository instanceof EntityRepositoryInterface) {
            throw new Exception("Class does not inherit interface EntityRepositoryInterface");
        }

        $this->entityRepository = $repository;

        return $this;
    }

    /**
     * Метод установки сервиса для алгоритмов при работе с пунктами меню
     *
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
     * Метод установки сервиса для алгоритмов при работе с сущностями
     *
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
