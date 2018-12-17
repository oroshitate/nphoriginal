<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrimeGitemmastersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrimeGitemmastersTable Test Case
 */
class PrimeGitemmastersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrimeGitemmastersTable
     */
    public $PrimeGitemmasters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prime_gitemmasters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PrimeGitemmasters') ? [] : ['className' => PrimeGitemmastersTable::class];
        $this->PrimeGitemmasters = TableRegistry::getTableLocator()->get('PrimeGitemmasters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PrimeGitemmasters);

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
