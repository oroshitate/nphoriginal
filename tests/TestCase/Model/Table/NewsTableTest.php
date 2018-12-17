<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsTable Test Case
 */
class NewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsTable
     */
    public $News;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.news'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('News') ? [] : ['className' => NewsTable::class];
        $this->News = TableRegistry::getTableLocator()->get('News', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->News);

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
