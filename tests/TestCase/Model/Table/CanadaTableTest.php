<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CanadaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CanadaTable Test Case
 */
class CanadaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CanadaTable
     */
    public $Canada;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Canada',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Canada') ? [] : ['className' => CanadaTable::class];
        $this->Canada = TableRegistry::getTableLocator()->get('Canada', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Canada);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
