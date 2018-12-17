<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrimeReviewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrimeReviewsTable Test Case
 */
class PrimeReviewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrimeReviewsTable
     */
    public $PrimeReviews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prime_reviews',
        'app.reviews',
        'app.users',
        'app.prime_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PrimeReviews') ? [] : ['className' => PrimeReviewsTable::class];
        $this->PrimeReviews = TableRegistry::getTableLocator()->get('PrimeReviews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PrimeReviews);

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
