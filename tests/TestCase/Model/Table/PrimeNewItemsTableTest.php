<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrimeNewItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrimeNewItemsTable Test Case
 */
class PrimeNewItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrimeNewItemsTable
     */
    public $PrimeNewItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prime_new_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PrimeNewItems') ? [] : ['className' => PrimeNewItemsTable::class];
        $this->PrimeNewItems = TableRegistry::getTableLocator()->get('PrimeNewItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PrimeNewItems);

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
