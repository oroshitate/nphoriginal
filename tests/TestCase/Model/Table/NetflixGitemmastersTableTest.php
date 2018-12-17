<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NetflixGitemmastersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NetflixGitemmastersTable Test Case
 */
class NetflixGitemmastersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NetflixGitemmastersTable
     */
    public $NetflixGitemmasters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.netflix_gitemmasters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NetflixGitemmasters') ? [] : ['className' => NetflixGitemmastersTable::class];
        $this->NetflixGitemmasters = TableRegistry::getTableLocator()->get('NetflixGitemmasters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NetflixGitemmasters);

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
