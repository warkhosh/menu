<?php

declare(strict_types=1);

namespace Warkhosh\Menu;

use Warkhosh\Menu\Entity\EntityRepositoryInterface;
use Warkhosh\Menu\Entity\EntitySourceServiceInterface;
use Warkhosh\Menu\Item\BaseItemHelper;
use Warkhosh\Menu\Item\ItemRepositoryInterface;
use Warkhosh\Menu\Item\ItemSourceServiceInterface;
use Exception;

class AppMenu
{
    /**
     * Репозиторий для получения пунктов меню
     *
     * @var ItemRepositoryInterface
     */
    protected ItemRepositoryInterface $itemRepository;

    /**
     * Репозиторий для получения сущностей меню
     *
     * @var EntityRepositoryInterface
     */
    protected EntityRepositoryInterface $entityRepository;

    /**
     * Сервис для алгоритмов при работе с пунктами меню
     *
     * @var ItemSourceServiceInterface
     */
    protected ItemSourceServiceInterface $itemSourceService;

    /**
     * Сервис для алгоритмов при работе с сущностями
     *
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
     * Метод для статичного получения экземпляра класса (если вам лень делать фасад)
     *
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
    public function getMenu(int $menuId, ?int $level = null): array
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
}
