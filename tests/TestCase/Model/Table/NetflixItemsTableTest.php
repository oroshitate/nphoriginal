<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NetflixItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NetflixItemsTable Test Case
 */
class NetflixItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NetflixItemsTable
     */
    public $NetflixItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.netflix_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NetflixItems') ? [] : ['className' => NetflixItemsTable::class];
        $this->NetflixItems = TableRegistry::getTableLocator()->get('NetflixItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NetflixItems);

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
