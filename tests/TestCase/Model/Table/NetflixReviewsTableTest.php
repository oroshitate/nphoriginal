<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NetflixReviewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NetflixReviewsTable Test Case
 */
class NetflixReviewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NetflixReviewsTable
     */
    public $NetflixReviews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.netflix_reviews',
        'app.reviews',
        'app.users',
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
        $config = TableRegistry::getTableLocator()->exists('NetflixReviews') ? [] : ['className' => NetflixReviewsTable::class];
        $this->NetflixReviews = TableRegistry::getTableLocator()->get('NetflixReviews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NetflixReviews);

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
