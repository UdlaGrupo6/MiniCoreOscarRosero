<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CitaFixture
 */
class CitaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cita';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'citasId' => 1,
                'fecha' => '2023-06-24',
                'hora' => '03:28:11',
                'servicioId' => 1,
            ],
        ];
        parent::init();
    }
}
