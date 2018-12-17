<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HuluGitemmastersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HuluGitemmastersTable Test Case
 */
class HuluGitemmastersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HuluGitemmastersTable
     */
    public $HuluGitemmasters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hulu_gitemmasters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('HuluGitemmasters') ? [] : ['className' => HuluGitemmastersTable::class];
        $this->HuluGitemmasters = TableRegistry::getTableLocator()->get('HuluGitemmasters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HuluGitemmasters);

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
