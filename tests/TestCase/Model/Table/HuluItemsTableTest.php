<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HuluItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HuluItemsTable Test Case
 */
class HuluItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HuluItemsTable
     */
    public $HuluItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hulu_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('HuluItems') ? [] : ['className' => HuluItemsTable::class];
        $this->HuluItems = TableRegistry::getTableLocator()->get('HuluItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HuluItems);

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
