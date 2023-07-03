<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PerroFixture
 */
class PerroFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'perro';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'perroId' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'size' => 'Lorem ipsum dolor sit amet',
                'vacunas' => 'Lorem ipsum dolor sit amet',
                'dieta' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
