<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NetflixTitemmastersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NetflixTitemmastersTable Test Case
 */
class NetflixTitemmastersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NetflixTitemmastersTable
     */
    public $NetflixTitemmasters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.netflix_titemmasters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NetflixTitemmasters') ? [] : ['className' => NetflixTitemmastersTable::class];
        $this->NetflixTitemmasters = TableRegistry::getTableLocator()->get('NetflixTitemmasters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NetflixTitemmasters);

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
