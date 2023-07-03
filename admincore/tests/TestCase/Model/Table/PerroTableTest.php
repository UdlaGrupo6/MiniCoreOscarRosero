<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PerroTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PerroTable Test Case
 */
class PerroTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PerroTable
     */
    protected $Perro;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Perro',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Perro') ? [] : ['className' => PerroTable::class];
        $this->Perro = $this->getTableLocator()->get('Perro', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Perro);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PerroTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
