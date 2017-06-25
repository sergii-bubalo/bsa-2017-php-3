<?php

namespace BinaryStudioAcademy\Task2;

class UsersPresenter
{
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getOrderedByLastName(): array
    {
        // TODO: implement with ascending sort
        return [];
    }
}
