<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HuluReviewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HuluReviewsTable Test Case
 */
class HuluReviewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HuluReviewsTable
     */
    public $HuluReviews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hulu_reviews',
        'app.reviews',
        'app.users',
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
        $config = TableRegistry::getTableLocator()->exists('HuluReviews') ? [] : ['className' => HuluReviewsTable::class];
        $this->HuluReviews = TableRegistry::getTableLocator()->get('HuluReviews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HuluReviews);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
