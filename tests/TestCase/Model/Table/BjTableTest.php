<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BjTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BjTable Test Case
 */
class BjTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BjTable
     */
    public $Bj;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Bj',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Bj') ? [] : ['className' => BjTable::class];
        $this->Bj = TableRegistry::getTableLocator()->get('Bj', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bj);

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
