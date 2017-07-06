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
    	$result = $this->repository->getAll();

    	usort($result, [$this, 'compareByLastName']);

		// or
		// usort($result, function ($current, $next) {
		//     return $current['last_name'] <=> $next['last_name'];
		// });

	    return $result;
    }

    private static function compareByLastName($current, $next)
    {
		return $current['last_name'] <=> $next['last_name'];
    }
}
