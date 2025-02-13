<?php

declare(strict_types=1);

namespace Warkhosh\Menu;

class BaseMenuOption
{
    /**
     * Константа 0 уровня (верхний)
     */
    public const LEVEL_TOP = 0;
    public const LEVEL_SECOND = 1;


    /**
     * Список сущностей используемых для меню
     *
     * @var array
     */
    public static array $entityList = [
    ];
}
