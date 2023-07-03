<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HabitacionTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HabitacionTable Test Case
 */
class HabitacionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HabitacionTable
     */
    protected $Habitacion;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Habitacion',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Habitacion') ? [] : ['className' => HabitacionTable::class];
        $this->Habitacion = $this->getTableLocator()->get('Habitacion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Habitacion);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HabitacionTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
