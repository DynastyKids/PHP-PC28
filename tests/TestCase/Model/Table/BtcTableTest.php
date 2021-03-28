<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BtcTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BtcTable Test Case
 */
class BtcTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BtcTable
     */
    public $Btc;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Btc',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Btc') ? [] : ['className' => BtcTable::class];
        $this->Btc = TableRegistry::getTableLocator()->get('Btc', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Btc);

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
