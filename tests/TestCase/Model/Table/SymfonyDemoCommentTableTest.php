<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SymfonyDemoCommentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SymfonyDemoCommentTable Test Case
 */
class SymfonyDemoCommentTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SymfonyDemoCommentTable
     */
    public $SymfonyDemoComment;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.symfony_demo_comment',
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
        $config = TableRegistry::getTableLocator()->exists('SymfonyDemoComment') ? [] : ['className' => SymfonyDemoCommentTable::class];
        $this->SymfonyDemoComment = TableRegistry::getTableLocator()->get('SymfonyDemoComment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SymfonyDemoComment);

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
