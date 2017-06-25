<?php

namespace BinaryStudioAcademyTests\Task2;

use BinaryStudioAcademy\Task2\Repository;
use BinaryStudioAcademy\Task2\UsersPresenter;
use PHPUnit\Framework\TestCase;

class PresenterTest extends TestCase
{
    const USERS = [
        ['first_name' => 'Rick', 'last_name' => 'Astley'],
        ['first_name' => 'Bob', 'last_name' => 'Marley'],
        ['first_name' => 'Angus', 'last_name' => 'Young'],
        ['first_name' => 'Mick', 'last_name' => 'Jagger'],
        ['first_name' => 'Corey', 'last_name' => 'Taylor'],
    ];

    const EXPECTED_ORDERED_USERS = [
        ['first_name' => 'Rick', 'last_name' => 'Astley'],
        ['first_name' => 'Mick', 'last_name' => 'Jagger'],
        ['first_name' => 'Bob', 'last_name' => 'Marley'],
        ['first_name' => 'Corey', 'last_name' => 'Taylor'],
        ['first_name' => 'Angus', 'last_name' => 'Young'],
    ];

    public function test_should_create_presenter()
    {
        $repository = $this->createRepository([]);
        $presenter = new UsersPresenter($repository);

        $this->assertInstanceOf(UsersPresenter::class, $presenter);
    }

    public function test_should_return_users_ordered_by_last_name_asc()
    {
        $repository = $this->createRepository(self::USERS);
        $presenter = new UsersPresenter($repository);

        $actual = $presenter->getOrderedByLastName();

        $this->assertEquals(count($actual), count(self::USERS));
        $this->assertEquals(self::EXPECTED_ORDERED_USERS, $actual);
    }

    private function createRepository(array $users): Repository
    {
        // TODO: put your implementation here
        return null;
    }
}
