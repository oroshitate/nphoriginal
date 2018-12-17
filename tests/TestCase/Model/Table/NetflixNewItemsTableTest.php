<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NetflixNewItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NetflixNewItemsTable Test Case
 */
class NetflixNewItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NetflixNewItemsTable
     */
    public $NetflixNewItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.netflix_new_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NetflixNewItems') ? [] : ['className' => NetflixNewItemsTable::class];
        $this->NetflixNewItems = TableRegistry::getTableLocator()->get('NetflixNewItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NetflixNewItems);

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
