<?php

namespace Test\Unit\App\Repositories;

use App\Repositories\TableTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\DataAccess\Eloquent\User;
use App\DataAccess\Eloquent\Restaurant;
use App\DataAccess\Eloquent\TableType;
use Tests\TestCase;

class TableTypeRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    private $user;
    private $restaurant;
    private $repository;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->restaurant = factory(Restaurant::class)->create([
            'user_id' => $this->user->id
        ]);
        $this->repository = new TableTypeRepository();
    }

    /**
     * @test
     */
    public function store()
    {
        $data = [
            'release_state' => 'public',
            'table_type_name' => 'hoge',
            'available_start_time' => '10:00:00',
            'available_end_time' => '12:00:00',
            'minimum_capacity' => 1,
            'max_capacity' => 2,
            'number_of_sales' => 3,
            'connectable' => true,
        ];
        $this->repository->store($data, $this->restaurant->id, $this->user->id);

        $this->assertDatabaseHas('table_types', array_merge(
            [
                'restaurant_id' => $this->restaurant->id,
                'user_id' => $this->user->id,
            ],
            $data
        ));
    }

    /**
     * @test
     */
    public function update()
    {
        $tableType = factory(TableType::class)->create([
            'restaurant_id' => $this->restaurant->id,
            'user_id' => $this->user->id,
        ]);
        $data = [
            'release_state' => 'private',
            'table_type_name' => 'fuga',
            'available_start_time' => '10:00:00',
            'available_end_time' => '12:00:00',
            'minimum_capacity' => 1,
            'max_capacity' => 2,
            'number_of_sales' => 3,
            'connectable' => true,
        ];
        $this->repository->update($data, $tableType);

        $this->assertDatabaseHas('table_types', array_merge(
            [
                'restaurant_id' => $this->restaurant->id,
                'user_id' => $this->user->id,
            ],
            $data
        ));
    }
}
