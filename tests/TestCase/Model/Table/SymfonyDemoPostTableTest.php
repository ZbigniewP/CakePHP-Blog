<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SymfonyPostTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SymfonyPostTable Test Case
 */
class SymfonyPostTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SymfonyPostTable
     */
    public $SymfonyPost;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.symfony_demo_post',
        'app.symfony_demo_user'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SymfonyPost') ? [] : ['className' => SymfonyPostTable::class];
        $this->SymfonyPost = TableRegistry::getTableLocator()->get('SymfonyPost', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SymfonyPost);

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

    /**
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
