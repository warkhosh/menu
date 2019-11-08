<?php

namespace Warkhosh\Menu;

class AppMenu
{
    /**
     * @var RepositoryInterface
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

    public function __construct()
    {
    }

    /**
     * @param RepositoryInterface $repository
     * @return void
     */
    public function setRepository(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param RepositoryInterface $repository
     * @return $this
     */
    public function installRepository(RepositoryInterface $repository)
    {
        $this->repository = $repository;

        return $this;
    }
}