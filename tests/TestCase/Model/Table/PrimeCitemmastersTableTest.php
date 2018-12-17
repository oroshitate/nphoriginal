<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrimeCitemmastersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrimeCitemmastersTable Test Case
 */
class PrimeCitemmastersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrimeCitemmastersTable
     */
    public $PrimeCitemmasters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prime_citemmasters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PrimeCitemmasters') ? [] : ['className' => PrimeCitemmastersTable::class];
        $this->PrimeCitemmasters = TableRegistry::getTableLocator()->get('PrimeCitemmasters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PrimeCitemmasters);

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
