<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HabitacionFixture
 */
class HabitacionFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'habitacion';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'habitacionId' => 1,
                'numero' => 1,
                'clienteId' => 1,
            ],
        ];
        parent::init();
    }
}
