<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrimeItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrimeItemsTable Test Case
 */
class PrimeItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrimeItemsTable
     */
    public $PrimeItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prime_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PrimeItems') ? [] : ['className' => PrimeItemsTable::class];
        $this->PrimeItems = TableRegistry::getTableLocator()->get('PrimeItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PrimeItems);

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
